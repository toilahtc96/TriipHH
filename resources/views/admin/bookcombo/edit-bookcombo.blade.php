@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Chính sửa Đặt Combo </h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">Chỉnh sửa đặt combo </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($bookcombo, array('route' => array('bookcombos.update', $bookcombo->id), 'method' => 'PUT','files' => true)) }}

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('fullName', 'Tên khách hàng', ['class' => 'control-label']) !!}
                                {!! Form::text('fullName', $value = $bookcombo->fullname, ['class' =>
                                'form-control','placeholder'=>'Tên khách hàng']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('msisdn', 'Số điện thoại', ['class' => 'control-label']) !!}
                                {!! Form::text('msisdn', $value = $bookcombo->msisdn, ['class' =>
                                'form-control','placeholder'=>'Số điện thoại']) !!}
                            </div>
                        </div>
                        {!! Form::label('fb_link', 'FaceBook', ['class' => 'control-label']) !!}
                        {!! Form::text('fb_link', $value = $bookcombo->fb_link, ['class' =>
                        'form-control','placeholder'=>'FaceBook']) !!}

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('hotel_old_id', 'Khách sạn combo', ['class' => 'control-label']) !!}
                                {!!Form::select('hotel_old_id', $hotels, $combotrip->hotel_id,
                                ['class'=>'form-control','onchange'=>'callRoomAjax(this,event)','disabled'=>'true'])!!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('room_old_id', 'Hạng phòng', ['class' => 'control-label']) !!}
                                {!!Form::select('room_old_id', $rooms, $combotrip->room_id,
                                ['class'=>'form-control','disabled'=>'true'])!!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('hotel_id', 'Khách sạn mới', ['class' => 'control-label']) !!}
                                {!!Form::select('hotel_id', $hotels, $hotel_id_new != null ? $hotel_id_new : 0,
                                ['class'=>'form-control','onchange'=>'callRoomAjax(this,event)'])!!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('room_id', 'Hạng phòng', ['class' => 'control-label']) !!}
                                {!!Form::select('room_id', $rooms_new, $bookcombo->room_id,
                                ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! Form::label('combo_id', 'Combo ', ['class' => 'control-label']) !!}
                                {!!Form::select('combo_id', $combotrips, $bookcombo->combo_id,
                                ['class'=>'form-control','onchange'=>'changeEditCombo(this.value)'])!!}
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ url('/admin/combotrips/' .$bookcombo->combo_id. '/edit') }}"
                                    style="margin-top:40%" target="_blank" class="btn btn-default form-control"
                                    id="comboLink"><i class="far fa-edit"></i></a>
                                {{-- 'testSwitch(this,event) --}}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('combo_type_id', 'Số ngày', ['class' => 'control-label']) !!}
                                {!!Form::select('combo_type_id', $combotypes, $bookcombo->combo_type_id,
                                ['class'=>'form-control'])!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">


                                {!! Form::label('room_code', 'Mã phòng', ['class' => 'control-label']) !!}
                                {!! Form::text('room_code', $value = $bookcombo->room_code, ['class' =>
                                'form-control','placeholder'=>'Mã phòng']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('book_status_id', 'Trạng thái hiện tại', ['class' => 'control-label'])
                                !!}
                                {!!Form::select('book_status_id', $bookstatues, $bookcombo->book_status_id,
                                ['class'=>'form-control','disabled'=>'true'])!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('checkin_date', 'Ngày checkin', ['class' => 'control-label']) !!}
                                {!! Form::date('checkin_date', $value = $bookcombo->checkin_date, ['class' =>
                                'form-control','placeholder'=>'Ngày checkin','format'=>'dd/mm/yyyy']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('checkin_time', 'Giờ checkin', ['class' => 'control-label']) !!}
                                {!! Form::time('checkin_time', $value = $bookcombo->checkin_time, ['class' =>
                                'form-control','placeholder'=>'Giờ checkin']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('checkout_date', 'Ngày checkout', ['class' => 'control-label']) !!}
                                {!! Form::date('checkout_date', $value = $bookcombo->checkout_date, ['class' =>
                                'form-control','placeholder'=>'Ngày checkout','format'=>'dd/mm/yyyy']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('checkout_time', 'Giờ checkout', ['class' => 'control-label']) !!}
                                {!! Form::time('checkout_time', $value = $bookcombo->checkout_time, ['class' =>
                                'form-control','placeholder'=>'Giờ checkout']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('car_old_id', 'Xe Combo', ['class' => 'control-label']) !!}
                                {!!Form::select('car_old_id', $cars, $combotrip->car_id,
                                ['class'=>'form-control','disabled'=>'true'])!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('car_id', 'Xe mới', ['class' => 'control-label']) !!}
                                {!!Form::select('car_id', $cars, $bookcombo->car_id == null? 0:$bookcombo->car_id,
                                ['class'=>'form-control'])!!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('pickup_place_id', 'Nơi đón', ['class' => 'control-label'])
                                !!}
                                {!!Form::select('pickup_place_id', $locations, $bookcombo->pickup_place_id,
                                ['class'=>
                                'form-control'])!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('price_combo', 'Tổng tiền Combo', ['class' => 'control-label']) !!}
                                {!! Form::text('price_combo', $value = $combotrip->price, ['class' =>
                                'form-control','placeholder'=>'Tổng tiền Combo','disabled'=>'true']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('price', 'Tổng tiền Mới', ['class' => 'control-label']) !!}
                                {!! Form::text('price', $value = $bookcombo->price, ['class' =>
                                'form-control','placeholder'=>'Tổng tiền mới']) !!}
                            </div>
                        </div>

                        @if( $bookcombo->book_status_id == 8 )
                        <div class="row">
                            <div class="col-sm-12">
                                {!! Form::label('reject_note', 'Lý do hủy', ['class' => 'control-label']) !!}
                                {!! Form::textarea('reject_note', $value = $bookcombo->reject_note, ['class' =>
                                'form-control','placeholder'=>'Lý do hủy', 'rows' => 3,'disabled'=>'true']) !!}
                            </div>

                        </div>
                        @endif
                        <div class="mt-3 mb-3">
                            {!!Form::submit('Đồng ý', ['class' => 'btn btn-large btn-primary openbutton
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