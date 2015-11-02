@extends('blog.layouts.default')

@section('content')

<h1>Post Admin Panel</h1>
<hr>
	<p>Here you can view, delete, and create new Post</p>
<hr>
<p>{!! HTML::link('blog/admin/posts/new','New Post', array('class' => 'btn btn-info', 'role'=>'button')) !!}</p>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <!-- Table -->
 <table class="table table-striped">
	<tr class="table active">
	    <th width="20%">Title</th>
	    <th width="15%">Author</th>		
	    <th width="20%">Categories</th>
	    <th width="15%">Post Date</th>
	    <th width="5%"><span class='glyphicon glyphicon-comment'></span></th>
	    <th width="5%">Enable</th>
	    <th width="20%" align="center">Options</th>
	</tr>	 
		@foreach($posts as $post)
			<tr>
				<td><a href="/blog/article/{{$post->id}}">{{$post->title}}</a> </td>
				<td>{{$post->users->display_name}}</td>
				<td>
					<?php $i = 0; ?>
					<?php $j = $post->categories->count(); ?>
					@foreach($post->categories as $category)
							@if($i == $j-1)
							{{$category->name}}
							@else
							{{$category->name}},
							@endif
							<?php $i++; ?>
					@endforeach
				</td>
				<td>
					{{date("d-m-Y",strtotime($post->post_date))}}, {{date("H:m",strtotime($post->post_date))}}
				</td>
				<td>
					<a href="/blog/admin/comments"><span class="badge badge-comment">{{$post->comments->count()}}</span></a>
				</td>
				<td>
				{!! Form::checkbox('enabled',1,$post->enabled, array(
	        		'readonly',
	        		'type'=>"checkbox", 
	        		'name'=>"enabled",
	        		'data-size'=>'mini',  
	        		'data-on-text'=>"<span class='glyphicon glyphicon-ok'></span>",
	        		'data-off-text'=>"<span class='glyphicon glyphicon-remove'></span>",
	        		'data-on-color'=>"success", 
	        		'data-off-color'=>"danger"
	        	)) !!}
				</td>
				<td>
					<div class="btn-group" role="group" aria-label="options">
						<a href="#" data-toggle="modal" data-target="#prevModal{{$post->id}}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
						<a href="/blog/admin/posts/edit/{{$post->id}}" data-toggle="modal" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
						<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delModal{{$post->id}}" ><i class="glyphicon glyphicon-trash"></i></a>
					</div>
				
				<!--Preview modal-->
				<div class="modal fade bs-example-modal-lg" id="prevModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="prevModal" aria-hidden="true" style="max-height:700px;
    overflow:true;">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Post Preview</h4>
				      </div>
				      <div class="modal-body">
				      	<h2>{{$post->title}}</h2>
							<i><small>
								{{$post->users->display_name}}, {{date("d F Y",strtotime($post->post_date))}}
							<b> || </b>
							Categories :
							@foreach($post->categories as $category)
								<a href="/blog/category/{{$category->id}}">{{$category->name}}</a>,   
							@endforeach
							</small></i>
							<hr>	
							
							
							<div>
								{!! str_replace("[break]", "", $post->article )!!}
							</div> 
				      	</div>
					      <div class="modal-footer">
							 <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
					      </div>
				    </div>
				  </div>
				</div> <!--end of Preview modal -->
			
				<!--delete modal-->
				<div class="modal fade" id="delModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="delModal" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
				      </div>
				      <div class="modal-body">
				      	Are you sure to delete this <b>"{{$post->title}}"</b> by {{$post->users->display_name}}?
				      	</div>
					      <div class="modal-footer">
					       
					        {!!Form::open(array('url'=>'blog/admin/posts/destroy','class'=>'form-inline'))!!}
							{!!Form::hidden('id',$post->id)!!}
							<button type="submit" class="btn btn-info">Yes</button>
							 <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
							{!!Form::close()!!}
					      
					      </div>
				    </div>
				  </div>
				</div> <!--end of delete modal -->
				</td>
			</tr>	
		@endforeach
	</table>


</div>
<section id='pagination'>
		<div align="center">
		{!!$posts->render()!!}
		</div>
	</section><!-- End Pagination -->
<!--
<div class="well">
	<h2>Create New Post</h2>
		@if($errors->has())
			<div id="form-errors">
				<p>The following errors have occured </p>
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	{!!Form::open(array('url'=>'blog/admin/posts/create', 'files' => true, 'method' => 'post'))!!} <!--karena ada upload file harus ditambahkan atribut 'files'=>'true'-->
	<!--
	<div class="form-group">
		<p>
			{!!Form::label('category_id', 'Category')!!}
			{!!Form::select('category_id', $categories)!!}
		</p>
		<p>
			{!! Form::label('title')!!}
			{!! Form::text('title') !!}
		</p>
		<p>
			{!!Form::label('article')!!}
			{!! Form::textarea('article', null, array('id'=>'summernote')) !!}	
		</p>
		{!!Form::submit('Create Product', array('class'=>'secondary-cart-btn'))!!}
	</div>
	{!!Form::close()!!}
	
</div>-->


@stop