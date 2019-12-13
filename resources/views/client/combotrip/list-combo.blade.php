@extends('client.layout')
@section('content')
@include('client.hotel.detail-hotel')
<section class="section bg-blue">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="heading aos-init" data-aos="fade">Combo hiện có của khách sạn {{$hotel->hotel_name}}</h2>
                <p data-aos="fade" class="aos-init">Combo Hot giúp bạn trải nghiệm mà không lo về chi phí
                </p>
            </div>
            <div class="col-md-2"></div>
        </div>


        @foreach ($combotrips as $key=>$combo)

        @if($key%2==0)
        @include('client.combotrip.detail-combotrip-left')
        @else
        @include('client.combotrip.detail-combotrip-right')
        @endif

        @include('client.combotrip.book-combotrip-form')

        @endforeach
        <!-- Trigger the modal with a button -->
        {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}

        <!-- Modal -->

</section>

@endsection