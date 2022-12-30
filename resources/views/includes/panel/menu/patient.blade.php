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
    <a href="{{ url('/appointments') }}" class="dropdown-toggle no-arrow">
        <span class="micon dw dw-wall-clock"></span><span class="mtext">{{__('Appointments')}}</span>
    </a>
</li>