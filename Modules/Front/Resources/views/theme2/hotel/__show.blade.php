@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover page-title" style="background:url({{ $data->hotel->feature_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">{{ $data->hotel->name }}</h2>
                </div>
            </div>
        </div>
    </div>

    @include('front.' . config('core.theme') . '.partials._alert')

    @if(count($data->hotel->getMedia(config('core.media_collection.hotel.slider_images'))))
        <div class="featured-slick" style="border-top: 3px solid #fff;">
            <div class="featured-slick-slide">
                @foreach($data->hotel->getMedia(config('core.media_collection.hotel.slider_images')) as $image)
                    <div>
                        <a href="{{ $image->getUrl() }}" class="mfp-gallery">
                            <div class="image" style="background-image: url({{ $image->getUrl() }})">

                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <section class="gray p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <div class="tr-list-detail dark">
                        <div class="tr-list-thumb">
                            <div class="image" style="background-image: url({{ $data->hotel->feature_image->file_url ?? config('core.image.' . config('core.theme') . '.default.preview_image') }})"></div>
                        </div>
                        <div class="tr-list-info">
                            <div class="cate-gorio">
                                <a href="javascript:void(0)">Hotel</a>
                            </div>
                            <h4 class="">
                                {{ $data->hotel->name }}
                            </h4>
                            <p>
                                <i class="ti-location-pin"></i>
                                {{ $data->hotel->location }}
                            </p>
                            <div class="tr-list-ratting">
                                <div class="ratting-group">
                                    Start from &nbsp; <span>${{ $data->hotel->cost_per_night }}</span> &nbsp; / Night
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="Reveal-block-wrap">
                        @if($data->hotel->about != '')
                            <div class="Reveal-block-header">
                                <h4 class="block-title">About This Hotel</h4>
                            </div>
                            <div class="Reveal-block-body">
                                {!! $data->hotel->about !!}
                            </div>
                        @endif
                    </div>

                    <div class="Reveal-block-wrap">
                        <div class="Reveal-block-header">
                            <h4 class="block-title">Hotel Key Facts</h4>
                        </div>
                        <div class="Reveal-block-body p-0 table-responsive">
                            <table class="item-pricing table mb-0">
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

                    <div class="Reveal-block-wrap">
                        @if($data->hotel->others_feature != '')
                            <div class="Reveal-block-header">
                                <h4 class="block-title">Others Features</h4>
                            </div>
                            <div class="Reveal-block-body">
                                {!! $data->hotel->others_feature !!}
                            </div>
                        @endif
                    </div>

                    {{--<div class="Reveal-block-wrap">
                        <div class="Reveal-block-header">
                            <h4 class="block-title">Ameneties</h4>
                        </div>
                        <div class="Reveal-block-body">
                            <ul class="avl-features third">
                                <li>Air Conditioning</li>
                                <li>Swimming Pool</li>
                                <li>Central Heating</li>
                                <li>Laundry Room</li>
                                <li>Gym</li>
                                <li>Alarm</li>
                                <li>Window Covering</li>
                                <li>Internet</li>
                                <li>Pets Allow</li>
                                <li>Free WiFi</li>
                                <li>Car Parking</li>
                                <li>Spa &amp; Massage</li>
                            </ul>
                        </div>
                    </div>--}}

                </div>

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="page-sidebar">
                        <div class="Reveal-side-widget">
                            <div class="Reveal-Reveal-side-widget-header dark green">
                                <h4>
                                    <i class="lni-timer"></i> Booking
                                </h4>
                            </div>

                            {!! Form::open(['url' => route('front.booking.store'), 'method' => 'booking']) !!}
                            <input type="hidden" name="hotel_id" value="{{ $data->hotel->id }}">
                            <div class="Reveal-Reveal-side-widget-body">
                                <div class="form-group">
                                    <div class="input-with-icon gray">
                                        <input type="text" class="form-control" name="times" placeholder="Check-In - Check-Out" id="booking-date-search" required>
                                        <i class="lni-calendar"></i>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Guest</label>
                                            <div class="Reveal-guest-picker gray">
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
                                            <div class="Reveal-guest-picker gray">
                                                <div class="qty">
                                                    <span class="cminus"><i class="ti-minus"></i></span>
                                                    <input type="number" class="children" name="child_qty" min="0" value="0" required>
                                                    <span class="cplus"><i class="ti-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-with-icon gray">
                                        <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-with-icon gray">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                        <i class="lni-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-with-icon gray">
                                        <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                                        <i class="ti-email"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-with-icon gray">
                                        <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                                        <i class="ti-mobile"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-with-icon gray">
                                        <input type="text" class="form-control" name="street_address" placeholder="Street Address" required>
                                        <i class="ti-map"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-with-icon gray">
                                        <input type="text" class="form-control" name="postal_code" placeholder="Postal Code" required>
                                        <i class="ti-arrow-circle-right"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-with-icon gray">
                                        <input type="text" class="form-control" name="city" placeholder="City" required>
                                        <i class="fa fa-building"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-with-icon gray">
                                        <input type="text" class="form-control" name="country" placeholder="Country" required>
                                        <i class="ti-flag"></i>
                                    </div>
                                </div>
                                <div class="hero-search-action">
                                    <button type="submit" class="btn search-btn">Request To Book</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .Reveal-guest-picker input::-webkit-outer-spin-button,
        .Reveal-guest-picker input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .Reveal-guest-picker input[type=number] {
            -moz-appearance: textfield;
        }
        .featured-slick .featured-slick-slide .image {
            height: 300px;
            max-height: 300px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .Reveal-block-wrap .Reveal-block-body ul {
            list-style: unset !important;
        }
        .tr-list-ratting .ratting-group span {
            font-size: 20px;
            color: #EA1B41;
            font-weight: 500;
        }
        .table tr th, .table tr td {
            padding: 12px 1.5rem;
        }
        .tr-list-detail .tr-list-thumb .image {
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            width: 90px;
            background-position: center;
        }
    </style>
@stop

@section('script')
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
                "opens": "left",
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
