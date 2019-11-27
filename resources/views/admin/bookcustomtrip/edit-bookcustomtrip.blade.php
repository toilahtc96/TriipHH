@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Edit bookcustomtrip</h2>

        <div class="panel panel-primary ">

            <div class="panel-heading">Edit bookcustomtrip</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($bookcustomtrip, array('route' => array('bookcustomtrips.update', $bookcustomtrip->id), 'method' => 'PUT','files' => true)) }}

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('fullName', 'Tên khách hàng', ['class' => 'control-label']) !!}
                                {!! Form::text('fullName', $value = $bookcustomtrip->fullName, ['class' =>
                                'form-control','placeholder'=>'Tên khách hàng']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('msisdn', 'Số điện thoại', ['class' => 'control-label']) !!}
                                {!! Form::text('msisdn', $value = $bookcustomtrip->msisdn, ['class' =>
                                'form-control','placeholder'=>'Số điện thoại']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('car_id', 'Xe', ['class' => 'control-label']) !!}
                                {!!Form::select('car_id', $cars, $bookcustomtrip->car_id, ['class'=>
                                'form-control'])!!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('type_service', 'Tư vấn', ['class' => 'control-label']) !!}
                                {!!Form::select('type_service', ['0'=>'Tư vấn qua số điện thoại','1'=>'Tư vấn qua
                                FaceBook'], $bookcustomtrip->type_service, ['class'=>
                                'form-control'])!!}
                            </div>

                        </div>
                        {!! Form::label('fb_link', 'FaceBook', ['class' => 'control-label']) !!}
                        {!! Form::text('fb_link', $value = $bookcustomtrip->fb_link, ['class' =>
                        'form-control','placeholder'=>'FaceBook']) !!}
                        {!! Form::label('combo_type_id', 'Số ngày đi', ['class' => 'control-label']) !!}
                        {!!Form::select('combo_type_id', $combotypes, $value=$bookcustomtrip->combo_type_id,
                        ['class'=>'form-control'])!!}
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('start_date', 'Ngày đi', ['class' => 'control-label']) !!}
                                {!! Form::date('start_date', $value = $bookcustomtrip->start_date, ['class' =>
                                'form-control','placeholder'=>'Ngày đi']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('arrival_time', 'Giờ dự kiến tới', ['class' => 'control-label']) !!}
                                {!! Form::time('arrival_time', $value = $bookcustomtrip->arrival_time, ['class' =>
                                'form-control','placeholder'=>'Giờ dự kiến tới']) !!}
                            </div>
                        </div>
                        {!! Form::label('pickup_place_id', 'Nơi đón', ['class' => 'control-label']) !!}
                        {!!Form::select('pickup_place_id', $locations, $bookcustomtrip->pickup_place_id, ['class'=>
                        'form-control'])!!}

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('checkin_date', 'Ngày checkin', ['class' => 'control-label']) !!}
                                {!! Form::date('checkin_date', $value = $bookcustomtrip->checkin_date, ['class' =>
                                'form-control','placeholder'=>'Ngày checkin']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('checkin_time', 'Giờ checkin', ['class' => 'control-label']) !!}
                                {!! Form::time('checkin_time', $value = $bookcustomtrip->checkin_time, ['class' =>
                                'form-control','placeholder'=>'Giờ checkin']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('checkout_date', 'Ngày checkout', ['class' => 'control-label']) !!}
                                {!! Form::date('checkout_date', $value = $bookcustomtrip->checkout_date, ['class' =>
                                'form-control','placeholder'=>'Ngày checkout']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('checkout_time', 'Giờ checkout', ['class' => 'control-label']) !!}
                                {!! Form::time('checkout_time', $value = $bookcustomtrip->checkout_time, ['class' =>
                                'form-control','placeholder'=>'Giờ checkout']) !!}
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('room_id', 'Hạng phòng', ['class' => 'control-label']) !!}
                                {!!Form::select('room_id', $rooms, $bookcustomtrip->room_id, ['class'=>
                                'form-control'])!!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('room_code', 'Mã phòng', ['class' => 'control-label']) !!}
                                {!! Form::text('room_code', $value = $bookcustomtrip->room_code, ['class' =>
                                'form-control','placeholder'=>'Mã phòng']) !!}
                            </div>
                        </div>
                        
                        @if( $bookcustomtrip->book_status_id == 8 )
                        <div class="row">
                            <div class="col-sm-12">
                                {!! Form::label('reject_note', 'Lý do hủy', ['class' => 'control-label']) !!}
                                {!! Form::textarea('reject_note', $value = $bookcustomtrip->reject_note, ['class' =>
                                'form-control','placeholder'=>'Lý do hủy', 'rows' => 3]) !!}
                            </div>

                        </div>
                        @endif
                        <div class="mt-3 mb-3">
                            {!!Form::submit('Submit', ['class' => 'btn btn-large btn-primary openbutton
                            form-control'])!!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>


            </div>
        </div>


    </div>
</div>


@endsection