<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->timestamps();
            $table->string('student_fname',50);
            $table->string('student_mname',50);
            $table->string('student_lname',50);
            $table->string('student_gender',50);
            $table->string('student_address',50);
            $table->string('student_course',50);
            $table->string('student_school',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_students');
    }
}
