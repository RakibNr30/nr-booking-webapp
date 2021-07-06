@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover page-title" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">FAQ'S</h2>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="myTabContent">
                        @if(count($data->faqs))
                            <div class="accordion" id="generalac">
                                @foreach($data->faqs as $index => $faq)
                                    <div class="card">
                                        <div class="card-header" id="heading{{ $index }}">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapse{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#generalac">
                                            <div class="card-body">
                                                <p class="ac-para">
                                                    {!! $faq->answer !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center">
                                <i class="fa fa-exclamation-circle fa-2x"></i>
                                <h4>No Faq Found</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('style')
@stop

@section('script')
@stop
