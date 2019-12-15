@extends('client.layout')
@section('content')
<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading" style="padding-bottom:0;margin-bottom:0">
                <h2 class="text-center introduce-hotel">Đăng kí chuyến đi
                </h2>
                <p>Điền thông tin của bạn và chuyến đi bạn muốn tư vấn.</p>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            {!! Form::open(['method' => 'POST', 'action' => 'BookCustomClientController@index',
            'class' => 'form-horizontal', 'id'=>"bookcustom"]) !!}
            <div class="row form-group">
                <div class="col-md-6">
                    {!! Form::label('fullname', 'Tên của bạn', ['class' => 'control-label']) !!}
                    {!! Form::text('fullname', null, ['class' => 'form-control','placeholder'
                    =>'Nhập tên bạn','id'=>'fullname'])
                    !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('msisdn', 'Số điện thoại', ['class' => 'control-label']) !!}
                    {!! Form::text('msisdn', null, ['class' => 'form-control','placeholder'
                    =>'Số điện thoại','id'=>'msisdn']) !!}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    {!! Form::label('fb-link', 'Facebook', ['class' => 'control-label']) !!}
                    {!! Form::text('fb-link', null, ['class' => 'form-control','placeholder'
                    =>'Facebook']) !!}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    {!! Form::label('start_date', 'Ngày đi', ['class' => 'control-label']) !!}
                    {!! Form::date('start_date', null, ['class' =>
                    'form-control','placeholder'=>'Ngày đi','format'=>'dd/mm/yyyy','id'=>'start_date']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('combo_type_id', 'Số ngày đi', ['class' => 'control-label']) !!}
                    {!!Form::select('combo_type_id', $combotypes, null,
                    ['class'=>'form-control','id'=>'combo_type_id'])!!}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    {!! Form::label('hotel_id', 'Khách sạn', ['class' => 'control-label']) !!}
                    {!!Form::select('hotel_id', $hotels, null,
                    ['class'=>'form-control','onchange'=>'callRoomAjax(this,event)','id'=>'hotel_id'])!!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('room_id', 'Hạng phòng', ['class' => 'control-label']) !!}
                    {!!Form::select('room_id', $rooms, null, ['class'=>'form-control','id'=>'room_id'])!!}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-6 ">
                    {!! Form::label('car_id', 'Chọn xe', ['class' => 'control-label'])
                    !!}
                    {!!Form::select('car_id', $cars,0,
                    ['class'=>'form-control','onchange'=>'callLocationAjax(this,event)','id'=>'car_id'])!!}
                </div>
                <div class="col-sm-6 ">
                    {!! Form::label('pickup_place_id', 'Điểm đón', ['class' => 'control-label'])
                    !!}
                    {!!Form::select('pickup_place_id', [''=>'Chọn xe để xem điểm đón'],0,
                    ['class'=>'form-control','id'=>'pickup_place_id'])!!}
                </div>
            </div>


            <div class="row form-group">
                <div class="col-md-6">
                    {!! Form::label('number_room_book', 'Số phòng', ['class' => 'control-label']) !!}
                    {!!Form::selectRange('number_room_book', 1, 10,1, ['class' =>
                    'form-control','id'=>'number_room_book'])!!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('adults', 'Người lớn', ['class' => 'control-label']) !!}
                    {!!Form::selectRange('adults', 1, 10,1, ['class' => 'form-control'])!!}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    {!! Form::label('childrens', 'Trẻ em dưới 6 tuổi', ['class' => 'control-label']) !!}
                    {!! Form::selectRange('childrens', 0, 10 ,0,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('minors', 'Trẻ em từ 6 đến 10 tuổi', ['class' => 'control-label'])
                    !!}
                    {!! Form::selectRange('minors', 0, 10 ,0,['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    {!! Form::label('type_service', 'Bạn muốn nhận tư vấn tại đâu?', ['class' =>
                    'control-label']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::radio('type_service','0',['checked'=>'true']) !!}
                            {!! Form::label('type_service', 'Điện thoại')!!}

                        </div>
                        <div class="col-md-4">
                            {!! Form::radio('type_service','1') !!}
                            {!! Form::label('type_service', 'Facebook')!!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::radio('type_service','2') !!}
                            {!! Form::label('type_service', 'Zalo')!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 mb-3">
                {!!Form::button('Đồng ý', ['class' => 'btn btn-primary
                btn-block','onClick'=>'submitBookCustom(event)'])!!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<script>
    submitBookCustom = function(e){
        $form = $('#bookcustom');
        if(validateFormBookCustom($form)){
            createBookCustom(e,$form);
        }
}
createBookCustom = function(e,form){
    e.preventDefault();
    $.ajaxSetup({
headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

    $fullname = form.find('#fullname').val().trim();
    $fbLink = form.find('#fb-link').val().trim();
    $msisdn = form.find('#msisdn').val().trim();
    $startDate = form.find('#start_date').val().trim();
    $adults = form.find('#adults').val().trim();
    $minors = form.find('#minors').val().trim();
    $childrens = form.find('#childrens').val().trim();
    $combo_type_id = form.find('#combo_type_id').val().trim();
    $childrens = form.find('#childrens').val().trim();
    $hotel_id = form.find('#hotel_id').val().trim();
    $room_id = form.find('#room_id').val().trim();
    $pickup_place_id = form.find('#pickup_place_id').val().trim();
    $car_id = form.find('#car_id').val().trim();
    $typeService = form.find('input[name="type_service"]:checked').val();

    $.ajax({

        type: 'POST',

        url: '/bookCustom/store',

        data: { 
            fullname:$fullname,
            fbLink:$fbLink,
            msisdn:$msisdn,
            startDate:$startDate,
            adults:$adults,
            minors:$minors,
            childrens:$childrens,
            typeService:$typeService,
            combo_type_id:$combo_type_id,
            pickup_place_id:$pickup_place_id,
            room_id:$room_id,
            hotel_id:$hotel_id,
            car_id:$car_id 
        },

        success: function(data) {

            alert(data.result);
            event.preventDefault();
            resetForm(form);
        },
        error: function(data) {
            var errors = data.responseJSON;
            alert("có lỗi khi lưu thông tin. Vui lòng liên hệ đội kĩ thuật!")
            console.log(errors);
        }

    });
}


resetForm=function(form){
    form.find('#fullname').val("");
    form.find('#start_date').val("");
    form.find('#end_date').val("");
    form.find('#fb-link').val("");
    form.find('#msisdn').val("");
    form.find('#combo_type_id').val("0");
    form.find('#adults').val("1");
    form.find('#minors').val("0");
    form.find('#childrens').val("0");
    form.find('#hotel_id').val("0");
    form.find('#room_id').val("0");
}
validateFormBookCustom =function(form){
    $fullname = form.find('#fullname').val().trim();
    $startDate = form.find('#start_date').val().trim();
    $fbLink = form.find('#fb-link').val().trim();
    $msisdn = form.find('#msisdn').val().trim();
    $combo_type_id = form.find('#combo_type_id').val();
    $typeService = form.find('input[name="type_service"]:checked').val();
    if($fullname ==""){
        alert("Vui lòng nhập tên bạn");
        form.find('#fullname').focus();
        return false;
    }
    if($typeService ==0 ||$typeService ==2){
        if($msisdn ==""){
        alert("Bạn cần điền số điện thoại để nhận tư vấn");
        form.find('#msisdn').focus();
        return false;
    }
    }
    if($typeService ==1){
        if($fbLink ==""){
        alert("Bạn cần điền Facebook để nhận tư vấn");
        form.find('#fb-link').focus();
        return false;
    }
    }
    if($startDate ==""){
        alert("Bạn cần điền ngày đi");
        form.find('#start_date').focus();
        return false;
    }
    if($combo_type_id ==null || $combo_type_id == "0"){
        alert("Bạn cần chọn số ngày đi");
        form.find('#combo_type_id').focus();
        return false;
    }
    

   
    
    return true;
}
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
            var arr = [];
            arr.push(data.data);
            $('#pickup_place_id').empty();
            if (data.data.length !== 0) {
                $.each(data.data, function(key, value) {
                    // if (key) {
                        $('#pickup_place_id').append('<option value="' + key + '">' + value +'</option>');
                    // }
                });
            } else {
                $('#pickup_place_id').append('<option value="">' + "Không có điểm đón có sẵn" + '</option>');
            }
        }

    });
}
   
</script>
@endsection