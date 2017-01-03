<?php

use Illuminate\Database\Seeder;
use App\BorrowLog;
use App\User;
class BooksSeeder extends Seeder
{
public function run()
{
// Sample peminjaman buku
$member = User::where('email', 'verlymember@gmail.com')->first();
BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book1->id, 'is_returned' => 0]);
BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book2->id, 'is_returned' => 0]);
BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book3->id, 'is_returned' => 1]);
}
}