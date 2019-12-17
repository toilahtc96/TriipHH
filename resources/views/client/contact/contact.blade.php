@extends('client.layout')
@section('content')
<div class="gtco-section border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 animate-box">
                    <h3>Thông tin của bạn</h3>
                    {!! Form::open(['method' => 'POST', 'action' => 'ContactInfoController@index',
                    'class' => 'form-horizontal', 'id'=>"bookContact"]) !!}
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::text('fullname', null, ['class' => 'form-control','placeholder'
                            =>'Nhập tên bạn','id'=>'fullname'])
                            !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::number('msisdn', null, ['class' => 'form-control','placeholder'
                            =>'Số điện thoại','id'=>'msisdn']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::text('email', null, ['class' => 'form-control','placeholder'
                            =>'Email','id'=>'email']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::text('title', null, ['class' => 'form-control','placeholder'
                            =>'Tiêu đề','id'=>'title']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('content', '',['class' =>
                            'form-control','placeholder' =>
                            'Nội dung','row'=>8,'id'=>'content']) !!}
                        </div>
                    </div>

                    <div class="mt-3 mb-3">
                        {!!Form::button('Đồng ý', ['class' => 'btn btn-primary
                        btn-block','onClick'=>'submitContact(event)'])!!}
                        {!! Form::close() !!}
                    </div>

                </div>
                <div class="col-md-5 col-md-push-1 animate-box">

                    <div class="gtco-contact-info">
                        <h3>Thông tin liên hệ</h3>
                        <ul>
                            <li class="address"> số 11 xóm 5 Vân Đình - Ứng Hoà - Hà Nội </li>
                            <li class="phone"><a href="tel://0967719396"> 096 771 9396 - 0981 942 186</a></li>
                            <li class="email"><a href="mailto: sale01.hhtravel@gmail.com"> sale01.hhtravel@gmail.com</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<script src="{!! asset('client/js/jquery-3.3.1.min.js') !!}"></script>
<script>
  submitContact = function(e) {
    $form = $('#bookContact');
    if (validateFormContact($form)) {
        createContact(e, $form);
    }
}

validateFormContact = function(form) {

    $fullname = form.find('#fullname').val().trim();
    $title = form.find('#title').val().trim();
    $content = form.find('#content').val().trim();
    $email = form.find('#email').val().trim();
    if ($fullname == "") {
        alert("Vui lòng nhập tên bạn");
        form.find('#fullname').focus();
        return false;
    }
    if ($email == "") {
        alert("Vui lòng nhập email");
        form.find('#email').focus();
        return false;
    }
    if ($title == "") {
        alert("Vui lòng nhập tiêu đề");
        form.find('#title').focus();
        return false;
    }
    if ($content == "") {
        alert("Vui lòng nhập nội dung");
        form.find('#content').focus();
        return false;
    }
    return true
}
resetForm = function(form) {
    form.find('#fullname').val("");
    form.find('#email').val("");
    form.find('#msisdn').val("");
    form.find('#title').val("");
    form.find('#content').val("");

}

createContact = function(e, form) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $fullname = form.find('#fullname').val().trim();
    $email = form.find('#email').val().trim();
    $msisdn = form.find('#msisdn').val().trim();
    $title = form.find('#title').val().trim();
    $content = form.find('#content').val().trim();

    $.ajax({

        type: 'POST',

        url: '/contact/store',

        data: {
            fullname: $fullname,
            email: $email,
            msisdn: $msisdn,
            title: $title,
            content: $content,
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
</script>

@endsection