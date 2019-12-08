<div class="site-block-half d-block d-lg-flex bg-white aos-init" data-aos="fade" data-aos-delay="200">
    <div style="float:left"><img src="/images/combotrips/{{$combo->main_image}}" class="img-room-right" />
        <div class="text order-1" style="float:right">
            <span class="d-block mb-4"><span class="display-4 text-primary">{{$combo->price}} K</span> <span
                    class="text-uppercase letter-spacing-2">/ 1 đêm 2</span> </span>
            <h2 class="mb-4">Combo {{$combo->combo_trip_name}}</h2>
            <p>
                {!!$combo->service_included!!}
            </p>
            <p>{!!$combo->info!!}</p>
            <p>
                <button type="button" class="btn btn-info btn-lg book-btn" data-toggle="modal"
                    data-target="#myModal{{$combo->id}}">Book Now</button>

            </p>
        </div>
    </div>
</div>