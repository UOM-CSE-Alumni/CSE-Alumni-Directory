<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('has_degrees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('degree_id');
            $table->integer('student_id');
            $table->integer('graduated_year');
            $table->timestamps();
        });

//        Schema::table('has_degrees', function($table) {
//            $table->foreign('student_id')->references('id')->on('students');
//            $table->foreign('degree_id')->references('id')->on('degrees');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('has_degrees');
//        Schema::table('has_degrees', function ($table) {
//            $table->dropForeign('has_degrees_ student_id_foreign');
//            $table->dropForeign('has_degrees_ degree_id_foreign');
//        });
    }
}
