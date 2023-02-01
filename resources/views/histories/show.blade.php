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
						<strong>Doctor: </strong> {{$history->done_by}}
					</dd>
					<dd>
						<strong>Specialty: </strong> {{$history->at_specialty}}
					</dd>
				</ul>
				<div class="alert bg-light text-primary">
					<ul>
						<li>
							<strong>Details</strong>
							<br>
							<textarea name="details" id="details" rows="5" class="col-md-12" disabled>
							{{$history->details}}
							</textarea>
						</li>
					</ul>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
