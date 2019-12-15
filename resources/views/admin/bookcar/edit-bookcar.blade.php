@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Sửa đăng ký đặt xe </h2>
        @include('admin.common.url-to-list')
        <div>
            <div class="panel panel-primary ">

                <div class="panel-heading">Chỉnhh sửa đăng kí xe</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <figure style="margin: 0 4px 0;text-align: center;">
                                <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                    height="244" class="j9NuTc TrZEUc">
                            </figure>

                        </div>
                        <div class="col-sm-6">

                            {{ Form::model($bookcar, array('route' => array('bookcars.update', $bookcar->id), 'method' => 'PUT','files' => true)) }}

                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Form::label('fullname', 'Tên khách hàng', ['class' => 'control-label']) !!}
                                    {!! Form::text('fullname', $value = $bookcar->fullname, ['class' =>
                                    'form-control','placeholder'=>'Tên khách hàng']) !!}
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::label('msisdn', 'Số điện thoại', ['class' => 'control-label']) !!}
                                    {!! Form::text('msisdn', $value = $bookcar->msisdn, ['class' =>
                                    'form-control','placeholder'=>'Số điện thoại']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Form::label('fb_link', 'FaceBook', ['class' => 'control-label']) !!}
                                    {!! Form::text('fb_link', $value = $bookcar->fb_link, ['class' =>
                                    'form-control','placeholder'=>'FaceBook']) !!}
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::label('type_service', 'Tư vấn', ['class' => 'control-label']) !!}
                                    {!!Form::select('type_service', ['0'=>'Tư vấn qua số điện thoại','1'=>'Tư vấn
                                    qua
                                    FaceBook'], $bookcar->type_service, ['class'=>
                                    'form-control'])!!}
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Form::label('start_date', 'Ngày đi', ['class' => 'control-label']) !!}
                                    {!! Form::date('start_date', $value = $bookcar->start_date, ['class' =>
                                    'form-control','placeholder'=>'Ngày đi','format'=>'dd/mm/yyyy']) !!}
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::label('arrival_time', 'Giờ dự kiến đến', ['class' => 'control-label'])
                                    !!}
                                    {!! Form::time('arrival_time', $value = $bookcar->arrival_time, ['class' =>
                                    'form-control','placeholder'=>'Giờ dự kiến']) !!}
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6 ">
                                    {!! Form::label('pickup_place_id', 'Nơi đón', ['class' =>
                                    'control-label']) !!}
                                    {!!Form::select('pickup_place_id',$locations, null,
                                    ['class'=> 'form-control'])!!}
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::label('book_status_name', 'Trạng thái đặt ', ['class' =>
                                    'control-label']) !!}
                                    {!! Form::text('book_status_name', $value = $bookcar->status, ['class' =>
                                    'form-control','placeholder'=>'Trạng thái đặt ','disabled'=>'true']) !!}
                                </div>
                            </div>
                            {!! Form::label('price', 'Tổng tiền ', ['class' => 'control-label']) !!}
                            {!! Form::number('price', $value = $bookcar->price, ['class' =>
                            'form-control','placeholder'=>'Tổng tiền ']) !!}
                            @if( $bookcar->book_status_id == 8 )
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! Form::label('reject_note', 'Lý do hủy', ['class' => 'control-label']) !!}
                                    {!! Form::textarea('reject_note', $value = $bookcar->reject_note, ['class' =>
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
</div>


@endsection