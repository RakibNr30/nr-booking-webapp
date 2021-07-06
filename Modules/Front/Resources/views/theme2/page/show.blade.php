@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover page-title" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">{{ $data->page->title ?? '' }}</h2>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    @if(isset($data->page->feature_image))
                        <div class="mb-5">
                            <img src="{{ $data->page->feature_image->file_url }}" style="max-width: 100%" alt="">
                        </div>
                    @endif
                    <div class="about-captione">
                        {!! $data->page->description !!}
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
        b, strong {
            font-weight: bold;
        }
    </style>
@stop

@section('script')
@stop
