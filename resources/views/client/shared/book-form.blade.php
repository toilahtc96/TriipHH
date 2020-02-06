<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
    <div class="form-wrap">
        <div class="tab">

            <div class="tab-content">
                <div class="tab-content-inner active" data-content="signup">
                    <h3>Đặt chuyến đi</h3>
                    {!! Form::open(['method' => 'POST', 'action' => 'BookCustomClientController@index',
                    'class' => 'form-horizontal', 'id'=>"bookcustom-banner"]) !!}
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
                            =>'Số điện thoại','id'=>'msisdn']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::label('start_date', 'Ngày đi', ['class' => 'control-label']) !!}
                            {!! Form::date('start_date', null, ['class' =>
                            'form-control','placeholder'=>'Ngày đi','format'=>'dd/mm/yyyy','id'=>'start_date']) !!}

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::label('combo_type_id', 'Số ngày đi', ['class' => 'control-label']) !!}
                            <select class="form-control" id="combo_type_id" name="combo_type_id">
                                <option value="0">Chọn số ngày đi</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3 mb-3">
                        {!!Form::button('Đồng ý', ['class' => 'btn btn-primary
                        btn-block','onClick'=>'submitBookCustomBanner(event)'])!!}
                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<script src="{!! asset('client/js/jquery-3.3.1.min.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js"></script>
<script>
    $(document).ready(function(){
        getComboType();
    })
    submitBookCustomBanner = function(e){
        $form = $('#bookcustom-banner');
        if(validateFormBookCustomBanner($form)){
            createBookCustomBanner(e,$form);
        }
}
createBookCustomBanner = function(e,form){
    e.preventDefault();
    $.ajaxSetup({
headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

    $fullname = form.find('#fullname').val().trim();
    $msisdn = form.find('#msisdn').val().trim();
    $startDate = form.find('#start_date').val().trim();
    $combo_type_id = form.find('#combo_type_id').val().trim();
    $.ajax({
        type: 'POST',
        url: '/bookCustom/store',
        data: { 
            fullname:$fullname,
            msisdn:$msisdn,
            startDate:$startDate,
            combo_type_id:$combo_type_id,
        },

        success: function(data) {

            alert(data.result);
            event.preventDefault();
            resetFormBanner(form);
        },
        error: function(data) {
            var errors = data.responseJSON;
            alert("có lỗi khi lưu thông tin. Vui lòng liên hệ đội kĩ thuật!")
            console.log(errors);
        }

    });
}


resetFormBanner=function(form){
    form.find('#fullname').val("");
    form.find('#start_date').val("");
    form.find('#msisdn').val("");
    form.find('#combo_type_id').val("0");
}
validateFormBookCustomBanner =function(form){
    $fullname = form.find('#fullname').val().trim();
    $startDate = form.find('#start_date').val().trim();
    $msisdn = form.find('#msisdn').val().trim();
    $combo_type_id = form.find('#combo_type_id').val();
    if($fullname ==""){
        alert("Vui lòng nhập tên bạn");
        form.find('#fullname').focus();
        return false;
    }
        if($msisdn ==""){
        alert("Bạn cần điền số điện thoại để nhận tư vấn");
        form.find('#msisdn').focus();
        return false;
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
   getComboType=function(){
    // combo_type_id

    $.ajaxSetup({
headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

$.ajax({
        type: 'POST',
        url: '/getcombotypes',

        success: function(data) {
            if(data.data){
                if(data.data.length>1){
                    data.data.forEach(element => {
                        // $('#combo_type_id')
                        var opt = document.createElement('option');
                        opt.value = element.id;
                        opt.innerHTML = element.combo_type_name;
                        $('#combo_type_id').append(opt);
                });
                }
            }
            event.preventDefault();
        },
        error: function(data) {
            console.log(errors);
        }

    });
   }
</script>