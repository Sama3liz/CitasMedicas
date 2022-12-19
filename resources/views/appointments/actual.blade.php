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
                <th scope="col">{{__('Time')}}</th>
                <th scope="col">{{__('Status')}}</th>
                <th scope="col">{{__('Options')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointmentsActual as $appointment)
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
                    {{__($appointment->Scheduled_Time_12)}}
                </td>
                <td>
                    {{__($appointment->status)}}
                </td>
                <td>
                    @if ($role == 'doctor')
                    <form action="{{ url('/appointments/'.$appointment->id.'/confirm') }}" method="post" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success"><i class="icon-copy dw dw-checked"></i></button>
                    </form>
                    @endif
                    <form action="{{ url('/appointments/'.$appointment->id.'/cancel') }}" method="post" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger"><i class="icon-copy dw dw-cancel"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>