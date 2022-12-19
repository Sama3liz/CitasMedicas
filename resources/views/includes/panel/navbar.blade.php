<div class="header">
    <div class="header-left">
        {{-- Collapse BTN --}}
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        {{--  User Options --}}
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{asset('vendors/images/photo1.jpg')}}" alt="">
                    </span>
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i>{{__('Profile')}}</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i>{{__('Help')}}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="dw dw-logout"></i>{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="github-link">
            <a href="https://github.com/" target="_blank"><img src="{{ asset('vendors/images/github.svg') }}" alt=""></a>
        </div>
    </div>
</div>