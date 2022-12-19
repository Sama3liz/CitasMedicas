<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <div class="sidebar-small-cap mt-1">
                        @if (auth()->user()->role == 'admin')
                            {{__('Management')}}
                        @else
                            {{__('Menu')}}
                        @endif
                    </div>
                </li>
                @if (auth()->user()->role == 'admin')
                    <li>
                        <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">{{__('Home')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('specialties') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-briefcase"></span><span class="mtext">{{__('Medical Specialties')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/medics') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-stethoscope"></span><span class="mtext">{{__('Medics')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/patients') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-library"></span><span class="mtext">{{__('Pacients')}}</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <div class="sidebar-small-cap">{{__('Reports')}}</div>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-calendar1"></span><span class="mtext">{{__('Appointments')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-analytics"></span><span class="mtext">{{__('Sales')}}</span>
                        </a>
                    </li>
                @elseif(auth()->user()->role == 'doctor')
                    <li>
                        <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">{{__('Home')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/schedule')}}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-calendar"></span><span class="mtext">{{__('Schedule')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/appointments')}}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-wall-clock"></span><span class="mtext">{{__('Appointments')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-user-2"></span><span class="mtext">{{__('Patients')}}</span>
                        </a>
                    </li>
                @elseif(auth()->user()->role == 'patient')
                    <li>
                        <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">{{__('Home')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/book/create') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-calendar"></span><span class="mtext">{{__('Book Appointment')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/appointments')}}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-wall-clock"></span><span class="mtext">{{__('Appointments')}}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>