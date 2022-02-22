@extends('front.' . config('core.theme') .'.layouts.master')

@section('title')
@stop

@section('content')
    <section id="hero-area" class="parallax-search welcome-area overlay" data-stellar-background-ratio="0.5" style="background:url({{ $data->banner->image->file_url ?? config('core.image.' . config('core.theme') . '.default.banner_image') }}) no-repeat;">
        <div class="hero-main">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-inner">
                            <div class="col-12">
                                <div class="banner-search-wrap" data-aos="zoom-in">
                                    <div class="rld-main-search">
                                        <div class="col-12 mb-2">
                                            <h1>Explore a Hotel</h1>
                                        </div>
                                        {!! Form::open(['url' => route('front.hotel.search'), 'method' => 'get']) !!}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="rld-single-input">
                                                    <div id="geocoder"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="rld-single-input">
                                                    <input type="number" name="guest_qty" placeholder="Guest" min="1" value="1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="rld-single-input">
                                                    <input type="number" name="child_qty" placeholder="Child" min="0" value="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="rld-single-select">
                                                    <div class="main-search-input-item clact date-container">
                                                        <input type="text" class="select single-select text-center" placeholder="Check in & out" name="check_time" id="booking-date-search" value="" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="">
                                                    <button type="submit" class="btn btn-yellow">Search Now</button>
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="container">
            <div class="sec-title">
                <h2><span>Why </span>Us?</h2>
            </div>
            <div class="row service-1">
                <article class="col-lg-4 col-md-6 col-xs-12 serv">
                    <div class="serv-flex" data-aos="zoom-in">
                        <div class="art-1 img-13">
                            <i class="fa fa-bar-chart"></i>
                            <h3>QUALITY ASSURED</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">
                                {{ $data->about->quality_assured ?? '' }}
                            </p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv">
                    <div class="serv-flex" data-aos="zoom-in">
                        <div class="art-1 img-14">
                            <i class="fa fa-search"></i>
                            <h3>HOTEL SEARCH</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">
                                {{ $data->about->hotel_search ?? '' }}
                            </p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt">
                    <div class="serv-flex arrow" data-aos="zoom-in">
                        <div class="art-1 img-15">
                            <i class="fa fa-heart-o"></i>
                            <h3>WE CARE, YOU HAPPY</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">
                                {{ $data->about->we_care_you_happy ?? '' }}
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    @if(count($data->hotels))
        <section class="popular listings portfolio bg-gray">
        <div class="container">
            <div class="sec-title">
                <h2><span>Top Viewed </span>Hotels</h2>
            </div>
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
        </div>
    </section>
    @endif
@stop

@section('style')
    <link href="{{ asset('common/plugins/mapbox/css/mapbox-gl.css') }}" rel="stylesheet">
    <link href="{{ asset('common/plugins/mapbox/css/mapbox-gl-geocoder.css') }}" rel="stylesheet">
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
        .how-it-works .serv-flex {
            color: #004680;
        }
        .btn-yellow {
            background: #004680;
        }
        .mapboxgl-ctrl-geocoder {
            width: 100%;
            max-width: unset;
        }
        .mapboxgl-ctrl-geocoder--input {
            border-radius: 5px;
            padding-left: 36px !important;
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
            height: 32px;
            fill: #a2a9bf;
        }
        .mapboxgl-ctrl-geocoder, .mapboxgl-ctrl-geocoder .suggestions {
            box-shadow: none;
        }
        .mapboxgl-ctrl-geocoder--icon-close {
            height: 28px;
            fill: #a2a9bf;
        }
        .mapboxgl-ctrl-geocoder--input::placeholder {
            padding-left: 0;
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
        loc.attr('placeholder', 'Enter Location');
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
    </script>
@stop
