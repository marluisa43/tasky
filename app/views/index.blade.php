@extends ('default')

@section ('titulo')
	 {{Lang::get('messages.titulo_introduccion')}} 
@stop 

@section('contenido')
	<div class="jumbotron" style="background: url(img/Tareas.jpg);background-size:100%;">
		<div class="container">
			<h1>Tasky</h1>
			<p style="color:#FA9507; text-align:justify;"><strong>
				{{Lang::get('messages.introduccion')}}</strong>
			</p>
			<P class="text-center">
				@if (Auth::check())
      				{{HTML::link('lista',Lang::get('messages.mis_tareas'), array('class'=>'btn btn-primary'))}} 
      				{{HTML::link('logout',Lang::get('messages.cerrar_sesion'),array('class'=>'btn btn-danger'))}}
      			@else
					{{HTML::link('registro',Lang::get('messages.crear_cuenta'), array('class'=>'btn btn-primary'))}}
					{{HTML::link('login',Lang::get('messages.iniciar_sesion'), array('class'=>'btn btn-success'))}}
				@endif	
			</P>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="img/trabaja.jpg" alt="Trabaja" class="img-circle img-responsive center-block">
				<br>
				<h1><p class="text-center"><strong> {{trans('messages.trabaja')}}</strong></p></h1>
			</div>
			<div class="col-md-4">
				<img src="img/sincroniza.png" alt="Sincroniza" class="img-circle img-responsive center-block">
				<br>
				<h1><p class="text-center"><strong>{{trans('messages.sincroniza')}}</strong></p></h1>
			</div>
			<div class="col-md-4">
				<img src="img/comparte.jpg" alt="Comparte" class="img-circle img-responsive center-block">
				<br>
				<h1><p class="text-center"><strong>{{trans('messages.comparte')}}</strong></p></h1>
			</div>
		</div>
	</div>

@stop