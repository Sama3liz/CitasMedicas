@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Edit Doctor')}}</h4>
                    <br>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/medics') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-chevron-left"></i> {{__('Back')}}</a>
                </div>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="icon-copy ion-close-circled"></i>
                        <strong>{{__('UPS! ')}}</strong>{{ $error }}
                    </div>
                @endforeach
            @endif
            <form method="POST" action="{{ url('/medics/'.$doctor->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Name')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <input id="name" name="name" class="form-control" type="text" value="{{ old('name', $doctor->name) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Specialties')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <select id="specialties" name="specialties[]" title="Specialties Select" class="selectpicker form-control" data-size="5" data-style="btn-primary" multiple data-max-options="3" required>
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Email')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <input id="email" name="email" class="form-control" type="email" value="{{ old('email', $doctor->email) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Identification Number')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <input id="identification" name="identification" class="form-control" type="text" value="{{ old('identification', $doctor->identification) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Direction')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <input id="address" name="address" class="form-control" type="text" value="{{ old('address', $doctor->address) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Phone')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <input id="phone" name="phone" class="form-control" type="text" value="{{ old('phone', $doctor->phone) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Password')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <input id="password" name="password" class="form-control" type="text">
                        <small class="text-danger">{{__('Only if you want to change the password')}}</small>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">{{__('Save')}}</button>
            </form>
        </div>
        <!-- Default Basic Forms End -->
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(()=>{});
        $('#specialties').selectpicker('val', @json($specialty_ids));
    </script>
@endsection
