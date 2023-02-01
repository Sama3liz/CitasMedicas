@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Appointment Details')}}</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/appointments') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-chevron-left"></i> {{__('Back')}}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="pd-20 card-box mb-30">
					<form>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Date')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->scheduled_date}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Time')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->scheduled_time_12}}">
							</div>
						</div>
						@if ($role == 'doctor')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Patient')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->patient->name}}">
							</div>
						</div>
						@endif
						@if ($role == 'admin')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Patient')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->patient->name}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Doctor')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->doctor->name}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Specialty')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->specialty->name}}">
							</div>
						</div>
						@endif
						@if ($role == 'patient')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Doctor')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->doctor->name}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Specialty')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->specialty->name}}">
							</div>
						</div>
						@endif
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Status')}}</label>
							<div class="col-sm-12 col-md-10">
                                @if ($appointment->status == 'Confirmed')
                                    <span class="badge badge-primary">{{$appointment->status}}</span>
                                @endif
                                @if ($appointment->status == 'Cancelled')
                                    <span class="badge badge-danger">{{$appointment->status}}</span>
                                @endif
                                @if ($appointment->status == 'Reserved')
                                    <span class="badge badge-secondary">{{$appointment->status}}</span>
                                @endif
								@if ($appointment->status == 'Done')
                                    <span class="badge badge-success">{{$appointment->status}}</span>
                                @endif
							</div>
						</div>
						@if ($appointment->status == 'Done')
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Date Done')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->scheduled_date}}">
							</div>
						</div>
						@endif
						@if ($appointment->status == 'Cancelled')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Date Cancellation')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->cancellation->created_at}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">{{__('Cancelled By')}}</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" disabled type="text" value="{{$appointment->cancellation->cancelled_by->name}}">
							</div>
						</div>		
						@endif					
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
