
@extends('index')

@section('content')
    <h1> New ads </h1>
  
	{!! Form::open(array('url' => 'ads/new', 'files' => true)) !!}
   <p>title:{{ Form::text('title')}}</p>
   <p>description:{{ Form::text('description')}}</p>
    <p>price :{{ Form::number('price') }} </p>
    <p>picture :{{ Form::file('picture') }} </p>
    {{ Form::submit() }}
	{!! Form::close() !!}   


@stop