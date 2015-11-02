@extends('blog.layouts.default')

@section('content')
	<div class="login"> 
	<div class="col-lg-6 col-lg-offset-3 ">
	<section id="signin-form" align="center">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1>Login here</h1>
			</div>
			<div class="panel-body active">
				{!! Form::open(array('url'=>'blog/users/signin')) !!}
			        <div class="input-group">
			        	<span class="input-group-addon" id="basic-addon1">
			        		<i class="glyphicon glyphicon-envelope"></i></span>
			        	{!! Form::text('email',null, array('class'=>'form-control', 'placeholder'=>'Enter your mail') )!!}
			        </div><br>
			        <div class="input-group">
			        	<span class="input-group-addon" id="basic-addon1">
			        	<i class="glyphicon glyphicon-lock"></i></span>
			        	{!! Form::password('password', array('class' => 'form-control','placeholder'=>'Enter your password' )) !!}
			        </div><br>
			    	{!! Form::button('Sign In', array('type'=>'submit', 'class'=>'btn btn-primary')) !!}
			    {!! Form::close() !!}
			</div>
	    </div>
	</section><!-- end signin-form -->
	</div>
	</div>
@stop