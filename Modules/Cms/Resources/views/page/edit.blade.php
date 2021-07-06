@extends('admin.layouts.master', ['active' => [2, 4, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Page</span> - Update
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
                        <h5 class="card-name">Update Page</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.cms.page.update', [$page->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="@error('title') text-danger @enderror">Page Title</label>
                                    <input id="title" name="title" value="{{ old('title') ?? $page->title }}"
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
                                    <label for="description" class="@error('description') text-danger @enderror">Description</label>
                                    <textarea id="description" name="description" class="form-control ck-text-editor @error('description') is-invalid @enderror" rows="3"
                                              placeholder="Enter description">{{ old('description') ?? $page->description }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="feature_image" class="@error('feature_image') text-danger @enderror">Feature Image</label>
                                    <div class="uniform-uploader">
                                        <input id="feature_image" name="feature_image" value="{{ old('feature_image') }}" type="file" class="form-control form-input-styled @error('feature_image') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($page->feature_image))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $page->feature_image->file_url }}">
                                                <img src="{{ $page->feature_image->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('feature_image')
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
