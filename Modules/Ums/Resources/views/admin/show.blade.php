@extends('admin.layouts.master', ['active' => [5, 0, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Admin</span> - Show
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.ums.admin.index') }}" class="breadcrumb-item">
                        Admin
                    </a>
                    <span class="breadcrumb-item active">Show</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <!-- Left content -->
            <div class="w-100 overflow-auto order-2 order-md-1">
                <!-- Post -->
                <div class="card">
                    <div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url({{ asset('admin/global/images/backgrounds/panel_bg.png') }}); background-size: contain;">
                        <div class="card-img-actions d-inline-block mb-3">
                            <div class="user__image"
                                 style="background-image: url({{ $user->avatar->file_url ?? ($user->personalInfo->gender == "Male" ?
                config('core.image.' . config('core.theme') . '.default.avatar_male') : config('core.image.' . config('core.theme') . '.default.avatar_female')) }})">

                            </div>
                        </div>
                        <h6 class="font-weight-semibold mb-0">
                            {{ $user->personalInfo->first_name }}
                            {{ $user->personalInfo->last_name }}
                        </h6>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-sidebar mb-2 mt-2">
                            <li class="nav-item">
                                <a class="nav-link active">
                                    <i>Email: </i>
                                    {{ $user->email ?? 'N/A' }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active">
                                    <i>Gender: </i>
                                    {{ $user->personalInfo->gender ?? 'N/A' }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active">
                                    <i>Date of Birth: </i>
                                    {{ $user->personalInfo->dob ?? 'N/A' }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <!-- /left content -->
        </div>
    </div>
@stop
