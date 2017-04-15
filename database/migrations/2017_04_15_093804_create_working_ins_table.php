<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_ins', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('company_id');
            $table->date('from');
            $table->date('to');
            $table->string('profession');
            $table->timestamps();
        });
//
//        Schema::table('working_ins', function($table) {
//            $table->foreign('student_id')->references('id')->on('students');
//            $table->foreign('company_id')->references('id')->on('companies');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_ins');
//        Schema::table('working_ins', function ($table) {
//            $table->dropForeign('working_ins_ student_id_foreign');
//            $table->dropForeign('working_ins_ company_id_foreign');
//        });
    }
}
