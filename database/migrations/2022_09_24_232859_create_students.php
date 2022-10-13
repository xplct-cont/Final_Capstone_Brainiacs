<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
            $table->string('gender');
            $table->string('age')->nullable();
            $table->string('year_section');
            $table->string('email')->unique();
            $table->string('parent_name');
            $table->string('parent_email')->unique()->nullable();
            $table->string('address');
            $table->string('avatar')->default('image18.png');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
