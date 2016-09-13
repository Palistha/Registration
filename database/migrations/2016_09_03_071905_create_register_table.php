<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('register', function (Blueprint $table) {
           $table->increments('id');
            $table->string('name',255);
            $table->string('email',255)->unique();
            $table->string('password', 60);
             $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
           // $table->rememberToken();
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
        Schema::drop('register');
    }
}
