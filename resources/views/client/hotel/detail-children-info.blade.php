<div class="text order-1" style="float:left;width:50%; padding-top:0">
    <span class="d-block mb-4"><span class="display-4 text-primary">{{$room->price}} K</span> <span
            class="text-uppercase letter-spacing-2">/ 1 đêm</span> </span>
    <h2 class="mb-4">Phòng  {{$room->room_name}}</h2>
    <p>
        {!!$room->service_included!!}
    </p>
    <p>{!!$room->info!!}</p>
    <p>
        <button type="button" class="btn btn-info btn-lg book-btn" data-toggle="modal"
            data-target="#myModal{{$room->id}}">Book Now</button>

    </p>
</div>