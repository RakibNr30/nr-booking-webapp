<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <img src="{{ $globalSite->logo_light->file_url ?? config('core.image.' . config('core.theme') . '.default.logo_light') }}" class="img-fluid f-logo" alt="" />
                        <p class="text-justify">
                            Hotel Retailers saves you the time, comparing great rates around the world and bringing you only the best prices
                        </p>
                        @if(isset($globalContact->address) && $globalContact->address != '')
                            <p style="color: #d8a9a9">
                                <i class="lni-map-marker mr-1"></i>
                                {{ $globalContact->address }}
                            </p>
                        @endif
                        <ul class="footer-bottom-social">
                            @if(isset($globalContact->facebook) && $globalContact->facebook != '')
                                <li>
                                    <a href="{{ $globalContact->facebook }}">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                            @endif
                            @if(isset($globalContact->twitter) && $globalContact->twitter != '')
                            <li>
                                <a href="{{ $globalContact->twitter }}">
                                    <i class="ti-twitter"></i>
                                </a>
                            </li>
                            @endif
                            @if(isset($globalContact->instagram) && $globalContact->instagram != '')
                            <li>
                                <a href="{{ $globalContact->instagram }}">
                                    <i class="ti-instagram"></i>
                                </a>
                            </li>
                            @endif
                            @if(isset($globalContact->youtube) && $globalContact->youtube != '')
                            <li>
                                <a href="{{ $globalContact->youtube }}">
                                    <i class="ti-youtube"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Useful links</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('front.destination.index') }}">Destination</a></li>
                            <li><a href="{{ route('front.faq.index') }}">FAQ</a></li>
                            <li><a href="{{ route('front.contact.index') }}">Contact</a></li>
                            <li><a href="{{ route('front.privacy-policy.index') }}">Privacy & Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Pages</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <p class="mb-0">© {{ date('Y') }} {{ $globalSite->title ?? 'NRdotCOM Booking' }}. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
