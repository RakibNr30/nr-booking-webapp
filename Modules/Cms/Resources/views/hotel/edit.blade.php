@extends('admin.layouts.master', ['active' => [3, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Hotel</span> - Update
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
                    <span class="breadcrumb-item active">Update</span>
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
                        <h5 class="card-name">Update Hotel</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.cms.hotel.update', [$hotel->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="@error('name') text-danger @enderror">Name of Hotel</label>
                                    <input id="name" name="name" value="{{ old('name') ?? $hotel->name }}"
                                           type="text" class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Enter name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="continent" class="@error('continent') text-danger @enderror">Continent</label>
                                    <select id="continent" name="continent"
                                            class="form-control @error('continent') is-invalid @enderror">
                                        <option value="">Select Blood Group</option>
                                        @foreach(config('core.continents') as $continent_key => $continent)
                                            <option value="{{ $continent_key }}" {{ $continent_key == $hotel->continent ? 'selected' : '' }}>{{ $continent }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('continent')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="location" class="@error('location') text-danger @enderror">Location</label>
                                    <div id="geocoder"></div>
                                    {{--<input id="location" name="location" value="{{ old('location') ?? $hotel->location }}"
                                           type="text" class="form-control @error('location') is-invalid @enderror"
                                           placeholder="Enter location" autofocus>--}}
                                    @error('location')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about" class="@error('about') text-danger @enderror">About Hotel</label>
                                    <textarea id="about" name="about" class="form-control ck-text-editor @error('about') is-invalid @enderror" rows="3"
                                              placeholder="Enter about">{{ old('about') ?? $hotel->about }}</textarea>
                                    @error('about')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="room_type" class="@error('room_type') text-danger @enderror">Room Type</label>
                                    <input id="room_type" name="room_type" value="{{ old('room_type') ?? $hotel->room_type }}"
                                           type="text" class="form-control @error('room_type') is-invalid @enderror"
                                           placeholder="Enter room type" autofocus>
                                    @error('room_type')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="board_type" class="@error('board_type') text-danger @enderror">Board Type</label>
                                    <input id="board_type" name="board_type" value="{{ old('board_type') ?? $hotel->board_type }}"
                                           type="text" class="form-control @error('board_type') is-invalid @enderror"
                                           placeholder="Enter board type" autofocus>
                                    @error('board_type')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="checkin_time" class="@error('checkin_time') text-danger @enderror">Check In Time</label>
                                    <input id="checkin_time" name="checkin_time" value="{{ old('checkin_time') ?? $hotel->checkin_time }}"
                                           type="text" class="form-control timepicker @error('checkin_time') is-invalid @enderror"
                                           placeholder="Enter check in time" autofocus>
                                    @error('checkin_time')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="checkout_time" class="@error('checkout_time') text-danger @enderror">Check Out Time</label>
                                    <input id="checkout_time" name="checkout_time" value="{{ old('checkout_time') ?? $hotel->checkout_time }}"
                                           type="text" class="form-control timepicker @error('checkout_time') is-invalid @enderror"
                                           placeholder="Enter checkout time" autofocus>
                                    @error('checkout_time')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cost_per_night" class="@error('cost_per_night') text-danger @enderror">Cost Per Night (USD)</label>
                                    <input id="cost_per_night" name="cost_per_night" value="{{ old('cost_per_night') ?? $hotel->cost_per_night }}"
                                           type="number" min="0" step="any" class="form-control @error('cost_per_night') is-invalid @enderror"
                                           placeholder="Enter cost_per_night" autofocus>
                                    @error('cost_per_night')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="feature_image" class="@error('feature_image') text-danger @enderror">Feature Image</label>
                                    <div class="uniform-uploader">
                                        <input id="feature_image" name="feature_image" value="{{ old('feature_image') }}" type="file" class="form-control form-input-styled @error('feature_image') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($hotel->feature_image))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $hotel->feature_image->file_url }}">
                                                <img src="{{ $hotel->feature_image->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('feature_image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slider_images" class="@error('slider_images') text-danger @enderror">Slider Images</label>
                                    <div class="uniform-uploader">
                                        <input id="slider_images" name="slider_images[]" value="{{ old('slider_images') }}" type="file" class="form-control form-input-styled @error('slider_images') is-invalid @enderror" data-fouc="" multiple>
                                    </div>
                                    @error('slider_images')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="others_feature" class="@error('others_feature') text-danger @enderror">Others Feature</label>
                                    <textarea id="others_feature" name="others_feature" class="form-control ck-text-editor @error('others_feature') is-invalid @enderror" rows="3"
                                              placeholder="Enter others_feature">{{ old('others_feature') ?? $hotel->others_feature }}</textarea>
                                    @error('others_feature')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-name">Slider Images</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @if(count($hotel->getMedia(config('core.media_collection.hotel.slider_images'))))
                            <div class="featured-slick" style="border-top: 3px solid #fff;">
                                <div class="featured-slick-slide">
                                    <div>
                                        <ul>
                                            @foreach($hotel->getMedia(config('core.media_collection.hotel.slider_images')) as $image)
                                                <li>
                                                    <a href="{{ $image->getUrl() }}" target="_blank" class="mfp-gallery">
                                                        <img src="{{ $image->getUrl() }}" class="image" alt="" style="height: 100px">
                                                    </a>

                                                    {!! Form::open(['url' => route('backend.cms.hotel.remove-image', [$image]), 'method' => 'post']) !!}
                                                    <button type="submit" class="btn custom-btn bg-danger">Remove</button>
                                                    {!! Form::close() !!}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
    <link href="{{ asset('common/plugins/mapbox/css/mapbox-gl.css') }}" rel="stylesheet">
    <link href="{{ asset('common/plugins/mapbox/css/mapbox-gl-geocoder.css') }}" rel="stylesheet">
    <style>
        .featured-slick .featured-slick-slide ul {
            list-style: none;
            float: left;
        }
        .featured-slick .featured-slick-slide ul li {
            float: left;
            margin: 5px;
        }
        .featured-slick .featured-slick-slide ul li button.custom-btn {
            display: block;
            width: 100%;
            padding: 3px 5px;
            text-align: center;
            border-radius: 0;
        }
        .mapboxgl-ctrl-geocoder {
            width: 100%;
            max-width: unset;
        }
        .mapboxgl-ctrl-geocoder--input {
            border-radius: 5px;
            padding-left: 40px;
            background: #fff;
            border: 1px solid #e3e8f3;
            overflow: hidden;
            box-shadow: none;
            -webkit-box-shadow: none;
        }
        .mapboxgl-ctrl-geocoder, .mapboxgl-ctrl-geocoder .suggestions {
            box-shadow: none;
        }
    </style>
@stop

@section('script_bottom')
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
        loc.attr('placeholder', 'Enter location');
        loc.addClass('form-control @error("location") is-invalid @enderror');
        loc.val('{{ old('location') ?? $hotel->location }}')
    </script>
@stop
