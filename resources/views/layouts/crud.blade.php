<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>CRUD Personas</title>
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
      
      <link href="{{ asset('css/crud.css')}}" rel="stylesheet" type="text/css">
      <link href="{{ asset('js/angular-assets/angular-ui-notification.min.css')}}" rel="stylesheet" type="text/css">
      <script src="{{ asset('js/jquery.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/angular/angular.min.js') }}"></script>
      <script src="{{ asset('js/angular-assets/angular-ui-router.min.js') }}"></script>
      <script src="{{ asset('js/angular-assets/angular-resource.min.js') }}"></script>
      <script src="{{ asset('js/angular-assets/angular-ui-notification.min.js') }}"></script>
      <script src="{{ asset('js/angular-assets/angular-messages.min.js') }}"></script>
      <script src="{{ asset('js/angular-assets/angular-mocks.js') }}"></script>
      <script src="{{ asset('js/angular-assets/angular-animate.min.js') }}"></script>      
      <script src="{{ asset('js/underscore.min.js') }}"></script>
      @yield('templates')
    </head>
    <body ng-app='app_crud'>
    	<div class="workshop">
				<div class="page-header">
					<div class="title">
						@yield('title')
					</div>
				</div>
				<div class="container">
					@yield('content')
				</div>
    	</div>
        @yield('scripts')
    </body>
</html>