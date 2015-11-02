@extends('blog.layouts.default')

@include('blog.layouts.header')
@include('blog.layouts.sidebar')

@section('content')
<div class="col-lg-8 no-margin">
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
			{!! str_replace("[break]", "", $post->article )!!}
			<hr>
			@if($previous->count()>0)
			<div class="col-lg-6 no-margin"><a href="{{$previous[0]->id}}"><~ {{$previous[0]->title}}</a></div>
			@else
			<div class="col-lg-6 no-margin"></div>
			@endif

			@if($next->count()>0)
			<div class="col-lg-6 no-margin" align='right'><a href="{{$next[0]->id}}">{{$next[0]->title}} ~></a></div>
			@endif
		</div>

	</div> 
	<div class="panel panel-default">
		<div class="panel-body">		
			<div id="disqus_thread"></div>
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'andriansatria';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
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
