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
                    <a href="{{ url('/patients/create') }}" class="btn btn-primary btn-sm" role="button">
                        <i class="fa fa-plus"></i>
                        {{__(' New')}}
                    </a>
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
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Identification')}}</th>
                            <th scope="col">{{__('Options')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                            <th scope="row">
                                {{__($patient->name)}}
                            </th>
                            <td>
                                {{__($patient->email)}}
                            </td>
                            <td>
                                {{__($patient->identification)}}
                            </td>
                            <td>
                                <form action="{{ url('/patients/'.$patient->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/patients/'.$patient->id.'/edit') }}" class="btn btn-sm btn-primary">{{__('Edit')}}</a>
                                    <button type="submit" class="btn btn-sm btn-danger">{{__('Delete') }}</button>
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
