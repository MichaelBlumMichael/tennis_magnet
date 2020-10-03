<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> {{ $page_title ?? 'Tennis Magnet' }}</title>
<link href="{{asset('images/demo/logo.png')}}" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="{{asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="{{asset('fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="{{ asset('css/ui.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css">

<!-- custom javascript -->
<script>var BASE_URL = "{{url('')}}/" </script>
</head>
<body>

<header class="section-header">
<section class="header-main border-bottom">
	<div class="container">
		<div class="row align-items-center d-flex justify-content-center">
			<div class="d-flex col-xl-2 col-lg-2 col-md-12">
				<a href="{{url('/')}}">
				<img class="logo brand-wrap-main" src="{{asset('images/demo/logo.png')}}">
				</a> <!-- brand-wrap.// -->
			</div>
			<div class="d-flex col-xl-6 col-lg-5 col-md-6">
				<a href="{{url('/')}}"></a>
				<img class="logo-text d-none d-lg-block" src="{{asset('images/demo/logo-text.JPG')}}">			
			</div> <!-- col.// -->
			<div class="col-xl-4 col-lg-4 col-md-6">
				<div class="widgets-wrap float-md-right">
					<div class="widget-header mr-3">
						<a href="#" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-user"></i>
							</div>
							@if(Session::has('user_id'))
							<small class="text"> {{Session::get('user_name')}} </small>
							@else
							<small class="text"> My profile </small>
							@endif
						</a>
					</div>

					<div class="widget-header">
						<a href="{{url('shop/cart')}}" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-shopping-cart"></i>
							</div>
							@if(! Cart::isEmpty())
								<span class="notify">{{ Cart::getTotalQuantity() }}</span>
                  			@endif
							<small class="text"> Cart </small>
						</a>
					</div>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->

<nav class="navbar navbar-main navbar-expand-lg border-bottom">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav">
		
      	<li class="nav-item">
           <a class="nav-link" href="{{url('shop')}}">Our Categories</a>
		</li>
		@if(! empty($menu))
			@foreach($menu as $menu_item)
				<li class="nav-item">
					<a class="nav-link" href="{{url($menu_item['url'])}}">{{$menu_item['page_name']}}</a>
				</li>
		@endforeach
		@endif
		@if(Session::get('is_admin'))
			<li class="nav-item">
				<a target="_blank" class="nav-link" href="{{url('cms/dashboard')}}">Cms-DashBoard</a>
			</li>
		@endif
      </ul>
      <ul class="navbar-nav ml-md-auto">
		@if(! Session::has('user_id'))
      	  <li class="nav-item">
            <a class="nav-link" href="{{url('user/login')}}">Log in</a>
          </li>
      	  <li class="nav-item">
			<a class="nav-link" href="{{url('user/signup')}}">Sign-Up</a>
		  </li>
		@endif
		@if(Session::has('user_id'))
		<li class="nav-item">
			<a class="nav-link" href="{{url('user/logout')}}">Log-Out</a>
		  </li>
		@endif
	   </ul>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>
</header> <!-- section-header.// -->



	@yield('main_content');


<footer class="section-footer bg-secondary">
	<div class="container-fluid">
		<section class="footer-bottom text-center">
		
				<p class="text-white">Privacy Policy - Terms of Use - User Information Legal Enquiry Guide</p>
				<p class="text-white"> &copy {{ date('Y') }} Tennis Magnet, All rights reserved </p>
				<br>
		</section>
	</div><!-- //container -->
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if( Session::has('sm'))
<script>
    toastr.options.positionClass = 'toast-bottom-center';
    toastr.success("{{ Session::get('sm') }}");
</script>
@endif
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>