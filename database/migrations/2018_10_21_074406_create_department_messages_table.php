<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->integer('department_id')-> unsigned();
            $table->foreign('department_id')->references('id')->on('member_departments')->onDelete('cascade');
            $table->string('sent_by');
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
        Schema::dropIfExists('department_messages');
    }
}
