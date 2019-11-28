<form action="/admin/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-sm-2">
                {{__('Từ ngày')}}
            <input type="date" class="form-control" name="startdate">
        </div>
        <div class="col-sm-2">
            {{__('Tới ngày')}}
            <input type="date" class="form-control" name="enddate">
        </div>
        <div class="col-sm-8" style="margin-top:2%">
            <div class="col-sm-6" style="float:left">
                <input type="text" class="form-control" name="q" placeholder="Search "> <span class="input-group-btn">
            </div>
            <div class="col-sm-2" style="float:left">
                <input type="hidden" class="form-control" name="table" value={{$table_name}} />
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search">
                    </i>
                </button>
                </span>
            </div>
        </div>
    </div>
</form>