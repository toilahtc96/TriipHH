<div class="site-block-half d-block d-lg-flex bg-white aos-init" data-aos="fade" data-aos-delay="200">
        <div style="float:left"><img src="/images/roomhotels/{{$room->main_image}}" class="img-room-right" />
            <div class="text order-1" style="float:right">
                <span class="d-block mb-4"><span class="display-4 text-primary">{{$room->price}} K</span> <span
                        class="text-uppercase letter-spacing-2">/ 1 đêm</span> </span>
                <h2 class="mb-4">Phòng hạng {{$room->level}}</h2>
                <p>
                    {{$room->service_included}}
                </p>
                <p>{{$room->info}}</p>
                <p>
                    <button type="button" class="btn btn-info btn-lg book-btn" data-toggle="modal"
                        data-target="#myModal{{$room->id}}">Book Now</button>

                </p>
            </div>
        </div>
    </div>