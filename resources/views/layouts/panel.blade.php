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
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/switchery/switchery.min.css') }}">
	@yield('styles')	
</head>
<body class="header-white sidebar-light">
    {{-- Pre Loader --}}
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{asset('vendors/images/deskapp-logo.svg')}}" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				{{__('Loading')}}...
			</div>
		</div>
	</div>
    {{-- Navbar --}}
	@include('includes.panel.navbar')
    {{-- Left Panel --}}
	@include('includes.panel.menu')
	<div class="mobile-menu-overlay"></div>
    {{-- Content Begin --}}
    @yield('content')
    {{-- Content End --}}
	<!-- js -->
	
	<script src="{{ asset('vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
	<script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('src/plugins/switchery/switchery.min.js') }}"></script>
	{{-- <script src="{{ asset('vendors/scripts/dashboard.js') }}"></script> --}}
	@yield('scripts')
</body>
</html>