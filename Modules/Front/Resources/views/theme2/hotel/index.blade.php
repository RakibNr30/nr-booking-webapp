@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover page-title" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">Search Result</h2>
                </div>
            </div>
        </div>
    </div>

    <section class="gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="shorting-wrap">
                        <h5 class="shorting-title"><span>{{ $data->totalHotel }}</span> Result Found</h5>
                    </div>
                </div>

                @if(count($data->hotels))
                    @foreach($data->hotels as $index => $hotel)
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="Reveal-verticle-list listing-shot">
                                @if($hotel->is_open)
                                    <div class="listing-badge now-open">Now Open</div>
                                @else
                                    <div class="listing-badge closed">Close Now</div>
                                @endif
                                <div class="Reveal-signle-item">
                                    <a class="listing-item" href="{{ route('front.hotel.search-result.show', [$hotel->slug, 'times' => request()->get('check_time')]) }}">
                                        <div class="listing-items">
                                            <div class="listing-shot-img">
                                                <img src="{{ $hotel->feature_image->file_url ?? config('core.image.' . config('core.theme') . '.default.preview_image') }}" class="img-responsive" alt="">
                                            </div>
                                        </div>
                                    </a>
                                    <div class="Reveal-verticle-listing-caption">
                                        <div class="Reveal-listing-shot-caption">
                                            <h4>
                                                <a href="{{ route('front.hotel.search-result.show', [$hotel->slug, 'times' => request()->get('check_time')]) }}">
                                                    {{ $hotel->name ?? '' }}
                                                </a>
                                                <span class="approve-listing">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            </h4>
                                            <span>
                                                <i class="ti-location-pin text-success"></i>
                                                {{ $hotel->location ?? '' }}
                                            </span>
                                            <p class="Reveal-short-descr">
                                                @if(strlen($hotel->about = strip_tags($hotel->about)) > 100)

                                                    {!! substr($hotel->about, 0, 100) !!} ...
                                                @else
                                                    {{ $hotel->about }}
                                                @endif
                                            </p>
                                            <div class="Reveal-listing-shot-info">
                                                <p class="bottom">
                                                    <span>{{ $data->totalNight }}</span> Night
                                                    <i>|</i>
                                                    Start from <span>${{ round($hotel->cost_per_night, 2) }}</span> / Night
                                                    <i>|</i>
                                                    <a href="{{ route('front.hotel.search-result.show', [$hotel->slug, 'times' => request()->get('check_time')]) }}">
                                                        View Details
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center m-auto">
                        <i class="fa fa-exclamation-circle fa-2x"></i>
                        <h4>No Hotel Found</h4>
                    </div>
                @endif

            </div>

            @if(count($data->hotels))
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-3">
                        <div class="text-center">

                            {!! $data->hotels->appends(request()->all())->links('front.' . config('core.theme') . '.partials._pagination') !!}

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@stop

@section('style')
    <style>
        .Reveal-verticle-listing-caption .Reveal-listing-shot-caption {
            position: relative;
            margin-right: 25px;
        }
        .Reveal-listing-shot-info p.bottom {
            font-size: 13px;
            font-weight: 500;
        }
        .Reveal-listing-shot-info p.bottom span {
            font-size: 22px;
            color: #EA1B41;
            font-weight: 500;
        }
        .Reveal-listing-shot-info p.bottom i {
            margin: 0 8px;
            font-size: 20px;
            font-weight: 500;
            font-style: normal;
        }
        .shorting-wrap h5.shorting-title span {
            font-size: 30px;
            color: #EA1B41;
            font-weight: 500;
        }
    </style>
@stop

@section('script')
@stop
