
@extends('index')

@section('content')
    <h1> Home </h1>
  
   
    {!! Form::open(array('url' => 'home')) !!}
    <p>email :{{ Form::email('email') }} </p>
    <p>password :{{ Form::password('password') }} </p>
    {{ Form::submit() }}
	{!! Form::close() !!}

	
	@if(isset($message))
		{{ $message }}
	@endif
@stop