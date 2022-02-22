@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <section class="headings" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Designation</h1>
                <h2>
                    <a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; Designation
                </h2>
            </div>
        </div>
    </section>

    <section class="feature-cities-1">
        <div class="container">
            <div class="row">
                @foreach(config('core.continents') as $key => $continent)
                    <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="zoom-in">
                        <a href="{{ route('front.destination.show', [$key]) }}" class="img-box hover-effect">
                            <img src="{{ asset("front/" . config('core.theme') . "/images/continent-images/{$key}.png") }}" class="img-responsive" alt="">
                            <div class="overlay"></div>
                            <div class="img-box-content visible">
                                <h4>{{ $continent }}</h4>
                                <span>Search in {{ $continent }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .feature-cities-1 .img-box-content {
            background: rgba(0, 70, 128, 0.89);
            padding: 3px 20px;
            border-radius: 10px;
        }
    </style>
@stop

@section('script')
@stop
