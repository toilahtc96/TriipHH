@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>Quản lý Thông tin Khách hàng </h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">Danh sách Thông tin Khách hàng</div>
        </div>
        <div class="container" id="container">
            @include('admin.common.search-action')
            <table class="table TFtable">
                <thead class="thead-light">
                    <tr>
                        <th>Tên Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $key => $data)

                    <tr>
                        <td>{{$data->fullname}}</td>
                        <td>{{$data->msisdn}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->content}}</td>
                        <td>
                            <a href="{{ url('/admin/contacts/' . $data->id . '/edit') }}" class="btn btn-default"><i
                                    class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div> {!! $contacts->appends(\Request::except('page'))->render() !!}</div>
        </div>
    </div>
</div>
@endsection