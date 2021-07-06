<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">
    <div class="sidebar-content">
        <div class="card">
            @if (auth()->check())
                @php
                    $user = \Modules\Ums\Entities\User::find(auth()->user()->id);
                @endphp
                <div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url({{ asset('admin/global/images/backgrounds/panel_bg.png') }}); background-size: contain;">
                    <div class="card-img-actions d-inline-block mb-3">
                        <div class="user__image"
                             style="background-image: url({{ $user->avatar->file_url ?? ($user->personalInfo->gender == "Male" ?
                    config('core.image.' . config('core.theme') . '.default.avatar_male') : config('core.image.' . config('core.theme') . '.default.avatar_female')) }})">

                        </div>
                        {{--<img class="img-fluid rounded-circle" src="{{ $user->avatar->file_url ?? ($user->personalInfo->gender == "Male" ?
                    config('core.image.default.avatar_male') : config('core.image.default.avatar_female')) }}" alt="">--}}
                    </div>
                    <h6 class="font-weight-semibold mb-0">
                        {{ $user->personalInfo->first_name }}
                        {{ $user->personalInfo->last_name }}
                    </h6>
                    <span class="d-block opacity-75">
                        {{ $user->personalInfo->designation }}
                    </span>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-sidebar mb-2">
                        @foreach(json_decode(json_encode(config('core.profile_menu'))) as $index => $nav)
                            <li class="nav-item">
                                <a href="{{ $nav->url }}" class="nav-link {{ $index == $active ? 'active' : '' }}">
                                    <i class="{{ $nav->icon }}"></i>
                                    {{ $nav->name }}
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item-divider"></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>


{{--
<div class="card card-gray-dark card-outline">
    <div class="card-body box-profile">
        @if (auth()->check())
            @php
                $user = \Modules\Ums\Entities\User::find(auth()->user()->id);
            @endphp
            <div class="text-center">
                <div class="profile-user-img img-fluid img-circle"
                style="background-image: url({{ $user->avatar->file_url ?? ($user->personalInfo->gender == "Male" ?
                    config('core.image.default.avatar_male') : config('core.image.default.avatar_female')) }})">
                </div>
            </div>
            <h3 class="profile-username text-center">{{ $user->personalInfo->first_name }} {{ $user->personalInfo->last_name }}</h3>
            <p class="text-muted text-center">{{ $user->personalInfo->designation }}</p>
            <ul class="nav nav-pills flex-column">
                @foreach(json_decode(json_encode(config('core.profile_menu'))) as $profile_menu_key => $profile_menu)
                    --}}
{{--@if ($user->can($profile_menu->permission))--}}{{--

                        <li class="nav-item {{ $profile_menu_key == ($active ?? '') ? 'bg-light' : '' }}">
                            <a href="{{ $profile_menu->url }}" class="nav-link"
                               style="padding: 10px; font-size: 16px; color: #212543;">
                                {{ $profile_menu->name }}
                            </a>
                        </li>
                    --}}
{{--@endif--}}{{--

                @endforeach
            </ul>
        @endif
    </div>
</div>
--}}
