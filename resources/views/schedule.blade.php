@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <form action="{{ url('/schedule') }}" method="POST">
            @csrf
            <!-- Responsive tables Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">{{__('Schedules')}}</h4>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-sm" role="button"><i class="fa fa-plus"></i>{{__(' Save')}}</button>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('notification'))
                        <div class="alert alert-success" role="alert">
                            {{ session('notification') }}
                        </div>
                    @endif
                    @if (session('errors'))
                        <div class="alert alert-danger" role="alert">
                            {{__('The changes was succesfully saved but there are some issues:')}}
                            <ul>
                                @foreach(session('errors') as $error)
                                    <li>{{__($error)}}</li>
                                @endforeach
                            </ul>
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{__('Day')}}</th>
                                <th scope="col">{{__('Active')}}</th>
                                <th scope="col">{{__('Day Shift')}}</th>
                                <th scope="col">{{__('Afternoon Shift')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $key => $schedule)
                            <tr>
                                <th scope="row">
                                    {{__($days[$key] )}}
                                </th>
                                <td>
                                    <input name="active[]" value="{{ $key }}" type="checkbox" class="switch-btn" data-color="#a683eb" @if($schedule->active) checked @endif >
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <select name="morning_start[]" class="form-control">
                                                @for ($i=7;$i<=11;$i++)
                                                    <option value="{{ ($i<10 ? '0':'').$i }}:00" @if($i.':00 AM' == $schedule->morning_start) selected @endif>{{ $i }}:00 AM</option>
                                                    <option value="{{ ($i<10 ? '0':'').$i }}:30" @if($i.':30 AM' == $schedule->morning_start) selected @endif>{{ $i }}:30 AM</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="morning_end[]" class="form-control">
                                                @for ($i=7;$i<=11;$i++)
                                                    <option value="{{ ($i<10 ? '0':'').$i }}:00" @if($i.':00 AM' == $schedule->morning_end) selected @endif>{{ $i }}:00 AM</option>
                                                    <option value="{{ ($i<10 ? '0':'').$i }}:30" @if($i.':30 AM' == $schedule->morning_end) selected @endif>{{ $i }}:30 AM</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <select name="afternoon_start[]" class="form-control">
                                                @for ($i=14;$i<=16;$i++)
                                                    <option value="{{ $i }}:00" @if($i.':00 PM' == $schedule->afternoon_start) selected @endif>{{ $i }}:00 PM</option>
                                                    <option value="{{ $i }}:30" @if($i.':30 PM' == $schedule->afternoon_start) selected @endif>{{ $i }}:30 PM</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="afternoon_end[]" class="form-control">
                                                @for ($i=14;$i<=16;$i++)
                                                    <option value="{{ $i }}:00" @if($i.':00 PM' == $schedule->afternoon_end) selected @endif>{{ $i }}:00 PM</option>
                                                    <option value="{{ $i }}:30" @if($i.':30 PM' == $schedule->afternoon_end) selected @endif>{{ $i }}:30 PM</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="card-body">
                    {{ $doctors->links() }}
                </div> --}}
            </div>
            <!-- Responsive tables End -->
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('vendors/scripts/advanced-components.js') }}"></script>
@endsection