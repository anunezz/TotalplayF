<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CatAttentionSeeder::class,
            CatProfileSeeder::class,
            CatCodePromotionSeeder::class,
            UsersTableSeeder::class,
            FirstSesionSeeder::class,
            CatStateSeeder::class,
            CatNamePacks::class,
            CatTripleDobleSeeder::class,
            CatPackFrontierSeeder::class,
            CatCitySeeder::class,
            CatWallpaperSedder::class,
            //ImgWallpaperSeeeder::class,
            WallpaperSeeder::class
            //CatPromotionSeeder::class,
        ]);
    }
}
