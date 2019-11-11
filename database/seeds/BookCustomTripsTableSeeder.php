<?php

use Illuminate\Database\Seeder;
use App\BookCustomTrip;

class BookCustomTripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(BookCustomTrip::class, 2)->create();
    }
}
