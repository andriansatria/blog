<html>
    <head>
        <title></title>
        {!! HTML::style('sb_css/bootstrap.min.css') !!}
	     {!! HTML::script('sb_js/jquery.js') !!}
         {!! HTML::style('css/bootstrap-datetimepicker.css') !!}
        <!-- Bootstrap Core JavaScript -->
        {!! HTML::script('sb_js/bootstrap.min.js') !!}
        {!! HTML::script('js/vendor/moment.js') !!}
        {!! HTML::script('js/vendor/bootstrap-datetimepicker.js') !!}
    </head>
 
    <body align="center">
        <div class="container">
    <div class="row">
        <div class='col-sm-6' >
            <div class="form-group">
                <div align = "center" class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" align="center"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                      format: 'DD/MM/YYYY HH:mm:ss', 
                });
            });
        </script>
    </div>
</div>
    </body>
</html>