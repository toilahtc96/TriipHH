<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HHTraveler &mdash; Trải nghiệm du lịch thú vị</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords"
        content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{!! asset('bower_components/client-view/css/animate.css') !!}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{!! asset('bower_components/client-view/css/icomoon.css') !!}">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="{!! asset('bower_components/client-view/css/themify-icons.css') !!}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{!! asset('bower_components/client-view/css/bootstrap.css') !!}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{!! asset('bower_components/client-view/css/magnific-popup.css') !!}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{!! asset('bower_components/client-view/css/bootstrap-datepicker.min.css') !!}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{!! asset('bower_components/client-view/css/owl.carousel.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('bower_components/client-view/css/owl.theme.default.min.css') !!}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{!! asset('bower_components/client-view/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/client/my-style.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/style-combotrips.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/client/hotel/hotel.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/client/hotel/list-item.css') !!}">

    <link rel="stylesheet" href="{!! asset('client/css/aos.css') !!}">
    <link rel="stylesheet" href="{!! asset('client/css/fancybox.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('client/fonts/ionicons/css/ionicons.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('client/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('client/fonts/fontawesome/css/font-awesome.min.css') !!}">



    <!-- Modernizr JS -->
    <script src="{!! asset('bower_components/client-view/js/modernizr-2.6.2.min.js') !!}"></script>


    {{-- gallery --}}


    <link rel='stylesheet' href="{!! asset('unitegallery/dist/css/unite-gallery.css') !!}">
    <link rel='stylesheet' href="{!! asset('unitegallery/dist/themes/default/ug-theme-default.css') !!}">
    <link rel='stylesheet' href="{!! asset('unitegallery/dist/skins/alexis/alexis.css') !!}" />

    <!-- Fotorama from CDNJS, 19 KB -->
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>