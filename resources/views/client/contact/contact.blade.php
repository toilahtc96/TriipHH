@extends('client.layout')
@section('content')
<div class="gtco-section border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 animate-box">
                <h3>Thông tin của bạn</h3>
                <form action="#">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="sr-only" for="name">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Your firstname">
                        </div>
                        
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="sr-only" for="email">Email</label>
                            <input type="text" id="email" class="form-control" placeholder="Your email address">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="sr-only" for="subject">Subject</label>
                            <input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="sr-only" for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                    </div>

                </form>		
            </div>
            <div class="col-md-5 col-md-push-1 animate-box">
                
                <div class="gtco-contact-info">
                    <h3>Thông tin liên hệ</h3>
                    <ul>
                        <li class="address"> số 11 xóm 5 Vân Đình - Ứng Hoà - Hà Nội </li>
                        <li class="phone"><a href="tel://0967719396"> 096 771 9396 - 0981 942 186</a></li>
                        <li class="email"><a href="mailto: sale01.hhtravel@gmail.com"> sale01.hhtravel@gmail.com</a></li>
                    </ul>
                </div>


            </div>
            </div>
        </div>
    </div>
</div>


@endsection