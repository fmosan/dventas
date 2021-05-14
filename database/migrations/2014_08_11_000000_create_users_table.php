<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('idrol')->unsigned();
            $table->foreign('idrol')->references('id')->on('rols');
            $table->timestamps();
        });
        DB::table('users')->insert(array('id'=>'1','name'=>'Angel', 'email'=>'jesus.marquez@unas.edu.pe', 'password'=>'$2y$10$4jfa1q1kfxVyVb0KZqhRC.4CcS7xssLm0eRHOZ24fJTJJQmPsLZEW','idrol'=>'1'));
        DB::table('users')->insert(array('id'=>'2','name'=>'Jorge', 'email'=>'jorge.huerta@unas.edu.pe', 'password'=>'$2y$10$4jfa1q1kfxVyVb0KZqhRC.4CcS7xssLm0eRHOZ24fJTJJQmPsLZEW','idrol'=>'2'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
