@extends ('default')

@section ('titulo')
	{{Lang::get('messages.contacto')}}
@stop

@section ('contenido')
	<div class="container">
		<br>
		<div class="col-xs-12 col-lg-6 col-lg-offset-3 jumbotron">
			<H2 class="text-center"> {{Lang::get('messages.contacto')}}</H2>

			{{Form::open(array('url'=>'contacto'))}}
				{{Form::hidden('email',Auth::user()->email)}}
				{{Form::label('asunto',Lang::get('messages.asunto'))}}{{Form::text('asunto',null,array('class'=>'form-control'))}}

				{{Form::label('mensaje',Lang::get('messages.mensaje'))}}{{Form::textarea('mensaje',null,array('class'=>'form_control'))}}
				<br>
				<br>
				<p class="text-center">
					{{Form::submit(Lang::get('messages.enviar'),array('class'=>'btn btn-primary'))}}
				</p>

			{{Form::close()}}
		</div>
	</div>
@stop