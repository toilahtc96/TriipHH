<?php

use Illuminate\Database\Seeder;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::Table('cars')->insert([
            [
                'own_car' => 'Hà Sơn Hải Vân', 'msisdn' => '02143662299',
                'price' => '100', 'status' => 1,
                'count_seat' => '30', 'car_type' => 'giường nằm',
                'direction' => 1
            ],
            [
                'own_car' => 'Sao việt', 'msisdn' => '02439922555',
                'price' => ' 300', 'status' => 1,
                'count_seat' => '40', 'car_type' => 'Giường Cabin VIP',
                'direction' => 1
            ],
            [
                'own_car' => 'Hà Sơn Hải Vân', 'msisdn' => '0886385577',
                'price' => '200', 'status' => 1,
                'count_seat' => '36', 'car_type' => 'Giường đôi 2 tầng',
                'direction' => 1
            ]


        ]);
    }
}
