<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Book;
use Laratrust\LaratrustFacade as Laratrust;

class GuestController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
{
if ($request->ajax()) {
$books = Book::with('author');
return Datatables::of($books)
->addColumn('stock', function($book){
return $book->stock;
})
->addColumn('action', function($book){
if (Laratrust::hasRole('admin')) return '';// jika admin tidak muncul tombol pinjam
return '<a class="btn btn-xs btn-primary" href="'.route('guest.books.borrow', $book->id).'">Pinjam</a>';
})->make(true);
}
$html = $htmlBuilder
->addColumn(['data' => 'title', 'name'=>'title', 'title'=>'Judul'])
->addColumn(['data' => 'stock', 'name'=>'stock', 'title'=>'Stok', 'orderable'=>false, 'searchable'=>false])
->addColumn(['data' => 'author.name', 'name'=>'author.name', 'title'=>'Penulis'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('guest.index')->with(compact('html'));
}

}
