<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  Title --}}
    <title>{{ config('app.name') }}</title>
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/favicon-16x16.png') }}">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/jquery-steps/jquery.steps.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">    
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="{{ url('/') }}">
					<img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<!-- Authentication Links -->
                    @guest
                        @if (Route::has('login') && (Route::current()->getName() != 'login'))
                            <li>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        {{-- @if (Route::has('register') && (Route::current()->getName() != 'register'))
                            <li>
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        <li>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
				</ul>
			</div>
		</div>
	</div>
    <main class="py-4">
        @yield('content')
    </main>
	<!-- js -->
	<script src="{{ asset('vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
	<script src="{{ asset('src/plugins/jquery-steps/jquery.steps.js')}}"></script>
	<script src="{{ asset('vendors/scripts/steps-setting.js')}}"></script>
</body>
</html>