<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
//            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact_no');
            $table->enum('contact_no_visibility', ['private', 'public']);
            $table->string('address');
            $table->enum('address_visibility', ['private', 'public']);
            $table->string('country');
            $table->string('city');
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
        Schema::dropIfExists('students');
    }
}
