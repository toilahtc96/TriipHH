@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Sửa loại Combo </h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">Sửa loại {{($combotype->combo_type_name)}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($combotype, array('route' => array('combotypes.update', $combotype->id), 'method' => 'PUT')) }}

                        {!! Form::label('combo_type_name', 'Tên Loại Combo', ['class' => 'control-label']) !!}
                        {!! Form::text('combo_type_name', $value = $combotype->combo_type_name,
                        ['class' => 'form-control', 'rows' => 3]) !!}

                        {!! Form::label('Detail', 'Chi tiết', ['class' => 'control-label']) !!}
                        {!! Form::textarea('detail', $value = $combotype->detail, ['class' =>
                        'form-control','placeholder'=>'Detail', 'rows' => 5]) !!}

                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                                {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'],
                                $value=$combotype->status,['class'=> 'form-control'])!!}
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