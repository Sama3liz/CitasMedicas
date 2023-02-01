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
                    @if ($appointment->status == 'Confirmed')
                        <span class="badge badge-success">{{$appointment->status}}</span>
                    @endif
                    @if ($appointment->status == 'Cancelled')
                        <span class="badge badge-danger">{{$appointment->status}}</span>
                    @endif
                    @if ($appointment->status == 'Reserved')
                        <span class="badge badge-secondary">{{$appointment->status}}</span>
                    @endif
                </td>
                <td>
                    @if ($role == 'admin')
                    <form action="{{ url('/appointments/'.$appointment->id) }}" method="get" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-info"><i class="icon-copy dw dw-search1"></i></button>
                    </form>
                    <div class="d-inline-block">
                        <a href="{{ url('/appointments/'.$appointment->id.'/invoice') }}" class="btn btn-sm btn-secondary"><i class="icon-copy dw dw-file text-white"></i></a>
                    </div> 
                    @endif
                    @if ($role == 'doctor' && $appointment->status != 'Confirmed')
                    <form action="{{ url('/appointments/'.$appointment->id.'/confirm') }}" method="post" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success"><i class="icon-copy dw dw-checked"></i></button>
                    </form>
                    @endif
                    @if ($role == 'doctor' && $appointment->status == 'Confirmed')
                    <div class="d-inline-block">
                        <a href="{{ url('/appointments/'.$appointment->id.'/appointment') }}" class="btn btn-sm btn-info"><i class="icon-copy dw dw-checked text-white"></i></a>
                    </div>
                    @endif
                    @if ($role == 'patient')
                    <div class="d-inline-block">
                        <a href="{{ url('/appointments/'.$appointment->id.'/invoice') }}" class="btn btn-sm btn-secondary"><i class="icon-copy dw dw-file text-white"></i></a>
                    </div> 
                    @endif                    
                    <div class="d-inline-block">
                        <a href="{{ url('/appointments/'.$appointment->id.'/cancel') }}" class="btn btn-sm btn-danger"><i class="icon-copy dw dw-cancel text-white"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>