<footer class="first-footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="netabout">
                        <a href="{{ route('front.index') }}" class="logo">
                            <img src="{{ $globalSite->logo_light->file_url ?? config('core.image.' . config('core.theme') . '.default.logo_light') }}" alt="netcom">
                        </a>
                        <p class="text-justify">
                            Hotel Retailers saves you the time, comparing great rates around the world and bringing you only the best prices
                        </p>
                    </div>
                    <div class="contactus">
                        <ul>
                            @if(isset($globalContact->address) && $globalContact->address != '')
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="in-p">
                                            {{ $globalContact->address }}
                                        </p>
                                    </div>
                                </li>
                            @endif
                            @if(isset($globalContact->mobile) && $globalContact->mobile != '')
                                <li>
                                    <div class="info">
                                        <i class="fa fa-mobile" aria-hidden="true"></i>
                                        <p class="in-p">
                                            {{ $globalContact->mobile }}
                                        </p>
                                    </div>
                                </li>
                            @endif
                            @if(isset($globalContact->email) && $globalContact->email != '')
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="in-p ti">
                                            {{ $globalContact->email }}
                                        </p>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget quick-link clearfix">
                        <h3 class="widget-title">Quick Links</h3>
                        <div class="quick-links">
                            <ul>
                                <li><a href="{{ route('front.destination.index') }}">Destination</a></li>
                                <li><a href="{{ route('front.faq.index') }}">FAQ</a></li>
                                <li><a href="{{ route('front.contact.index') }}">Contact</a></li>
                                <li><a href="{{ route('front.privacy-policy.index') }}">Privacy & Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget quick-link clearfix">
                        <h3 class="widget-title">Pages</h3>
                        <div class="quick-links">
                            <ul>
                                @if(count($globalPages))
                                    <ul class="footer-menu">
                                        @foreach($globalPages as $index=> $page)
                                            <li>
                                                <a href="{{ route('front.page.show', [$page->slug]) }}">
                                                    {{ $page->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer">
        <div class="container">
            <p>{{ $globalSite->title ?? 'Hotel Retailer' }} ©{{ date('Y') }} All rights reserved. </p>
            <ul class="netsocials">
                @if(isset($globalContact->facebook) && $globalContact->facebook != '')
                    <li>
                        <a href="{{ $globalContact->facebook }}">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                @endif
                @if(isset($globalContact->twitter) && $globalContact->twitter != '')
                    <li>
                        <a href="{{ $globalContact->twitter }}">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                @endif
                @if(isset($globalContact->instagram) && $globalContact->instagram != '')
                    <li>
                        <a href="{{ $globalContact->instagram }}">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                @endif
                @if(isset($globalContact->youtube) && $globalContact->youtube != '')
                    <li>
                        <a href="{{ $globalContact->youtube }}">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</footer>
