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
    <div class="image-cover page-title" style="background:url({{ $data->hotel->feature_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">{{ $data->hotel->name }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{--@if(count($data->hotel->getMedia(config('core.media_collection.hotel.slider_images'))))
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
    @endif--}}

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
                    @include('front.' . config('core.theme') . '.partials._alert')
                    {!! Form::open(['url' => route('front.booking.store'), 'method' => 'booking']) !!}
                    <div class="add-listing-form form-submit">
                        <input type="hidden" name="hotel_id" value="{{ $data->hotel->id }}">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4>
                                    Billing information
                                </h4>
                            </div>
                            <div class="Reveal-other-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="street_address" placeholder="Street Address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="postal_code" placeholder="Postal Code" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="city" placeholder="City" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="country" placeholder="Country" required>
                                </div>
                            </div>
                        </div>
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4>
                                    Payment information
                                </h4>
                            </div>
                            <div class="Reveal-other-body">
                                <h5>Your Payment Total: ${{ round($total, 2) }}</h5>
                                <span>The booking amount will be debited from your credit card once the booking is completed.</span>
                                <div class="form-group pt-3">
                                    <input type="text" class="form-control" name="cardholder_name" placeholder="Cardholder's Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="card_number" placeholder="Card Number" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="expiry_date" placeholder="Expiry Date" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ccv" placeholder="CCV/CCV" required>
                                </div>
                                <button class="btn btn-theme btn-md full-width" type="submit">Book Now</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="page-sidebar">
                        <div class="Reveal-side-widget">
                            <div class="Reveal-Reveal-side-widget-header dark green">
                                <h4>
                                   {{ $data->hotel->name ?? '' }}
                                </h4>
                            </div>

                            <div class="Reveal-Reveal-side-widget-body">
                                <div>
                                    <h5>WHEN</h5>
                                    <hr style="border-color: #2D3954;">
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
                                    <hr style="border-color: #2D3954;">
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
                                    <hr style="border-color: #2D3954;">
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
                                    <hr style="border-color: #2D3954;">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <h4>
                                                <span class="left">TOTAL</span>
                                            </h4>
                                        </div>
                                        <div class="col-6 text-right">
                                            <h4>
                                                <span class="right">${{ round($total, 2)  }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
        .Reveal-Reveal-side-widget-body span.left {
            font-weight: 500;
        }
        .Reveal-Reveal-side-widget-body span.right {
            font-weight: 400;
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
