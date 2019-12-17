@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Chỉnh sửa thông tin phòng </h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">Sửa thông tin phòng </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($roomhotel, array('route' => array('roomhotels.update', $roomhotel->id), 'method' => 'PUT','files' => true)) }}

                        {!! Form::label('hotel_id', 'Khách sạn', ['class' => 'control-label']) !!}
                        {!!Form::select('hotel_id', $hotels, $value = $roomhotel->hotel_id,
                        ['class'=>'form-control'])!!}

                        <div class="row">
                            <div class="col-sm-6 ">
                                {!! Form::label('room_name', 'Tên phòng', ['class' => 'control-label']) !!}
                                {!! Form::text('room_name', $value = $roomhotel->room_name, ['class' => 'form-control'])
                                !!}
                            </div>
                            <div class="col-sm-6 ">
                                {!! Form::label('level', 'Hạng phòng', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('level', 1, 5, $value = $roomhotel->level, ['class'=>
                                'form-control']) !!}
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6 ">
                                {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                                {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'], $value =
                                $roomhotel->status,
                                ['class'=> 'form-control'])!!}
                            </div>
                        </div>

                        {!! Form::label('price', 'Giá', ['class' => 'control-label']) !!}
                        {!! Form::number('price', $value = $roomhotel->price, ['class' =>
                        'form-control','placeholder'=>'price']) !!}

                        {!! Form::label('info', 'Thông tin phòng', ['class' => 'control-label']) !!}
                        {!! Form::textarea('info', $value = $roomhotel->info, ['class' => 'form-control', 'rows' => 6])
                        !!}

                        {!! Form::label('service_included', 'Dịch vụ', ['class' => 'control-label']) !!}
                        <textarea name=service_included id="text" cols="30" rows="10">
                           {!!$roomhotel->service_included!!}
                        </textarea>

                        {!! Form::label('slugs', 'Đường dẫn', ['class' => 'control-label']) !!}
                        {!! Form::text('slugs', $value = $value=$roomhotel->slugs, ['class' => 'form-control']) !!}
                        <div>
                            {!! Form::hidden('image_root_folder',$value
                            =$roomhotel->image_root_folder,['class'=>'form-control','id'=>'image_root_folder'])
                            !!}
                            {{-- @if(!isset($hotel->main_image)) --}}
                            {!! Form::label('main_image', 'Ảnh chính', ['class' => 'control-label']) !!}
                            <div id="myfileupload">
                                <div>

                                    {!!
                                    Form::file('main_image',['onchange'=>"readURL(this);",
                                    'class'=>'form-control','id'=>'uploadfile'])
                                    !!}
                                    {!!
                                    Form::hidden('main_image_hidden',$value =
                                    $roomhotel->main_image,['class'=>'form-control','id'=>'main_image_hidden'])
                                    !!}
                                </div>
                                <!--      Name  mà server request về sẽ là ImageUpload-->

                            </div>
                            @include('admin.common.image-upload')
                            {{-- @else --}}

                            {{-- @endif --}}
                        </div>
                        <div class="mt-3 mb-3">

                            <div class="div-multi-image">
                                {!! Form::label('list_image', 'Ảnh kèm theo', ['class' => 'control-label']) !!}
                                <div id="myfileupload">
                                    <div>

                                        {!!
                                        Form::file('list_image[]',['onchange'=>"readMultiURL(this,event);",'class'=>'form-control','id'=>'uploadMultifile','multiple'])
                                        !!}

                                        {{-- $value = $hotel->list_image --}}
                                        {!!
                                        Form::hidden('list_image_old',$value =
                                        $roomhotel->list_image,['id'=>'list_image_old']);
                                        !!}
                                    </div>
                                    <!--      Name  mà server request về sẽ là ImageUpload-->

                                </div>
                                @include('admin.common.multi-image-upload')
                            </div>
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

<script src="{!! asset('bower_components/adminlte/plugins/jquery/jquery.min.js') !!}"></script>