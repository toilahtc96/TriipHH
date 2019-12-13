<div class="site-block-half d-block d-lg-flex bg-white aos-init" data-aos="fade" >
    <div>
        <div style="float:left;width:50%">
            {{-- <img src="/images/roomhotels/{{$room->main_image}}" class="img-room" /> --}}
           @include('client.hotel.slide-img-detail')
        </div>
        @include('client.hotel.detail-children-info')
    </div>
</div>