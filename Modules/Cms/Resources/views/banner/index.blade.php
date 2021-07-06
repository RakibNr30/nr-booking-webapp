@extends('admin.layouts.master', ['active' => [2, 0, 0]])
@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Banner</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.banner.index') }}" class="breadcrumb-item">
                        Banner
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
                        <h5 class="card-title">Update Banner</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.cms.banner.update', [$banner->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="@error('title') text-danger @enderror">Title</label>
                                    <input id="title" name="title" value="{{ old('title') ?? $banner->title }}"
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
                                    <label for="tag_line" class="@error('tag_line') text-danger @enderror">Tag Line</label>
                                    <input id="tag_line" name="tag_line" value="{{ old('tag_line') ?? $banner->tag_line }}"
                                           type="text" class="form-control @error('tag_line') is-invalid @enderror"
                                           placeholder="Enter tag line" autofocus>
                                    @error('tag_line')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="brief_description" class="@error('brief_description') text-danger @enderror">Brief Description</label>
                                    <textarea id="brief_description" name="brief_description" class="form-control @error('brief_description') is-invalid @enderror" rows="3"
                                              placeholder="Enter brief description">{{ old('brief_description') ?? $banner->brief_description }}</textarea>
                                    @error('brief_description')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="@error('image') text-danger @enderror">Banner Image</label>
                                    <div class="uniform-uploader">
                                        <input id="image" name="image" value="{{ old('image') }}" type="file" class="form-control form-input-styled @error('image') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($banner->image))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $banner->image->file_url }}">
                                                <img src="{{ $banner->image->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('image')
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
