@extends('admin.layouts.master', ['active' => [4, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Booking</span>
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <span class="breadcrumb-item active">Booking</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-lg-12">
            @include('admin.partials._alert')
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Booking List</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a href="{{ route('backend.cms.booking.create') }}" class="btn btn-info text-white">Export as CSV</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        {!! $dataTable->table(['class' => 'table table-hover', 'style' => 'width: 100%;']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
    <link rel="stylesheet" href="{{ asset('common/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('script')
    <script src="{{ asset('common/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('common/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('common/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('common/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('common/plugins/datatables-ssr/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
    <script src="{{ asset('admin/local/js/datatable.init.js') }}"></script>
@stop
