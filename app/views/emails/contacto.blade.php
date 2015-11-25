<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <h1>Mensaje</h1><br>
      <div class="container">
	      <h2>De: </h2>{{Input::get('email')}}<br>
	      <h2>Asunto: </h2>{{Input::get('asunto')}}<br>
	      <h2>Mensaje: </h2> {{Input::get('mensaje')}}
      </div>
   </body>
</html>