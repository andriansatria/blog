@extends('layouts.default')

@section('header')
	<h1>New Char.  <small>Insert your char</small></h1>


@endsection

@section('content')
	<div class='col-lg-12'>
		{!! Form::open( array( 'url' => 'authors/create', 'method' => 'POST', 'class' => 'form-horizontal' ) ) !!}
		<div class="form-group">
			{!! Form::label('name','Name',array('class'=>'col-lg-2 control-label'))!!}
			<div class='col-lg-10'>
			{!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Enter the Name'))!!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('bio','Biography',array('class'=>'col-lg-2 control-label'))!!}
			<div class='col-lg-10'>
			{!! Form::textarea('bio',null,array('class'=>'form-control', 'placeholder'=>'Enter Biography') )!!}
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
        	{!! Form::submit('Add Char', array('class'=>'btn btn-info'))!!}
    	</div>
    </div>
    {!!Form::close()!!}

@endsection