<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Resetear Password</h2>

		<div>
			Para resetear tu password completa este formulario: <a href="{{ URL::to('recuperar', array($token)) }}">{{ URL::to('recuperar', array($token)) }}</a>.<br/>
			Este link expira en {{ Config::get('auth.reminder.expire', 60) }} minutos.
		</div>
	</body>
</html>
