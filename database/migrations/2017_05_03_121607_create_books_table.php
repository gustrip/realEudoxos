<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('yearOfRelease');
            $table->bigInteger('isbn')->unique();
            $table->integer('publisher_id');
            $table->integer('category_id');
            $table->decimal('price',10,2);
            $table->integer('stock');
            $table->text('description')->nullable();
            $table->string('imageURL')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::dropIfExists('books');
    }
}
