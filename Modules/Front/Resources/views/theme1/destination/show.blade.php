@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover page-title" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">Search result</h2>
                </div>
            </div>
        </div>
    </div>

    <section class="gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="shorting-wrap">
                        <h5 class="shorting-title">
                            @if($data->totalHotel < 2)
                                <span>{{ $data->totalHotel }}</span> Result Found
                            @else
                                <span>{{ $data->totalHotel }}</span> Results Found
                            @endif
                        </h5>
                    </div>
                </div>

                @if(count($data->hotels))
                    @foreach($data->hotels as $index => $hotel)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="Reveal-grid-wrapper">
                                @if($hotel->is_open)
                                    <div class="list-badge now-open">Open Now</div>
                                @else
                                    <div class="list-badge closed">Close Now</div>
                                @endif
                                <div class="Reveal-grid-thumb">
                                    <div class="Reveal-listing-price-info">
                                        <span class="pricetag">${{ round($hotel->cost_per_night, 2) }} / Night</span>
                                    </div>
                                    <a href="{{ route('front.hotel.search-result.show', [$hotel->slug]) }}" class="lup-box">
                                        <div class="image" style="background-image:
                                            url({{ $hotel->feature_image->file_url ?? config('core.image.' . config('core.theme') . '.default.preview_image') }})">
                                        </div>
                                    </a>
                                </div>
                                <div class="Reveal-grid-caption">
                                    <div class="Reveal-grid-caption-header">
                                        <h4 class="Reveal-header-title">
                                            <a href="{{ route('front.hotel.search-result.show', [$hotel->slug]) }}">{{ $hotel->name ?? '' }}</a>
                                        </h4>
                                        <div class="Reveal-grid-reviews">
                                            <p class="overall-reviews">
                                                {{ $hotel->location ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="Reveal-grid-footer">
                                    <div class="Reveal-grid-footer-flex">
                                        <div class="Reveal-author-caption">
                                            <div class="Reveal-author-header">
                                                <h4>start from <span>${{ round($hotel->cost_per_night, 2) }}</span> / night</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Reveal-grid-footer-last">
                                        <a href="{{ route('front.hotel.search-result.show', [$hotel->slug]) }}" class="Reveal-view-btn">View</a>
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
        .shorting-wrap h5.shorting-title  span {
            font-size: 30px;
            font-weight: bold;
            color: #EA1B41;
        }
        .Reveal-grid-wrapper .Reveal-grid-thumb .image {
            height: 250px;
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .Reveal-grid-caption {
            height: 150px;
            overflow-y: scroll;
        }
        .Reveal-grid-caption::-webkit-scrollbar {
            display: none;
        }
    </style>
@stop

@section('script')
@stop
