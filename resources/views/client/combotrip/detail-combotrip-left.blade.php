<div class="site-block-half d-block d-lg-flex bg-white aos-init" data-aos="fade" data-aos-delay="100">
    <div style="float:right"><img src="/images/combotrips/{{$combo->main_image}}" class="img-room" />
        <div class="text" style="float:right">

            <h2 class="mb-4">Combo {{$combo->combo_trip_name}}</h2>
            <span class="d-block mb-4"><span class="display-4 text-primary">{{$combo->price}} K</span> <span
            class="text-uppercase letter-spacing-2">/{{$combo->combo_type_name}} </span> </span>
            <p>
                {!!$combo->service_included!!}
            </p>
            <p>{!!$combo->info!!}</p>
            <p>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                    data-target="#myModal{{$combo->id}}">Book Now</button>

            </p>
        </div>
    </div>
</div>