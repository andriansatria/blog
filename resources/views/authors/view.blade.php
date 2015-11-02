@extends('layouts.default')

@section('header')
	<h3>{{$author->name}}</h3>
@endsection
@section('content')
	<p>{{$author->bio}}</p>

	<p><small>{{$author->updated_at}}</small></p>
@endsection