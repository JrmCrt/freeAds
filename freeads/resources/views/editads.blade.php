
@extends('index')

@section('content')
    <h1>My Ads </h1>
    @if(!isset($ad))
	    @foreach ($myads as $a)
		<p> {{ $a->title }} </p>
		<p> {{ $a->description }} </p>
		<p> {{ $a->price . "€" }} </p>
		<p>{{ Html::image("../files/$a->picture" ) }}</p>
		<p>{{ Html::link("ads/edit/$a->id", "Edit") }}</p>
		<p>{{ Html::link("ads/delete/$a->id", "Delete")}}</p>
		<hr>
		@endforeach
	@endif


	@if(isset($ad))
		{!! Form::open(array('url' => "ads/edit/$ad->id", 'files' => true)) !!}
   		<p>title:{{ Form::text('title', $ad->title)}}</p>
   		<p>description:{{ Form::text('description', $ad->description)}}</p>
    	<p>price:{{ Form::number('price', $ad->price) }} </p>
    	<p>{{ Html::image("../files/$ad->picture" ) }}</p>
	    <p>main picture :{{ Form::file('picture') }} </p>
	    <p>Add more pictures </p>
	    <p>picture :{{ Form::file('picture1') }} </p>
	    <p>picture :{{ Form::file('picture2') }} </p>
	    <p>picture :{{ Form::file('picture3') }} </p>
	    <p>picture :{{ Form::file('picture4') }} </p>
	    {{ Form::submit() }}
		{!! Form::close() !!}
	@endif

@stop