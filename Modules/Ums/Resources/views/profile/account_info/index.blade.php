@extends('admin.layouts.master', ['active' => [1, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Account Info</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.ums.profile-personal-info.index') }}" class="breadcrumb-item">
                        Profile
                    </a>
                    <a href="{{ route('backend.ums.profile-account-info.index') }}" class="breadcrumb-item">
                        Account Info
                    </a>
                    <span class="breadcrumb-item active">Update</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="d-md-flex align-items-md-start">
            @include('admin.partials._profile_sidebar', ['active' => 2])
            <div class="w-100">
                @include('admin.partials._alert')
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Account information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.ums.profile-account-info.update', [$user->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email"
                                           class="@error('email') text-danger @enderror">E-mail</label>
                                    <input id="email" name="email"
                                           value="{{ old('email') ?: $user->email }}"
                                           type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Enter email" autofocus readonly>
                                    @error('email')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="col-md-12">
                                <div class="form-group">
                                    <label for="strava_id"
                                           class="@error('strava_id') text-danger @enderror">Strava Id</label>
                                    <input id="strava_id" name="strava_id"
                                           value="{{ old('strava_id') ?: $user->strava_id }}"
                                           type="text"
                                           class="form-control @error('strava_id') is-invalid @enderror"
                                           placeholder="Enter strava id" autofocus readonly>
                                    @error('strava_id')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>--}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mobile" class="@error('mobile') text-danger @enderror">Mobile</label>
                                    <input id="mobile" name="mobile"
                                           value="{{ old('mobile') ?: $user->mobile }}"
                                           type="text"
                                           class="form-control @error('mobile') is-invalid @enderror"
                                           placeholder="Enter mobile" autofocus>
                                    @error('mobile')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="avatar" class="@error('avatar') text-danger @enderror">Avatar</label>
                                    <div class="uniform-uploader">
                                        <input id="avatar" name="avatar" value="{{ old('avatar') }}" type="file" class="form-control form-input-styled @error('avatar') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($user->avatar))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $user->avatar->file_url }}">
                                                <img src="{{ $user->avatar->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
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
    </div>
@stop
