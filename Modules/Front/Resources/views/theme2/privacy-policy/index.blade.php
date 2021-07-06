@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover page-title" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">Privacy & Policy</h2>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="about-captione">
                        @if($data->privacyPolicy->description != '')
                            <div>
                                {!! $data->privacyPolicy->description !!}
                            </div>
                        @else
                            <div class="text-center">
                                <i class="fa fa-exclamation-circle fa-2x"></i>
                                <h4>No privacy & policy Found</h4>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .about-captione ul {
            list-style: unset;
        }
    </style>
@stop

@section('script')
@stop
