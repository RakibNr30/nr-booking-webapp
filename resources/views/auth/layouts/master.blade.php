<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ $globalSite->favicon->file_url ?? config('core.image.' . config('core.theme') . '.default.favicon') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/global/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/global/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    @yield('style')
    <script src="{{ asset('admin/global/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/loaders/blockui.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('admin/local/js/app.js') }}"></script>
    <script src="{{ asset('admin/global/js/demo_pages/login.js') }}"></script>
    <script src="{{ asset('admin/global/js/demo_pages/login_validation.js') }}"></script>
    @yield('script')
</head>

<body>
<div class="navbar navbar-expand-md navbar-light">
    <div class="navbar-brand">
        <a href="{{ route('front.index') }}" class="d-inline-block">
            <img src="{{ $globalSite->logo->file_url ?? config('core.image.default.logo') }}" style="height: 40px" alt="">
        </a>
    </div>
</div>

<div class="page-content">
    <div class="content-wrapper">
        @yield('content')
        @include('auth.partials._footer')
    </div>
</div>
</body>
</html>
