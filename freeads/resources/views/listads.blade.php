
@extends('index')

@section('content')
    <h1> Ads </h1>
  	<p> {{ Html::link("ads/list/created_at",  'Latest ads' ) }} </p>
  	<h3>Order by : </h3>
  	 {{ Html::link("ads/list/price",  'price' ) }} |
  	 {{ Html::link("ads/list/title",  'title' ) }} |
  	 {{ Html::link("ads/list/description",  'description' ) }} |
	@foreach ($ads as $a)
	<p>{{ $a->created_at }}</p>
	<p> {{ Html::link("ads/show/$a->id",  $a->title ) }} by {{ Html::link("mail/send/$a->id_user",  $a->username ) }} </p>
	<p> {{ $a->description }} </p>
	<p> {{ $a->price . "€"}} </p>
	{{ Html::image("../files/$a->picture") }}
	
	<hr>
	@endforeach

	<div id="matching">
		<h4> You may also like : </h4>
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