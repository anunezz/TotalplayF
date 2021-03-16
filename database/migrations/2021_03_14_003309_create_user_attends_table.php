<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAttendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_attends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_attention_id')->default(1);
            $table->unsignedBigInteger('user_attention_id')->nullable();
            $table->longText('observations');
            $table->timestamps();

            $table->foreign('status_attention_id')->references('id')->on('cat_attentions');
            $table->foreign('user_attention_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_attends');
    }
}
