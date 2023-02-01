@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <!-- Responsive tables Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Patients')}}</h4>
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
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{__('Doctor')}}</th>
                            <th scope="col">{{__('Specialty')}}</th>
                            <th scope="col">{{__('Options')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                        <tr>
                            <th scope="row">
                                {{__($history->done_by->name)}}
                            </th>
                            <td>
                                {{__($history->at_specialty->name)}}
                            </td>
                            <td>
                                <form action="{{ url('/appointments/'.$history->appointment_id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info">{{__('Show') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                {{ $patients->links() }}
            </div>
        </div>
        <!-- Responsive tables End -->
    </div>
</div>
@endsection
