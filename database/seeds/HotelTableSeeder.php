<?php

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::Table('hotels')->insert([
            ['hotel_name' => 'Pao s Sapa Leisure Hotel', 'level' => 5,'main_info'=>'Hotel cung cấp chỗ nghỉ với nhà hàng, chỗ đỗ xe riêng miễn phí, trung tâm thể dục và quán bar. Khách sạn 5 sao này có WiFi miễn phí, CLB trẻ em và sảnh khách chung. Chỗ nghỉ cũng cung cấp dịch vụ lễ tân 24 giờ, dịch vụ phòng và dịch vụ thu đổi ngoại tệ cho khách.',
            'full_info'=>'Nằm ở thị xã Sa Pa, cách Ga cáp treo Fansipan Legend 4 km, Paos Sapa Leisure Hotel cung cấp chỗ nghỉ với nhà hàng, chỗ đỗ xe riêng miễn phí, trung tâm thể dục và quán bar. Khách sạn 5 sao này có WiFi miễn phí, CLB trẻ em và sảnh khách chung. Chỗ nghỉ cũng cung cấp dịch vụ lễ tân 24 giờ, dịch vụ phòng và dịch vụ thu đổi ngoại tệ cho khách.

            Khách sạn phục vụ bữa sáng tự chọn hoặc kiểu lục địa.
            
            Paos Sapa Leisure Hotel cung cấp chỗ nghỉ 5 sao với hồ bơi trong nhà và sân hiên. Du khách có thể chơi bi-a và thuê xe máy cũng như xe hơi tại chỗ nghỉ.
            
            Các điểm tham quan nổi tiếng gần Paos Sapa Leisure Hotel bao gồm trung tâm thương mại Sun Plaza, Quảng trường Trung tâm Sa Pa và Nhà thờ Đá Sa Pa.
            
            Các cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,5 cho kỳ nghỉ dành cho 2 người.
            
            Chúng tôi sử dụng ngôn ngữ của bạn!',
            'info'=> 'Nằm ở thị xã Sa Pa, cách Ga cáp treo Fansipan Legend 4 km'
            ,'status' => 1,'rate'=>4],
            ['hotel_name' => 'Saparis Hotel', 'level' => 5,'main_info'=>'Nằm ở Sa Pa, cách trạm cáp treo Fansipan Legend 2,8 km, Saparis Hotel có chỗ nghỉ với nhà hàng, chỗ đỗ xe riêng miễn phí, quán bar và sảnh khách chung. ',
            'full_info'=>'Nằm ở Sa Pa, cách trạm cáp treo Fansipan Legend 2,8 km, Saparis Hotel có chỗ nghỉ với nhà hàng, chỗ đỗ xe riêng miễn phí, quán bar và sảnh khách chung. Chỗ nghỉ này còn có dịch vụ phòng và sân hiên. Tại đây cũng có lễ tân 24 giờ, bếp chung và dịch vụ thu đổi ngoại tệ cho khách.

            Phòng nghỉ của khách sạn được trang bị máy điều hòa, TV truyền hình vệ tinh màn hình phẳng, tủ lạnh, ấm đun nước, chậu rửa vệ sinh (bidet), máy sấy tóc và bàn làm việc. Các phòng nghỉ có phòng tắm riêng với vòi sen cùng đồ vệ sinh cá nhân miễn phí, WiFi miễn phí và khu vực ghế ngồi.
            
            Chỗ nghỉ phục vụ bữa sáng kiểu lục địa.
            
            Đi xe đạp là hoạt động phổ biến trong khu vực. Du khách có thể thuê xe đạp máy và xe hơi tại Saparis Hotel.
            
            Các điểm tham quan nổi tiếng gần khách sạn bao gồm trung tâm thương mại Sun Plaza, Hồ Sa Pa và Quảng trường trung tâm Sa Pa.','rate'=>4,
            'info'=> '06 Đường Hoàng Diệu, Sa Pa, Việt Nam','status' => 1],
            ['hotel_name' => 'Sapa Relax Hotel & Spa', 'level' => 5,
            'main_info'=>'Tọa lạc ở thị xã Sa Pa, Sapa Relax Hotel & Spa có nhà hàng, quán bar, sảnh khách chung, khu vườn và sân hiên. Khách sạn này cung cấp các phòng gia đình. Chỗ nghỉ cũng cung cấp dịch vụ lễ tân 24 giờ, dịch vụ phòng và dịch vụ thu đổi ngoại tệ cho khách.',
            'full_info'=>'Tọa lạc ở thị xã Sa Pa, Sapa Relax Hotel & Spa có nhà hàng, quán bar, sảnh khách chung, khu vườn và sân hiên. Khách sạn này cung cấp các phòng gia đình. Chỗ nghỉ cũng cung cấp dịch vụ lễ tân 24 giờ, dịch vụ phòng và dịch vụ thu đổi ngoại tệ cho khách.

            Tất cả phòng nghỉ tại khách sạn đều được trang bị máy điều hòa và tủ để quần áo.
            
            Khách nghỉ tại Sapa Relax Hotel & Spa có thể thưởng thức bữa sáng tự chọn.
            
            Các điểm tham quan nổi tiếng gần chỗ nghỉ bao gồm trung tâm thương mại Sun Plaza, Hồ Sa Pa và Quảng trường Trung tâm Sa Pa.','rate'=>4,
            'info'=> '19A Dong Loi, Sapa Town, Lao Cai, Sa Pa, Việt Nam','status' => 1],
            ['hotel_name' => 'Khách sạn Eden Boutique Hotel & Spa', 'level' => 5,
            'main_info'=>'Eden Boutique Hotel & Spa nằm ở thị trấn Sa Pa thuộc tỉnh Lào Cai, cách Ga cáp treo Fansipan Legend 2,2 km và Núi Phan Xi Păng 13 km',
            'full_info'=>'Eden Boutique Hotel & Spa nằm ở thị trấn Sa Pa thuộc tỉnh Lào Cai, cách Ga cáp treo Fansipan Legend 2,2 km và Núi Phan Xi Păng 13 km. Khách sạn này có các tiện nghi như quán bar, Trong số các tiện nghi của nhà nghỉ này còn có nhà hàng, lễ tân 24 giờ, bếp chung và Wi-Fi miễn phí trong toàn bộ khuôn viên. Tại đây cũng có dịch vụ phòng, sảnh khách chung và dịch vụ thu đổi ngoại tệ cho khách.

            Mỗi phòng nghỉ tại đây đều được trang bị máy điều hòa, truyền hình cáp màn hình phẳng, tủ lạnh, ấm đun nước, chậu rửa vệ sinh (bidet), máy sấy tóc và bàn làm việc. Tất cả các phòng có phòng tắm riêng với vòi sen và đồ vệ sinh cá nhân miễn phí.
            
            Khách sạn phục vụ bữa sáng tự chọn và gọi món hàng ngày.
            
            Đi xe đạp là hoạt động phổ biến trong khu vực và quý khách cũng có thể thuê xe máy/xe hơi tại Eden Boutique Hotel & Spa.
            
            Các điểm tham quan nổi tiếng gần chỗ nghỉ bao gồm trung tâm thương mại Sun Plaza, Hồ Sa Pa và Quảng trường Trung tâm Sa Pa.',
            'rate'=>4,'info'=> '3B Thac Bac Street, Sapa, Lao Cai, Sa Pa, Việt Nam','status' => 1],
        ]);
    }
}
