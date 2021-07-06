@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <section class="headings" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;">
        <div class="text-heading text-center">
            <div class="container">
                <h1>FAQ’S</h1>
                <h2>
                    <a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; FAQ’S
                </h2>
            </div>
        </div>
    </section>

    <section class="faq service-details faq-text">
        <div class="container">
            @if(count($data->faqs))
                <h2 class="mb-5">FREQUENTLY ASKED QUESTIONS</h2>
                <div class="row">
                    <div class="col-12 service-info">
                        <article class="faq">
                            <div id="accordion" role="tablist" aria-multiselectable="true">
                                @foreach($data->faqs as $index => $faq)
                                    <div class="panel panel-default">
                                        <h4 class="panel-heading">
                                            <a class="{{ $index == 0 ? '' : 'collapsed' }}" data-toggle="collapse" data-parent="#accordion" href="#tabs-{{ $index }}">
                                                {{ $faq->question ?? '' }}
                                            </a>
                                        </h4>
                                        <div id="tabs-{{ $index }}" class="panel-collapse {{ $index == 0 ? 'collapse-in show' : 'collapse' }}">
                                            {!! $faq->answer ?? '' !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    </div>
                </div>
            @else
                <div class="text-center">
                    <i class="fa fa-exclamation-circle fa-2x"></i>
                    <h4>No Faq Found</h4>
                </div>
            @endif
        </div>
    </section>
@stop

@section('style')
    <style>
        .panel.panel-default h6,
        .panel.panel-default h5,
        .panel.panel-default h4,
        .panel.panel-default h3,
        .panel.panel-default h2,
        .panel.panel-default h1,
        .panel.panel-default b,
        .panel.panel-default strong {
            font-weight: 600;
        }
    </style>
@stop

@section('script')
@stop
