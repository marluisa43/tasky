@extends('default')

@section('titulo')
	{{Lang::get('messages.crear_una_cuenta')}}
@stop

@section('contenido')
	<div class="container">
		<br>
		<div class="col-xs-12 col-lg-6 col-lg-offset-3 jumbotron">
			<h2 class="text-center">{{Lang::get('messages.form_registro')}}</h2>

			@if($errors->has('email')||$errors->has('pass')||$errors->has('pass2'))
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  
				  {{$errors->first('email')}}<br>
				  {{$errors->first('pass')}}<br>
				  {{$errors->first('pass2')}}
				</div>
			@endif


			{{Form::open(array('url'=>'registro'))}}
				{{Form::label('email',Lang::get('messages.email'))}}{{Form::email('email',Input::old('email'),array('class'=>'form-control'))}}
				{{Form::label('pass',Lang::get('messages.contrasena'))}}{{Form::password('pass',array('class'=>'form-control'))}}
				{{Form::label('pass2',Lang::get('messages.confirmar_contrasena'))}}{{Form::password('pass2',array('class'=>'form-control'))}}<br><br>
				<p class="text-center">
					{{Form::submit(Lang::get('messages.enviar'),array('class'=>'btn btn-primary'))}}
				</p>
			{{Form::close()}}
		</div>
	</div>
@stop	