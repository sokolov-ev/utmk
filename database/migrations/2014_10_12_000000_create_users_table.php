<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username');
            $table->string('company');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->text('note_user');
            $table->integer('activity')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('created_at');
            $table->integer('updated_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
