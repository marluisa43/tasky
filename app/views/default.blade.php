<!DOCTYPE html>
<html lang="es">
<head>
	<title>@yield('titulo') - Tasky</title>
	<meta charset="utf-8">
	<!-- Metemos lo de bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://bootswatch.com/superhero/bootstrap.min.css">
	{{HTML::style('css/main.css')}}
</head>
<body>
	<!-- Añadimos una barra de navegación -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- La cabecera de la barra de navegacion -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      {{HTML::link('/','Tasky',array('class'=>'navbar-brand'))}}
	    </div>

	    <!-- Lo que se desplega -->
	    <div class="collapse navbar-collapse" id="menu">
      		<ul class="nav navbar-nav">
      			<li>{{HTML::link('/',Lang::get('messages.inicio'),array('class'=>'btn btn-primary'))}}</li>
      		</ul>
      		<ul class="nav navbar-nav navbar-right">
      			<!--<li>{{HTML::link('idioma/es','ES')}}</li> -->
      			<li>{{ HTML::decode(HTML::link('idioma/es', HTML::image('img/es.gif'),array('class'=>'VinculoImg'))) }}</li>
      			<!--<li>{{HTML::link('idioma/en','EN')}}</li>-->
      			<li>{{ HTML::decode(HTML::link('idioma/en', HTML::image('img/en.png'),array('class'=>'VinculoImg'))) }}</li>
      			@if (Auth::check())
      				<li>{{HTML::link('lista',Lang::get('messages.mis_tareas'),array('class'=>'btn btn-primary'))}} </li>
      				<li>{{HTML::link('contacto',Lang::get('messages.contacto'),array('class'=>'btn btn-primary'))}}</li>
      				<li>{{HTML::link('logout',Lang::get('messages.cerrar_sesion'),array('class'=>'btn btn-primary'))}}</li>
      			@else
      				<li>{{HTML::link('registro',Lang::get('messages.crear_cuenta'),array('class'=>'btn btn-primary'))}}</li>
      				<li>{{HTML::link('login',Lang::get('messages.iniciar_sesion'),array('class'=>'btn btn-primary'))}}</li>
      			@endif
      		</ul>
      	</div>
      </div>
     </nav> 	

	@yield('contenido')


	<!-- Buscado en Jquery.com he elegido el de google CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>