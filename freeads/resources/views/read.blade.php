
@extends('index')

@section('content')
    <h1> Mail </h1>
  

    <p> From : {{$mail->username}}</p>
    {{$mail->text}}


@stop