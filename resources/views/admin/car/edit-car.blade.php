@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Chỉnh sửa Hãng Xe</h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">Sửa hãng xe {{($car->own_car)}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($car, array('route' => array('cars.update', $car->id), 'method' => 'PUT','files' => true)) }}

                        {!! Form::label('own_car', 'Tên Nhà Xe', ['class' => 'control-label']) !!}
                        {!! Form::text('own_car', $value =$car->own_car, ['class' => 'form-control','placeholder' =>'Own
                        Name']) !!}

                        {!! Form::label('msisdn', 'Số điện thoại nhà xe', ['class' => 'control-label']) !!}
                        {!! Form::text('msisdn', $value = $car->msisdn, ['class' => 'form-control','placeholder'
                        =>'msisdn']) !!}

                        {!! Form::label('price', 'Giá Niêm yết', ['class' => 'control-label']) !!}
                        {!! Form::number('price', $value =$car->price , ['class' =>
                        'form-control','placeholder'=>'price']) !!}

                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('starting_location_id', 'Điểm xuất phát', ['class' => 'control-label'])
                                !!}
                                {!!Form::select('starting_location_id', $locations, $car->starting_location_id,
                                ['class'=>'form-control'])!!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('destination_id', 'Điểm tới', ['class' => 'control-label']) !!}
                                {!!Form::select('destination_id', $locations, $car->destination_id, ['class'=>
                                'form-control'])!!}
                            </div>
                        </div>
                        {!! Form::label('license_plates', 'Biển số xe', ['class' => 'control-label']) !!}
                        {!! Form::text('license_plates', $value = $car->license_plates, ['class' =>
                        'form-control','placeholder' =>'Licanse Plate']) !!}

                        {!! Form::label('service_included', 'Dịch vụ', ['class' => 'control-label']) !!}
                        <textarea name=service_included id="text" cols="30" rows="10">
                            {!!$car->service_included!!}
                         </textarea>
                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('start_pickup_location', 'Điểm đón khách đi', ['class' =>
                                'control-label']) !!}
                                {!!Form::select('start_pickup_location[]',$locations, $car->start_pickup_location,
                                ['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>

                            <div class="col-sm-4 ">
                                {!! Form::label('destination_pickup_location', 'Điểm trả khách', ['class' =>
                                'control-label']) !!}
                                {!!Form::select('destination_pickup_location[]',$locations,
                                $car->destination_pickup_location,['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('places_passing', 'Địa điểm đi qua', ['class' => 'control-label']) !!}
                                {!!Form::select('places_passing[]',$locations, $car->places_passing,
                                ['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>

                        </div>

                        <div class="col-sm-4 ">
                            {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                            {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'], $value
                            =$car->status,
                            ['class'=> 'form-control'])!!}
                        </div>

                        <div class="col-sm-4 ">
                            {!! Form::label('direction', 'Chiều xe', ['class' => 'control-label']) !!}
                            {!!Form::select('direction', ['1' => 'Chiều đi', '0' => 'Chiều về'], $value
                            =$car->direction,
                            ['class'=> 'form-control'])!!}
                        </div>

                        {!! Form::label('count_seat', 'Số ghế', ['class' => 'control-label']) !!}
                        {!! Form::number('count_seat', $value = $car->count_seat, ['class' =>
                        'form-control','placeholder' => 'Count Seat']) !!}
                        {!! Form::label('car_type', 'Loại xe', ['class' => 'control-label']) !!}
                        {!! Form::text('car_type', $value = $car->car_type, ['class' =>
                        'form-control','placeholder'=>'Car Type']) !!}
                        {!! Form::hidden('image_root_folder',$value =
                        $car->image_root_folder,['class'=>'form-control','id'=>'image_root_folder'])
                        !!}
                        {!! Form::label('slugs', 'Đường dẫn', ['class' => 'control-label']) !!}
                        {!! Form::text('slugs', $value = $car->slugs, ['class' => 'form-control']) !!}
                        <div>
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
                                    $car->main_image,['class'=>'form-control','id'=>'main_image_hidden'])
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
                                        $car->list_image,['id'=>'list_image_old']);
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