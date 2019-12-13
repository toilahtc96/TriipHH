<div class="gtco-container">
    <div class="col-lg-12 mb-5">
        <div class="row large-gutters">
            <div class="owl-carousel slide-one-item with-dots">
                @foreach ($room->show_image as $item)
                <div>
                    <img alt="Image" style="width: 520px;height:580px" class="img-fluid"
                        src='/images/roomhotels/{{$item}}' />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>