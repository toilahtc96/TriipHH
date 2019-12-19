<div class="text order-1" style="float:right; padding-top:5%">
    <h2 class="mb-4">Combo {{$combo->combo_trip_name}}</h2>

    <span class="d-block mb-4"><span class="display-4 text-primary">{{$combo->price}} K</span> <span
            class="text-uppercase letter-spacing-2">/{{$combo->combo_type_name}}</span> </span>
    <p>
        {!!$combo->service_included!!}
    </p>
    <p>{!!$combo->info!!}</p>
    <p>
        <button type="button" class="btn btn-info btn-lg book-btn" data-toggle="modal"
            data-target="#myModal{{$combo->id}}">Book Now</button>

    </p>
</div>