@extends('blog.layouts.default')

@section('content')
	<h1>Create a New Post</h1><hr>
	<p>Please create your new post here.</p>

	<h2>Create New Post</h2>
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
	{!!Form::open(array('url'=>'blog/admin/posts/create', 'files' => true, 'method' => 'post'))!!} <!--karena ada upload file harus ditambahkan atribut 'files'=>'true'-->
	
	<div class="form-group">
		
		<div class="form-group">
			{!! Form::label('title')!!}
			{!! Form::text('title', $post->title, array('class' => 'form-control')) !!}
		</div>
		<div class="form-group">
		{!!Form::label('category_id', 'Category')!!}<br>
			<div class="input-group">
				@foreach($categories as $category)
				
					@if($post->categories->contains($category->id))
					<span >{!! Form::checkbox('categories', $category->id, true) !!}</span>
					@else
					<span >{!! Form::checkbox('categories', $category->id, false) !!}</span>
					@endif
					<span >{{$category->name}}</span> <br>
				@endforeach
		 	</div><!-- /input-group -->
		</div>
		
        
		<div class="form-group">
			{!!Form::label('article')!!}
			{!! Form::textarea('article', $post->article, array('id'=>'summernote', 'class' => 'form-control')) !!}	
		</div>
		{!!Form::submit('Create Post', array('class'=>'btn btn-info'))!!}  {!!HTML::link('blog/admin/posts', 'Cancel', array('class'=>'btn btn-info'))!!}
	</div>
	{!!Form::close()!!}
@stop

