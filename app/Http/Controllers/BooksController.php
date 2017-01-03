<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Book;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\BorrowLog;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\BookException;
use PDF;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $books = Book::with('author');//Penggunaan method with() akan meload relasi dari Book ke Author dengan teknik eager loading
          return Datatables::of($books)
->addColumn('stock', function($book){
return $book->stock;
})
                ->addColumn('action', function($book){
                    return view('datatable._action', [
                        'model'           => $book,
                        'form_url'        => route('books.destroy', $book->id),
                        'edit_url'        => route('books.edit', $book->id),
                        'confirm_message' => 'Yakin mau menghapus ' . $book->title . '?',
                     
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder 
            ->addColumn(['data' => 'title', 'name'=>'title', 'title'=>'Judul'])
            ->addColumn(['data' => 'stock', 'name'=>'amount', 'title'=>'Jumlah'])
            ->addColumn(['data' => 'author.name', 'name'=>'author.name', 'title'=>'Penulis'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action', 'orderable'=>false, 'searchable'=>false]);
          

        return view('books.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function borrow($id)
    {
        try {
            $book = Book::findOrFail($id);
            Auth::user()->borrow($book);
            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil meminjam $book->title"
            ]);
        } catch (BookException $e) {
            Session::flash("flash_notification", [
                "level"   => "danger",
                "message" => $e->getMessage()
            ]);
        } catch (ModelNotFoundException $e) {
            Session::flash("flash_notification", [
                "level"   => "danger",
                "message" => "Buku tidak ditemukan."
            ]);
        }

        return redirect('/');
    }



public function store(StoreBookRequest $request)
{

$book = Book::create($request->except('cover'));
// isi field cover jika ada cover yang diupload
if ($request->hasFile('cover')) {
// Mengambil file yang diupload
$uploaded_cover = $request->file('cover');
// mengambil extension file
$extension = $uploaded_cover->getClientOriginalExtension();
// membuat nama file random berikut extension
$filename = md5(time()) . '.' . $extension;
// menyimpan cover ke folder public/img
$destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
$uploaded_cover->move($destinationPath, $filename);
// mengisi field cover di book dengan filename yang baru dibuat
$book->cover = $filename;
$book->save();
}
Session::flash("flash_notification", [
"level"=>"success",
"message"=>"Berhasil menyimpan $book->title"
]);
return redirect()->route('books.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $book = Book::find($id);
return view('books.edit')->with(compact('book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, $id)
{

$book = Book::find($id);
 if(!$book->update($request->all())) return redirect()->back();
if ($request->hasFile('cover')) {
// menambil cover yang diupload berikut ekstensinya
$filename = null;
$uploaded_cover = $request->file('cover');
$extension = $uploaded_cover->getClientOriginalExtension();
// membuat nama file random dengan extension
$filename = md5(time()) . '.' . $extension;
$destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
// memindahkan file ke folder public/img
$uploaded_cover->move($destinationPath, $filename);
// hapus cover lama, jika ada
if ($book->cover) {
$old_cover = $book->cover;
$filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
. DIRECTORY_SEPARATOR . $book->cover;
try {
File::delete($filepath);
} catch (FileNotFoundException $e) {
// File sudah dihapus/tidak ada
}
}
// ganti field cover dengan cover yang baru
$book->cover = $filename;
$book->save();
}
Session::flash("flash_notification", [
"level"=>"success",
"message"=>"Berhasil menyimpan $book->title"
]);
return redirect()->route('books.index');
}

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request, $id)
    {
        $book = Book::find($id);
        $cover = $book->cover;
        if(!$book->delete()) return redirect()->back();

        // handle hapus buku via ajax
        if ($request->ajax()) return response()->json(['id' => $id]);

        // hapus cover lama, jika ada
        if ($cover) {
            $old_cover = $book->cover;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
                . DIRECTORY_SEPARATOR . $book->cover;

            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Buku berhasil dihapus"
        ]);

        return redirect()->route('books.index');
    }

  public function returnBack($book_id)
    {
        $borrowLog = BorrowLog::where('user_id', Auth::user()->id)
            ->where('book_id', $book_id)
            ->where('is_returned', 0)
            ->first();

        if ($borrowLog) {
            $borrowLog->is_returned = true;
            $borrowLog->save();

            Session::flash("flash_notification", [
                "level"   => "success",
                "message" => "Berhasil mengembalikan " . $borrowLog->book->title
            ]);
        }

        return redirect('/home');
    }
 public function export() 
    { 
        return view('books.export');
    }

     public function exportPost(Request $request) 
    { 

        // validasi
        $this->validate($request, [
            'author_id'=>'required',
            'type'=>'required|in:pdf,xls'
        ], [
            'author_id.required'=>'Anda belum memilih penulis. Pilih minimal 1 penulis.'
        ]);

        $books = Book::whereIn('id', $request->get('author_id'))->get();

        $handler = 'export' . ucfirst($request->get('type'));
        return $this->$handler($books);
    }

     private function exportPdf($books)
    {
        $pdf = PDF::loadview('pdf.books', compact('books'));
        return $pdf->download('books.pdf');
    }


}
