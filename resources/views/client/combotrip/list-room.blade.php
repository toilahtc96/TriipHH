@extends('client.layout')
@section('content')
@include('client.hotel.detail-hotel')
<section class="section bg-blue">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="heading aos-init" data-aos="fade">Hạng phòng Khách sạn {{$hotel->hotel_name}}</h2>
                <p data-aos="fade" class="aos-init">Hạng phòng và dịch vụ khách sạn
                </p>
            </div>
            <div class="col-md-2"></div>
        </div>


        @foreach ($rooms as $key=>$room)

        @if($key%2==0)
        @include('client.hotel.detail-room-left')
        @else
        @include('client.hotel.detail-room-right')
        @endif

        @include('client.hotel.book-room-form')

        @endforeach
        <!-- Trigger the modal with a button -->
        {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}

        <!-- Modal -->

</section>
@endsection