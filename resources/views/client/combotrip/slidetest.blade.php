<div class="row">
    @foreach ($galleryHotel as $key=>$image )
    @if($key < 5) <div class="col-lg-4 col-md-4 col-sm-6 slide" style="padding:0px !important">
        <a href="/images/hotels/{{$image}}" class="fh5co-card-item image-popup">
            {{-- <div class="overlay"><i class="ti-plus"></i></div> --}}
            {{-- <figure> --}}
            {{-- <div class="overlay"><i class="ti-plus"></i></div> --}}
            <img alt="Image" class="img-responsive" src='/images/hotels/{{$image}}' />
            {{-- </figure> --}}
        </a>
</div>

@else
<div class="col-lg-4 col-md-4 col-sm-6 slide" style="display:none;padding:0px !important">
    <a href="/images/hotels/{{$image}}" class="fh5co-card-item image-popup">
        {{-- <div class="overlay"><i class="ti-plus"></i></div> --}}
        {{-- <figure> --}}
        {{-- <div class="overlay"><i class="ti-plus"></i></div> --}}
        <img alt="Image" class="img-responsive" src='/images/hotels/{{$image}}' />
        {{-- </figure> --}}
    </a>
</div>
@endif
@endforeach


@foreach ($gallery as $key=>$image )

<div class="col-lg-4 col-md-4 col-sm-6 slide" style="display:none;padding:0px !important">
    <a href="/images/roomhotels/{{$image}}" class="fh5co-card-item image-popup">
        {{-- <div class="overlay"><i class="ti-plus"></i></div> --}}
        {{-- <figure> --}}
        {{-- <div class="overlay"><i class="ti-plus"></i></div> --}}
        <img alt="Image" class="img-responsive" src='/images/hotels/{{$image}}' />
        {{-- </figure> --}}
    </a>
</div>
@endforeach

</div>