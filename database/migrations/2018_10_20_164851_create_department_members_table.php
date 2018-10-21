<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments_member', function (Blueprint $table) {
            $table->increments('id');
            $table-> integer('member_id')->unsigned();
            $table-> integer('department_id')->unsigned(); 
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['member_id','department_id']);
           
        });
    }       

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_departments');
    }
}
