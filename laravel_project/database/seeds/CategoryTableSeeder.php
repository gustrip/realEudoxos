<?php

use Illuminate\Database\Seeder;
use realEudoxos\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 

        Category::create(array(
            'type'=>'Ελληνική Λογοτεχνία',
        ));

        Category::create(array(
            'type'=>'Ποίηση',
            'parent_id'=>'1',
        ));

        Category::create(array(
            'type'=>'Δοκίμια',
            'parent_id'=>'1',
        ));


        Category::create(array(
            'type'=>'Ξενόγλωσση Λογοτεχνία',
        ));

         Category::create(array(
            'type'=>'Ποίηση',
            'parent_id'=>'4',
        ));

        Category::create(array(
            'type'=>'Δοκίμια',
            'parent_id'=>'4',
        ));



        Category::create(array(
            'type'=>'Μεταφρασμένη Λογοτεχνία',
        ));

         Category::create(array(
            'type'=>'Ποίηση',
            'parent_id'=>'7',
        ));

        Category::create(array(
            'type'=>'Δοκίμια',
            'parent_id'=>'7',
        ));


        Category::create(array(
            'type'=>'Μαγειρική',
        ));

        Category::create(array(
            'type'=>'Κόμιξ',
        ));

        Category::create(array(
            'type'=>'Ελληνικά',
            'parent_id'=>'11',
        ));

        Category::create(array(
            'type'=>'Ξενόγλωσσα',
            'parent_id'=>'11',
        ));

        Category::create(array(
            'type'=>'Βιογραφίες',
        ));

        Category::create(array(
            'type'=>'Ταξίδια',
        ));

        Category::create(array(
            'type'=>'Ταξιδιωτικοί Οδηγοί',
            'parent_id'=>'15',
        ));

        Category::create(array(
            'type'=>'Χάρτες',
            'parent_id'=>'15',
        ));

        Category::create(array(
            'type'=>'Τέχνες',
        ));

        Category::create(array(
            'type'=>'Μουσική',
            'parent_id'=>'18',
        ));

        Category::create(array(
            'type'=>'Θέατρο',
            'parent_id'=>'18',
        ));

        Category::create(array(
            'type'=>'Κινηματογράφος',
            'parent_id'=>'18',
        ));

        Category::create(array(
            'type'=>'Ιστορία Τέχνης',
            'parent_id'=>'18',
        ));


        Category::create(array(
            'type'=>'Φιλοσοφία/Μελέτες',
            'parent_id'=>'7',
        ));
    }
}
