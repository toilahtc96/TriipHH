@extends('client.layout')
@section('content')

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
            @foreach($hotels as $key => $data)
            <div class="col-lg-4 col-md-4 col-sm-6">

                <a href="/images/combotrips/{{$data->main_image}}" class="fh5co-card-item image-popup">
                    <figure>
                        <div class="overlay"><i class="ti-plus"></i></div>
                        <img alt="Image" class="img-responsive" src='/images/combotrips/{{$data->main_image}}' height="max-content"/>
                    </figure>
                </a>
                <span class="info-hotel">
                    <div class="fh5co-text">
                        <h2 class="title-name">[{{$data->combo_trip_name}}]  <br/>Khách sạn {{$data->hotel_name}}</h2>
                        <p class="title-name">Giá chỉ từ: {{$data->min_price}}</p>
                        <p class="p-main-info">{{$data->main_info}}</p>
                        <p class="read-more"><a href="{{ url('/combotrip/'.$data->hotel_id.'-'.$data->slugs) }}"><span
                                    class="btn btn-primary">{{__('Xem Thêm')}}</span></a></p>
                    </div>
                </span>
            </div>
            @endforeach
            <div style="width:100%;text-align:right;float:left"> {!!
                $hotels->appends(\Request::except('page'))->render() !!}</div>
        </div>
    </div>
</div>



@endsection