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
                @include('includes.panel.menu.'.auth()->user()->role)
            </ul>
        </div>
    </div>
</div>