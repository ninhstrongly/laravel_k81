<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<base href="{{ asset('Backend') }}/">
	<!-- css -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet">
	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>
	<link rel="stylesheet" href="Awesome/css/all.css">
</head>
<body>

{{--============= HEADER =============--}}
	@include('backend.master.header')

{{-- ============SIDEBAR============= --}}

	@include('backend.master.sidebar')

{{---============CONTENT=============--}}
    @yield('content')
	

	<!-- javascript -->
	@section('script')
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	
	@show

</body>

</html>