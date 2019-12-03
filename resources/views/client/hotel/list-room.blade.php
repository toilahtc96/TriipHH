@extends('client.layout')
@section('content')
@include('client.hotel.detail-hotel')
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="heading aos-init" data-aos="fade">Khách sạn {{$hotel->hotel_name}}</h2>
                <p data-aos="fade" class="aos-init">Số 16, Phố Dịch Vọng Hậu, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Việt Nam.
                </p>
            </div>
            <div class="col-md-2"></div>
        </div>
        @foreach ($rooms as $key=>$room)
        @if($key%2==0)
        @include('client.hotel.detail-room-left')
        @include('client.hotel.book-room-form')

        @else
        @include('client.hotel.detail-room-right')
        @include('client.hotel.book-room-form')
        @endif
        @endforeach
        <!-- Trigger the modal with a button -->
        {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}

        <!-- Modal -->

</section>
@endsection