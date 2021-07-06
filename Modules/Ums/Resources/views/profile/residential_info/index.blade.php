@extends('admin.layouts.master', ['active' => [1, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Residential Info</span> - Update
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
                    <a href="{{ route('backend.ums.profile-residential-info.index') }}" class="breadcrumb-item">
                        Residential Info
                    </a>
                    <span class="breadcrumb-item active">Update</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="d-md-flex align-items-md-start">
            @include('admin.partials._profile_sidebar', ['active' => 1])
            <div class="w-100">
                @include('admin.partials._alert')
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Residential information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.ums.profile-residential-info.update', [$userResidentialInfo->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country"
                                           class="@error('country') text-danger @enderror">Country</label>
                                    <input id="country" name="country"
                                           value="{{ old('country') ?: $userResidentialInfo->country }}"
                                           type="text"
                                           class="form-control @error('country') is-invalid @enderror"
                                           placeholder="Enter country" autofocus>
                                    @error('country')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="city" class="@error('city') text-danger @enderror">City/District</label>
                                    <input id="city" name="city"
                                           value="{{ old('city') ?: $userResidentialInfo->city }}"
                                           type="text"
                                           class="form-control @error('city') is-invalid @enderror"
                                           placeholder="Enter city" autofocus>
                                    @error('city')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="state"
                                           class="@error('state') text-danger @enderror">State/Division</label>
                                    <input id="state" name="state"
                                           value="{{ old('state') ?: $userResidentialInfo->state }}"
                                           type="text"
                                           class="form-control @error('state') is-invalid @enderror"
                                           placeholder="Enter state" autofocus>
                                    @error('state')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address_line_1"
                                           class="@error('address_line_1') text-danger @enderror">Present
                                        Address Line - 1</label>
                                    <input id="address_line_1" name="address_line_1"
                                           value="{{ old('address_line_1') ?: $userResidentialInfo->address_line_1 }}"
                                           type="text"
                                           class="form-control @error('address_line_1') is-invalid @enderror"
                                           placeholder="Enter present address line - 1" autofocus>
                                    @error('address_line_1')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address_line_2"
                                           class="@error('address_line_2') text-danger @enderror">Present
                                        Address Line - 2</label>
                                    <input id="address_line_2" name="address_line_2"
                                           value="{{ old('address_line_2') ?: $userResidentialInfo->address_line_2 }}"
                                           type="text"
                                           class="form-control @error('address_line_2') is-invalid @enderror"
                                           placeholder="Enter present address line - 2" autofocus>
                                    @error('address_line_2')
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
