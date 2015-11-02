@extends('layouts.default')

@section('header')
	<h1>Char Homepage  <small>List of your char</small></h1>
@endsection
@section('content')
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod quam eget volutpat lobortis. Aliquam neque sem, fringilla sollicitudin ipsum sit amet, hendrerit varius quam. Nullam a posuere metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque aliquet ullamcorper augue sit amet volutpat. Fusce vitae porttitor quam. Ut suscipit magna eros, quis hendrerit turpis porttitor non. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent convallis, lorem id maximus fermentum, quam orci porttitor velit, eget maximus lectus purus vel erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a dignissim sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  							<h3>Here the list : </h3>
	<div class="list-group">
		@foreach($authors as $author)
			{!! Html::linkRoute('author',$author->name,array($author->id), array('class'=>'list-group-item'));!!}
			<!--<a href="author/{{$author->id}}" class="list-group-item">{{$author->name}}</a>
		<!--<li class="list-group-item">{{$author->name}}</li>-->
		@endforeach
	</div>
	{!!Html::linkRoute('new_author','New Author',null,array('class'=>'btn btn-info'))!!}
@endsection
