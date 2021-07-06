@php
    $user = \Modules\Ums\Entities\User::find(auth()->user()->id);
@endphp
<div class="navbar navbar-expand-md navbar-light fixed-top" style="background: #d9dedd;">
    <div class="navbar-brand">
        <a target="_blank" href="{{ route('front.index') }}" class="d-inline-block">
            <img src="{{ $globalSite->logo->file_url ?? config('core.image.' . config('core.theme') . '.default.logo') }}" style="height: 40px;" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                    <div class="dropdown-content-header">
                        <span class="font-weight-semibold">Notifications</span>
                        <a href="javascript:void(0)" class="text-default"><i class="icon-bell2"></i></a>
                    </div>

                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            <li class="media">
                                <div class="media-body">
                                    <span class="text-muted">No new notification</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown-content-footer justify-content-center p-0">
                        <a href="javascript:void(0)" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <div class="user__image_small mr-2" style="background-image: url({{ $user->avatar->file_url ?? ($user->personalInfo->gender == "Male" ?
                    config('core.image.' . config('core.theme') . '.default.avatar_male') : config('core.image.' . config('core.theme') . '.default.avatar_female')) }})">
                    </div>
                    {{--<img src="{{ $user->avatar->file_url ?? ($user->personalInfo->gender == "Male" ?
                    config('core.image.default.avatar_male') : config('core.image.default.avatar_female')) }}" class="rounded-circle mr-2" height="34" alt="">--}}
                    <span>{{ strlen($user->personalInfo->first_name) > 10 ?
                     substr($user->personalInfo->first_name, 0, 10) : $user->personalInfo->first_name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('backend.ums.profile-personal-info.index') }}" class="dropdown-item">
                        <i class="icon-user-plus"></i> My profile
                    </a>
                    <a href="{{ route('backend.ums.profile-password-change.index') }}" class="dropdown-item">
                        <i class="icon-key"></i> Change Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-switch2"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
