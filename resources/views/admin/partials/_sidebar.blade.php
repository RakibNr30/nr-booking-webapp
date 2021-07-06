@if(auth()->check())
    @php
        $user = \Modules\Ums\Entities\User::find(auth()->user()->id);
    @endphp
    <div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">
    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <div class="sidebar-content">
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="javascript:void(0)">
                            <div class="user__image_small" style="background-image: url({{ $user->avatar->file_url ?? ($user->personalInfo->gender == "Male" ?
                    config('core.image.' . config('core.theme') . '.default.avatar_male') : config('core.image.' . config('core.theme') . '.default.avatar_female')) }})"></div>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="media-title font-weight-semibold">
                            {{ $user->personalInfo->first_name }} {{ $user->personalInfo->last_name }}
                        </div>
                        <div class="font-size-xs opacity-50">
                            {{ $user->personalInfo->designation }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                @foreach(json_decode(json_encode(config('core.admin_menu'))) as $index => $nav)
                    @if($user->can($nav->permission))
                        @if(empty($nav->children))
                            <li class="nav-item">
                                <a href="{{ $nav->url }}" class="nav-link {{ $active[0] == $index ? 'active' : ''  }}">
                                    <i class="{{ $nav->icon }}"></i>
                                    <span>{{ $nav->name }}</span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item nav-item-submenu">
                                <a href="javascript:void(0)" class="nav-link {{ $active[0] == $index ? 'active' : '' }}">
                                    <i class="{{ $nav->icon }}"></i>
                                    <span>{{ $nav->name }}</span>
                                </a>
                                <ul class="nav nav-group-sub" data-submenu-title="Sidebars" style="display: {{ $active[0] == $index ? 'block' : '' }}">
                                    @foreach($nav->children as $subIndex => $subNav)
                                        @if(empty($subNav->children))
                                            <li class="nav-item {{ $active[1] == $subIndex ? 'nav-item-open' : '' }}">
                                                <a href="{{ $subNav->url }}" class="nav-link">
                                                    {{ $subNav->name }}
                                                </a>
                                            </li>
                                        @else
                                            <li class="nav-item nav-item-submenu {{ $active[1] == $subIndex ? 'nav-item-open' : '' }}">
                                                <a href="javascript:void(0)" class="nav-link {{ $active == $subIndex ? 'active' : '' }}">
                                                    {{ $subNav->name }}
                                                </a>
                                                <ul class="nav nav-group-sub">
                                                    @foreach($subNav->children as $superSubIndex => $superSubNav)
                                                        <li class="nav-item">
                                                            <a href="{{ $superSubNav->url }}" class="nav-link {{ $active[2] == $superSubNav ? 'active' : '' }}">
                                                                {{ $superSubNav->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
