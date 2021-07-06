@extends('admin.layouts.master', ['active' => [0, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Dashboard</span>
                </h4>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body bg-blue-400 has-bg-image">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-0">{{ $data->counter->totalAdmin ?? 0 }}</h3>
                            <span class="text-uppercase font-size-xs">Total Admin</span>
                        </div>
                        <div class="ml-3 align-self-center">
                            <i class="flaticon-running icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
@stop

@section('script')
@stop

@section('chart_script')
@stop
