<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cits-students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('firstName');
            $table->string('otherName')->nullable();
            $table->string('phoneNo');
            $table->string('email');
            $table->string('matricNo');
            $table->string('dept');
            $table->string('faculty');
            $table->string('level');
            $table->string('courses');
            $table->string('password');
            $table->rememberToken();
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
        //
    }
}
