<footer id="gtco-footer" role="contentinfo">
    <div class="gtco-container">
        <div class="row row-p	b-md">

            <div class="col-md-4">
                <div class="gtco-widget">
                    <h3>Về Chúng Tôi</h3>
                    <p> Với hơn 30,000 khách hàng được phục vụ bởi đội ngũ tư vấn viên chu đáo, nhiệt tình, chuyên
                        nghiệp, HH TRAVEL luôn cung cấp dịch vụ du lịch tốt nhất.</p>
                    <p>
                        Rất mong nhận được sự ủng hộ, góp ý và hợp tác của quý khách!
                    </p>
                    <p>Trân trọng cảm ơn!</p>
                </div>
            </div>

            <div class="col-md-2 col-md-push-1">
                <div class="gtco-widget">
                    <h3>Dịch vụ </h3>
                    <ul class="gtco-footer-links">
                        <li><a href="/combotrips">Combo Du lịch Sapa</a></li>
                        <li><a href="/bookcar">Đặt Vé Xe</a></li>
                        <li><a href="/hotels">Đặt Phòng Khách Sạn</a></li>
                        <li><a href="http://verehh.com/" target="_blank">Đặt Vé Máy Bay</a></li>
                        <li><a href="https://www.facebook.com/HH-travel-399371757317804/" target="_blank">Tư Vấn
                                24/7</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-2 col-md-push-1">
                <div class="gtco-widget">
                    <h3>Combo Hot</h3>
                    <ul class="gtco-footer-links" id="combo-hot-footer">
                        <li><a href="#">Luxe Hotel</a></li>
                        <li><a href="#">Italy 5 Star hotel</a></li>
                        <li><a href="#">Dubai Hotel</a></li>
                        <li><a href="#">Deluxe Hotel</a></li>
                        <li><a href="#">BoraBora Hotel</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-md-push-1">
                <div class="gtco-widget">
                    <h3>Liên hệ</h3>
                    <ul class="gtco-quick-contact">
                        <li><a href="tel://0967719396"><i class="icon-phone"></i> 096 771 9396 - 0981 942 186</a></li>
                        <li><a href="#"><i class="icon-mail2"></i> <a href="mailto: sale01.hhtravel@gmail.com">
                                    sale01.hhtravel@gmail.com</a></a></li>
                        <li><a href="#"><i class="icon-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="row copyright">
            <div class="col-md-12">
                <p class="pull-left">
                    <small class="block">&copy; HHTravel Du lịch tới mọi nơi.</small>
                    <small class="block">Đội phát triển web <a href="https://www.facebook.com/cong.hoang.12327"
                            target="_blank">HHTravel-Web</a> Kỹ Thuật: <a
                            href="https://www.facebook.com/cong.hoang.12327" target="_blank">HTC</a></small>
                </p>
                <p class="pull-right">
                    <ul class="gtco-social-icons pull-right">
                        <li><a target="_blank" href="https://www.facebook.com/HH-travel-399371757317804/"><i
                                    class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                    </ul>
                </p>
            </div>
        </div>

    </div>
</footer>
<script src="{!! asset('client/js/jquery-3.3.1.min.js') !!}"></script>
<script>
    $(document).ready(function() {
    // console.log($('#combo-hot-footer'));
    getComboHot();

})


getComboHot = function() {
    $.ajaxSetup({
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $.ajax({

        type: 'POST',

        url: '/getCombohot',


        success: function(data) {
            $('#combo-hot-footer').empty();
            if (data.data) {
                i = 0;
                data.data.forEach((value, key) => {
                    if (i < 5) {
                        i++;
                        $("#combo-hot-footer").append('<li><a href=/combotrip/'+value.id+'-'+value.slugs+'>' 
                + value.combo_trip_name+'</a></li>'); 
                    }
                });
            }
        }

    });
}
</script>