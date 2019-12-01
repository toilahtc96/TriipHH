@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Edit bookroom</h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">Edit bookroom</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($bookroom, array('route' => array('bookrooms.update', $bookroom->id), 'method' => 'PUT','files' => true)) }}

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('fullname', 'Tên khách hàng', ['class' => 'control-label']) !!}
                                {!! Form::text('fullname', $value = $bookroom->fullname, ['class' =>
                                'form-control','placeholder'=>'Tên khách hàng']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('msisdn', 'Số điện thoại', ['class' => 'control-label']) !!}
                                {!! Form::text('msisdn', $value = $bookroom->msisdn, ['class' =>
                                'form-control','placeholder'=>'Số điện thoại']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('fb_link', 'FaceBook', ['class' => 'control-label']) !!}
                                {!! Form::text('fb_link', $value = $bookroom->fb_link, ['class' =>
                                'form-control','placeholder'=>'FaceBook']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('type_service', 'Tư vấn', ['class' => 'control-label']) !!}
                                {!!Form::select('type_service', ['0'=>'Tư vấn qua số điện thoại','1'=>'Tư vấn qua
                                FaceBook'], $bookroom->type_service, ['class'=>
                                'form-control'])!!}
                            </div>

                        </div>

                        {!! Form::label('combo_type_id', 'Số ngày đi', ['class' => 'control-label']) !!}
                        {!!Form::select('combo_type_id', $combotypes, $value=$bookroom->combo_type_id,
                        ['class'=>'form-control'])!!}



                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('checkin_date', 'Ngày checkin', ['class' => 'control-label']) !!}
                                {!! Form::date('checkin_date', $value = $bookroom->checkin_date, ['class' =>
                                'form-control','placeholder'=>'Ngày checkin']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('checkin_time', 'Giờ checkin', ['class' => 'control-label']) !!}
                                {!! Form::time('checkin_time', $value = $bookroom->checkin_time, ['class' =>
                                'form-control','placeholder'=>'Giờ checkin']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('checkout_date', 'Ngày checkout', ['class' => 'control-label']) !!}
                                {!! Form::date('checkout_date', $value = $bookroom->checkout_date, ['class' =>
                                'form-control','placeholder'=>'Ngày checkout']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('checkout_time', 'Giờ checkout', ['class' => 'control-label']) !!}
                                {!! Form::time('checkout_time', $value = $bookroom->checkout_time, ['class' =>
                                'form-control','placeholder'=>'Giờ checkout']) !!}
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-4">
                                    {!! Form::label(null, 'Khách sạn', ['class' => 'control-label']) !!}
                                    {!!Form::select(null, $hotels, $hotel_id,
                                    ['class'=>'form-control','onchange'=>'callRoomAjax(this,event)'])!!}
                            </div>
                            <div class="col-sm-4">
                                {!! Form::label('room_id', 'Hạng phòng', ['class' => 'control-label']) !!}
                                {!!Form::select('room_id', $rooms, $bookroom->room_id, ['class'=>
                                'form-control'])!!}
                            </div>
                            <div class="col-sm-4">
                                {!! Form::label('room_code', 'Mã phòng', ['class' => 'control-label']) !!}
                                {!! Form::text('room_code', $value = $bookroom->room_code, ['class' =>
                                'form-control','placeholder'=>'Mã phòng']) !!}
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                {!! Form::label('price', 'Tổng tiền ', ['class' => 'control-label']) !!}
                                {!! Form::text('price', $value = $bookroom->price, ['class' =>
                                'form-control','placeholder'=>'Tổng tiền ']) !!}
                            </div>
                        </div>

                        @if( $bookroom->book_status_id == 8 )
                        <div class="row">
                            <div class="col-sm-12">
                                {!! Form::label('reject_note', 'Lý do hủy', ['class' => 'control-label']) !!}
                                {!! Form::textarea('reject_note', $value = $bookroom->reject_note, ['class' =>
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