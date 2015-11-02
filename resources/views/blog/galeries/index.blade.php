@extends('blog.layouts.default')



@section('content')
<h1>Galeries Page.<span class="small">Manage Files</span></h1><hr>
	<div class="col-lg-12">
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
				<div class="well">
					{!!Form::open(array('url'=>'blog/admin/galeries/create', 'files' => true, 'method' => 'post', 'class'=>'form-inline'))!!} <!--karena ada upload file harus ditambahkan atribut 'files'=>'true'-->
						{!! Form::label('path','Choose file to Upload : ')!!}
						<div class="form-group">
							{!! Form::file('path', null, array('class'=>'btn btn-primary')) !!}
						</div>
						{!!Form::submit('Post Image', array('class'=>'btn btn-primary'))!!}
					{!!Form::close()!!}
				</div>
		<div class="panel panel-primary">
			<div class="panel-heading">List of Files</div>
			<div class="panel-body">
				@foreach($galeries as $galery)
					<?php 
						$file = explode(".",$galery->path);
						if (end($file) == 'rar' || end($file) == 'zip' ) {
						 	$imgsrc = '/img/Folder-Compressed-icon.png';
						 } elseif (end($file) == 'pdf' ) {
						 	$imgsrc ='/img/Filetype-PDF-icon.png';
						 } 
						 else {
						 	$imgsrc = $galery->path;
						 }
					?>
					<div class="col-md-2">
						<div class="thumbnail">
						<div align="right" class="btn-float">
							{!!Form::open(array('url'=>'blog/admin/galeries/destroy','class'=>'form-inline'))!!}
							{!!Form::hidden('id',$galery->id)!!}
							{!!Form::submit('x', array('class' =>  'btn btn-info btn-xs '))!!}
							{!!Form::close()!!}
						</div>
						<img src="{{$imgsrc}}" class="img-rounded img-small" />
						{!! Form::textarea(null, $galery->path, array('class' => 'form-control', 'readonly'=> 'true', 'rows'=> '2')) !!}
						</div>
					</div>
				@endforeach
				
			</div>
			<section id='pagination'>
				<div align="center">
				{!!$galeries->render()!!}
				</div>
			</section><!-- End Pagination -->
	</div>
	
@stop