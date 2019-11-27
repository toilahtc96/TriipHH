@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Edit bookcombo</h2>

        <div class="panel panel-primary ">

            <div class="panel-heading">Edit bookcombo</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($bookcombo, array('route' => array('bookcombos.update', $bookcombo->id), 'method' => 'PUT','files' => true)) }}

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('fullName', 'Tên khách hàng', ['class' => 'control-label']) !!}
                                {!! Form::text('fullName', $value = $bookcombo->fullname, ['class' =>
                                'form-control','placeholder'=>'Tên khách hàng']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('msisdn', 'Số điện thoại', ['class' => 'control-label']) !!}
                                {!! Form::text('msisdn', $value = $bookcombo->msisdn, ['class' =>
                                'form-control','placeholder'=>'Số điện thoại']) !!}
                            </div>
                        </div>
                        
                        @if( $bookcombo->book_status_id == 8 )
                        <div class="row">
                            <div class="col-sm-12">
                                {!! Form::label('reject_note', 'Lý do hủy', ['class' => 'control-label']) !!}
                                {!! Form::textarea('reject_note', $value = $bookcombo->reject_note, ['class' =>
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


@endsection