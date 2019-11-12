<?php

use Illuminate\Database\Seeder;
use App\Models\BookCar;
class BookCarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(BookCar::class, 2)->create();
    }
}
