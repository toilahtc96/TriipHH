@extends('client.layout')
@section('content')

{{-- <section class="site-section" id="about-section"> --}}

<div class="gtco-section">
    <div class="gtco-container">

        <div class="row large-gutters">
           @include('client.shared.slide-children')
            <div class="col-lg-6 ml-auto">

                <h2 class="section-title mb-3">HHTravel Luôn Hướng tới trải nghiệm khách hàng</h2>
                <p class="lead">HH TRAVEL cũng là đối tác cao cấp của nhiều hãng hàng không lớn trên thế giới</p>
                <p>Chúng tôi mong nhận được ý kiến phản hồi của bạn. </p>

                <ul class="list-unstyled ul-check success">
                    <li>Hơn 30,000 khách hàng</li>
                    <li>Phục vụ bởi đội ngũ tư vấn viên chu đáo,nhiệt tình, chuyên nghiệp</li>
                    <li>Mang đến mức giá tốt nhất dành cho khách hàng</li>
                    <li>Hỗ trợ 24/7</li>
                    <li>Tư vấn tận tâm</li>
                </ul>

                <p><a href="#" class="btn btn-primary mr-2 mb-2">Learn More</a></p>

            </div>
        </div>
    </div>
</div>
{{-- </section> --}}

@endsection