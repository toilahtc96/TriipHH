<!-- #region Jssor Slider Begin -->
<!-- Generator: Jssor Slider Composer -->
<!-- Source: https://www.jssor.com/demos/image-gallery-with-vertical-thumbnail.slider/=edit -->
<div class="row">
    <div class="gallery" style="background-color: #ffffff">
        <div class="row justify-content-center text-center mb-5" style="color:black">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="heading aos-init" data-aos="fade" style="color:black; padding:20px">Khách sạn
                    {{$hotel->hotel_name}}</h2>
                <p data-aos="fade" class="aos-init">Số 16, Phố Dịch Vọng Hậu, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Việt Nam.
                </p>
            </div>
            <div class="col-md-2"></div>
        </div>

        @include('client.hotel.slidetest')
        <div class="container">
            {{-- @include('.client.hotel.gallery') --}}
        </div>
    </div>
    {{-- @include('.client.hotel.service') --}}
</div>