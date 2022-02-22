@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <section class="headings" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;">
        <div class="text-heading text-center">
            <div class="container">
                <h1>{{ $data->page->title }}</h1>
                <h2>
                    <a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; {{ $data->page->title }}
                </h2>
            </div>
        </div>
    </section>

    <section class="blog blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 blog-pots">
                    @if(isset($data->page->feature_image))
                        <div>
                            <div class="mb-5">
                                <img src="{{ $data->page->feature_image->file_url }}" style="max-width: 100%" alt="">
                            </div>
                        </div>
                    @else
                        <div>
                            {!! $data->page->description !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .blog-pots ul,
        .blog-pots ul li {
            list-style: unset;
        }
        .inner-pages section.blog-section {
            padding: 4rem 0;
        }
    </style>
@stop

@section('script')
@stop
