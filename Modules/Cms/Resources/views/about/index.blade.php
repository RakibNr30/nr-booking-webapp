@extends('admin.layouts.master', ['active' => [2, 1, 0]])
@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Why Us</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.why-us.index') }}" class="breadcrumb-item">
                        Why Us
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
                        <h5 class="card-title">Update Why Us</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.cms.why-us.update', [$about->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="quality_assured" class="@error('quality_assured') text-danger @enderror">Quality Assured</label>
                                    <textarea id="quality_assured" name="quality_assured" class="form-control @error('quality_assured') is-invalid @enderror" rows="3"
                                              placeholder="Enter quality_assured us">{{ old('quality_assured') ?? $about->quality_assured }}</textarea>
                                    @error('quality_assured')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="hotel_search" class="@error('hotel_search') text-danger @enderror">Hotel Search</label>
                                    <textarea id="hotel_search" name="hotel_search" class="form-control @error('hotel_search') is-invalid @enderror" rows="3"
                                              placeholder="Enter hotel search">{{ old('hotel_search') ?? $about->hotel_search }}</textarea>
                                    @error('hotel_search')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="we_care_you_happy" class="@error('we_care_you_happy') text-danger @enderror">We Care, You Happy</label>
                                    <textarea id="we_care_you_happy" name="we_care_you_happy" class="form-control @error('we_care_you_happy') is-invalid @enderror" rows="3"
                                              placeholder="Enter we care you happy">{{ old('we_care_you_happy') ?? $about->we_care_you_happy }}</textarea>
                                    @error('we_care_you_happy')
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
