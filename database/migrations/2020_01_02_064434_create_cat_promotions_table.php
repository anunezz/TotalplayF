<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type')->default(1);
            $table->unsignedBigInteger('frontier')->default(0);
            $table->unsignedBigInteger('triple_double')->default(0);
            $table->string('name',100);
            $table->string('color',100);
            $table->longText('description');
            $table->boolean('isActive')->default(0);
            $table->timestamps();

            $table->foreign('type')->references('id')->on('cat_name_paks');
            $table->foreign('frontier')->references('id')->on('cat_pack_frontiers');
            $table->foreign('triple_double')->references('id')->on('cat_triple_dobles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_promotions');
    }
}
