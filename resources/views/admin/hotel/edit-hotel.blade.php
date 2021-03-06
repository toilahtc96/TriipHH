@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Chỉnh sửa khách sạn</h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">Sửa thông tin khách sạn {{($hotel->hotel_name)}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($hotel, array('route' => array('hotels.update', $hotel->id), 'method' => 'PUT','files' => true)) }}

                        {!! Form::label('hotel_name', 'Tên khách sạn', ['class' => 'control-label']) !!}
                        {!! Form::text('hotel_name', $value = $hotel->hotel_name, ['class' => 'form-control', 'rows' =>
                        3]) !!}

                        {!! Form::label('service_included', 'Dịch vụ', ['class' => 'control-label']) !!}
                        <textarea name=service_included id="text" cols="30" rows="10">
                            {!!$hotel->service_included!!}
                         </textarea>
                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('level', 'Hạng', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('level', 1, 5, $hotel->level, ['class'=> 'form-control']) !!}
                            </div>

                            <div class="col-sm-4 ">
                                {!! Form::label('address_id', 'Địa chỉ', ['class' => 'control-label']) !!}
                                {!!Form::select('size', $locations, $hotel->address_id, ['class'=>
                                'form-control'])!!}
                            </div>
                        </div>
                        {!! Form::label('main_info', 'Thông tin chính', ['class' => 'control-label']) !!}
                        {!! Form::textarea('main_info', $value = $hotel->main_info, ['class' =>
                        'form-control','placeholder'
                        =>'MainInfo Hotel', 'rows' => 5]) !!}
                        {!! Form::label('info', 'Thông tin', ['class' => 'control-label']) !!}
                        {!! Form::textarea('info', $value = $hotel->info, ['class' => 'form-control','placeholder'
                        =>'info Hotel','rows' => 5]) !!}

                        {!! Form::label('general_rule', 'Quy tắc chung', ['class' => 'control-label']) !!}
                        {!! Form::textarea('general_rule', $value = $hotel->general_rule, ['class' =>
                        'form-control','placeholder'=>'General Rule Hotel', 'rows' => 5]) !!}

                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('place_around', 'Địa điểm xung quanh', ['class' => 'control-label']) !!}
                                {!!Form::select('place_around[]',$locations, $hotel->place_around,
                                ['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>

                            <div class="col-sm-4 ">
                                {!! Form::label('rate', 'Đánh giá', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('rate', 1, 5, $value=$hotel->rate, ['class'=> 'form-control']) !!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                                {!!Form::select('size', ['1' => 'Hoạt động', '0' => 'Không hoạt động'],
                                $value=$hotel->status,
                                ['class'=>
                                'form-control'])!!}
                            </div>
                        </div>
                        {!! Form::label('slugs', 'Đường dẫn', ['class' => 'control-label']) !!}
                        {!! Form::text('slugs', $value = $value=$hotel->slugs, ['class' => 'form-control']) !!}
                        <div>
                            {!! Form::hidden('image_root_folder',$value =
                            $hotel->image_root_folder,['class'=>'form-control','id'=>'image_root_folder'])
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
                                    $hotel->main_image,['class'=>'form-control','id'=>'main_image_hidden'])
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
                                        $hotel->list_image,['id'=>'list_image_old']);
                                        !!}
                                    </div>
                                    <!--      Name  mà server request về sẽ là ImageUpload-->

                                </div>
                                @include('admin.common.multi-image-upload')
                            </div>
                        </div>
                        <div class="mt-3 mb-3">
                            {!!Form::submit('Đồng ý', ['class' => 'btn btn-large btn-primary openbutton
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

@endsection