
@php
$user = \Modules\Ums\Entities\User::find(auth()->user()->id);
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{ $user->personalInfo->first_name ?? '' }}
        {{ $user->personalInfo->last_name ?? '' }}
    </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ $globalSite->favicon->file_url ?? config('core.image.' . config('core.theme') . '.default.favicon') }}">
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/global/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/global/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/global/css/icons/material/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/custom-icon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/local/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('common/plugins/datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('common/plugins/timepicker/timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/local/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/local/css/custom.css') }}" rel="stylesheet" type="text/css">
    @yield('style')
    <!-- global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('admin/global/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('common/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ asset('common/plugins/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('common/plugins/timepicker/timepicker.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/ui/perfect_scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/forms/selects/select2/js/select2.full.js') }}"></script>
    <script src="{{ asset('admin/global/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('admin/local/js/app.js') }}"></script>
    <script src="{{ asset('admin/global/js/demo_pages/uploader_bootstrap.js') }}"></script>
    <script src="{{ asset('admin/global/js/demo_pages/form_layouts.js') }}"></script>
    <script src="{{ asset('admin/global/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('admin/global/js/demo_pages/layout_fixed_sidebar_custom.js') }}"></script>

    @yield('script')
</head>

<body class="navbar-top">
@include('admin.partials._navbar')
<div class="page-content">
    @include('admin.partials._sidebar', ['active' => $active])
    <div class="content-wrapper">
        @yield('content')
        @include('admin.partials._footer')
    </div>
</div>
@yield('chart_script')
<script>
    $('.datepicker').datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true
    });

    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });

    $(document).ready(function() {
        CKEDITOR.replaceAll('ck-text-editor');
    });
</script>

@yield('script_bottom')

</body>
</html>
