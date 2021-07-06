@extends('admin.layouts.master', ['active' => [5, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Admin</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.ums.admin.index') }}" class="breadcrumb-item">
                        Admin
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
                        <h5 class="card-first_name">Update Admin</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.ums.admin.update', [$user->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="@error('first_name') text-danger @enderror">First Name</label>
                                    <input id="first_name" name="first_name" value="{{ old('first_name') ?? $user->personalInfo->first_name }}"
                                           type="text" class="form-control @error('first_name') is-invalid @enderror"
                                           placeholder="Enter first name" autofocus>
                                    @error('first_name')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" class="@error('last_name') text-danger @enderror">Last Name</label>
                                    <input id="last_name" name="last_name" value="{{ old('last_name') ?? $user->personalInfo->last_name }}"
                                           type="text" class="form-control @error('last_name') is-invalid @enderror"
                                           placeholder="Enter last name" autofocus>
                                    @error('last_name')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="@error('email') text-danger @enderror">E-mail</label>
                                    <input id="email" name="email" value="{{ old('email') ?? $user->email }}"
                                           type="text" class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Enter email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender" class="@error('gender') text-danger @enderror">Gender</label>
                                    <select id="gender" name="gender" type="text" class="form-control form-control-select2 @error('gender') is-invalid @enderror" autofocus>
                                        <option value="">Select gender</option>
                                        @foreach(config('core.genders') as $key => $gender)
                                            <option value="{{ $key }}" {{ $user->personalInfo->gender == $key ? 'selected' : '' }}>{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob" class="@error('dob') text-danger @enderror">Date of Birth</label>
                                    <input id="dob" name="dob" value="{{ old('dob') ?? $user->personalInfo->dob }}"
                                           type="text" class="form-control datepicker @error('dob') is-invalid @enderror"
                                           placeholder="Enter date of birth" autofocus>
                                    @error('dob')
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
