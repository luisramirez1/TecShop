<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  	<link href="{{asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" media="all" />
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	
	<title>Confirmar Correo Electronico</title>

	<style>
		
		html
		{
			background-color: gray;
			margin: 0;
		}
		body
		{
			font-family: 'Source Sans Pro', sans-serif;
		}
		
		a
		{
			color: #353F49;
			font-size: 1em;
			text-decoration:none; 
		}

		h1
		{
			text-align: center;
			color: #ff590f;
		}

		h2
		{
			text-align: center;
		}
		strong, p
		{
			color: #555;
		}

		#acerca
		{
			color: #555;
		}
		
		#btn
		{
			border-radius: 3px;
			border: none;
			border-color: #52CFF3;
			background-color: #52CFF3;
		}

		#confir
		{
			color: white;
			font-weight: bold;
			padding: 5px 5px;
		}
	</style>
</head>
<body>
	<!-- <p>
		necesitas <a href="{{url('register/confirm')}}/{{$user->token}}"> confirmar email </a>
	</p> -->
	
	<b><h1>BIENVENIDO A TecShop</h1></b> 
    <h2 id="acerca">¡Gracias por registrarte!</h2>
    <div class="jumbotron" id="jum2">
        <section id="seccion1">
        <p>
        	Estamos bastante seguros de que este es el comienzo de algo muy especial, así que queríamos tomar un momento para darle personalmente la bienvenida a TecShop. Nos gusta pensar en TecShop como la mejor manera de comprar productos tecnologicos de la mas alta calidad, es genial tenerle a bordo! <br>
        </p>
        <p>
        	<strong>Solo falta confirmar tu correo electronico</strong> <br>
        	<p>Presiona el Boton para confirmar tu cuenta</p>
        	<button type="button" class="btn btn-info" id="btn"><a href="{{url('register/confirm')}}/{{$user->token}}" id="confir"> Confirmar Correo</a></button>
        </p>
        <h2 id="acerca">Acerca de Tecshop</h2>
            <br>
            <strong>Nuestra Pagina</strong>
            <p>.- Muchas personas en el pais utilizan TecShop para mantenerse en contacto con las nuevas
            tecnologias.</p>
            <br>
            <strong>Nuestra Misión</strong>
            <p>TecShop comenzó como una nueva alternativa para la compra de aparatos tecnologicos. nuestros productos ahora son de la mas alta calidad en el mercado internacional.</p>
            <br>
            <strong>Nuestro Equipo</strong>
            <p>TecShop es una empresa fundada por Luis Ramirez y Mario Sanz, quienes trabajaron en conjunto para el desarrollo de la pagina, enfocada a ser un servicio rapido y confiable en cualquier parte.</p>
        </section>
    </div>
</body>
</html>