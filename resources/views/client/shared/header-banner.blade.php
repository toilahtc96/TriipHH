@if(isset($banner))
<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner"
    style="background-image: url(/images/hotels/{{$banner}})">
    @else
    <header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner"
        style="background-image: url(/images/hotels/0bg.png)">
        @endif
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">
                    <div class="row row-mt-15em">
                        <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                            @if(isset($title))
                            <h1>{{$title}}</h1>
                            @else
                            <h1>Chúc bạn tìm thấy chuyến đi phù hợp</h1>
                            @endif
                        </div>
                        {{-- @if(isset($isBookForm)) --}}
                        @include('client.shared.book-form')
                        {{-- @endif --}}
                    </div>


                </div>
            </div>
        </div>
    </header>