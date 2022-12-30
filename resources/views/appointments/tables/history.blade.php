<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">{{__('Specialty')}}</th>
                @if ($role == 'patient')
                    <th scope="col">{{__('Doctor')}}</th>
                @elseif ($role == 'doctor')
                    <th scope="col">{{__('Patient')}}</th>
                @endif
                <th scope="col">{{__('Date')}}</th>
                <th scope="col">{{__('Status')}}</th>
                <th scope="col">{{__('Options')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointmentsHistory as $appointment)
            <tr>
                <th scope="row">
                    {{__($appointment->specialty->name)}}
                </th>
                @if ($role == 'patient')
                    <td>
                        {{__($appointment->doctor->name)}}
                    </td>
                @elseif ($role == 'doctor')
                    <td>
                        {{__($appointment->patient->name)}}
                    </td>
                @endif
                <td>
                    {{__($appointment->scheduled_date)}}
                </td>
                <td>
                    @if ($appointment->status == 'Done')
                        <span class="badge badge-success">{{$appointment->status}}</span>
                    @endif
                    @if ($appointment->status == 'Cancelled')
                        <span class="badge badge-danger">{{$appointment->status}}</span>
                    @endif
                </td>
                <td>
                    <form action="{{ url('/appointments/'.$appointment->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-info">{{__('Show') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>