@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@php
    $perNight = $data->hotel->cost_per_night;
    $bill = $perNight * $data->totalNight;
    $tax = $bill * 0.127;
    $total = $bill + $tax;

    $from = \Carbon\Carbon::now()->format('d M, Y');
    $to = \Carbon\Carbon::now()->addDay()->format('d M, Y');

    if (request()->has('times')) {
        $times = request()->get('times');
        if (!strpos($times, ' - ')) {
            return 0;
        }

        $times = array_map('strval', explode(' - ', $times));

        $from = \DateTime::createFromFormat('m/d/Y', $times[0]) !== FALSE;
        $to = \DateTime::createFromFormat('m/d/Y', $times[1]) !== FALSE;

        if (!($from && $to)) {
            return 0;
        }

        $from = \DateTime::createFromFormat('m/d/Y', $times[0])->format('d M, Y');
        $to = \DateTime::createFromFormat('m/d/Y', $times[1])->format('d M, Y');

    }
@endphp

@section('content')
    @if(count($data->hotel->getMedia(config('core.media_collection.hotel.slider_images'))))
        <div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($data->hotel->getMedia(config('core.media_collection.hotel.slider_images')) as $image)
                        <div class="swiper-slide">
                            <a href="{{ $image->getUrl() }}" class="grid image-link">
                                {{--<img src="{{ $image->getUrl() }}" class="img-fluid" alt="#">--}}
                                <div class="image" style="background-image: url({{ $image->getUrl() }})"></div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next swiper-button-white mr-3"></div>
                <div class="swiper-button-prev swiper-button-white ml-3"></div>
            </div>
        </div>
    @else
        <section class="headings" style="background:url({{ $data->hotel->feature_image->file_url ?? config('core.image.' . config('core.theme') . '.default.preview_image') }}) no-repeat;">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>{{ $data->hotel->name }}</h1>
                    <h2>
                        <a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; {{ $data->hotel->name }}
                    </h2>
                </div>
            </div>
        </section>
    @endif

    <section class="listing blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-wrapper">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <h3>
                                            {{ $data->hotel->name }}
                                            <span class="mrg-l-5 category-tag">Hotel</span>
                                        </h3>
                                        <div class="mt-3">
                                            <a href="javascript:void(0)" class="listing-address">
                                                <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>
                                                {{ $data->hotel->location }}
                                            </a>
                                            <div class="rating-box mt-3">
                                                <div class="detail-list-rating">
                                                    Start from &nbsp;<span>${{ $data->hotel->cost_per_night }}</span>&nbsp;/ Night
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($data->hotel->about) && $data->hotel->about != '')
                                <div class="blog-info details overview">
                                    {{--<h5 class="mb-4">About this Hotel</h5>--}}
                                    <div class="about">
                                        {!! $data->hotel->about !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="property-location mp">
                        <div class="departments-details">
                            <h5 class="mb-4" style="text-transform: uppercase !important;">Hotel Key Facts</h5>
                            <div class="row">
                                <div class="col-md-12 dep-list-1">
                                    <div class="p-0 table-responsive">
                                        <table class="table mb-0">
                                            @if(isset($data->hotel->room_type))
                                                <tr>
                                                    <th>Room Type</th>
                                                    <td>{{ $data->hotel->room_type }}</td>
                                                </tr>
                                            @endif
                                            @if(isset($data->hotel->board_type))
                                                <tr>
                                                    <th>Board Type</th>
                                                    <td>{{ $data->hotel->board_type }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>Arriving/Leaving</th>
                                                <td>
                                                    Check in time starts at {{ $data->hotel->checkin_time }}<br>
                                                    Check out time is {{ $data->hotel->checkout_time }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @if(isset($data->hotel->others_feature) && $data->hotel->others_feature != '')
                        <div class="blog-info details overview">
                            {{--<h5 class="mb-4">Others Feature</h5>--}}
                            <div class="about">
                                {!! $data->hotel->others_feature !!}
                            </div>
                        </div>
                    @endif
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="widget">
                        <div class="widget-boxed mt-5">
                            <div class="widget-boxed-header">
                                <h4>
                                    <i class="fa fa-calendar-alt pr-3 padd-r-10"></i>
                                    BOOK A RESERVATION
                                </h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div>
                                    <h5>WHEN</h5>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <span class="left">Check-in</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="right">{{ $from }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <span class="left">Check-out</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="right">{{ $to }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <span class="left">Night(s)</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="right">{{ $data->totalNight }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <h5>DETAILS</h5>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <span class="left">Room Type</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="right">{{ $data->hotel->room_type ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <span class="left">Board Type</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="right">{{ $data->hotel->board_type ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h5>PRICE</h5>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <span class="left">${{ round($perNight, 2) }} x {{ $data->totalNight }} Night(s)</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="right">${{ round($bill , 2)  }}</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <span class="left">Taxes & Fees</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="right">
                                                ${{ round($tax, 2)  }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <h3>
                                                <span class="left">TOTAL</span>
                                            </h3>
                                        </div>
                                        <div class="col-6 text-right">
                                            <h3>
                                                <span class="right">${{ round($total, 2)  }}</span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('front.hotel.booking', [$data->hotel->slug, 'times' => request()->get('times')]) }}"
                               class="btn reservation btn-radius theme-btn full-width mrg-top-10">
                                Book Now
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@stop

@section('style')
    <link rel="stylesheet" href="{{ asset('front/' . config('core.theme') . '/css/swiper.min.css') }}">
    <style>
        .swiper-container {
            padding-top: 103px;
        }
        .swiper-slide .image {
            height: 320px;
            width: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .swiper-button-next, .swiper-button-prev {
            height: 120px;
        }
        .rating-box .detail-list-rating span {
            font-size: 20px;
            color: #004680;
            font-weight: 500;
        }
        .blog-info.details .about ul,
        .blog-info.details .about ul li {
            list-style: unset;
        }
    </style>
@stop

@section('script')
    <script src="{{ asset('front/' . config('core.theme') . '/js/swiper.min.js') }}"></script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
            }
        });

    </script>

    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>
@stop
