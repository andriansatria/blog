<!-- file form from laravel application development book -->
<h1>File Upload</h1>
{!!Form::open(array('files' => true))!!}
{!!Form::label('myfile', 'My File')!!}
<br/>
{!!Form::file('myfile')!!}
<br>
{!!Form::submit('Send it')!!}
{!!Form::close()!!}
