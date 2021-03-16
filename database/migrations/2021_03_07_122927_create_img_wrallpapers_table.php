<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgWrallpapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_wrallpapers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_wrallpaper_id')->default(0);
            $table->text('fileName')->nullable();
            $table->text('fileNameHash')->nullable();
            $table->text('url')->nullable();
            $table->boolean('isUrl')->default(0);
            $table->boolean('isActive')->default(1);
            $table->timestamps();

            $table->foreign('cat_wrallpaper_id')
                ->references('id')
                ->on('cat_wallpapers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('img_wrallpapers');
    }
}
