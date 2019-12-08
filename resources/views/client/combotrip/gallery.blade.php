<div class="row" style="text-align:center;width:100%; padding:4em 0">
    <!-- Add images to <div class="fotorama"></div> -->
    <div class="container">
        <div id="gallery" style="display:none">
            @foreach ( $galleryHotel as $key =>$val )

            <img alt="Image 1 Title" src="/images/hotels/{{$val}}" data-image="/images/hotels/{{$val}}"
    data-description="Ảnh chụp khách sạn {{$hotel->hotel_name}}">
    @endforeach
    @foreach ( $gallery as $key =>$val )
    <img alt="Image 2 Title" src="/images/roomhotels/{{$val}}" data-image="/images/roomhotels/{{$val}}"
        data-description="Ảnh chụp khách sạn {{$hotel->hotel_name}}">
    @endforeach
    <img alt="Youtube Without Images" data-type="youtube" data-videoid="A3PDXmYoF5U"
        data-description="Youtube video description">
</div>
</div>


{{-- <div class="fotorama" data-nav="thumbs">
    @foreach ( $galleryHotel as $key =>$val )

    <img alt="Image 1 Title" src="/images/hotels/{{$val}}" data-image="/images/hotels/{{$val}}" lass="fotorama-img"
        data-description="Ảnh chụp khách sạn {{$hotel->hotel_name}}">
    @endforeach
    @foreach ( $gallery as $key =>$val )
    <img alt="Image 2 Title" src="/images/roomhotels/{{$val}}" data-image="/images/roomhotels/{{$val}}" class="fotorama-img"
        data-description="Ảnh chụp khách sạn {{$hotel->hotel_name}}">
    @endforeach
</div>
</div> --}}