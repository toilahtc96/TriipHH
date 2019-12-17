@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>{{__('Thêm thông tin phòng')}}</h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">{{__('Thêm thông tin phòng cho khách sạn ')}}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="{!! asset('bower_components/images/kissclipart-hotel-clipart-hotel-clip-art-243e5c97e85fab97.jpg') !!}"
                                alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['method' => 'post', 'action' => 'RoomHotelController@index', 'files' => true,
                        'class' => 'form-horizontal']) !!}

                        {!! Form::label('hotel_id', 'Khách sạn', ['class' => 'control-label']) !!}
                        {!!Form::select('hotel_id', $hotels, null, ['class'=>'form-control'])!!}

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('room_name', 'Tên phòng', ['class' => 'control-label']) !!}
                                {!! Form::text('room_name', $value = "", ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('level', 'Hạng', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('level', 1, 5, null, ['class'=> 'form-control']) !!}
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                                {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'], null,
                                ['class'=> 'form-control'])!!}
                            </div>
                        </div>

                        {!! Form::label('price', 'Giá', ['class' => 'control-label']) !!}
                        {!! Form::number('price', $value = "", ['class' =>
                        'form-control','placeholder'=>'price']) !!}

                        {!! Form::label('info', 'Thông tin phòng', ['class' => 'control-label']) !!}
                        {!! Form::textarea('info', $value = "", ['class' => 'form-control', 'rows' =>6]) !!}


                        {!! Form::label('service_included', 'Dịch vụ', ['class' => 'control-label']) !!}
                        <textarea name=service_included id="text" cols="30" rows="10">
                        </textarea>
                        {!! Form::label('slugs', 'Đường dẫn', ['class' => 'control-label']) !!}
                        {!! Form::text('slugs', $value = $value="", ['class' => 'form-control']) !!}
                        <div>
                            {!! Form::label('main_image', 'Ảnh chính', ['class' => 'control-label']) !!}
                            <div id="myfileupload">
                                <div>

                                    {!!
                                    Form::file('main_image',['onchange'=>"readURL(this);",'class'=>'form-control','id'=>'uploadfile'])
                                    !!}
                                </div>
                                <!--      Name  mà server request về sẽ là ImageUpload-->

                            </div>
                            @include('admin.common.image-upload')
                        </div>

                        <div class="div-multi-image">
                            {!! Form::label('list_image', 'Ảnh kèm theo', ['class' => 'control-label']) !!}
                            <div id="myfileupload">
                                <div>

                                    {!!
                                    Form::file('list_image[]',['onchange'=>"readMultiURL(this,event);",'class'=>'form-control','id'=>'uploadMultifile','multiple'])
                                    !!}
                                </div>
                                <!--      Name  mà server request về sẽ là ImageUpload-->

                            </div>
                            @include('admin.common.multi-image-upload')
                        </div>

                        <div class="mt-3 mb-3">
                            {!!Form::submit('Đồng ý', ['class' => 'btn btn-large btn-primary openbutton
                            form-control','onClick'=>'getValue()'])!!}
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