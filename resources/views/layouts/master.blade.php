<!DOCTYPE html>
<html>
<head>
	<title>
			Ecommerce | @yield('title')
	</title>

	@yield('extra-stripe')
	  <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('Ionicons/css/ionicons.min.css')}}">

        <!-- Styles -->
        
         <link rel="stylesheet"  href="{{asset('css/pages.css')}}">

</head>
<body>

	@include('includes.header')
	@yield('content')
	@include('includes.footer')
	@yield('extra-js')
	


 
</body>
</html>