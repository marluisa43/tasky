@extends('default')

@section('titulo')
	{{Lang::get('messages.mis_tareas')}}
@stop

@section('contenido')
	<div class="container">
		{{Form::open(array('url'=>'nueva'))}}
			<br>
			<div class="input-group">
				{{Form::text('tarea',null,array('class'=>'form-control input-lg','placeholder'=>trans('messages.escribe_tarea')))}}
				<span class="input-group-btn">
					{{Form::submit(Lang::get('messages.guardar'),array('class'=>'btn btn-success btn-lg'))}}
				</span>
			</div>
		{{Form::close()}}
		<p>&nbsp</p>

		@if (count($tareas)!=0)
			<!-- Formulario de número de elementos por página -->
			{{Form::open(array('url'=>'lista','method'=>'get'))}}
				
				{{Form::label('items',Lang::get('messages.eltos_pagina'))}}&nbsp
				<span style='color:black'>
				<!-- Para que carge el número de elementos que estas viendo en cada momento en la página añadi $items-->
				{{Form::select('items', array('5'=>5,'10'=>10,'25'=>25,'50'=>50,'100'=>100),$items)}}
				</span>

				{{Form::submit(Lang::get('messages.ir'),array('class'=>'btn btn-info btn-xs'))}}

				
			{{Form::close()}}
			<p>&nbsp</p>

			<table class="table table-responsive table-striped">
				@foreach($tareas as $tarea)
					@if ($tarea->estado =='En proceso')
						<tr class="info">
					@elseif ($tarea->estado=='Completada')
						<tr class="success">
					@else			
						<tr>
					@endif	
					
						<td width="70%"> {{$tarea->tarea}} </td>
						<td> {{$tarea->estado}} </td>
						<td class="text-right"> 
							@if ($tarea->estado=='Pendiente')
								<a href="{{action('TaskController@getIniciar',array($tarea->id))}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-play"></span></a> 
							@elseif ($tarea->estado=='En proceso')
								<a href="{{action('TaskController@getCompletar',array($tarea->id))}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></a> 
							@endif

							<a href="{{action('TaskController@getEliminar',array($tarea->id))}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> 
						</td>
						
					</tr>
				@endforeach
			</table>
			<!-- Insertamos los números de páginación -->
			<div class="text-center">
				{{$tareas->appends(array('items'=>$items))->links()}}
				<p>
					<small>{{Lang::get('messages.pagina')}} {{ $tareas->getCurrentPage()}} {{Lang::get('messages.de')}} {{ $tareas->getLastPage() }}</small>
				</p>
			</div>

		@else
			<h2 class="text-center">{{Lang::get('messages.no_tarea')}}</h2>
		@endif	
		
	</div>
@stop