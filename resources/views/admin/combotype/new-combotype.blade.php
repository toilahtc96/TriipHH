@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>{{__('Thêm loại combo')}}</h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">{{__('Thêm loại combo cho Website')}}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="{!! asset('bower_components/images/kissclipart-hotel-clipart-hotel-clip-art-243e5c97e85fab97.jpg') !!}" alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['method' => 'post', 'action' => 'ComboTypeController@index',
                        'class' => 'form-horizontal']) !!}

                        {!! Form::label('ComboType Name', 'Tên loại combo', ['class' => 'control-label']) !!}
                        {!! Form::text('combo_type_name', $value = "", ['class' => 'form-control', 'rows' => 3]) !!}

                        {!! Form::label('Detail', 'Chi tiết', ['class' => 'control-label']) !!}
                        {!! Form::textarea('detail', $value = "", ['class' =>
                        'form-control','placeholder'=>'Combotype Detail', 'rows' => 5]) !!}

                        <div class="col-sm-4 ">
                            {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                            {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'], null,
                            ['class'=>
                            'form-control'])!!}
                        </div>
                        <div class="mt-3 mb-3">
                            {!!Form::submit('Đồng ý', ['class' => 'btn btn-large btn-primary openbutton
                            form-control','onClick'=>'getValue()'])!!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
                <div class="col-sm-2"></div>
            </div>


        </div>
    </div>


</div>
</div>
@endsection