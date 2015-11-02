@extends('blog.layouts.default')

@section('content')
	
		<h1>Categories Admin Panel</h1><hr>
		<p>Here you can view, delete, and create new categories.</p>
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<div class="panel-heading">List of Categories</div>
			 <div class="panel-body">
			 	<table class="table">
					<tr class="table active">
					    <th width="20%">Name</th>
					    <th width="35%">Description</th>		
					    <th width="20%">Post</th>
					    <th width="25">Options</th>
					</tr>	 
					@foreach($categories as $category)
						<tr>
							<td>{{ $category->name }}</td>
							<td>{{ $category->description }}</td>
							<td><span class="badge">{{$category->posts->count()}}</span></td>
							<td>
								{!! Form::open(array('url'=>'blog/admin/categories/edit','class'=>'form-inline','method'=>'GET')) !!}
								{!! Form::hidden('id', $category->id) !!}
								{!! Form::submit('edit', array('class' =>  'btn btn-info')) !!}
								{!! Form::close() !!}

								{!! Form::open(array('url'=>'blog/admin/categories/destroy','class'=>'form-inline')) !!}
								{!! Form::hidden('id', $category->id) !!}
								{!! Form::submit('delete', array('class' =>  'btn btn-info')) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</table>
				<section id='pagination'>
					<div align="center">
					{!!$categories->render()!!}
					</div>
				</section><!-- End Pagination -->
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<div class="panel-heading">Create new Category</div>
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

			{!! Form::open(array('url'=>'blog/admin/categories/create')) !!}
			<div class="form-group">
				{!! Form::label('name') !!}
				{!! Form::text('name',null,array('class'=>'form-control')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('description') !!}
				{!! Form::textarea('description',null,array('class'=>'form-control',  'rows' => 5)) !!}
			</div>
		<!-- if want to add parent form
			<div class="form-group">
				{!!Form::label('parent_id', 'Parents')!!}
				{!! Form::select('parent_id', $parents) !!}
			</div> -->
			{!! Form::submit('Create Category', array('class' =>  'btn btn-info')) !!}
			{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop