<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                <h2 class="text-center introduce-hotel">Combo Hot và Mới nhất
                </h2>
                <p>Những Combo Nóng hổi nhất đang cung cấp hiện tại.</p>
            </div>
        </div>
        <div class="row">
            @foreach($combotrips as $key => $data)
            <div class="col-lg-4 col-md-4 col-sm-6">

                <a href="/images/combotrips/{{$data->main_image}}" class="fh5co-card-item image-popup">
                    <figure>
                        <div class="overlay"><i class="ti-plus"></i></div>
                        <img alt="Image" class="img-responsive" src='/images/combotrips/{{$data->main_image}}'
                            height="max-content" />
                    </figure>
                </a>
                <span class="info-hotel">
                    <div class="fh5co-text">
                        <h2 class="title-name">[{{$data->combo_trip_name}}] <br />
                            @isset($data->hotel_name)
                            Khách sạn {{$data->hotel_name}}
                            @endisset
                        </h2>
                        @isset($data->price)
                        <h4 class="title-name">Giá : {{$data->price}}</h4>
                        @else
                        <h4 class="title-name">Chưa cập nhật giá</h4>
                        @endisset
                        <p class="p-main-info">{{$data->main_info}}</p>
                        {{-- <p >{!!$data->service_included!!}</p> --}}
                        <p class="read-more"><a href="{{ url('/combotrip/'.$data->hotel_id.'-'.$data->slugs) }}"><span
                                    class="btn btn-primary">{{__('Xem Thêm')}}</span></a></p>
                    </div>
                </span>
            </div>
            @endforeach
        </div>

        <div class="row" style="float:left; width:100%;text-align:right">
            <a href="/combotrips">Xem Tất cả</a>
        </div>

    </div>
</div>