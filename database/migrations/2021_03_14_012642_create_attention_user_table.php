<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttentionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attention_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attention_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('attention_id')->references('id')->on('levels_of_attentions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attention_user');
    }
}
