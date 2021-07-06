@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <div class="image-cover page-title" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">Contact Us</h2>
                </div>
            </div>
        </div>
    </div>

    <section class="gray">
        <div class="container">
            <div class="row">
                @if(isset($globalContact->mobile) && $globalContact->mobile != '')
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="contact-box">
                            <i class="ti-mobile theme-cl"></i>
                            <h4>Mobile</h4>
                            <a href="tel: {{ $globalContact->mobile }}">{{ $globalContact->mobile }}</a>
                        </div>
                    </div>
                @endif
                @if(isset($globalContact->email) && $globalContact->email != '')
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="contact-box">
                            <i class="ti-email theme-cl"></i>
                            <h4>E-mail</h4>
                            <a href="mailto: {{ $globalContact->email }}">{{ $globalContact->email }}</a>
                        </div>
                    </div>
                @endif
                @if(isset($globalContact->address) && $globalContact->address != '')
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="contact-box">
                            <i class="ti-map theme-cl"></i>
                            <h4>Address</h4>
                            <span>{{ $globalContact->address }}</span>
                        </div>
                    </div>
                @endif
            </div>

            <!-- row Start -->
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-theme" type="submit">Submit Request</button>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5">
                    <div class="contact-info-map">
                        <iframe src="{{ $globalContact->google_map ?? '' }}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </section>
@stop

@section('style')
@stop

@section('script')
@stop
