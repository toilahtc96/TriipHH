@extends('client.layout')
@section('content')
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
                <h2 class="heading aos-init" data-aos="fade">Great Offers</h2>
                <p data-aos="fade" class="aos-init">Far far away, behind the word mountains, far from the countries
                    Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at
                    the coast of the Semantics, a large language ocean.</p>
            </div>
        </div>
        <div class="site-block-half d-block d-lg-flex bg-white aos-init" data-aos="fade" data-aos-delay="100">
            <div style="float:right"><img src="/images/hotels/0bg.png" style="width:50%;float:right" />
                <div class="text">
                    <span class="d-block mb-4"><span class="display-4 text-primary">$199</span> <span
                            class="text-uppercase letter-spacing-2">/ per night</span> </span>
                    <h2 class="mb-4">Family Room</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live
                        the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                        large
                        language ocean.</p>
                    <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
                </div>
            </div>
            <div class="site-block-half d-block d-lg-flex bg-white aos-init" data-aos="fade" data-aos-delay="200">
                <div style="float:left"><img src="/images/hotels/0bg.png"
                        style="width:50%;float:right;padding-top:1.4%" />
                    <div class="text order-1" style="float:right">
                        <span class="d-block mb-4"><span class="display-4 text-primary">$299</span> <span
                                class="text-uppercase letter-spacing-2">/ per night</span> </span>
                        <h2 class="mb-4">Presidential Room</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live
                            the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                            a large
                            language ocean.</p>
                        <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
                    </div>
                </div>
            </div>
</section>
@endsection