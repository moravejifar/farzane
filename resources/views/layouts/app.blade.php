{{-- app ==> front  --}}
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Chondo Hotel | Home1</title>
    <meta name="description content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href=" {{ asset('/Admin/images/apple-touch-icon.png ') }} " type="images/x-icon" rel="shortcut icon">
    <!-- Place favicon.ico in the root directory -->

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href=" {{ asset('/Admin/css/bootstrap.min.css ') }} ">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href=" {{ asset('/Admin/css/core.css ') }} ">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href=" {{ asset('/Admin/css/shortcode/shortcodes.css ') }} ">
    <!-- Theme main style -->
    <link rel="stylesheet" href=" {{ asset('/Admin/style.css ') }} ">
    <!-- Responsive css -->
    <link rel="stylesheet" href=" {{ asset('/Admin/css/responsive.css ') }} ">
    <!-- customizer style css -->
    <link rel="stylesheet" href=" {{ asset('/Admin/css/style-customizer.css ') }} ">
    <link href=" {{ asset('/Admin/# ') }} " data-style="styles" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Modernizr JS -->
    <script src="{{ asset('/Admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset ('/jdp/jalalidatepicker.js') }}"></script>
    <link href="{{ asset ('/jdp/jalalidatepicker.css')}}" rel="stylesheet" >

    <script src="{{ asset('js/app.js')}}"></script>

    @livewireStyles
</head>

<body>

    <livewire:front.header/>


    {{$slot}}

    <livewire:front.footer/>

  <!-- Placed js at the end of the document so the pages load faster -->

      <!-- jquery latest version -->
    <script src=" {{ asset('/Admin/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <!-- Bootstrap framework js -->
    <script src=" {{ asset('/Admin/js/bootstrap.min.js') }}"></script>
    <!--counter up js-->
    <script src=" {{ asset('/Admin/js/waypoints.min.js') }}"></script>
    <script src=" {{ asset('/Admin/js/jquery.counterup.min.js') }}"></script>
    <!-- Video player js -->
    <script src=" {{ asset('/Admin/js/video-player.js') }}"></script>
    <!-- headlines js -->
    <script src=" {{ asset('/Admin/js/animated-headlines.js') }}"></script>
    <!-- Ajax mail js -->
    <script src=" {{ asset('/Admin/js/mailchimp.js') }}"></script>
    <!-- Ajax mail js -->
    <script src=" {{ asset('/Admin/js/ajax-mail.js') }}"></script>
    <!-- parallax js -->
    <script src=" {{ asset('/Admin/js/parallax.js') }}"></script>
    <!-- textilate js -->
    <script src=" {{ asset('/Admin/js/textilate.js') }}"></script>
    <script src=" {{ asset('/Admin/js/lettering.js') }}"></script>
    <!--isotope js-->
    <script src=" {{ asset('/Admin/js/isotope.pkgd.min.js') }}"></script>
    <script src=" {{ asset('/Admin/js/packery-mode.pkgd.min.js') }}"></script>
    <!-- Style Customizer Js  -->
    <script src=" {{ asset('/Admin/js/style-customizer.js') }}"></script>
    <!-- Owl carousel Js -->
    <script src=" {{ asset('/Admin/js/owl.carousel.min.js') }}"></script>
    <!--Magnificant js-->
    <script src=" {{ asset('/Admin/js/jquery.magnific-popup.js') }}"></script>
    <!-- All js plugins included in this file. -->
    <script src=" {{ asset('/Admin/js/plugins.js') }}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src=" {{ asset('/Admin/js/main.js') }}"></script>
    <script src=" {{ asset('/Admin/script.js') }}"></script>

    <script  type="text/javascript" src=" {{ asset('/jalalidatepicker.min.js') }}"></script>




    @livewireScripts


</body>
