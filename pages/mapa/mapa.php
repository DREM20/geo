<?php
session_start();
if (empty($_SESSION["id"])) {
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
<style>
	/* Estilos para el contenedor del input y la lista de sugerencias */
	.autocomplete-container {
		position: relative;
		display: inline-block;
	}

	/* Estilos para el input */
	#autocompleteInput {
		padding: 8px;
		width: 200px;
	}

	/* Estilos para la lista de sugerencias */
	.autocomplete-list {
		position: absolute;
		z-index: 1;
		width: 100%;
		max-height: 150px;
		overflow-y: auto;
		border: 1px solid #ccc;
		border-top: none;
		display: none;
	}

	.autocomplete-item {
		padding: 8px;
		cursor: pointer;
	}

	.autocomplete-item:hover {
		background-color: #f0f0f0;
	}
</style>

<body>
	<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		<div class="text-white bg-success p-2">
			<?php
			echo $_SESSION["nombre"] . " " . $_SESSION["apellido"];
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

	<div class="container">
		<div class="row">
			<div class="container-xxl container-fluid">
				<!-- <div class="autocomplete-container">
					
					<input type="text" id="autocompleteInput" placeholder="Buscar...">


					<div id="autocompleteList" class="autocomplete-list"></div>
				</div> -->

				<div class="input-group ">
					<span class="input-group-text" id="addon-wrapping">Origen:</span>
					<div class="autocomplete-container">
						<input type="text" id="origenInput" class="form-control" placeholder="Escribe un lugar" >
						<div id="autocompleteList" class="autocomplete-list"></div>
					</div>
				</div>
				<br>
				<div class="input-group flex-nowrap">
					<span class="input-group-text" id="addon-wrapping">Destino:</span>
					<input type="text" id="destinoInput" class="form-control" placeholder="Escribe un lugar" value="Corralón transito estatal" disabled>
				</div><br>
				<div class="d-grid gap-2">
					<button onclick="trazarRuta()" class="btn btn-primary btn-lg btn-dark">Trazar Ruta</button>
					<button onclick="obtenerUbicacion()" class="btn btn-primary btn-lg btn-dark">Obtener Ubicación</button>
				</div>


			</div>
		</div>
		<!-- <label class="Parametros">Origen:</label>
			<input type="text" id="origenInput" class="form-control" placeholder="Escribe un lugar" />
			<label class="Parametros">Destino:</label>
			<input type="text" id="destinoInput" class="form-control" placeholder="Escribe un lugar" />
			<br />
			<button onclick="trazarRuta()" class="btn btn-primary btn-p">
				Trazar Ruta
			</button>
			<hr /> -->


		<div class="Mapa">
			<!--Se muestra la ruta -->
			<div id="tiempoViaje"></div>
			<br />
			<div class="container-xxl container-fluid" id="map"></div>
		</div>
		<!-- Contenido de tu página -->

		<!-- Contenedor del autocompletado -->



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