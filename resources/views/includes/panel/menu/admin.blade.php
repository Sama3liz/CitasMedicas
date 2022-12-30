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
    <a href="{{ url('/appointments') }}" class="dropdown-toggle no-arrow">
        <span class="micon dw dw-calendar1"></span><span class="mtext">{{__('Appointments')}}</span>
    </a>
</li>
<li>
    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
        <span class="micon dw dw-analytics"></span><span class="mtext">{{__('Sales')}}</span>
    </a>
</li>