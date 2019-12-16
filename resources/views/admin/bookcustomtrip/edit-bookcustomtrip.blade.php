@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Chỉnh sửa đặt Combo Tùy chọn</h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">Chỉnh sửa đặt Combo Tùy chọn</div>
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
                                {!! Form::label('fullname', 'Tên khách hàng', ['class' => 'control-label']) !!}
                                {!! Form::text('fullname', $value = $bookcustomtrip->fullname, ['class' =>
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
                                {!! Form::label('fb_link', 'FaceBook', ['class' => 'control-label']) !!}
                                {!! Form::text('fb_link', $value = $bookcustomtrip->fb_link, ['class' =>
                                'form-control','placeholder'=>'FaceBook']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('type_service', 'Tư vấn', ['class' => 'control-label']) !!}
                                {!!Form::select('type_service', ['0'=>'Tư vấn qua số điện thoại','1'=>'Tư vấn qua
                                FaceBook'], $bookcustomtrip->type_service, ['class'=>
                                'form-control'])!!}
                            </div>

                        </div>

                        {!! Form::label('combo_type_id', 'Số ngày đi', ['class' => 'control-label']) !!}
                        {!!Form::select('combo_type_id', $combotypes, $value=$bookcustomtrip->combo_type_id,
                        ['class'=>'form-control'])!!}
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('start_date', 'Ngày đi', ['class' => 'control-label']) !!}
                                {!! Form::date('start_date', $value = $bookcustomtrip->start_date, ['class' =>
                                'form-control','placeholder'=>'Ngày đi','format'=>'dd/mm/yyyy']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('arrival_time', 'Giờ dự kiến tới', ['class' => 'control-label']) !!}
                                {!! Form::time('arrival_time', $value = $bookcustomtrip->arrival_time, ['class' =>
                                'form-control','placeholder'=>'Giờ dự kiến tới']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('car_old_id', 'Xe Combo', ['class' => 'control-label']) !!}
                                {!!Form::select('car_old_id', $cars, $bookcustomtrip->car_id,
                                ['class'=>'form-control','disabled'=>'true'])!!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('pickup_place_old', 'Điểm đón đã đặt', ['class' => 'control-label']) !!}
                                {!!Form::select('pickup_place_old[]', $locationCarOld, $bookcustomtrip->pickup_place_id,
                                ['class'=>'form-control','disabled'=>'true','multiple'=>true])!!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 ">
                                {!! Form::label('car_id', 'Chọn xe', ['class' => 'control-label'])
                                !!}
                                {!!Form::select('car_id', $cars,0,
                                ['class'=>'form-control','onchange'=>'callLocationAjax(this,event)'])!!}
                            </div>
                            <div class="col-sm-6 ">
                                {!! Form::label('pickup_place_id', 'Điểm đón', ['class' => 'control-label'])
                                !!}
                                {!!Form::select('pickup_place_id[]', [''=>'Chọn xe để xem điểm đón'],0,
                                ['class'=>'form-control','multiple'=>true,'id'=>'pickup_place_id'])!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('checkin_date', 'Ngày checkin', ['class' => 'control-label']) !!}
                                {!! Form::date('checkin_date', $value = $bookcustomtrip->checkin_date, ['class' =>
                                'form-control','placeholder'=>'Ngày checkin','format'=>'dd/mm/yyyy']) !!}
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
                                'form-control','placeholder'=>'Ngày checkout','format'=>'dd/mm/yyyy']) !!}
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
                        <div class="row">

                            <div class="col-sm-6">
                                {!! Form::label('price', 'Tổng tiền ', ['class' => 'control-label']) !!}
                                {!! Form::text('price', $value = $bookcustomtrip->price, ['class' =>
                                'form-control','placeholder'=>'Tổng tiền ']) !!}
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


<script src="{!! asset('client/js/jquery-3.3.1.min.js') !!}"></script>
<script>
    
callLocationAjax = function(car, e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
        $.ajax({

        type: 'POST',

        url: '/getLocationByCarId',

        data: { id: car.value },

        success: function(data) {
            if(data.data){
            var arr =Object.entries(data.data);
            console.log(arr)
            $('#pickup_place_id').empty();
            if (arr.length !== 0) {
                $.each(arr, function(key, value) {
                    // if (key) {
                        $('#pickup_place_id').append('<option value="' + value[0] + '">' + value[1] +'</option>');
                    // }
                });
            }else {
                $('#pickup_place_id').append('<option value="">' + "Không có điểm đón có sẵn" + '</option>');
            } 
        }
        else {
                $('#pickup_place_id').append('<option value="">' + "Không có điểm đón có sẵn" + '</option>');
            }
        }
    });
}
   
</script>
@endsection