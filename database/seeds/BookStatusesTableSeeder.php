<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('book_statuses')->insert([
            ['status' => 'Chờ tư vấn', 'position' => 1],
            ['status' => 'Chờ đặt cọc', 'position' => 2],
            ['status' => 'Chờ mã phòng', 'position' => 3],
            ['status' => 'Chờ thanh toán cuối', 'position' => 4],
            ['status' => 'Gửi mail xác nhận', 'position' => 5],
            ['status' => 'Hoàn tất', 'position' => 6],
            ['status' => 'Hết phòng', 'position' => 7],
            ['status' => 'Đã hủy', 'position' => 8],
            ['status' => 'Chờ tư vấn xe', 'position' => 9],
        ]);
    }
}
