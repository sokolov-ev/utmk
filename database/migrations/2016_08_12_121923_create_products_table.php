<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id');
            $table->integer('office_id');
            $table->string('slug');
            $table->string('slug_menu', 512);
            $table->text('title');
            $table->text('description');
            $table->integer('rating');
            $table->smallInteger('show_my');
            $table->integer('creator_id');
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
        Schema::drop('products');
    }
}
