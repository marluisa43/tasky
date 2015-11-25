@extends ('default')

@section('titulo')
	{{Lang::get('messages.recuperar_contrasena')}}
@stop

@section('contenido')
	<div class="container">
	<br>
		<div class="col-xs-12 col-lg-8 col-lg-offset-2 jumbotron">
			<H2> {{Lang::get('messages.recuperar_contrasena')}} </H2>
			{{Form::open(array('url'=>'recuperar'))}}
				{{Form::hidden('token',$token)}}
				{{Form::label('email',Lang::get('messages.email'))}}{{Form::email('email',null,array('class'=>'form-control'))}}
				{{Form::label('password',Lang::get('messages.contrasena'))}}{{Form::password('password',array('class'=>'form-control'))}}<br>
				{{Form::label('password_confirmation',Lang::get('messages.confirmar_contrasena'))}}{{Form::password('password_confirmation',array('class'=>'form-control'))}}<br>
				<p class="text-center">
					{{Form::submit(Lang::get('messages.cambiar_contrasena'),array('class'=>'btn btn-primary'))}}
				</p>
			{{Form::close()}}
		</div>
	</div>
@stop	