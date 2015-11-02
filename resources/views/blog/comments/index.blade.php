@extends('blog.layouts.default')
@section('content')

	<h1>Comment Admin Panel</h1>
	<hr>
		<p>Here you can Manage your post comments</p>
	<hr>
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <!-- Table -->

	  <table class="table">
		<tr class="table active">
		    <th width="15%">From</th>
		    <th width="15%">Email</th>		
		    <th width="25%">Comments</th>
		    <th width="25%">On Post</th>
		    <th width="15%">Date</th>
		    <th width="15%">Enabled</th>
		    <th width="5%">Options</th>
		</tr>	 
			
			@foreach($comments as $comment)
				<tr>
					<td>{{$comment->user}} </td>
					<td>{{$comment->email}} </td>
					<td>{{$comment->comment}} </td>
					<td><a href="../article/{{$comment->posts->id}}">{{$comment->posts->title}} </a></td>
					<td>{{$comment->created_at}} </td>
					<td>
						{!!Form::open(array('url'=>'blog/admin/comments/update','class'=>'form-inline'))!!}
						{!!Form::hidden('id',$comment->id)!!}
						{!! Form::checkbox('cm_enabled',1,$comment->enabled, array(
				    		'type'=>"submit", 
				    		'name'=>"cm_enabled",
				    		'data-size'=>'mini',  
				    		'data-on-text'=>"<span class='glyphicon glyphicon-ok'></span>",
				    		'data-off-text'=>"<span class='glyphicon glyphicon-remove'></span>",
				    		'data-on-color'=>"success", 
				    		'data-off-color'=>"danger"
				    	)) !!}
				    	{!!Form::submit('submit', array('class' =>  'btn btn-info btn-xs'))!!}
				    	{!!Form::close()!!}
					</td>
					<td>
						{!!Form::open(array('url'=>'blog/admin/comments/destroy','class'=>'form-inline'))!!}
						{!!Form::hidden('id',$comment->id)!!}
						{!!Form::submit('X', array('class' =>  'btn btn-danger btn-xs'))!!}
						{!!Form::close()!!}
						
					</td>
				</tr>	
			@endforeach
		</table>
		<section id='pagination'>
			<div align="center">
			{!!$comments->render()!!}
			</div>
		</section><!-- End Pagination -->

	</div>

@stop