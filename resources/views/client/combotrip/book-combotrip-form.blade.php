<div id="myModal{{$combo->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="min-width:540px;">
            <div class="modal-header">
                <h4 class="modal-title">Đặt Combo <span id="level">{{$combo->combo_trip_name}} </span>
                    @isset($hotel)
                    của khách sạn
                    {{$hotel->hotel_name}}
                    @endisset
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">

                <div class="tab-content">

                    <div class="tab-content-inner active" data-content="bookcombo" style="padding:0 10% 0 10%"
                        id="bookdiv-{{$combo->id}}">
                        {!! Form::open(['method' => 'POST', 'action' => 'BookRoomClientController@index',
                        'class' => 'form-horizontal', 'id'=>"bookcombo"]) !!}
                        <div class="row form-group">
                            <div class="col-md-12">
                                {!! Form::label('fullname', 'Tên của bạn', ['class' => 'control-label']) !!}
                                {!! Form::text('fullname', null, ['class' => 'form-control','placeholder'
                                =>'Nhập tên bạn','id'=>'fullname'])
                                !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {!! Form::label('msisdn', 'Số điện thoại', ['class' => 'control-label']) !!}
                                {!! Form::text('msisdn', null, ['class' => 'form-control','placeholder'
                                =>'Số điện thoại']) !!}
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
                                'form-control','placeholder'=>'Ngày đi','format'=>'dd/mm/yyyy']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('combo_type_id', 'Số ngày đi', ['class' => 'control-label']) !!}
                                {!!Form::select('combo_type_id', $combotypes, $value = $combo->combo_type_id,
                                ['class'=>'form-control','id'=>'combo_type_id'])!!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 ">
                                {!! Form::label('car_id', 'Chọn xe', ['class' => 'control-label'])
                                !!}
                                {!!Form::select('car_id', $combo->cars,0,
                                ['class'=>'form-control','onchange'=>'callLocationAjax(this,event)'])!!}
                            </div>
                            <div class="col-sm-6 ">
                                {!! Form::label('pickup_place_id', 'Điểm đón', ['class' => 'control-label'])
                                !!}
                                {!!Form::select('pickup_place_id[]', [''=>'Chọn xe để xem điểm đón'],0,
                                ['class'=>'form-control','multiple'=>true,'id'=>'pickup_place_id'])!!}
                            </div>
                        </div>

                        <div class="row form-group">
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
                        <div class="row form-group">
                            <div class="col-md-12">
                                {!! Form::label('price', 'Giá dự kiến', ['class' => 'control-label']) !!}
                                {!! Form::text('price', $value = $combo->price . 'K / 1 Đêm / 1 Người lớn',['class' =>
                                'form-control','disabled'=>'true']) !!}
                            </div>
                        </div>

                        <div class="mt-3 mb-3">
                            {!!Form::button('Đồng ý', ['class' => 'btn btn-primary
                            btn-block','onClick'=>'submitBookRoom(event,'.$combo->id.')'])!!}
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align:center">
                Chân thành cảm ơn bạn đã tin tưởng chúng tôi!
            </div>
        </div>

    </div>
</div>
<script src="{!! asset('client/js/jquery-3.3.1.min.js') !!}"></script>
<script>
    submitBookRoom = function(e,id) {
    //validate and submit
    var i = 0;
    if(i==0){
    $form = $('#bookdiv-' + id);
    if(validateFormBookRoom($form)){
        createBookRoom(e,$form,id);
    }
    i++;
}
            
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
}
validateFormBookRoom=function(form){
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
createBookRoom = function(e,form,id) {
    e.preventDefault();
    $.ajaxSetup({
headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

    $combo_id= id;
    $fullname = form.find('#fullname').val().trim();
    $fbLink = form.find('#fb-link').val().trim();
    $msisdn = form.find('#msisdn').val().trim();
    $startDate = form.find('#start_date').val().trim();
    $adults = form.find('#adults').val().trim();
    $minors = form.find('#minors').val().trim();
    $childrens = form.find('#childrens').val().trim();
    $combo_type_id = form.find('#combo_type_id').val().trim();
    $car_id = form.find('#car_id').val().trim();
    $pickup_place_id = form.find('#pickup_place_id').val();
    $typeService = form.find('input[name="type_service"]:checked').val();

    $.ajax({

        type: 'POST',

        url: '/bookcomboClients/store',

        data: { 
            combo_id:$combo_id,
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
            car_id:$car_id 
        },

        success: function(data) {

            alert(data.result);
            event.preventDefault();
            $close = $("#myModal"+id).find('.close');
            $close.click();
            resetForm(form);
        },
        error: function(data) {
            var errors = data.responseJSON;
            alert("có lỗi khi lưu thông tin. Vui lòng liên hệ đội kĩ thuật!")
            console.log(errors);
        }

    });
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