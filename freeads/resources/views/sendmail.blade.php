
@extends('index')

@section('content')
    <h1>Send Mail </h1>
  
	
	<p> {{ Html::link("mail/inbox",  'Inbox' ) }} </p>
	<p> {{ Html::link("mail/send",  'Send mail' ) }} </p>
	
	{!! Form::open(array('url' => "mail/send/$user->id")) !!}
   		<p>To : {{ $user->username}}</p>
   		<p>Text : </p>
   		{{ Form::textarea('text')}}
	    <p>{{ Form::submit() }}</p>
		{!! Form::close() !!}

@stop