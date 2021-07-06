@extends('admin.layouts.master', ['active' => [6, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Site</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.setting.site.index') }}" class="breadcrumb-item">
                        Site
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
                        <h5 class="card-title">Update Site</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['url' => route('backend.setting.site.update', [$site->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="@error('title') text-danger @enderror">Title</label>
                                    <input id="title" name="title" value="{{ old('title') ?: $site->title }}"
                                           type="text" class="form-control @error('title') is-invalid @enderror"
                                           placeholder="Enter title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="@error('description') text-danger @enderror">Site Details</label>
                                    <textarea id="description" name="description" class="form-control" rows="3"
                                              placeholder="Enter description">{{ old('description') ?: $site->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo" class="@error('logo') text-danger @enderror">Logo</label>
                                    <div class="uniform-uploader">
                                        <input id="logo" name="logo" value="{{ old('logo') }}" type="file" class="form-control form-input-styled @error('logo') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($site->logo))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $site->logo->file_url }}">
                                                <img src="{{ $site->logo->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo_light" class="@error('logo_light') text-danger @enderror">Logo Light</label>
                                    <div class="uniform-uploader">
                                        <input id="logo_light" name="logo_light" value="{{ old('logo_light') }}" type="file" class="form-control form-input-styled @error('logo_light') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($site->logo_light))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $site->logo_light->file_url }}">
                                                <img src="{{ $site->logo_light->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('logo_light')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="favicon" class="@error('favicon') text-danger @enderror">Favicon</label>
                                    <div class="uniform-uploader">
                                        <input id="favicon" name="favicon" value="{{ old('favicon') }}" type="file" class="form-control form-input-styled @error('favicon') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($site->favicon))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $site->favicon->file_url }}">
                                                <img src="{{ $site->favicon->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('favicon')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="breadcrumb_image" class="@error('breadcrumb_image') text-danger @enderror">Breadcrumb Image</label>
                                    <div class="uniform-uploader">
                                        <input id="breadcrumb_image" name="breadcrumb_image" value="{{ old('breadcrumb_image') }}" type="file" class="form-control form-input-styled @error('breadcrumb_image') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($site->breadcrumb_image))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $site->breadcrumb_image->file_url }}">
                                                <img src="{{ $site->breadcrumb_image->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('breadcrumb_image')
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
