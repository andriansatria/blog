@extends('blog.layouts.default')

@section('content')
	<h1>Edit Post</h1><hr>
	<p>Edit your post here.</p>
	{!!Form::open(array('url'=>'blog/admin/posts/update', 'files' => true, 'method' => 'post'))!!} <!--karena ada upload file harus ditambahkan atribut 'files'=>'true'-->
	<h2>Update Post
		
	</h2>

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
	
	<div class="form-group">
			{!! Form::hidden('id',$post->id)!!}
		<div class="form-group">
			{!! Form::label('title')!!}
			{!! Form::text('title', $post->title, array('class' => 'form-control')) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Post Date')!!}
            <div class='input-group date' id='datetimepicker1'>
                {!! Form::text('post_date', $post->post_date, array('class' => 'form-control')) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
        	{!!Form::label('enabled', 'Enable')!!}<br>
        	{!! Form::checkbox('enabled',1,$post->enabled, array(
        		'type'=>"checkbox", 
        		'name'=>"enabled",  
        		'data-on-text'=>"<span class='glyphicon glyphicon-ok'></span>",
        		'data-off-text'=>"<span class='glyphicon glyphicon-remove'></span>",
        		'data-on-color'=>"success", 
        		'data-off-color'=>"danger"
        	)) !!}
        </div>
		<div class="form-group">	
		{!!Form::label('category_id', 'Category')!!}				
		{!!Form::select('category_id[]', $categories, $postcats, array('class' => 'form-control','multiple', 'size'=>'2'))!!}
		</div>  
		<div class="form-group">
			{!!Form::label('article')!!}
			<textarea name='article' id='posteditor' class= "form-control">{!! htmlspecialchars($post->article) !!}</textarea>
			<!--{!! Form::textarea('article', $post->article, array('id'=>'editor1', 'class' => 'form-control')) !!}-->	
		</div>

		

		{!!Form::submit('Update Post', array('class'=>'btn btn-info'))!!}  {!!HTML::link('blog/admin/posts', 'Cancel', array('class'=>'btn btn-info'))!!}
	</div>
	{!!Form::close()!!}
@stop

@section('script')
<script>
    CKEDITOR.replace( 'posteditor' );
</script>
@stop