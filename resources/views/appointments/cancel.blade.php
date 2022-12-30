@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Cancel Appointment')}}</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/appointments') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-chevron-left"></i> {{__('Back')}}</a>
                </div>
            </div>
            <div class="card-body">
                @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif
                <div class="card text-white bg-danger card-box">
                    <div class="card-body">
                        @if ($role == 'patient')
                        <p class="card-text">
                            {{ __('The appointment with Dr. ') }}
                            <b>{{ $appointment->doctor->name }}</b>
                            {{ __(' in the Specialty: ') }}
                            <b>{{ $appointment->specialty->name }}</b>
                            {{ __(' at the date ') }}
                            <b>{{ $appointment->scheduled_date }}</b>
                            {{ __(' will be canceled. ') }}
                        </p>
                        @elseif ($role == 'doctor')
                        <p class="card-text">
                            {{ __('The appointment with patient ') }}
                            <b>{{ $appointment->patient->name }}</b>
                            {{ __(' in the Specialty: ') }}
                            <b>{{ $appointment->specialty->name }}</b>
                            {{ __(' at the date ') }}
                            <b>{{ $appointment->scheduled_date }}</b>
                            {{ __(' at ') }}
                            <b>{{ $appointment->scheduled_time_12 }}</b>
                            {{ __(' will be canceled. ') }}
                        </p>
                        @elseif ($role == 'admin')
                        <p class="card-text">
                            {{ __('The appointment of patient ') }}
                            <b>{{ $appointment->patient->name }}</b>
                            {{ __(' with the Dr. ') }}
                            <b>{{ $appointment->doctor->name }}</b>
                            {{ __(' in the Specialty: ') }}
                            <b>{{ $appointment->specialty->name }}</b>
                            {{ __(' at the date ') }}
                            <b>{{ $appointment->scheduled_date }}</b>
                            {{ __(' at ') }}
                            <b>{{ $appointment->scheduled_time_12 }}</b>
                            {{ __(' will be canceled. ') }}
                        </p>
                        @endif
                    </div>
                </div>
                <form action="{{ url('/appointments/'.$appointment->id.'/cancel') }}" method="post" class="d-inline-block mt-1">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">{{ __('Cancel Appointment') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
