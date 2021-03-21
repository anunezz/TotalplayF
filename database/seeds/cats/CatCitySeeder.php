<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CatCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cat_cities')->insert([
            ['frontier' => 1, 'state_id'=> 1,  'name' => 'Aguascalientes','isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 2, 'state_id'=> 2,  'name' => 'Ensenada', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 2, 'state_id'=> 2,  'name' => 'Mexicali', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 2, 'state_id'=> 8,  'name' => 'Ciudad Juárez', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 8,  'name' => 'Chihuahua','isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 8,  'name' => 'Delicias', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 9,  'name' => 'Ciudad de México', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 10, 'name' => 'Gómez Palacio', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 10, 'name' => 'Lerdo' , 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 11, 'name' => 'Celaya','isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 11, 'name' => 'Guanajuato', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 11, 'name' => 'León', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 11, 'name' => 'Irapuato', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 12, 'name' => 'Acapulco' ,'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 14, 'name' => 'Guadalajara', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 15, 'name' => 'Estado de México', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 16, 'name' => 'Morelia', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 17, 'name' => 'Cuernavaca', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 19, 'name' => 'Monterrey', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 23, 'name' => 'Cancún', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 25, 'name' => 'Culiacán', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 25, 'name' => 'Los Mochis', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 25, 'name' => 'Mazatlan', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 26, 'name' => 'Hermosillo', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 30, 'name' => 'Córdoba', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 30, 'name' => 'Minatlán', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 30, 'name' => 'Coatzacoalcos', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Mérida', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Queretaro', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Córdoba', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Gómez Palacio', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'León', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Puebla', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Poza Rica', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Pachuca', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Orizaba', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Puerto Vallarta', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'San Juan del Río', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'San Luis Potosí', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'San Miguel de Allende', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Saltillo', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Toluca', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 2, 'state_id'=> 31, 'name' => 'Tijuana', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Texcoco', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Silao', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Torreón', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Tulancingo', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Tuxtla', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Valle del Bravo', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Veracruz', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Villahermosa', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ['frontier' => 1, 'state_id'=> 31, 'name' => 'Xalapa', 'isActive' => 1, 'created_at'=> Carbon::now(),'updated_at' => Carbon::now() ],
            ]);


    }
}
