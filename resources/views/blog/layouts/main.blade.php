<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
<title>SimpleBlog</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="//code.jquery.com/jquery-1.9.1.min.js"></script> 
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet"> 
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> 
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
 
 {!!HTML::style('summernote/summernote.css')!!}
 {!!HTML::script('summernote/summernote.js')!!}
 {!!HTML::style('sb_css/SimpleBlog.css')!!}
</head>
<body>
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
<div id="wrap">
  <div id="header">
    <h1 id="logo">Simple<span class="gray">Blog</span></h1>
    <h2 id="slogan">Put your site slogan here...</h2>
    <div id="searchform">
      <form method="post" class="search" action="http://all-free-download.com/free-website-templates/">
        <p>
          <input name="search_query" class="textbox" type="text" />
          <input name="search" class="button" type="submit" value="search" />
        </p>
      </form>
    </div>
  </div>
  <div id="menu">
    <ul>
      <li id="current"><a href="http://all-free-download.com/free-website-templates/"><span>Home</span></a></li>
      <li><a href="http://all-free-download.com/free-website-templates/"><span>Archives</span></a></li>
      <li><a href="http://all-free-download.com/free-website-templates/"><span>Downloads</span></a></li>
      <li><a href="http://all-free-download.com/free-website-templates/"><span>Services</span></a></li>
      <li><a href="http://all-free-download.com/free-website-templates/"><span>Support</span></a></li>
      <li><a href="http://all-free-download.com/free-website-templates/"><span>About</span></a></li>
    </ul>
  </div>
  <div id="content-wrap">
    <div id="sidebar">
      <h1>Sidebar Menu</h1>
      <ul class="sidemenu">
        <li><a href="http://all-free-download.com/free-website-templates/">Home</a></li>
        <li><a href="#TemplateInfo">Template Info</a></li>
        <li><a href="#SampleTags">Sample Tags</a></li>
        <li><a href="http://all-free-download.com/free-website-templates/">More Free Templates</a></li>
        <li><a href="http://all-free-download.com/free-website-templates/">Premium Templates</a></li>
      </ul>
    </div> <!-- End of sidebar -->

    <div id="main"> 
      gtetsetras
      @if(Session::has('message'))
        <p> {{Session::get('message')}} </p>
      @endif
      @yield('content')
    </div> <!--End of main -->
  </div> <!-- End of content-wrap -->
  <div id="footer">
    <p> &copy; 2006 <strong>Your Company</strong> &nbsp;&nbsp; Design by: <a href="http://www.styleshout.com/">styleshout</a> | Valid: <a href="http://validator.w3.org/check/referer">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="http://all-free-download.com/free-website-templates/">Home</a>&nbsp;|&nbsp; <a href="http://all-free-download.com/free-website-templates/">Sitemap</a>&nbsp;|&nbsp; <a href="http://all-free-download.com/free-website-templates/">Home</a> </p>
  </div> <!-- end of footer -->
</div> <!-- end of wrap -->

</body>
</html>
