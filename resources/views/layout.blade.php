<html lang="en">	
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Ceaser Messages</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.css">
</head>
<body>

<div class="container">
		@yield('content')
	</div>
	
	<script  src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	crossorigin="anonymous"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.js"></script>
	<script src="{{asset('js/app.js')}}"></script>
	@yield('scripts')
</body>
</html>