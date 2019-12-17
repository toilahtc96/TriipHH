<div id="gtco-subscribe">
    <div class="gtco-container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                <h2>Nhận thông tin mới nhất</h2>
                <p>Đăng kí Gmail với chúng tôi để có thông tin mới nhất.</p>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['method' => 'POST', 'action' => 'ContactInfoController@index',
                'class' => 'form-inline', 'id'=>"subcribeForm"]) !!}

                <div class="col-md-6 col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control','placeholder'
                    =>'Email','id'=>'email']) !!}
                </div>

                <div class="col-md-6 col-sm-6">
                    {!!Form::button('Đồng ý', ['class' => 'btn btn-primary
                    btn-block','onClick'=>'submitSubcribe(event)'])!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{!! asset('client/js/jquery-3.3.1.min.js') !!}"></script>
<script>
  submitSubcribe = function(e) {
    $form = $('#subcribeForm');
    if (validateFormSubcribe($form)) {
        createSubcribe(e, $form);
    }
}

validateFormSubcribe = function(form) {

    $email = form.find('#email').val().trim();
    if ($email == "") {
        alert("Vui lòng nhập email");
        form.find('#email').focus();
        return false;
    }
    return true
}
resetForm = function(form) {
    form.find('#email').val("");
}

createSubcribe  = function(e, form) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $email = form.find('#email').val().trim();

    $.ajax({

        type: 'POST',

        url: '/subcribe/store',

        data: {
            email: $email,
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
