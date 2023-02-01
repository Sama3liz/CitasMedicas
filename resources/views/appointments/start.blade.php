@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Appointment')}}</h4>
                </div>
                <div class="pull-right">
                <a href="{{ url('/appointments') }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-chevron-left"></i> {{__('Back')}}</a>
                </div>
            </div>
            <div class="card-body">
                @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif
                <div class="card text-white bg-secondary card-box">
                    <div class="card-body">
                        <p class="card-text">
                            {{ __('Patient: ') }}
                            <b>{{ $appointment->patient->name }}</b> 
                            <br>
                            {{ __('Specialty: ') }}
                            <b>{{ $appointment->specialty->name }}</b>
                            <br>
                            {{ __('Date: ') }}
                            <b>{{ $appointment->scheduled_date }}</b> 
                            <br>
                            {{ __('Time: ') }}
                            <b>{{ $appointment->scheduled_time_12 }}</b> 
                        </p>
                    </div>
                </div>
                <form action="{{ url('/appointments/'.$appointment->id.'/appointment') }}" method="post" class="d-inline-block mt-1 col-md-12">
                    @csrf
                    <div class="form-group col-md-12">
                        <input type="hidden" name="patient_id" value="{{ $appointment->patient->id }}">
                        <input type="hidden" name="specialty_id" value="{{ $appointment->specialty->id }}">
                        <label for="details">{{ __('Details: ') }}</label>
                        <textarea name="details" id="details" rows="3" class="form-control col-md-12" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">{{ __('End Appointment') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
