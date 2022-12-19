<?php
    use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('New Appointment')}}</h4>
                    <br>
                </div>
                <div class="pull-right">
                    <a href="{{ route('home') }}" class="btn btn-success btn-sm" role="button">
                        <i class="fa fa-chevron-left"></i> 
                        {{__('Back')}}
                    </a>
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
            <form method="POST" action="{{ url('/book') }}">
                @csrf
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="specialty" class="col-sm-12 col-md-2 col-form-label">{{__('Specialty')}}</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="specialty_id" id="specialty" class="custom-select col-12" required>
                                <option value="">{{__('Select Specialty')}}</option>
                                @foreach ($specialties as $specialty)
                                    <option value="{{ $specialty->id }}" @if(old('specialty_id') == $specialty->id) selected @endif>
                                        {{ $specialty->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="doctor" class="col-sm-12 col-md-2 col-form-label">{{__('Doctors')}}</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="doctor_id" id="doctor" class="custom-select col-12" required>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" @if(old('doctor_id') == $doctor->id) selected @endif>
                                        {{ $doctor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Date')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="micon dw dw-calendar"></i></span>
                            </div>
                            <input id="date" name="scheduled_date" class="form-control date-picker" 
                            placeholder="{{__('Select Date')}}" type="date" value="{{ date('Y-m-d')}}" 
                            data-date-format="yyyy-mm-dd" data-date-start-date="{{old('scheduled_date'), date('Y-m-d')}}" data-date-end-date="+30d">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">{{__('Time')}}</label>
                    <div class="col-sm-12 col-md-10">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h4 class="m-3" id="titleMorning"></h4>
                                    <div id="hoursMorning">
                                        @if($intervals)
                                            <h4 class="m-3">{{__('In The Morning')}}</h4>
                                            @foreach ($intervals['morning'] as $key=>$interval)
                                                <div class="custom-control custom-radio mb-5">
                                                    <input type="radio" id="intervalMorning{{$key}}" name="scheduled_time" class="custom-control-input" value="{{$interval['start']}}">
                                                    <label class="custom-control-label" for="intervalMorning{{$key}}">{{$interval['start']}}-{{$interval['end']}}</label>
                                                </div>
                                            @endforeach
                                        @else
                                            <mark>
                                                <small class="text-danger display-5">
                                                    {{__('Choose a medic and a date to see hours available.')}}
                                                </small>
                                            </mark>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <h4 class="m-3" id="titleAfternoon"></h4>
                                    <div id="hoursAfternoon">
                                        @if($intervals)
                                            <h4 class="m-3">{{__('In The Afternoon')}}</h4>
                                            @foreach ($intervals['afternoon'] as $key=>$interval)
                                                <div class="custom-control custom-radio mb-5">
                                                    <input type="radio" id="intervalAfternoon{{$key}}" name="scheduled_time" class="custom-control-input" value="{{$interval['start']}}">
                                                    <label class="custom-control-label" for="intervalAfternoon{{$key}}">{{$interval['start']}}-{{$interval['end']}}</label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
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
    {{-- <script src="{{ asset('vendors/scripts/advanced-components.js') }}"></script> --}}
    <script src="{{ asset('js/appointments/create.js') }}"></script>
@endsection