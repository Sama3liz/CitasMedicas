@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Clinical History')}}</h4>
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
                <ul>
					<dd>
						<strong>Date: </strong> {{$history->created_at}}
					</dd>
					<dd>
						<strong>Patient: </strong> {{$history->for_patient->name}}
					</dd>
					<dd>
						<strong>Doctor: </strong> {{$history->done_by->name}}
					</dd>
					<dd>
						<strong>Specialty: </strong> {{$history->at_specialty->name}}
					</dd>
				</ul>
				<div class="card text-white bg-secondary card-box">
					<div class="card-header">
						Details
					</div>
					<div class="card-body">
						<textarea name="details" id="details" rows="10" class="col-md-12 card-text text-dark" wrap="hard" readonly="yes">{{$history->details}}</textarea>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
