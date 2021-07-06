@extends('admin.layouts.master', ['active' => [6, 2, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Seo</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.setting.seo.index') }}" class="breadcrumb-item">
                        Seo
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
                        <h5 class="card-title">Update Seo</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['url' => route('backend.setting.seo.update', [$seo->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_title" class="@error('meta_title') text-danger @enderror">Meta Title</label>
                                    <input id="meta_title" name="meta_title" value="{{ old('meta_title') ?: $seo->meta_title }}" type="text" class="form-control @error('meta_title') is-invalid @enderror" placeholder="Enter meta title" autofocus>
                                    @error('meta_title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_description" class="@error('meta_description') text-danger @enderror">Meta Description</label>
                                    <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter meta description">{{ old('meta_description') ?: $seo->meta_description }}</textarea>
                                    @error('meta_description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_type" class="@error('meta_type') text-danger @enderror">Meta Type</label>
                                    <input id="meta_type" name="meta_type" value="{{ old('meta_type') ?: $seo->meta_type }}" type="text" class="form-control @error('meta_type') is-invalid @enderror" placeholder="Enter meta type" autofocus>
                                    @error('meta_type')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_tags" class="@error('meta_tags') text-danger @enderror">Meta Tags</label>
                                    <input id="meta_tags" name="meta_tags" value="{{ old('meta_tags') ?: $seo->meta_tags }}" type="text" class="form-control @error('meta_tags') is-invalid @enderror" placeholder="Enter meta tags" autofocus>
                                    @error('meta_tags')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="canonical" class="@error('canonical') text-danger @enderror">Canonical</label>
                                    <input id="canonical" name="canonical" value="{{ old('canonical') ?: $seo->canonical }}" type="text" class="form-control @error('canonical') is-invalid @enderror" placeholder="Enter canonical" autofocus>
                                    @error('canonical')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
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
