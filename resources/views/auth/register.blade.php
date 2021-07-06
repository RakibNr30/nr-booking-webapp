@extends('auth.layouts.master')
@section('title')
    Register
@stop
@section('content')
    <div class="content d-flex justify-content-center align-items-center">
        {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'flex-fill']) !!}
        <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Create account</h5>
                                <span class="d-block text-muted">All fields are required</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name" autofocus>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-control-feedback">
                                            <i class="icon-user-plus text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name" autofocus>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-control-feedback">
                                            <i class="icon-user-plus text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <select id="gender" class="form-control gender @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" autofocus>
                                            <option value="">Gender</option>
                                            @foreach(config('core.genders') as $key => $gender)
                                                <option value="{{ $key }}" {{ old('gender') == $gender ? 'selected' : '' }}>{{ $gender }}</option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-control-feedback">
                                            <i class="fa fa-transgender text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-control-feedback">
                                            <i class="icon-mention text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <input id="strava_id" type="text" class="form-control @error('strava_id') is-invalid @enderror" name="strava_id" value="{{ old('strava_id') }}" required autocomplete="strava_id" placeholder="Strava ID" autofocus>
                                        @error('strava_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-control-feedback">
                                            <i class="fab fa-strava text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-control-feedback">
                                            <i class="icon-user-lock text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                        <div class="form-control-feedback">
                                            <i class="icon-user-check text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
                                        Accept <a href="#">terms of service</a>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b> Create account</button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}

    </div>
@stop

@section('style')
    <style>
        .uniform-select span {
            color: #999;
        }
        .uniform-select span:after {
            content: '';
        }
        .form-control.gender {
            color: #999;
        }
    </style>
@stop

@section('script')
@stop
