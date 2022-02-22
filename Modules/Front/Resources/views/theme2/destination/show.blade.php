@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <section class="headings" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Search Result</h1>
                <h2>
                    <a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; Search Result
                </h2>
            </div>
        </div>
    </section>

    <section class="popular listings portfolio bg-gray">
        <div class="container">
            <section class="headings-2 pt-0 full">
                <div class="pro-wrapper">
                    <div class="listing-title-bar">
                        <div class="text-heading text-left">
                            <p class="font-weight-bold mt-0" style="margin-bottom: 0 !important;">
                                @if($data->totalHotel < 2)
                                    <span>{{ $data->totalHotel }}</span> Result Found
                                @else
                                    <span>{{ $data->totalHotel }}</span> Results Found
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            @if(count($data->hotels))
                <div class="row portfolio-items" style="position: relative;">
                    @foreach($data->hotels as $index => $hotel)
                        <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale aos-init aos-animate" data-aos="zoom-in">
                            <div class="project-single">
                                <div class="project-inner project-head">
                                    <div class="homes">
                                        <a href="{{ route('front.hotel.search-result.show', [$hotel->slug]) }}" class="homes-img hover-effect">
                                            @if($hotel->is_open)
                                                <div class="homes-tag button alt featured f1">Open</div>
                                            @else
                                                <div class="homes-tag button alt featured f2">Closed</div>
                                            @endif
                                            <div class="homes-tag button sale rent">
                                                <i class="fa fa-usd"></i>
                                                <p>{{ round($hotel->cost_per_night, 2) }} / Night</p>
                                            </div>
                                            <div class="image" style="background-image: url({{ $hotel->feature_image->file_url ?? config('core.image.' . config('core.theme') . '.default.preview_image') }})">
                                            </div>
                                            <div class="overlay"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="homes-content">
                                    <div class="content">
                                        <a href="{{ route('front.hotel.search-result.show', [$hotel->slug]) }}">
                                            <h3>{{ $hotel->name ?? '' }}</h3>
                                        </a>
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-map-marker"></i>
                                                <span>{{ $hotel->location ?? '' }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="footer mt-3 img-2">
                                        <h6>start from <span>${{ round($hotel->cost_per_night, 2) }}</span> / night</h6>

                                        <span>
                                    <a href="{{ route('front.hotel.search-result.show', [$hotel->slug]) }}" class="custom-btn">View</a>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-3">
                        <div class="text-center">

                            {!! $data->hotels->appends(request()->all())->onEachSide(0)->links('front.' . config('core.theme') . '.partials._pagination') !!}

                        </div>
                    </div>
                </div>
            @else
                <div class="text-center m-auto">
                    <i class="fa fa-exclamation-circle fa-2x"></i>
                    <h4>No Hotel Found</h4>
                </div>
            @endif
        </div>
    </section>
@stop

@section('style')
    <style>
        .listings .project-inner .homes .image {
            height: 240px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .listings .project-inner .homes .image:hover {}
        .custom-btn {
            padding: 4px 12px;
            background: #004680;
            color: #fff !important;
            border-radius: 4px;
        }
        .homes-content .content {
            height: 130px;
            overflow-y: scroll;
        }
        .homes-content .content::-webkit-scrollbar {
            display: none;
        }
        .inner-pages .popular .homes-content .homes-list.clearfix li {
            line-height: 18px !important;
        }
        section.popular.portfolio {
            padding: 40px 0;
        }
        section.headings-2 {
            padding: 40px 0 40px 0;
        }
        section.headings-2 p span {
            color: #004680;
            font-weight: 600;
            font-size: 20px;
        }
    </style>
@stop

@section('script')
@stop
