
@extends('index')

@section('content')
    <h1> {{$ad->title}} </h1>
  
	
	<p> {{ Html::link("ads/show/$ad->id",  $ad->title ) }} </p>
	<p> {{ $ad->description }} </p>
	<p> {{ $ad->price . "€"}} </p>
	{{ Html::image("../files/$ad->picture") }}
	
		@foreach($pictures as $p)
			{{ Html::image("../files/$ad->id/$p") }}		
		@endforeach
	<hr>

	<div id="matching">
		<h4> Also from this seller : </h4>
	@foreach($matching as $m)
		<div class='ad'>
		<p>{{ $m->created_at }}</p>
	<p> {{ Html::link("ads/show/$m->id",  $m->title ) }} by {{ Html::link("mail/send/$m->id_user",  $m->username ) }} </p>
	<p> {{ $m->description }} </p>
	<p> {{ $m->price . "€"}} </p>
	{{ Html::image("../files/$m->picture") }}
		</div>
	@endforeach
	</div>


@stop