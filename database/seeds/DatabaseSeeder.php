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
        $this->call(BookStatusesTableSeeder::class);
        $this->call(ComboTypesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);


        $this->call(CarsTableSeeder::class);
        $this->call(HotelTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(RoomHotelsTableSeeder::class);
        // // $this->call(ComboTripsTableSeeder::class);
        // $this->call(BookCarsTableSeeder::class);
        // $this->call(BookRoomsTableSeeder::class);
        // $this->call(BookCombosTableSeeder::class);
        // $this->call(BookCustomTripsTableSeeder::class);

    }
}
