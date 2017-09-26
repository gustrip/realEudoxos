<?php
use Illuminate\Database\Seeder;
use realEudoxos\Author;
Class AuthorsTableSeeder extends Seeder {
 
    public function run()
    {


        Author::create(array(
            'name' => 'James Robert',
            'surname'=>'Baker',
            'bio'=>'',
        ));

        Author::create(array(
            'name' => 'Sun',
            'surname'=>'Tzu',
            'bio'=>'',
        ));

        Author::create(array(
            'name' => 'Gray',
            'surname'=>'Justin',
            'bio'=>'',
        ));

        Author::create(array(
            'name' => 'Palmiotti',
            'surname'=>'Jimmy',
            'bio'=>'',
        ));

        Author::create(array(
            'name' => 'Ellis',
            'surname'=>'Warren',
            'bio'=>'',
        ));

        Author::create(array(
            'name' => 'Tolstoj Lev',
            'surname'=>'Nikolaevic',
            'bio'=>'',
        ));

        Author::create(array(
            'name' => 'Gabriel Garcia',
            'surname'=>'Marquez',
            'bio'=>'',
        ));

        Author::create(array(
            'name' => 'Fedor Michailovic',
            'surname'=>'Dostojevskij ',
            'bio'=>'',
        ));

        Author::create(array(
            'name' => 'Αλέξανδρος',
            'surname'=>'Παπαδιαμάντης',
            'bio'=>'',
        ));

        Author::create(array(
            'name' => 'Νίκος',
            'surname'=>'Καζαντζάκης',
            'bio'=>'',
        ));

    }
 
}