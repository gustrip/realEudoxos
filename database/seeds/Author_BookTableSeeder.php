<?php

use Illuminate\Database\Seeder;


class Author_BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author_book')->insert([
        	'author_id'=>'2',
        	'book_id'=>'6',
        	]);
        DB::table('author_book')->insert([
        	'author_id'=>'3',
        	'book_id'=>'5',
        	]);
        DB::table('author_book')->insert([
        	'author_id'=>'4',
        	'book_id'=>'5',
        	]);
        DB::table('author_book')->insert([
        	'author_id'=>'5',
        	'book_id'=>'2',
        	]);
        DB::table('author_book')->insert([
        	'author_id'=>'6',
        	'book_id'=>'3',
        	]);
        DB::table('author_book')->insert([
        	'author_id'=>'7',
        	'book_id'=>'8',
        	]);
        DB::table('author_book')->insert([
        	'author_id'=>'8',
        	'book_id'=>'4',
        	]);
        DB::table('author_book')->insert([
        	'author_id'=>'9',
        	'book_id'=>'7',
        	]);
        DB::table('author_book')->insert([
        	'author_id'=>'10',
        	'book_id'=>'1',
        	]);
    }
}
