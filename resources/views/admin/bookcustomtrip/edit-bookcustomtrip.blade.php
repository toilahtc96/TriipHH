@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Edit bookcustomtrip</h2>

        <div class="panel panel-primary ">

            <div class="panel-heading">Edit bookcustomtrip</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244"
                                height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($bookcustomtrip, array('route' => array('bookcustomtrips.update', $bookcustomtrip->id), 'method' => 'PUT','files' => true)) }}

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