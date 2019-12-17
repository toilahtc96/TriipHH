@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Xem Thông tin Khách hàng liên hệ</h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">Khách hàng {{$contact->fullname}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($contact, array('route' => array('contacts.update', $contact->id), 'method' => 'PUT')) }}
                        {!! Form::label('fullname', 'Tên khách hàng', ['class'=> 'control-label']) !!}
                        {!! Form::text('fullname', $value = $contact->fullname,
                        ['class' => 'form-control','disabled'=>true]) !!}
                        {!! Form::label('email', 'Email', ['class'=> 'control-label']) !!}
                        {!! Form::text('email', $value = $contact->email,
                        ['class' => 'form-control','disabled'=>true]) !!}
                        {!! Form::label('msisdn', 'Điện thoại', ['class'=> 'control-label']) !!}
                        {!! Form::text('msisdn', $value = $contact->msisdn,
                        ['class' => 'form-control','disabled'=>true]) !!}
                        {!! Form::label('title', 'Tiêu đề', ['class'=> 'control-label']) !!}
                        {!! Form::text('title', $value = $contact->title,
                        ['class' => 'form-control','disabled'=>true]) !!}
                        {!! Form::label('content', 'Nội dung', ['class'=> 'control-label']) !!}
                        {!! Form::textarea('content', $value = $contact->content,
                        ['class' => 'form-control','row'=>8,'disabled'=>true]) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-sm-2"></div>
                </div>


            </div>
        </div>


    </div>
</div>

@endsection