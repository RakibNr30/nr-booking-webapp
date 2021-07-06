@extends('front.' . config('core.theme') . '.layouts.master')

@section('title')
@stop

@section('content')
    <section class="headings" style="background:url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.' . config('core.theme') . '.default.breadcrumb_image') }}) no-repeat;">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Contact</h1>
                <h2>
                    <a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; Contact
                </h2>
            </div>
        </div>
    </section>

    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h3 class="mb-4">Contact Us</h3>
                    <div id="success" class="successform">
                        <p class="alert alert-success font-weight-bold" role="alert">Your message was sent successfully!</p>
                    </div>
                    <div id="error" class="errorform">
                        <p>Something went wrong, try refreshing and submitting the form again.</p>
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control input-custom input-full" name="name" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control input-custom input-full" name="lastname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-custom input-full" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control textarea-custom input-full" id="ccomment" name="message" required rows="8" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" id="submit-contact" class="btn btn-primary btn-lg">Send Message</button>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="our-lo property-location mb-0">
                        <h3 class="mb-4">Our Location</h3>
                        <div class="divider-fade"></div>
                        <div id="map-contact" class="contact-map">
                            <iframe src="{{ $globalContact->google_map ?? '' }}" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact_us_details">
                <div class="row">
                    @if(isset($globalContact->address) && $globalContact->address != '')
                        <div class="col-lg-4 col-md-6">
                            <div class="c_details_item">
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $globalContact->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($globalContact->email) && $globalContact->email != '')
                        <div class="col-lg-4 col-md-6 email-area mt-44">
                            <div class="c_details_item">
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="mailto: {{ $globalContact->email }}">{{ $globalContact->email }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($globalContact->mobile) && $globalContact->mobile != '')
                        <div class="col-lg-4 col-md-6 phone-area mt-44">
                            <div class="c_details_item">
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="tel: {{ $globalContact->mobile }}">{{ $globalContact->mobile }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop

@section('style')
@stop

@section('script')
@stop
