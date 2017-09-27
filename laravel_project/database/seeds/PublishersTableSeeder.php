<?php

use Illuminate\Database\Seeder;
use realEudoxos\Publisher;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        Publisher::create(array(
        	'name'=>'Εκδόσεις Καζαντζάκη',
        ));
        Publisher::create(array(
        	'name'=>'Anubis',
        ));
        Publisher::create(array(
        	'name'=>'Εκδόσεις Πατάκη',
        ));
        Publisher::create(array(
        	'name'=>'Μαλλιάρης Παιδεία',
        ));
        Publisher::create(array(
        	'name'=>'Οξύ',
        ));
        Publisher::create(array(
        	'name'=>'Καρακώτσογλου',
        ));
        Publisher::create(array(
        	'name'=>'Εκδοτικός Οίκος Α. Α. Λιβάνη',
        ));

        Publisher::create(array(
            'name'=>'Penguin Books Ltd',
        ));

        
    }
}
