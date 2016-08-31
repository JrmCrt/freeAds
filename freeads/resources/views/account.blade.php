
@extends('index')

@section('content')
    <h1> My account </h1>
  
   {!! Form::open(array('url' => 'account/edit')) !!}
   <p>name:{{ Form::text('name', $info->name)}}</p>
   <p>lastname:{{ Form::text('lastname', $info->lastname)}}</p>
    <p>email :{{ Form::email('email', $info->email) }} </p>
    <p>password :{{ Form::password('password') }} </p>
    {{ Form::submit() }}
	{!! Form::close() !!}


@stop