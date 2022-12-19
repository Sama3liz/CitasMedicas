@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Appointments')}}</h4>
                </div>
                <div class="pull-right">
                </div>
            </div>
            <div class="card-body">
                @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                <div class="pd-20 card-box">
                    <div class="tab">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#actual" role="tab" aria-selected="true">{{__('Actual')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-selected="false">{{__('History')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="actual" role="tabpanel">
                                <div class="pd-20">
                                    @include('appointments.actual')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="history" role="tabpanel">
                                <div class="pd-20">
                                    @include('appointments.history')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card-body">
                {{ $patients->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
