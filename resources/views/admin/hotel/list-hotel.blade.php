@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>List Hotel</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">List Hotel Active Of Website</div>
        </div>
        <table class="table TFtable">
            <thead class="thead-light">
                <tr>
                    <th>Hotel Name</th>
                    <th>Service Included</th>
                    <th>Image</th>
                    <th>Level</th>
                    <th>Info</th>
                    <th>Place Around</th>
                    <th>Rate</th>
                    <th>Status</th>
                    <th>Address Id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $key => $data)

                <tr>
                    <td>{{$data->hotel_name}}</td>
                    <td>
                        <div style="word-break: normal">{{$data->service_included}}</div>
                    </td>
                    <td>
                        <div>
                                <img height="100" width="100" alt="Thumb image" id="thumbimage" src= "/images/hotels/{{$data->main_image}}" />
                        </div>
                    </td>
                    <td>{{$data->level}}</td>
                    <td>{{$data->info}}</td>
                    <td>{{$data->place_around}}</td>
                    <td>
                        @for($i=0;$i<$data->rate;$i++)
                            <span class="fa fa-star checked"></span>
                            @endfor
                            @for($i=4;$i>=$data->rate;$i--)
                            <span class="fa fa-star"></span>
                            @endfor
                    </td>
                    <td>
                        @if($data->status == 1)
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id='customSwitch{{$data->id}}'  checked>
                            <label class="custom-control-label" for='customSwitch{{$data->id}}'>Hoạt động</label>
                        </div>
                        @endif
                        @if($data->status == 0)
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id='customSwitch{{$data->id}}'>
                            <label class="custom-control-label" for='customSwitch{{$data->id}}'>Không hoạt động</label>
                        </div>
                        @endif
                    </td>
                    <td>{{$data->location_name}}</td>
                    <td>
                        <a href="{{ url('/admin/hotels/' . $data->id . '/edit') }}" class="btn btn-default"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>{!! $hotels->links() !!}</div>
    </div>
</div>
@endsection