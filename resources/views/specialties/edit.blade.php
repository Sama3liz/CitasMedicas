@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Edit Specialty')}}</h4>
                    <br>
                </div>
                <div class="pull-right">
                    <a href="{{ route('specialties') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-chevron-left"></i> {{__('Back')}}</a>
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
            <form method="POST" action="{{ url('/specialties/'.$specialty->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Name')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <input id="name" name="name" class="form-control" type="text" placeholder="{{__('Cardiology')}}" value="{{ old('name', $specialty->name) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Description')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea id="description" name="description" class="form-control" type="text" placeholder="{{__('Description')}}">{{ old('description',$specialty->description) }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">{{__('Save')}}</button>
            </form>
        </div>
        <!-- Default Basic Forms End -->
    </div>
</div>
@endsection
