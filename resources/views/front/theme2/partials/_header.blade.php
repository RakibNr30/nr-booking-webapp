<header id="header-container" class="header head-tr">
    <div id="header" class="head-tr bottom">
        <div class="container container-header">
            <div class="left-side">
                <div id="logo">
                    <a href="{{ route('front.index') }}">
                        <img src="{{ $globalSite->logo->file_url ?? config('core.image.' . config('core.theme') . '.default.logo') }}"
                             data-sticky-logo="{{ $globalSite->logo->file_url ?? config('core.image.' . config('core.theme') . '.default.logo') }}" alt="">
                    </a>
                </div>
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <nav id="navigation" class="style-1 head-tr">
                    <ul id="responsive">
                        @foreach(json_decode(json_encode(config('core.front_menu'))) as $key => $menu)
                            @if(empty($menu->children))
                                <li>
                                    <a href="{{ $menu->url }}">
                                        {{ $menu->name }}
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="javascript:void(0)">
                                        {{ $nav->name }}
                                    </a>
                                    <ul>
                                        @foreach($menu->children as $subKey => $subMenu)
                                            <li>
                                                <a href="{{ $subMenu->url }}">
                                                    {{ $subMenu->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="clearfix"></div>
