@extends('admin.layouts.master', ['active' => [1, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Password</span> - Update
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
                    <a href="{{ route('backend.ums.profile-password-change.index') }}" class="breadcrumb-item">
                        Password
                    </a>
                    <span class="breadcrumb-item active">Update</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="d-md-flex align-items-md-start">
            @include('admin.partials._profile_sidebar', ['active' => 3])
            <div class="w-100">
                @include('admin.partials._alert')
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Password Change</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.ums.profile-password-change.update', [$user->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="old_password" class="@error('old_password') text-danger @enderror">Old Password</label>
                                    <input id="old_password" name="old_password"
                                           type="Password"
                                           class="form-control @error('old_password') is-invalid @enderror"
                                           placeholder="Enter old password" autofocus>
                                    @error('old_password')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="@error('password') text-danger @enderror">Password</label>
                                    <input id="password" name="password"
                                           type="Password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Enter password" autofocus>
                                    @error('password')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="repeat_password" class="@error('repeat_password') text-danger @enderror">Re-type Password</label>
                                    <input id="repeat_password" name="repeat_password"
                                           type="Password" class="form-control @error('repeat_password') is-invalid @enderror"
                                           placeholder="Re-type password" autofocus>
                                    @error('repeat_password')
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
    </div>
@stop
