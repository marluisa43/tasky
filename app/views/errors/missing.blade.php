@extends('default')

@section('titulo')
	{{Lang::get('messages.pagina_no_encontrada')}}
@stop

@section('contenido')
	<div class="container">
		<h1>{{Lang::get('messages.pagina_no_encontrada')}}</h1>
	</div>
@stop
