@extends('front.' . config('core.theme') .'.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover hero-banner" style="background:url({{ $data->banner->image->file_url ?? config('core.image.' . config('core.theme') . '.default.banner_image') }}) no-repeat;">
        <div class="container">
            <div class="hero-search-wrap light">
                <div class="hero-search dark-text">
                    <h1>Explore A Hotel</h1>
                </div>

                {!! Form::open(['url' => route('front.hotel.search'), 'method' => 'get']) !!}
                <div class="Reveal-search-content simple-frm">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Where</label>
                                <div class="input-with-icon">
                                    <div id="geocoder"></div>
                                    {{--<input type="text" class="form-control" placeholder="Enter Location">
                                    <i class="lni-target"></i>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Check In & Check Out</label>
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" name="check_time" placeholder="Check-In - Check-Out" id="booking-date-search" required>
                                    <i class="lni-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Guest</label>
                                <div class="Reveal-guest-picker">
                                    <div class="qty">
                                        <span class="gminus"><i class="ti-minus"></i></span>
                                        <input type="number" class="guest" name="guest_qty" min="1" value="1" required>
                                        <span class="gplus"><i class="ti-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Children</label>
                                <div class="Reveal-guest-picker">
                                    <div class="qty">
                                        <span class="cminus"><i class="ti-minus"></i></span>
                                        <input type="number" class="children" name="child_qty" min="0" value="0" required>
                                        <span class="cplus"><i class="ti-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-search-action">
                    <button type="submit" class="btn search-btn">Search Result</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h3>Why <span class="theme-cl">Us</span> ?</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="Reveal-working-step">
                        <div class="Reveal-icon-wrap">
                            <div class="Reveal-icon-large-box f-light-success">
                                <i class="ti-bar-chart text-success"></i>
                            </div>
                        </div>
                        <div class="Reveal-working-box-caption">
                            <h4>QUALITY ASSURED</h4>
                            <p>{{ $data->about->quality_assured ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="Reveal-working-step">
                        <div class="Reveal-icon-wrap">
                            <div class="Reveal-icon-large-box f-light-warning">
                                <i class="ti-search text-warning"></i>
                            </div>
                        </div>
                        <div class="Reveal-working-box-caption">
                            <h4>HOTEL SEARCH</h4>
                            <p>{{ $data->about->hotel_search ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="Reveal-working-step remove">
                        <div class="Reveal-icon-wrap">
                            <div class="Reveal-icon-large-box f-light-blue">
                                <i class="ti-heart text-blue"></i>
                            </div>
                        </div>
                        <div class="Reveal-working-box-caption">
                            <h4>WE CARE, YOU HAPPY</h4>
                            <p>{{ $data->about->we_care_you_happy ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(count($data->hotels))
        <section class="gray" style="background: #F2F2F2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="sec-heading center">
                            <h3>Top Viewed <span class="theme-cl">Hotels</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                </div>
                {{--<div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                        <a href="" class="btn btn-light btn-md rounded">Explore More Hotels</a>
                    </div>
                </div>--}}
            </div>
        </section>
    @endif
@stop

@section('style')
    <link href="{{ asset('common/plugins/mapbox/css/mapbox-gl.css') }}" rel="stylesheet">
    <link href="{{ asset('common/plugins/mapbox/css/mapbox-gl-geocoder.css') }}" rel="stylesheet">
    <style>
        .hero-banner .Reveal-search-content input::-webkit-outer-spin-button,
        .hero-banner .Reveal-search-content input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .hero-banner .Reveal-search-content input[type=number] {
            -moz-appearance: textfield;
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
        .mapboxgl-ctrl-geocoder {
            width: 100%;
            max-width: unset;
        }
        .mapboxgl-ctrl-geocoder--input {
            border-radius: 5px;
            padding-left: 40px;
            height: 60px;
            background: #fff;
            border: 1px solid #e3e8f3;
            overflow: hidden;
            box-shadow: none;
            -webkit-box-shadow: none;
        }
        .mapboxgl-ctrl-geocoder--icon-search {
            left: 12px;
            width: 20px;
            height: 44px;
            fill: #a2a9bf;
        }
        .mapboxgl-ctrl-geocoder, .mapboxgl-ctrl-geocoder .suggestions {
            box-shadow: none;
        }
        .mapboxgl-ctrl-geocoder--icon-close {
            height: 43px;
            fill: #a2a9bf;
        }
        .mapboxgl-ctrl-geocoder--input::placeholder {
            color: #879AC3;
        }
        .qty span.gplus, .qty span.cplus,
        .qty span.gminus, .qty span.cminus {
            z-index: 0;
        }
    </style>
@stop

@section('script')
    <script src="{{ asset('common/plugins/mapbox/js/mapbox-gl.js') }}"></script>
    <script src="{{ asset('common/plugins/mapbox/js/mapbox-gl-geocoder.min.js') }}"></script>
    <script src="{{ asset('common/plugins/mapbox/js/es6-promise.min.js') }}"></script>
    <script src="{{ asset('common/plugins/mapbox/js/es6-promise.auto.min.js') }}"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoicmFraWJucjMwIiwiYSI6ImNrcGQ2cHZkejA5cXMyb3Q2enV0azFzZnEifQ.eh9EyKO8cga0v7usw-GacQ';
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            types: 'country,region,place,postcode,locality,neighborhood'
        });
        geocoder.addTo('#geocoder');

        // Add geocoder result to container.
        geocoder.on('result', function(e) {
            console.log(e.result.place_name);
        });

        // Clear results container when search is cleared.
        geocoder.on('clear', function() {
            results.innerText = '';
        });
    </script>

    <script>
        let loc = $('.mapboxgl-ctrl-geocoder--input');
        loc.attr('name', 'location');
        loc.attr('required', 'true');
        loc.val('{{ old('location') }}');
    </script>

    <script src="{{ asset('front/' . config('core.theme') . '/js/moment.min.js') }}"></script>
    <script src="{{ asset('front/' . config('core.theme') . '/js/daterangepicker.js') }}"></script>

    <script>
        $(function() {
            var start = moment().subtract(0, 'days');
            var end = moment().add(2, 'days');

            function cb(start, end) {
                $('#booking-date-search').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            cb(start, end);
            $('#booking-date-search').daterangepicker({
                "opens": "right",
                "autoUpdateInput": true,
                "alwaysShowCalendars": true,
                startDate: start,
                endDate: end
            }, cb);

            cb(start, end);
        });

        // Calendar animation and visual settings
        $('#booking-date-search').on('show.daterangepicker', function(ev, picker) {
            $('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
            $('.daterangepicker').removeClass('calendar-hidden');
        });
        $('#booking-date-search').on('hide.daterangepicker', function(ev, picker) {
            $('.daterangepicker').removeClass('calendar-visible');
            $('.daterangepicker').addClass('calendar-hidden');
        });

        $(window).on('load', function() {
            $('#booking-date-search').val('');
        });
    </script>
@stop
