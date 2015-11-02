
<?php use Carbon\Carbon;?>
@section('sidebar')
<div class="col-lg-4 col-press"> 
	 {!!Form::open(array('url'=>'blog/search', 'method'=>'get',  'role'=>'search'))!!}
                <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
			        	<i class="glyphicon glyphicon-search"></i></span>
                {!!Form::text('keyword', null, array('placeholder'=>'Press Enter to Search', 'class'=>'form-control'))!!}
                </div>
            	</div>
	{!!Form::close()!!}
	<div class="panel panel-default">
	  <div class="panel-heading "><span class="badge"><i class="glyphicon glyphicon-file"></i></span> <b">Last Post</b></div>
	   <ul class="list-group">
	  	@foreach($lastposts as $lastpost)
			<a href="/blog/article/{{$lastpost->id}}" class="list-group-item">//: {{$lastpost->title}}<br><small class="ago">{{Carbon::createFromTimeStamp(strtotime($lastpost->post_date))->diffForHumans()}}</small>  </a>
		@endforeach
	  </ul>
	</div>
	
	<div class="panel panel-default">
	  <div class="panel-heading"><span class="badge"><i class="glyphicon glyphicon-list-alt"></i></span> <b>Categories</b></div>
	   <ul class="list-group">
	  	@foreach($categories as $category)
	  	@if($category->postsEnabled->count() > 0) 
			<a href="/blog/category/{{$category->id}}" class="list-group-item">//: {{$category->name}}<span class="badge">{{$category->postsEnabled->count()}}</span></a> 
		@endif
		@endforeach
	  </ul>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading"><span class="badge"><i class="glyphicon glyphicon-globe"></i></span> <b>Visitors</b></div>
	   <div class="panel-body" align="center">
	 	<a href="http://www.visitormap.org/" target="_top"><img src="http://www.visitormap.org/map/m:cbfapwmpieajiphj/s:1/c:ffffff/p:dot/y:0.png" alt="Free Visitor Maps at VisitorMap.org" border="0"></a><br><a href="http://www.visitormap.org/">Get a FREE visitor map for your site!</a>

	  </div>
	</div>


	
</div>

@stop
