<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <style type="text/css">
    	.spacer {
    		height: 70px;
    	}
   
 
    	.container {
    		width: 100%;
    	}
    </style>
</head>
<body>
	
	<!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="" class="navbar-brand">Laravel Test</a>
            </div>
            <!-- navbar header -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#feedback">Test 1</a></li>
                    <li><a href="#galery">Test 2</a></li>
                    <li><a href="#feature">Test 3</a></li>
                    <li><a href="#faq">Test 4</a></li>
                    <li><a href="#contact">Test 5</a></li>
                </ul>
            </div>
        </div>
    </nav>
       <!-- End Navbar --> 
    <div class="spacer"></div>

   @if(Session::has('message'))
		<div class="alert alert-success" role="alert">
			{{Session::get('message')}}
		</div>
	@endif
 	<div class="container">
        <section>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
  						<div class="panel-heading">
  							@yield('header')
  						</div>
  						<div class="panel-body">
   						 	@yield('content')
 						</div>
					</div>
                </div>
            </div> <!-- End Row -->
        </section>
    </div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.3.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>