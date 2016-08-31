@extends('index')

@section('content')
<h1> Sign in </h1>



{!! Form::open(array('url' => 'signin')) !!}
    <p>Username :{{ Form::text('username') }} </p>
    <p>name :{{ Form::text('name') }} </p>
    <p>lastname :{{ Form::text('lastname') }} </p>
    <p>birthdate :{{ Form::date('birthdate') }} </p>
    <p>password :{{ Form::password('password') }} </p>
    <p>email :{{ Form::email('email') }} </p>
    {{ Form::submit('submit') }}
{!! Form::close() !!}

@if(isset($message))
        {{ $message }}
@endif

@stop