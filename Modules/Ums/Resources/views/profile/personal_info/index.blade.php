@extends('admin.layouts.master', ['active' => [1, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Personal Info</span> - Update
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
                    <a href="{{ route('backend.ums.profile-personal-info.index') }}" class="breadcrumb-item">
                        Personal Info
                    </a>
                    <span class="breadcrumb-item active">Update</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="d-md-flex align-items-md-start">
            @include('admin.partials._profile_sidebar', ['active' => 0])
            <div class="w-100">
                @include('admin.partials._alert')
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Personal information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.ums.profile-personal-info.update', [$userPersonalInfo->id]), 'method' => 'put', 'files' => true]) !!}
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="@error('first_name') text-danger @enderror">First
                                        Name</label>
                                    <input id="first_name" name="first_name"
                                           value="{{ old('first_name') ?: $userPersonalInfo->first_name }}"
                                           type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           placeholder="Enter first name" autofocus>
                                    @error('first_name')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" class="@error('last_name') text-danger @enderror">Last
                                        Name</label>
                                    <input id="last_name" name="last_name"
                                           value="{{ old('last_name') ?: $userPersonalInfo->last_name }}"
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
                                    <label for="gender"
                                           class="@error('gender') text-danger @enderror">Gender</label>
                                    <select id="gender" name="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                        <option value="">Select Gender</option>
                                        @foreach(config('core.genders') as $gender_key => $gender)
                                            <option
                                                    value="{{ $gender_key }}" {{ $gender_key == $userPersonalInfo->gender ? 'selected' : '' }}>{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation" class="@error('designation') text-danger @enderror">Designation</label>
                                    <input id="designation" name="designation"
                                           value="{{ old('designation') ?: $userPersonalInfo->designation }}"
                                           type="text" class="form-control @error('designation') is-invalid @enderror"
                                           placeholder="Enter designation" autofocus>
                                    @error('designation')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about" class="@error('about') text-danger @enderror">About</label>
                                    <textarea id="about" name="about" rows="3"
                                              class="form-control @error('about') is-invalid @enderror"
                                              placeholder="Enter about yourself">{{ old('about') ?: $userPersonalInfo->about }}</textarea>
                                    @error('about')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="personal_email"
                                           class="@error('personal_email') text-danger @enderror">Personal
                                        Email</label>
                                    <input id="personal_email" name="personal_email"
                                           value="{{ old('personal_email') ?: $userPersonalInfo->personal_email }}"
                                           type="text"
                                           class="form-control @error('personal_email') is-invalid @enderror"
                                           placeholder="Enter personal email" autofocus>
                                    @error('personal_email')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile_no" class="@error('mobile_no') text-danger @enderror">Mobile
                                        No</label>
                                    <input id="mobile_no" name="mobile_no"
                                           value="{{ old('mobile_no') ?: $userPersonalInfo->mobile_no }}"
                                           type="text" class="form-control @error('mobile_no') is-invalid @enderror"
                                           placeholder="Enter mobile no" autofocus>
                                    @error('mobile_no')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob" class="@error('dob') text-danger @enderror">Date of
                                        Birth</label>
                                    <input id="dob" name="dob" value="{{ old('dob') ?: $userPersonalInfo->dob }}"
                                           type="text" class="form-control datepicker @error('dob') is-invalid @enderror"
                                           placeholder="Enter date of birth" autofocus>
                                    @error('dob')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blood_group" class="@error('blood_group') text-danger @enderror">Blood
                                        Group</label>
                                    <select id="blood_group" name="blood_group"
                                            class="form-control @error('blood_group') is-invalid @enderror">
                                        <option value="">Select Blood Group</option>
                                        @foreach(config('core.blood_groups') as $blood_group_key => $blood_group)
                                            <option value="{{ $blood_group_key }}" {{ $blood_group_key == $userPersonalInfo->blood_group ? 'selected' : '' }}>{{ $blood_group }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('blood_group')
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
