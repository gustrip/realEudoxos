<?php
use Illuminate\Database\Seeder;
use realEudoxos\Book;
Class BooksTableSeeder extends Seeder {
 
    public function run()
    {


        Book::create(array(
            'title'=>'Ασκητική',
            'yearOfRelease'=>'2009',
            'isbn'=>'9789607948182',
            'publisher_id'=>'1',
            'category_id'=>'3',
            'price'=>'9.5',
            'stock'=>'100',
            'description'=>'',
            'imageURL'=>'book.png',
        ));

        Book::create(array(
            'title'=>'Red',
            'yearOfRelease'=>'2010',
            'isbn'=>'9789603068327',
            'publisher_id'=>'2',
            'category_id'=>'12',
            'price'=>'8.75',
            'stock'=>'100',
            'description'=>'',
            'imageURL'=>'book.png',
        ));

        Book::create(array(
            'title'=>'Πόλεμος και ειρήνη',
            'yearOfRelease'=>'2001',
            'isbn'=>'9789603789161',
            'publisher_id'=>'3',
            'category_id'=>'3',
            'price'=>'10.38',
            'stock'=>'100',
            'description'=>'',
            'imageURL'=>'book.png',
        ));

        Book::create(array(
            'title'=>'Αδελφοί Καραμαζόφ',
            'yearOfRelease'=>'2012',
            'isbn'=>'9789604575305',
            'publisher_id'=>'4',
            'category_id'=>'3',
            'price'=>'9.5',
            'stock'=>'100',
            'description'=>'',
            'imageURL'=>'book.png',
        ));

        Book::create(array(
            'title'=>'Jonah Hex: Η γέννηση ενός θρύλου',
            'yearOfRelease'=>'2010',
            'isbn'=>'9789603069720',
            'publisher_id'=>'2',
            'category_id'=>'12',
            'price'=>'12.20',
            'stock'=>'100',
            'description'=>'',
            'imageURL'=>'book.png',
        ));

        Book::create(array(
            'title'=>'Η τέχνη του πολέμου',
            'yearOfRelease'=>'2008',
            'isbn'=>'9789604362219',
            'publisher_id'=>'5',
            'category_id'=>'19',
            'price'=>'2.99',
            'stock'=>'100',
            'description'=>'',
            'imageURL'=>'book.png',
        ));

        Book::create(array(
            'title'=>'Η Φόνισσα',
            'yearOfRelease'=>'2014',
            'isbn'=>'9789609444378',
            'publisher_id'=>'6',
            'category_id'=>'3',
            'price'=>'6.72',
            'stock'=>'100',
            'description'=>'',
            'imageURL'=>'book.png',
        ));

        Book::create(array(
            'title'=>'Chronicle of a Death Foretold',
            'yearOfRelease'=>'2016',
            'isbn'=>'9780241968628',
            'publisher_id'=>'8',
            'category_id'=>'4',
            'price'=>'11.01',
            'stock'=>'100',
            'description'=>'',
            'imageURL'=>'book.png',
        ));

    }
 
}