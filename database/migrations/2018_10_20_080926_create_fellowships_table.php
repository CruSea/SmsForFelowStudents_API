<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFellowshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fellowships', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('fellowship_id');
            $table->string('city');
            $table->string('university_name');
            $table->integer('number_of_members');
            $table->integer('number_of_group');
            $table->string('place');

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fellowships');
    }
}
