<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Author extends Model
{
    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot(); //panggil  boot untuk melakukan hook ke event deleting

        self::deleting(function($author) {
            // mengecek apakah penulis masih punya buku
            if ($author->books->count() > 0) {
                // menyiapkan pesan error
                $html = 'Penulis tidak bisa dihapus karena masih memiliki buku : ';
                $html .= '<ul>';
                foreach ($author->books as $book) {
                    $html .= "<li>$book->title</li>";//tampilkan buku
                }
                $html .= '</ul>';

                Session::flash("flash_notification", [
                    "level"=>"danger",
                    "message"=>$html
                ]);

                // membatalkan proses penghapusan
                return false;
            }
        });
    }

    public function books()//panggil model books
    {
        return $this->hasMany('App\Book');
    }
}
