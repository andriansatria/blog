@extends('blog.layouts.default')

@section('content')
	<h1>Create a New Post</h1><hr>
	<p>Please create your new post here.</p>
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
	
	<div class="form-group ">
		
		<div class="form-group">
			{!! Form::label('title')!!}
			{!! Form::text('title', null, array('class' => 'form-control')) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Post Date')!!}
            <div class='input-group date' id='datetimepicker1'>
                {!! Form::text('post_date', $carbon, array('class' => 'form-control')) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
       <div class="form-group">
    	{!!Form::label('enabled', 'Enable')!!}<br>
    	{!! Form::checkbox('my-checkbox',1,null, array(
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
		{!!Form::select('category_id[]', $categories, ['1'], array('class' => 'form-control','multiple', 'size'=>'5'))!!}
		</div>  
		
		<div class="form-group">
			{!!Form::label('article')!!}
			{!! Form::textarea('article', null, array('id'=>'posteditor', 'class' => 'form-control')) !!}	
		</div>

		
		{!!Form::submit('Create Post', array('class'=>'btn btn-info'))!!}  {!!HTML::link('blog/admin/posts', 'Cancel', array('class'=>'btn btn-info'))!!}
	</div>
	{!!Form::close()!!}
@stop
@section('script')
<script>
    CKEDITOR.replace( 'posteditor' );
</script>
@stop