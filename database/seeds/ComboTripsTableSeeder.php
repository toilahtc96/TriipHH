<?php

use Illuminate\Database\Seeder;
use App\Models\ComboTrip;
class ComboTripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(ComboTrip::class, 2)->create();
    }
}
