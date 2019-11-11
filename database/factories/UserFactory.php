<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Hotel;
use App\Car;
use App\Location;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});



$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'hotel_name' => $faker->name,
        'service_included' => $faker->text(40) . ';' . $faker->text(40) . ';' . $faker->text(40) . ';' . $faker->text(40) . ';' . $faker->text(40) . ';' . $faker->text(40) . ';' . $faker->text(40),
        'level' => $faker->numberBetween($min = 0, $max = 5),
        'info' => $faker->text(40),
        'main_image' => $faker->imageUrl($width = 640, $height = 480),
        'list_image' => $faker->imageUrl($width = 640, $height = 480),
        'main_info' => 'Tọa lạc trong khu vực đậm chất ' . $faker->name . ' nổi tiếng ' . $faker->name . ', ' . $faker->name . ' Loft nằm trong một tòa nhà được xây dựng từ những năm 1930 và đã được tân trang hoàn toàn.',
        'full_info' => 'Tọa lạc trong khu vực đậm chất ' . $faker->name . ' nổi tiếng ' . $faker->name . ', ' . $faker->name . '
         nằm trong một tòa nhà được xây dựng từ những năm 1930 và đã được tân trang hoàn toàn. 
         Chỗ nghỉ này có hướng nhìn tuyệt vời ra quang cảnh thành phố Rio de ' . $faker->name . ' cùng Wi-Fi miễn phí. 
         Bãi biển ' . $faker->name . ' cách chỗ nghỉ 1,5 km.
         Các căn hộ áp mái tại đây có nội thất và đồ gia dụng hiện đại. Máy điều hòa và TV 
         truyền hình cáp màn hình phẳng được trang bị sẵn tại đây.
         Chỗ nghỉ có khu vực ăn uống cho các bữa ăn nhanh cùng nhà bếp đầy đủ tiện nghi với tủ lạnh, 
         lò nướng và đồ dùng nấu bếp. Phía trước chỗ nghỉ có một siêu thị đầy tiện lợi cho quý khách.
         Sugar Loft cách các bãi biển ' . $faker->name . ' và ' . $faker->name . ' lần lượt 8,3 km và 6,3 km. Sân bay Quốc
         tế ' . $faker->name . ' cách chỗ nghỉ 14 km.
         Các cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,5 cho kỳ nghỉ dành cho 2 người.',
        'place_around' => '' . $faker->name . ';' . $faker->name . ';' . $faker->name . ';' . $faker->name . ';' . $faker->name . ';',
        'general_rule' => Str::random(100),
        'rate' => $faker->numberBetween($min = 0, $max = 5),
        'status' => $faker->numberBetween($min = 0, $max = 5),
        'address_id' => $faker->numberBetween($min = 0, $max = 5),

    ];
});

$factory->define(Car::class, function (Faker $faker) {
    return [
        'own_car' => $faker->name,
        'msisdn' => $faker->phoneNumber ,
        'price' => $faker->randomDigit,
        'time_pickup' => $faker->date('H:i:s', rand(1,54000)),
        'starting_location_id' => $faker->numberBetween($min = 0, $max = 5),
        'destination_id' => $faker->numberBetween($min = 0, $max = 5),
        'status' => $faker->numberBetween($min = 0, $max = 5),
    ];
});


$factory->define(Location::class, function (Faker $faker) {
    return [
        'location_name' => $faker->name,
        'detail' => 'Nằm tại khu' . $faker->name . ' nổi tiếng ' . $faker->name . ', ' . $faker->name . ' Loft nằm trong một Khu vực đẹp.',
        'status' => $faker->numberBetween($min = 0, $max = 5),
    ];
});
