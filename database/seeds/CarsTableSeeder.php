<?php

use Illuminate\Database\Seeder;
use App\Car;
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
        factory(Car::class, 2)->create();
    }
}
