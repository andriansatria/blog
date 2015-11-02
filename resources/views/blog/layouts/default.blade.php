<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <title>Blog Post - Start Bootstrap Template</title>
      <!-- Bootstrap Core CSS -->
    {!! HTML::style('sb_css/bootstrap.css') !!}
    {!! HTML::style('sb_css/blog-post.css') !!}
    {!! HTML::style('sb_css/bootstrap-datetimepicker.css') !!}
    {!! HTML::style('sb_css/font-awesome.css') !!}
    {!! HTML::style('sb_css/bootstrap-switch.css') !!}
    {!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/github.css') !!}
</head>

<body>
    
   @if(Auth::check())
    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/blog">andriansatria.com</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                </ul>
               

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                    
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 
                        <span class="glyphicon glyphicon-user"></span>
                        {{Auth::user()->firstname}}
                        <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                         <li>
                           {!! HTML::link('blog/admin/posts','Post') !!}
                        </li>

                        <li>
                           {!! HTML::link('blog/admin/categories','Category') !!}
                        </li>

                        <li>
                            {!! HTML::link('blog/admin/galeries','Galery') !!}
                        </li>

                        <li>
                            {!! HTML::link('blog/admin/comments','Comment') !!}
                        </li>
                         <li class="divider"></li>
                         <li>
                            {!! HTML::link('blog/users/signout','Sign Out') !!}
                        </li>
                      </ul>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
     @endif

    <div class="container">
        @yield('header')
    <!-- Page Content -->
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
                @if(Session::has('message'))
                    <div class="alert alert-info" role="info">
                      {{Session::get('message')}}
                    </div>
                @endif 
                @yield('content')
                @yield('sidebar')
            </div>
        </div>
        <!-- /.row -->
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; andriansatria.com 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
    </div>
    <!-- /.container -->

    
    <!-- jQuery -->
    {!! HTML::script('sb_js/jquery.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! HTML::script('sb_js/bootstrap.min.js') !!}
     {!! HTML::script('sb_js/moment.js') !!}
      {!! HTML::script('sb_js/bootstrap-datetimepicker.js') !!}
      {!! HTML::script('sb_js/bootstrap-switch.js') !!}
      {!! HTML::script('ckeditor/ckeditor.js') !!}
      {!! HTML::script('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') !!}
     <script type="text/javascript">
          $(document).ready(function() {
      $('#summernote').summernote({
      height: 300,                 // set editor height

      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor

      focus: true,                 // set focus to editable area after initializing summernote
    });;
    });
    </script>
    <script>hljs.initHighlightingOnLoad();</script>
     <script type="text/javascript">
          $(function () {
              $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                    useCurrent : true
              });
          });
         
      </script>
      <script type="text/javascript">
 $("[name='enabled']").bootstrapSwitch();
 $("[name='cm_enabled']").bootstrapSwitch();
 
</script>
<script type="text/javascript">
  !function ($) {
    $(function(){
      window.prettyPrint && prettyPrint()   
    })
  }(window.jQuery)
</script>
@yield('script')

</body>

</html>
