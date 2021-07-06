<div class="navbar navbar-expand-lg navbar-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i> Footer
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
            <p>Copyright &copy; 2021 - {{ date('Y') }} | All Rights Reserved
                <a target="_blank" href="{{ route('front.index') }}">{{ $globalSite->title ?? 'Athlete Charity' }}</a>
            </p>
        </span>

        {{--<ul class="navbar-nav ml-lg-auto">
            <li class="nav-item">
                <a href="{{ route('backend.cms.news.index') }}" class="navbar-nav-link" target="_blank">
                    <i class="icon-newspaper mr-2"></i> News
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.cms.cases.index') }}" class="navbar-nav-link" target="_blank">
                    <i class="icon-file-text2 mr-2"></i> Cases
                </a>
            </li>
        </ul>--}}
    </div>
</div>