<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $posts = [
['title'=>'Tips Menjadi Android Developer', 'content'=>'lorem ipsum'],
['title'=>'Eminem Phonomenal Book', 'content'=>'lorem ipsum'],
['title'=>'Ultraviolet Developer Company', 'content'=>'lorem ipsum']
];
// masukkan data ke database
DB::table('posts')->insert($posts);

    }
}
