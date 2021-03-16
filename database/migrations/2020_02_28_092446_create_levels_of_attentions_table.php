<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsOfAttentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels_of_attentions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_attention_id')->default(1);
            $table->string('no_account',100)->nullable();
            $table->boolean('isActive')->default(1);
            $table->timestamps();

            $table->foreign('status_attention_id')->references('id')->on('cat_attentions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels_of_attentions');
    }
}
