
@extends('index')

@section('content')
    <h1> Mail </h1>
  
	
    <table>
    <tr><th>From</th><th>Date</th></tr>
    @foreach($mails as $m)
    	@if($m->seen == 1)
		    <tr><td>{{ Html::link("mail/read/$m->id",   "$m->username") }}</td>
		    <td>{{ Html::link("mail/read/$m->id",   "$m->created_at") }}</td></tr>
		@else
			<tr><td class="read">{{ Html::link("mail/read/$m->id",   "$m->username") }}</td>
		    <td class="read">{{ Html::link("mail/read/$m->id",   "$m->created_at") }}</td></tr> 
    	@endif
    @endforeach
	</table>



@stop