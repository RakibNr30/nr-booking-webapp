@extends('admin.layouts.master', ['active' => [3, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Hotel</span> - Show
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.hotel.index') }}" class="breadcrumb-item">
                        Hotel
                    </a>
                    <span class="breadcrumb-item active">Show</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <!-- Left content -->
            <div class="w-100 overflow-auto order-2 order-md-1">
                <!-- Post -->
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="mb-3 text-center">
                                <a href="{{ $hotel->feature_image->file_url ?? config('core.image.' . config('core.theme') . '.default.preview_image') }}" class="d-inline-block">
                                    <img src="{{ $hotel->feature_image->file_url ?? config('core.image.' . config('core.theme') . '.default.preview_image') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <h5 class="font-weight-semibold mb-0">
                                <a href="" class="text-default">
                                    {{ $hotel->name }}
                                </a>
                            </h5>
                            <div class="mb-2">
                                {{ $hotel->location ?? '' }}
                            </div>

                            <ul class="list-inline list-inline-dotted text-muted mb-3">
                                <li class="list-inline-item">
                                    @if($hotel->is_open)
                                        <span style="color: mediumseagreen; font-weight: bold;">Open Now</span>
                                    @else
                                        <span style="color: red; font-weight: bold;">Open Now</span>
                                    @endif
                                </li>
                                <li class="list-inline-item">
                                    Start from <span style="font-size: 18px; color: #ff4a62;">${{ round($hotel->cost_per_night, 2) }}</span> / Night
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-eye mr-1"></i>
                                    {{ $hotel->view ?? 0 }}
                                </li>
                            </ul>

                            <h5 class="font-weight-bold">ABOUT THIS HOTEL</h5>
                            <div class="mb-3">
                                {!! $hotel->about ?? '' !!}
                            </div>

                            <h5 class="font-weight-bold">HOTEL KEY FACTS</h5>
                            <div class="table-responsive">
                                <table class="table w-100">
                                    @if(isset($hotel->room_type))
                                        <tr>
                                            <th>Room Type: </th>
                                            <td> -{{ $hotel->room_type }}</td>
                                        </tr>
                                    @endif
                                    @if(isset($hotel->board_type))
                                        <tr>
                                            <th>Board Type: </th>
                                            <td> -{{ $hotel->board_type }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>Arriving/Leaving: </th>
                                        <td>
                                            -Check in time starts at {{ $hotel->checkin_time }} <br>
                                            -Check out time is {{ $hotel->checkout_time }}
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            @if(isset($hotel->others_feature))
                                <h5 class="font-weight-bold">MORE FEATURES</h5>
                                <div class="mb-3">
                                    {!! $hotel->others_feature ?? '' !!}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
                <div class="sidebar-content">
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Top Viewed Hotels</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="media-list">
                                @foreach($hotelList as $index => $recentHotel)
                                    <li class="media">
                                        <div class="mr-3">
                                            <img src="{{ $recentHotel->feature_image->file_url ?? '' }}" class="rounded-circle" width="36" height="36" alt="">
                                        </div>

                                        <div class="media-body">
                                            <a href="{{ route('backend.cms.hotel.show', [$recentHotel->id]) }}" class="media-title">
                                                <div class="font-weight-semibold">
                                                    {{ $recentHotel->name }}
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
