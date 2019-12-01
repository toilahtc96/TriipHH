<form action="/admin/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-sm-2">
                {{__('Từ ngày')}}
            <input type="date" class="form-control" format="dd/mm/yyyy" name="startdate" id="startdate">
        </div>
        <div class="col-sm-2">
            {{__('Tới ngày')}}
            <input type="date" format="dd/mm/yyyy" class="form-control" name="enddate" id="enddate">
        </div>
        <div class="col-sm-8" style="margin-top:2%">
            <div class="col-sm-4" style="float:left">
                <input type="text" class="form-control" name="q" id="q" placeholder="Search "> <span class="input-group-btn">
            </div>
            <div class="col-sm-2" style="float:left">
                <input type="hidden" class="form-control" name="table" value={{$table_name}} />
                <button type="submit" class="btn btn-default" >
                        {{-- onclick="searchTable()" --}}
                    <i class="fas fa-search">
                    </i>
                </button>
                </span>
            </div>
            <div class="col-sm-2" style="float:right">
                @if(isset($url_link))
                <button  class="btn btn-default"><a href="{{$url_link}}/create" >Thêm mới</a></button>
                @endif
            </div>
        </div>
    </div>
</form>