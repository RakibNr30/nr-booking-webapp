@extends('admin.layouts.master', ['active' => [4, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Booking</span> - Show
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.booking.index') }}" class="breadcrumb-item">
                        Booking
                    </a>
                    <span class="breadcrumb-item active">Show</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('admin.partials._alert')
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-name">Show Booking</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a href="{{ route('backend.cms.booking.export', [$booking->id]) }}" class="btn btn-info text-white">Export as CSV</a>
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Hotel</th>
                                            <td>
                                                @if(isset($hotel))
                                                    <a href="{{ route('backend.cms.hotel.show', [$hotel->id]) }}">
                                                        {{ $hotel->name }}
                                                    </a>
                                                @else
                                                    <span class="text-danger">Not Available</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Full Name</th>
                                            <td>{{ $booking->full_name ?? '' }}</td>
                                        </tr>
                                        @if($booking->last_name)
                                            <tr>
                                                <th>Last Name</th>
                                                <td>{{ $booking->last_name ?? '' }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>E-Mail</th>
                                            <td>{{ $booking->email ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td>{{ $booking->mobile ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Street Address</th>
                                            <td>{{ $booking->street_address ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Postal Code</th>
                                            <td>{{ $booking->postal_code ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>{{ $booking->city ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>{{ $booking->country ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Cardholder Name</th>
                                            <td>{{ $booking->cardholder_name ?? 0 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Card Number</th>
                                            <td>{{ $booking->card_number ?? 0 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Expiry Date</th>
                                            <td>{{ $booking->expiry_date ?? 0 }}</td>
                                        </tr>
                                        <tr>
                                            <th>CCV</th>
                                            <td>{{ $booking->ccv ?? 0 }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
    <style>
        .table td, .table th {
            padding: 0.5rem 0;
        }

        .table th {
            padding-right: 0.5rem;
        }
        .table td {
            padding-left: 0.5rem;
        }
    </style>
@stop
