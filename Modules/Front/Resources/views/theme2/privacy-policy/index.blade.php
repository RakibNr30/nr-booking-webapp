@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <section class="headings" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Privacy & Policy</h1>
                <h2>
                    <a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; Privacy & Policy
                </h2>
            </div>
        </div>
    </section>

    <section class="blog blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 blog-pots">
                    @if($data->privacyPolicy->description != '')
                        <div>
                            {!! $data->privacyPolicy->description !!}
                        </div>
                    @else
                        <div class="text-center">
                            <i class="fa fa-exclamation-circle fa-2x"></i>
                            <h4>No privacy & policy Found</h4>
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
