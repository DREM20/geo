<?php
session_start(); 
if(empty($_SESSION["id"])){
	header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../assets/css/estilo.css">
	<link rel="stylesheet" href="../../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../../assets/css/map.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		<div class="text-white bg-success p-2">
			<?php
			echo $_SESSION["nombre"] ." ". $_SESSION["apellido"];
			?>
		</div>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<div class="navbar-nav mr-auto">
				<div class="offset-md-1 mr-auto text-center"></div>
				<a class="nav-item nav-link text-justify active ml-3 hover-primary" href="../../inicio.php">Inicio</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="./pages/mapa/mapa.php">Geolocalizacion</a>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Servicios
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Preguntas Frecuentes</a>
						<a class="dropdown-item" href="#">Compras</a>
						<a class="dropdown-item" href="servicios.html">Otros</a>
					</div>
				</li>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="../../controller/controlador_cerrar_session.php">Salir</a>
			</div>
			
		</div>

	</nav>
	<div class="container" >
<div class="container-xxl container-fluid">
    <label class="Parametros">Origen:</label>
    <input type="text" id="origenInput" class="form-control" placeholder="Escribe un lugar" />
    <label class="Parametros">Destino:</label>
    <input type="text" id="destinoInput" class="form-control" placeholder="Escribe un lugar" />
    <br />
    <button onclick="trazarRuta()" class="btn btn-primary btn-p">
        Trazar Ruta
    </button>
    <hr />
</div>
<div class="Mapa">
    <!--Se muestra la ruta -->
    <div id="tiempoViaje"></div>
    <br>
    <div class="container-xxl container-fluid" id="map"></div>
</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp1GHx7r5x2HOHdckpcZeUjBZ7QUyMCoc&callback=initMap"></script>
<script src="../../assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/ajax.js"></script>
<script src="../../assets/js/map.js"></script>
</body>

</html>