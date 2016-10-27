<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurboSmsSendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turbo_sms_send', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('date_sent');
            $table->text('text');
            $table->string('phone');
            $table->string('message');
            $table->integer('status');
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
        Schema::drop('turbo_sms_send');
    }
}
