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
                        </div>
                    </div>
                    <div class="property-location mp">
                        @include('front.' . config('core.theme') . '.partials._alert')
                        {!! Form::open(['url' => route('front.booking.store'), 'method' => 'booking']) !!}
                        <input type="hidden" name="hotel_id" value="{{ $data->hotel->id }}">
                        <div class="single-add-property">
                            <h3>Billing Information</h3>
                            <div class="property-form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <p>
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p>
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb first">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb last">
                                            <label>Mobile</label>
                                            <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb first">
                                            <label>Street Address</label>
                                            <input type="text" class="form-control" name="street_address" placeholder="Street Address" required>
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb last">
                                            <label>Postal Code</label>
                                            <input type="text" class="form-control" name="postal_code" placeholder="Postal Code" required>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb first">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" placeholder="City" required>
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb last">
                                            <label>Country</label>
                                            <input type="text" class="form-control" name="country" placeholder="Country" required>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-add-property">
                            <h3>Payment Information</h3>
                            <h6 style="font-size: 20px">Your Payment Total: ${{ round($total, 2) }}</h6>
                            <span>The booking amount will be debited from your credit card once the booking is completed.</span>
                            <div class="property-form-group" style="margin-top: 20px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            <label>Cardholder Name</label>
                                            <input type="text" class="form-control" name="cardholder_name" placeholder="Cardholder's Name" required>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p>
                                            <label>Card Number</label>
                                            <input type="text" class="form-control" name="card_number" placeholder="Card Number" required>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="no-mb first">
                                            <label>Expiry Date</label>
                                            <input type="text" class="form-control" name="expiry_date" placeholder="Expiry Date" required>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="no-mb last">
                                            <label>CCV/CCV</label>
                                            <input type="text" class="form-control" name="ccv" placeholder="CCV/CCV" required>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="add-property-button pt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="prperty-submit-button">
                                            <button type="submit">Book Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
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
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .rating-box .detail-list-rating span {
            font-size: 20px;
            color: #004680;
            font-weight: 500;
        }
        .blog-info.details .about ul,
        .blog-info.details .about ul li {
            list-style: unset;
        }
        section.listing.details {
            padding: 3rem 0;
        }
        .inner-pages .property-form-group {
            padding: unset;
        }
        .inner-pages .property-form-group p input {
            border: 1px solid #ddd !important;
        }
        .inner-pages .single-add-property > h3 {
            margin-bottom: 20px;
        }
    </style>
@stop

@section('script')
@stop
