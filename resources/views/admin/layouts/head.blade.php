<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>@yield('title', 'Admin Panel')</title>

	<!-- Global stylesheets -->
	<link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css" />
	<!-- /global stylesheets -->

	@yield('links')

	<!-- Core JS files -->
	<script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('assets/js/vendor/visualization/d3/d3.min.js') }}"></script>
	<script src="{{  asset('assets/js/vendor/visualization/d3/d3_tooltip.js') }}"></script>

	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('assets/demo/pages/dashboard.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard/streamgraph.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard/sparklines.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard/lines.js') }}"></script>	
	<script src="{{ asset('assets/demo/charts/pages/dashboard/areas.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard/donuts.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard/bars.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard/progress.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard/heatmaps.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard/pies.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard/bullets.js') }}"></script>
	<!-- /theme JS files -->

</head>