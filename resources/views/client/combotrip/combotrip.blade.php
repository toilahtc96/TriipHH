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
            {{-- <div class="container"> --}}
                @foreach($combotrips as $key => $combo)

                @if($key%2==0)
                @include('client.combotrip.detail-combotrip-left')
                @else
                @include('client.combotrip.detail-combotrip-right')
                @endif

                @include('client.combotrip.book-combotrip-form')

                @endforeach
                <div style="width:100%;text-align:right;float:left"> {!!
                    $combotrips->appends(\Request::except('page'))->render() !!}</div>
            {{-- </div> --}}
        </div>
    </div>
</div>



@endsection