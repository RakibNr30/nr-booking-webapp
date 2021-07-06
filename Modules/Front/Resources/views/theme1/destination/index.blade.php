@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover page-title" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">Destination</h2>
                </div>
            </div>
        </div>
    </div>

    <section class="gray">
        <div class="container">
            <div class="row">
                @foreach(config('core.continents') as $key => $continent)
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="Reveal-event-grid">
                            <a href="{{ route('front.destination.show', [$key]) }}">
                                <div class="Reveal-event-header">
                                    <img src="{{ asset("front/" . config('core.theme') . "/images/continent-images/{$key}.png") }}" class="img-fluid mx-auto" alt="">
                                    <span class="Reveal-event-grid-cat">
                                        {{ $continent }}
                                    </span>
                                </div>
                            </a>
                            <div class="Reveal-event-grid-caption text-center">
                                <div class="Reveal-Reveal-event-grid-caption-header">
                                    <h4 class="Reveal-event-name">
                                        Search in
                                        <a href="{{ route('front.destination.show', [$key]) }}">
                                            <span>{{ $continent }}</span>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .Reveal-event-grid-caption .Reveal-event-name a span {
            font-size: 22px;
            font-weight: bold;
            color: #EA1B41;
        }
	.Reveal-event-grid {
            box-shadow: 0 0 20px 0 #cab7b7;
            -webkit-box-shadow: 0 0 20px 0 #cab7b7;
        }
    </style>
@stop

@section('script')
@stop
