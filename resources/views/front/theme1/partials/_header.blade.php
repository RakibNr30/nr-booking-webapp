<div class="header header-light">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('front.index') }}">
                    <img src="{{ $globalSite->logo->file_url ?? config('core.image.' . config('core.theme') . '.default.logo') }}" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu align-to-right">
                    @foreach(json_decode(json_encode(config('core.front_menu'))) as $key => $menu)
                        @if(empty($menu->children))
                            <li class="{{ request()->is($menu->url) ? 'active' : (request()->is(str_replace('/', '', $menu->url)) ? 'active' : '') }}">
                                <a href="{{ $menu->url }}">
                                    {{ $menu->name }}
                                </a>
                            </li>
                        @else
                            <li class="{{ request()->is($menu->url . '.*') ? 'active' : '' }}">
                                <a href="javascript:void(0);">
                                    {{ $menu->name }}<span class="submenu-indicator"></span>
                                </a>
                                <ul class="nav-dropdown nav-submenu">
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

                {{--<ul class="nav-menu nav-menu-social align-to-right">
                    <li>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#login">
                            <i class="fa fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
                        </a>
                    </li>
                    <li class="add-listing">
                        <a href="#">
                            <i class="fas fa-plus-circle"></i> Add Listings
                        </a>
                    </li>
                </ul>--}}
            </div>
        </nav>
    </div>
</div>
<div class="clearfix"></div>
