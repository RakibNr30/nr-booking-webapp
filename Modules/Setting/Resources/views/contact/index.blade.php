@extends('admin.layouts.master', ['active' => [6, 1, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Contact</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.setting.contact.index') }}" class="breadcrumb-item">
                        Contact
                    </a>
                    <span class="breadcrumb-item active">Update</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('admin.partials._alert')
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Update Contact</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['url' => route('backend.setting.contact.update', [$contact->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="@error('email') text-danger @enderror">Email</label>
                                    <input id="email" name="email" value="{{ old('email') ?: $contact->email }}" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="@error('phone') text-danger @enderror">Phone</label>
                                    <input id="phone" name="phone" value="{{ old('phone') ?: $contact->phone }}" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone" autofocus>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>--}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile" class="@error('mobile') text-danger @enderror">Mobile</label>
                                    <input id="mobile" name="mobile" value="{{ old('mobile') ?: $contact->mobile }}" type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter mobile" autofocus>
                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                           {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fax" class="@error('fax') text-danger @enderror">Fax</label>
                                    <input id="fax" name="fax" value="{{ old('fax') ?: $contact->fax }}" type="text" class="form-control @error('fax') is-invalid @enderror" placeholder="Enter fax" autofocus>
                                    @error('fax')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address" class="@error('address') text-danger @enderror">Address</label>
                                    <input id="address" name="address" value="{{ old('address') ?: $contact->address }}" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address" autofocus>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="col-md-6">
                                <div class="form-group">
                                    <label for="website" class="@error('website') text-danger @enderror">Website</label>
                                    <input id="website" name="website" value="{{ old('website') ?: $contact->website }}" type="text" class="form-control @error('website') is-invalid @enderror" placeholder="Enter website" autofocus>
                                    @error('website')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>--}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="google_map" class="@error('google_map') text-danger @enderror">Google Map (Embedded src URL)</label>
                                    <input id="google_map" name="google_map" value="{{ old('google_map') ?: $contact->google_map }}" type="text" class="form-control @error('google_map') is-invalid @enderror" placeholder="Enter google map url" autofocus>
                                    @error('google_map')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="col-md-4">
                                <div class="form-group">
                                    <label for="longitude" class="@error('longitude') text-danger @enderror">Longitude</label>
                                    <input id="longitude" name="longitude" value="{{ old('longitude') ?: $contact->longitude }}" type="text" class="form-control @error('longitude') is-invalid @enderror" placeholder="Enter longitude" autofocus>
                                    @error('longitude')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="latitude" class="@error('latitude') text-danger @enderror">Latitude</label>
                                    <input id="latitude" name="latitude" value="{{ old('latitude') ?: $contact->latitude }}" type="text" class="form-control @error('latitude') is-invalid @enderror" placeholder="Enter latitude" autofocus>
                                    @error('latitude')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook" class="@error('facebook') text-danger @enderror">Facebook</label>
                                    <input id="facebook" name="facebook" value="{{ old('facebook') ?: $contact->facebook }}" type="text" class="form-control @error('facebook') is-invalid @enderror" placeholder="Enter facebook" autofocus>
                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram" class="@error('instagram') text-danger @enderror">Instagram</label>
                                    <input id="instagram" name="instagram" value="{{ old('instagram') ?: $contact->instagram }}" type="text" class="form-control @error('instagram') is-invalid @enderror" placeholder="Enter instagram" autofocus>
                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                           {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="linked_in" class="@error('linked_in') text-danger @enderror">Linked In</label>
                                    <input id="linked_in" name="linked_in" value="{{ old('linked_in') ?: $contact->linked_in }}" type="text" class="form-control @error('linked_in') is-invalid @enderror" placeholder="Enter linked in" autofocus>
                                    @error('linked_in')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="youtube" class="@error('youtube') text-danger @enderror">Youtube</label>
                                    <input id="youtube" name="youtube" value="{{ old('youtube') ?: $contact->youtube }}" type="text" class="form-control @error('youtube') is-invalid @enderror" placeholder="Enter youtube" autofocus>
                                    @error('youtube')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter" class="@error('twitter') text-danger @enderror">Twitter</label>
                                    <input id="twitter" name="twitter" value="{{ old('twitter') ?: $contact->twitter }}" type="text" class="form-control @error('twitter') is-invalid @enderror" placeholder="Enter twitter" autofocus>
                                    @error('twitter')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="col-md-4">
                                <div class="form-group">
                                    <label for="skype" class="@error('skype') text-danger @enderror">Skype</label>
                                    <input id="skype" name="skype" value="{{ old('skype') ?: $contact->skype }}" type="text" class="form-control @error('skype') is-invalid @enderror" placeholder="Enter skype" autofocus>
                                    @error('skype')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>--}}
                            {{--<div class="col-md-4">
                                <div class="form-group">
                                    <label for="whatsapp" class="@error('whatsapp') text-danger @enderror">Whatsapp</label>
                                    <input id="whatsapp" name="whatsapp" value="{{ old('whatsapp') ?: $contact->whatsapp }}" type="text" class="form-control @error('whatsapp') is-invalid @enderror" placeholder="Enter whatsapp" autofocus>
                                    @error('whatsapp')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>--}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
