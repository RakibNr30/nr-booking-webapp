@if (session()->has('alert.status'))
    {{--<div class="alert alert-{{ session()->get('alert.status') }} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas {{ session()->get('alert.icon') }}"></i> {{ session()->get('alert.title') }}</h5>
        {{ session()->get('alert.body') }}
    </div>--}}

    <div class="alert bg-{{ session()->get('alert.status') }} text-white alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">{{ session()->get('alert.title') }}</span><br> {{ session()->get('alert.body') }}
    </div>
@endif