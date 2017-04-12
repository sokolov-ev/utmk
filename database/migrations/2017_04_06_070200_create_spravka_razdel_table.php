<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpravkaRazdelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_section', function (Blueprint $table) {
            $table->increments('id');
            $table->text('slug');
            $table->text('slug_full_path');
            $table->text('title');
            $table->text('body_small');
            $table->text('body');
            $table->integer('parent_exist');
            $table->integer('weight');
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
        Schema::drop('reference_section');
    }
}
