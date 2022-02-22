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

    <section class="listings-list popular full featured portfolio blog">
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
                @foreach($data->hotels as $index => $hotel)
                    <div class="row featured portfolio-items">
                        <div class="item col-lg-4 col-md-12 col-xs-12 landscapes sale pr-0 pb-0">
                            <div class="project-single mb-0 bb-0" data-aos="fade-up">
                                <div class="project-inner project-head">
                                    <div class="homes">
                                        <a href="{{ route('front.hotel.search-result.show', [$hotel->slug, 'times' => request()->get('check_time')]) }}" class="homes-img hover-effect">
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
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 homes-content pb-0 mb-5" data-aos="fade-up">
                            <div class="enty">
                                <a href="{{ route('front.hotel.search-result.show', [$hotel->slug, 'times' => request()->get('check_time')]) }}">
                                    <h3 class="mb-2">
                                        {{ $hotel->name ?? '' }}
                                    </h3>
                                </a>
                                <ul class="homes-list clearfix">
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <span>{{ $hotel->location ?? '' }}</span>
                                    </li>
                                </ul>
                                <p>
                                    @if(strlen($hotel->about = strip_tags($hotel->about)) > 100)
                                        {!! substr($hotel->about, 0, 100) !!} ...
                                    @else
                                        {{ $hotel->about }}
                                    @endif
                                </p>
                            </div>
                            <div class="footer mt-3">
                                <span>{{ $data->totalNight }}</span> Night
                                <i>|</i>
                                Start from <span>${{ round($hotel->cost_per_night, 2) }}</span> / Night
                                <i>|</i>
                                <a href="{{ route('front.hotel.search-result.show', [$hotel->slug, 'times' => request()->get('check_time')]) }}">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
        .listings-list .project-inner .homes .image {
            height: 270px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .portfolio-items .homes-content {
            height: 270px;
        }
        .listings-list .project-inner .homes .image:hover {}
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
        .popular .footer {
            background: none;
            border-top: 1px solid #ebebeb;
            padding: 1rem 20px;
            font-size: 14px;
            color: #666;
            bottom: 0;
            left: 0;
            position: absolute;
            width: 100%;
        }
        .popular .footer span {
            float: none;
            font-size: 22px;
            color: #004680;
            font-weight: 600;
        }
        .popular .footer a {
            color: #004680;
            font-weight: 500;
        }
        .popular .footer i {
            margin: 0 8px;
            font-size: 20px;
            font-weight: 500;
            font-style: normal;
        }
    </style>
@stop

@section('script')
@stop
