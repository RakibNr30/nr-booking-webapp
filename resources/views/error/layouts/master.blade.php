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
    <link href="{{ asset('admin/local/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/colors.min.css') }}" rel="stylesheet" type="text/css">

</head>
<body>

<div class="page-content">
    <div class="content-wrapper">

        @yield('content')

    </div>
</div>

</body>
</html>
