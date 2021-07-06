@extends('admin.layouts.master', ['active' => [6, 3, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Api</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.setting.contact.index') }}" class="breadcrumb-item">
                        Api
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
                        <h5 class="card-title">Update Api</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['url' => route('backend.setting.api.update', [$api->id]), 'method' => 'put']) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="font-weight-bold">PayPal API credentials (Sandbox Mode)</h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sandbox_username" class="@error('sandbox_username') text-danger @enderror">Username</label>
                                            <input id="sandbox_username" name="sandbox_username" value="{{ old('sandbox_username') ?: $api->sandbox_username }}" type="text" class="form-control @error('sandbox_username') is-invalid @enderror" placeholder="Enter username" autofocus>
                                            @error('sandbox_username')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sandbox_password" class="@error('sandbox_password') text-danger @enderror">Password</label>
                                            <input id="sandbox_password" name="sandbox_password" value="{{ old('sandbox_password') ?: $api->sandbox_password }}" type="text" class="form-control @error('sandbox_password') is-invalid @enderror" placeholder="Enter password" autofocus>
                                            @error('sandbox_password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sandbox_secret" class="@error('secret') text-danger @enderror">Secret/ Signature</label>
                                            <input id="sandbox_secret" name="sandbox_secret" value="{{ old('sandbox_secret') ?: $api->sandbox_secret }}" type="text" class="form-control @error('sandbox_secret') is-invalid @enderror" placeholder="Enter secret" autofocus>
                                            @error('sandbox_secret')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sandbox_certificate" class="@error('sandbox_certificate') text-danger @enderror">Certificate</label>
                                            <input id="sandbox_certificate" name="sandbox_certificate" value="{{ old('sandbox_certificate') ?: $api->sandbox_certificate }}" type="text" class="form-control @error('sandbox_certificate') is-invalid @enderror" placeholder="Enter certificate" autofocus>
                                            @error('sandbox_certificate')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sandbox_app_id" class="@error('sandbox_app_id') text-danger @enderror">App Id</label>
                                            <input id="sandbox_app_id" name="sandbox_app_id" value="{{ old('sandbox_app_id') ?: $api->sandbox_app_id }}" type="text" class="form-control @error('sandbox_app_id') is-invalid @enderror" placeholder="Enter app id" autofocus>
                                            @error('sandbox_app_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="currency" class="@error('currency') text-danger @enderror">Currency</label>
                                            <input id="currency" name="currency" value="{{ $api->currency ?? 'EUR' }}" type="text" class="form-control @error('currency') is-invalid @enderror" placeholder="Enter currency" readonly autofocus>
                                            @error('currency')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="font-weight-bold">Stripe API credentials</h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="stripe_key" class="@error('stripe_key') text-danger @enderror">Client Id</label>
                                            <input id="stripe_key" name="stripe_key" value="{{ old('stripe_key') ?: $api->stripe_key }}" type="text" class="form-control @error('stripe_key') is-invalid @enderror" placeholder="Enter client id" autofocus>
                                            @error('stripe_key')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="stripe_secret" class="@error('stripe_secret') text-danger @enderror">Stripe Key</label>
                                            <input id="stripe_secret" name="stripe_secret" value="{{ old('stripe_secret') ?: $api->stripe_secret }}" type="text" class="form-control @error('stripe_secret') is-invalid @enderror" placeholder="Enter client secret" autofocus>
                                            @error('stripe_secret')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
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
