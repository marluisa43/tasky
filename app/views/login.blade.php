@extends ('default')

@section ('titulo')
	{{Lang::get('messages.iniciar_sesion')}}
@stop

@section ('contenido')
	<div class="container">
		<br>
		<div class="col-xs-12 col-lg-6 col-lg-offset-3 jumbotron">
			<H2 class="text-center"> {{Lang::get('messages.iniciar_sesion')}}</H2>
			{{Form::open(array('url'=>'login'))}}
				{{Form::label('email',Lang::get('messages.email'))}}{{Form::email('email',null,array('class'=>'form-control'))}}
				{{Form::label('pass',Lang::get('messages.contrasena'))}}{{Form::password('pass',array('class'=>'form-control'))}}<br>
				{{Form::checkbox('recordar')}}{{Form::label('recordar',Lang::get('messages.no_cerrar_sesion'))}}<br>
				<p class="text-center">
					{{Form::submit(Lang::get('messages.iniciar_sesion'),array('class'=>'btn btn-primary'))}}
				</p>
				{{HTML::link('recordar',Lang::get('messages.olvidaste_contrasena'))}}
			{{Form::close()}}
		</div>
	</div>
@stop