<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>{{ $globalSite->title ?? 'Hotel Retailer' }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $globalSite->favicon->file_url ?? config('core.image.' . config('core.theme') . '.default.favicon') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/jquery-ui.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Asap:300,400,400i%7CMontserrat:600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/fontawesome-5-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/search-form.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/revolution/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/aos2.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/date-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/default.css') }}" id="color">
    <link rel="stylesheet" href="{{ asset('front/theme2/css/custom.css') }}">
    @yield('style')
</head>

<body class="{{ request()->is('/') ? 'homepage-3 homepage-4 the-search hp-7' : 'inner-pages p-bl' }}">
<div id="wrapper">
    @include('front.'. config('core.theme') .'.partials._header')

    @yield('content')

    @include('front.' . config('core.theme') . '.partials._footer')

    @include('front.' . config('core.theme') . '.partials._back_to_top')

    {{--@include('front.' . config('core.theme') . '.partials._preloader')--}}

    <script src="{{ asset('front/theme2/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/rangeSlider.js') }}"></script>
    <script src="{{ asset('front/theme2/js/tether.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/mmenu.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/mmenu.js') }}"></script>
    <script src="{{ asset('front/theme2/js/aos.js') }}"></script>
    <script src="{{ asset('front/theme2/js/aos2.js') }}"></script>
    <script src="{{ asset('front/theme2/js/fitvids.js') }}"></script>
    <script src="{{ asset('front/theme2/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/lightcase.js') }}"></script>
    <script src="{{ asset('front/theme2/js/search.js') }}"></script>
    <script src="{{ asset('front/theme2/js/slick.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/slick-home-1.js') }}"></script>
    <script src="{{ asset('front/theme2/js/typed.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('front/theme2/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/newsletter.js') }}"></script>
    <script src="{{ asset('front/theme2/js/jquery.form.js') }}"></script>
    <script src="{{ asset('front/theme2/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('front/theme2/js/searched.js') }}"></script>
    <script src="{{ asset('front/theme2/js/date-picker.js') }}"></script>
    <script src="{{ asset('front/theme2/js/forms-2.js') }}"></script>
    <script src="{{ asset('front/theme2/js/range.js') }}"></script>
    <script src="{{ asset('front/theme2/js/color-switcher.js') }}"></script>
    <script>
        $(window).on('scroll load', function() {
            $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
        });

    </script>

    {{--<script src="{{ asset('front/theme2/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('front/theme2/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>--}}

    <script src="{{ asset('front/theme2/js/script.js') }}"></script>

    <script>
        $(".dropdown-filter").on('click', function() {

            $(".explore__form-checkbox-list").toggleClass("filter-block");

        });

    </script>

    @yield('script')

</div>
</body>
</html>
