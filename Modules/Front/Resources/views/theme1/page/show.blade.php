@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover page-title" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">{{ $data->page->title ?? '' }}</h2>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    @if(isset($data->page->feature_image))
                        <div class="mb-5">
                            <img src="{{ $data->page->feature_image->file_url }}" style="max-width: 100%" alt="">
                        </div>
                    @endif
                    <div class="about-captione">
                        {!! $data->page->description !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .about-captione ul {
            list-style: unset;
        }
        b, strong {
            font-weight: bold;
        }
    </style>
@stop

@section('script')
@stop
{{--


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
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="news-item details no-mb2">
                                <a href="blog-details.html" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="img-responsive" src="images/blog/b-1.jpg" alt="blog image">
                                    </div>
                                </a>
                                <div class="news-item-text details">
                                    <a href="blog-details.html"><h3>Listings Latest News</h3></a>
                                    <div class="dates">
                                        <span class="date">April 11, 2020 &nbsp;/</span>
                                        <ul class="action-list pl-0">
                                            <li class="action-item pl-2"><i class="fa fa-heart"></i> <span>306</span></li>
                                            <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                            <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                        </ul>
                                    </div>
                                    <div class="news-item-descr big-news details visib">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .about-captione ul {
            list-style: unset;
        }
    </style>
@stop

@section('script')
@stop
--}}
