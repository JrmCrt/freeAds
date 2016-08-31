
@extends('index')

@section('content')
    <h1>Search ads </h1>
 	
 	{!! Form::open(array('url' => 'ads/search')) !!}
   <p>title:{{ Form::text('title')}}</p>
   <p>description:{{ Form::text('description')}}</p>
    <p>price : between {{ Form::number('price1', 0) }} and {{ Form::number('price2', 10000) }}</p>
    {{ Form::submit() }}
	{!! Form::close() !!} 
	

@stop