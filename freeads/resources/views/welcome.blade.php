@extends('index')

@section('content')
    <h1> HomePage </h1>
     <h2> Welcome {{ $username }}</h2>

     @if(isset($message))
		{{ $message }}
	@endif

@stop