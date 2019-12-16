@extends('client.layout')
@section('content')
<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading" style="padding-bottom:0;margin-bottom:0">
                <h2 class="text-center introduce-hotel">Đặt xe
                </h2>
                <p>Nhập thông tin để đặt xe.</p>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            {!! Form::open(['method' => 'POST', 'action' => 'BookCarClientController@index',
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
                <div class="col-md-6">
                    {!! Form::label('start_date', 'Ngày đi', ['class' => 'control-label']) !!}
                    {!! Form::date('start_date', null, ['class' =>
                    'form-control','placeholder'=>'Ngày đi','format'=>'dd/mm/yyyy','id'=>'start_date']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('start_time', 'Giờ dự kiến đi', ['class' => 'control-label'])
                    !!}
                    {!! Form::time('start_time', '', ['class' =>
                    'form-control','placeholder'=>'Giờ dự kiến','id'=>'start_time']) !!}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-6 ">
                    {!! Form::label('direction', 'Chuyến', ['class' => 'control-label'])
                    !!}
                    {!!Form::select('direction', ['0'=>'Hà nội -> Sapa','1'=>'Sapa -> Hà Nội'],0,
                    ['class'=>'form-control','onchange'=>'callDirection(this,event)','id'=>'direction'])!!}
                </div>
                <div class="col-sm-6 ">
                    {!! Form::label('car_id', 'Chọn xe', ['class' => 'control-label'])
                    !!}
                    {!!Form::select('car_id', $cars,0,
                    ['class'=>'form-control','onchange'=>'callLocationAjax(this,event)','id'=>'car_id'])!!}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-6 ">
                    {!! Form::label('pickup_place_id', 'Điểm đón (Có thể chọn nhiều)', ['class' => 'control-label'])
                    !!}
                    {!!Form::select('pickup_place_id[]', ['Chọn xe để có thể thấy điểm đón'],null,
                    ['class'=>'form-control','id'=>'pickup_place_id','multiple'=>true])!!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('number_ticket', 'Số vé', ['class' => 'control-label']) !!}
                    {!!Form::selectRange('number_ticket', 1, 10,1, ['class' =>
                    'form-control','id'=>'number_ticket'])!!}
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
    $msisdn = form.find('#msisdn').val().trim();
    $startTime = form.find('#start_time').val().trim();
    $startDate = form.find('#start_date').val().trim();
    $pickup_place_id = form.find('#pickup_place_id').val();
    $car_id = form.find('#car_id').val().trim();
    $number_ticket = form.find('#number_ticket').val();
    $typeService = form.find('input[name="type_service"]:checked').val();

    $.ajax({

        type: 'POST',

        url: '/bookCar/store',

        data: { 
            fullname:$fullname,
            msisdn:$msisdn,
            startDate:$startDate,
            typeService:$typeService,
            startTime:$startTime,
            car_id:$car_id,
            number_ticket:$number_ticket,
            pickup_place_id:$pickup_place_id
        },

        success: function(data) {

            console.log(data.data);
            alert(data.result);
            event.preventDefault();
            resetForm(form,e);
        },
        error: function(data) {
            var errors = data.responseJSON;
            alert("có lỗi khi lưu thông tin. Vui lòng liên hệ đội kĩ thuật!")
            console.log(errors);
        }

    });
}


resetForm=function(form,e){
    form.find('#fullname').val("");
    form.find('#start_time').val("");
    form.find('#start_date').val("");
    form.find('#end_date').val("");
    form.find('#msisdn').val("");

    // form.find('#pickup_place_id').val(['Chọn xe để có thể thấy điểm đón']);
    callLocationAjax(0,e)
    form.find('#number_ticket').val(1);
    form.find('#car_id').val("0");
}
validateFormBookCustom =function(form){
    $fullname = form.find('#fullname').val().trim();
    $startDate = form.find('#start_date').val().trim();
    $startTime = form.find('#start_time').val().trim();
    $msisdn = form.find('#msisdn').val().trim();
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
    if($startDate ==""){
        alert("Bạn cần điền ngày đi");
        form.find('#start_date').focus();
        return false;
    }
    if($startTime ==""){
        alert("Bạn cần điền giờ đi");
        form.find('#start_time').focus();
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

        data: { id: car.value,'book_car':true },

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

callDirection = function(direction,e)
{
    e.preventDefault();
    $.ajaxSetup({
        headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $.ajax({

type: 'POST',

url: '/getCarByDirection',

data: { direction: direction.value},

success: function(data) {
    var arr = [];
    arr.push(data.data);
    $('#car_id').empty();
    if (data.data.length !== 0) {
        $.each(data.data, function(key, value) {
            // if (key) {
                $('#car_id').append('<option value="' + key + '">' + value +'</option>');
            // }
        });
    } else {
        $('#car_id').append('<option value="">' + "Không có xe phù hợp" + '</option>');
    }
}

});
}   
</script>
@endsection