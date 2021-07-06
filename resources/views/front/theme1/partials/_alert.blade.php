@if (session()->has('alert.status'))
    <div class="alert alert-{{ session()->get('alert.status') }} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas {{ session()->get('alert.icon') }}"></i> {{ session()->get('alert.title') }}</h5>
        {{ session()->get('alert.body') }}
    </div>
    <style>
        .alert {
            margin-bottom: 0;
            //border-top: 3px solid #fff;
        }
        .alert-success {
            background-color: #d4edda;
        }
        .alert-danger {
            background-color: #f8d7da;
        }
        .alert-warning {
            background-color: #fff3cd;
        }
        .icon.fas {
            font-size: 14px;
        }
    </style>
@endif
