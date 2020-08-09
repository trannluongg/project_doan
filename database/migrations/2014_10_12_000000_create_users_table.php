<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidbigIncrements
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 191)->unique();
            $table->string('name', 191);
            $table->string('password')->unique();
            $table->string('address');
            $table->string('phone');
            $table->string('avatar')->nullable();
            $table->tinyInteger('gender')->default(1);
            $table->string('date_of_birth');
            $table->integer('status')->default(0); //0 //1 //2
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
        Schema::dropIfExists('users');
    }
}
