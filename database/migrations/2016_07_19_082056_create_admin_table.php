<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->smallInteger('region')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->integer('activity')->nullable();
            $table->smallInteger('status');
            $table->string('password');
            $table->rememberToken();
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admis');
    }
}
