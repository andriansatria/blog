@extends('blog.layouts.default')

@section('content')
<h1>Edit Category</h1><hr>
	<p>Edit your category here.</p>
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Update Category</div>
			<div class="panel-body">
			@if($errors->has())
			<div class="alert alert-danger">
				<p>The following errors have occured </p>
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!! Form::open(array('url'=>'blog/admin/categories/update',  'method' => 'post')) !!}
			{!! Form::hidden('id',$category->id) !!}
			<div class="form-group">
				{!! Form::label('name') !!}
				{!! Form::text('name',$category->name,array('class'=>'form-control')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('description') !!}
				{!! Form::textarea('description',$category->description,array('class'=>'form-control',  'rows' => 5)) !!}
			</div>
			{!! Form::submit('Update Category', array('class' =>  'btn btn-info')) !!} {!!HTML::link('blog/admin/categories', 'Cancel', array('class'=>'btn btn-info'))!!}
			{!! Form::close() !!}
			</div>
		</div>
	</div>
	
@stop