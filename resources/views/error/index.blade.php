@extends('error.layouts.master')

@section('title')
    {{ $status_code }}
@stop

@section('content')
    <div class="content d-flex justify-content-center align-items-center">
        <div class="flex-fill">
            <div class="text-center mb-3">
                <h1 class="error-title">
                    {{ $status_code ?? 0 }}
                </h1>
                <h5 style="margin-bottom: 40px">
                    {{ $status ?? '' }}
                </h5>
            </div>
            <div class="row">
                <div class="col-xl-4 offset-xl-4 col-md-8 offset-md-2">
                    <div class="row">
                        {{--<div class="col-sm-6">
                            <a href="{{ route('backend.cms.dashboard.index') }}" class="btn btn-primary btn-block"><i class="icon-menu7 mr-2"></i> Dashboard</a>
                        </div>--}}
                        <div class="col-sm-6 m-auto">
                            <a href="{{ route('front.index') }}" class="btn btn-primary btn-block mt-3 mt-sm-0"><i class="icon-home4 mr-2"></i> Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
