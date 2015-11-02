@extends('blog.layouts.default')

@include('blog.layouts.header')
@include('blog.layouts.sidebar')

@section('content')
<div class="col-lg-8 no-margin">
	<div class="alert alert-default"><h3 class="no-margin"><i class="glyphicon glyphicon-search"></i>  {{$count}} Result found for keyword : <b>{{$keyword}}</b></h3> </div>
	@foreach($posts as $post)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class = "no-margin">
					<a class="title" href="/blog/article/{{$post->id}}">{{$post->title}}</a>
					@if(Auth::check())
					<small>
						<a href="/blog/admin/posts/edit/{{$post->id}}"><i class="glyphicon glyphicon-pencil"></i></a>
					</small>
					@endif
				</h2>
				<hr class="no-margin">
				 <small><i>
				 {{$post->users->display_name}}, {{date("d F Y",strtotime($post->post_date))}}
				<b> || </b>
				<span class="disqus-comment-count" data-disqus-url="http://andriansatria.com/blog/article/{{$post->id}}">comment</span>
				<b> || </b>
				Categories :
				<?php $i = 0; ?>
				<?php $j = $post->categories->count(); ?>
				@foreach($post->categories as $category)
					@if($i == $j-1)
						<a href="/blog/category/{{$category->id}}">{{$category->name}}</a> 
					@else
					  	<a href="/blog/category/{{$category->id}}">{{$category->name}}</a>,
					@endif
						<?php $i++; ?>
				@endforeach
				</i></small>	
			</div>
			<div class="panel-body">
				@if($post->head_article)
				{!! $post->head_article !!} <br><a href="/blog/article/{{$post->id}}">read more...</a>
				@else
				{!! $post->article !!} <br><a href="/blog/article/{{$post->id}}">read more...</a>
				@endif
			</div> 
		</div>
	@endforeach
	<section id='pagination'>
		<div align="center">
		{!!$posts->render()!!} <!--menggunakan append untuk menambahkan variabel di url, see controller -->
		<!--{!!str_replace("?page", "page", $posts->render())!!} modif render agar url sesuai begitu pula di conttrollernya-->
		</div>
	</section><!-- End Pagination -->
</div>
@stop

@section('script')
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'andriansatria';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
@stop

