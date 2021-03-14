<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id');
            $table->string('name',100);
            $table->unsignedBigInteger('frontier');
            $table->boolean('isActive')->default(0);
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('cat_states')->onDelete('cascade');
            $table->foreign('frontier')->references('id')->on('cat_pack_frontiers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_cities');
    }
}
