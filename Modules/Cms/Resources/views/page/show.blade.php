@extends('admin.layouts.master', ['active' => [2, 4, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Page</span> - Show
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.page.index') }}" class="breadcrumb-item">
                        Page
                    </a>
                    <span class="breadcrumb-item active">Show</span>
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
                        <h5 class="card-name">Show Page</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group font-weight-bold">
                                    {{ $page->title ?? '' }}
                                </div>
                            </div>
                            @if(isset($page->feature_image))
                                <div class="col-md-4">
                                    <img src="{{ $page->feature_image->file_url }}" style="width: 100%">
                                </div>
                                <div class="col-md-8">
                                    {!! $page->description ?? '' !!}
                                </div>
                            @else
                                <div class="col-md-12">
                                    {!! $page->description ?? '' !!}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
