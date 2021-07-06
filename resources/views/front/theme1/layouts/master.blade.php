<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $globalSite->title ?? 'NRdotCOM Booking' }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $globalSite->favicon->file_url ?? config('core.image.' . config('core.theme') . '.default.favicon') }}">
    
    <link href="{{ asset('front/' . config('core.theme') . '/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('front/' . config('core.theme') . '/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('front/' . config('core.theme') . '/css/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('front/' . config('core.theme') . '/css/custom.css') }}" rel="stylesheet">

    @yield('style')
</head>

<body class="red-skin">
<div id="main-wrapper">

    {{--@include('front.' . config('core.theme') . '.partials._preloader')--}}
    @include('front.' . config('core.theme') . '.partials._header')

    @yield('content')

    @include('front.' . config('core.theme') . '.partials._footer')

    @include('front.' . config('core.theme') . '.partials._back_to_top')

</div>

<script src="{{ asset('front/' . config('core.theme') . '/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/popper.min.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/rangeslider.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/select2.min.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/slick.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/slider-bg.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/lightbox.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/imagesloaded.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/counterup.min.js') }}"></script>
<script src="{{ asset('front/' . config('core.theme') . '/js/custom.js') }}"></script>

@yield('script')

</body>
</html>
