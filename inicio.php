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
	<title>GruasPuebla</title>
	<link rel="stylesheet" href="assets/css/estilo.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/map.css">
</head>

<body>
	<style>
		.has-error .form-control {
			border-color: #a94442;
			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
		}


		.has-success .form-control {
			border-color: green;
			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
		}
	</style>
	<script>
		$(document).ready(function() {
			$('#solicitud').change(function() {
				$('.motivo').hide();
				$('#' + $(this).val()).show().attr("name", "motivo");
			});
		});

		$.validator.setDefaults({
			//solo test
			submitHandler: function() {
				alert("submitted!");
				location.reload();

				$.ajax({
					type: "POST",
					url: "scripts/process.php",
					data: dataString,
					success: function() {
						$("#exito").html("<p> Your article was successfully added!</p>");
						//I need to reload page after the above message is shown
					}
				});
				return false;


			}
		});
		//fin solo test

		$(document).ready(function() {
			$("#contact").validate({

				rules: {


					firstname: "required",
					lastname: "required",
					motivo: "required",
					docIdent: {
						docID: true

					},
					email: {
						required: true,
						email: true
					},

					cp: {
						required: true,
						number: true,
						minlength: 5,
						maxlength: 5
					},


					agree: "required"
				},
				messages: {
					firstname: "Por favor, introduce tu nombre",
					lastname: "Por favor, introduce tu apellido",


					email: {
						required: "Introduce tu correo.",
						email: "introduce un correo válido"
					},
					cp: {
						required: "Introduce tu código postal",
						number: "Introduce un código postal válido.",
						maxlength: "Debe contener al menos 5 dígitos.",
						minlength: "Debe contener 5 dígitos."
					},

					agree: "Debes aceptar las condiciones"
				},
				errorElement: "em",
				errorPlacement: function(error, element) {
					// Add the `help-block` class to the error element
					error.addClass("help-block");

					if (element.prop("type") === "checkbox") {
						error.insertAfter(element.parent("label"));
					} else {
						error.insertAfter(element);
					}
				},
				highlight: function(element, errorClass, validClass) {
					$(element).parents(".validar").addClass("has-error").removeClass("has-success");
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).parents(".validar").addClass("has-success").removeClass("has-error");
				}
			});


		});



		function validar_dni_nif_nie(value) {

			var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
			var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
			var nieRexp = /^[XYZ]{1}[0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
			var str = value.toString().toUpperCase();

			if (!nifRexp.test(str) && !nieRexp.test(str)) return false;

			var nie = str
				.replace(/^[X]/, '0')
				.replace(/^[Y]/, '1')
				.replace(/^[Z]/, '2');

			var letter = str.substr(-1);
			var charIndex = parseInt(nie.substr(0, 8)) % 23;

			if (validChars.charAt(charIndex) === letter) return true;

			return false;
		}
		$.validator.addMethod("docID", function(value, element) {
			return validar_dni_nif_nie(value);
		}, 'Introduce un documento de identidad valido.');
	</script>
	<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		<div class="text-white bg-success p-2">
		<img src="assets/img/avatar.svg" alt="" style="width: 30px; height: 30px;">
			<?php
			echo $_SESSION["nombre"] . " " . $_SESSION["apellido"];
			?>
		</div>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<div class="navbar-nav mr-auto">
				<div class="offset-md-1 mr-auto text-center"></div>
				<a class="nav-item nav-link text-justify active ml-3 hover-primary" href="../../inicio.php">Inicio</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="./pages/mapa/mapa.php">Geolocalizacion</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="#Informacion">Informacion</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="#Formulario">Formulario</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="controller/controlador_cerrar_session.php">Salir</a>
			</div>

		</div>

	</nav>

	<div class="bd-example mb-0" style="height: 80vh">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active" style="height: 80vh">
					<img src="assets/img/Banner1.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" style="height: 80vh">
					<img src="assets/img/Banner2.jpg" class="d-block w-100" alt="...">
					
				</div>
				<div class="carousel-item" style="height: 80vh">
					<img src="assets/img/Banner3.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<div class="">
		<div class="jumbotron bg-dark text-light rounded-0" id="Informacion">
			<h1 class="display-4">Acerca de Nosotros</h1>
			<hr class="my-4 bg-light">
			<div class="d-flex justify-content-between align-items-center flex-wrap">
			<h4><b>¿Quienes Somos?</b></h4>
				<p>Bienvenidos a <b>Gruas de Puebla</b>, su socio confiable cuando se trata de servicios de remolque y asistencia en carretera en la hermosa ciudad de Puebla y sus alrededores. <br>
					En <b>Gruas de Puebla</b>, entendemos que las situaciones de emergencia en la carretera pueden ser estresantes y desafiantes, por lo que nos enorgullece ofrecer un servicio rápido, confiable y amigable que puede marcar la diferencia en esos momentos críticos. 
				<h4><b>Compromiso con la Excelencia:</b></h4>
				<p>Entendemos que las situaciones de emergencia en la carretera pueden ser estresantes y desafiantes. Es por eso que nos comprometemos a brindar un servicio rápido, confiable y amigable que marque la diferencia en esos momentos críticos.</p> 
				<h4><b>Equipo Profesional las 24/7:</b></h4>
				<p>Nuestro equipo de profesionales altamente capacitados y experimentados está disponible las 24 horas del día, los 7 días de la semana, listo para ofrecer asistencia y remolque de vehículos en toda la región de Puebla. Ya sea en un día soleado o en medio de la noche, puede confiar en [Nombre de tu Empresa] para estar allí cuando más nos necesite.</p>
				<h4><b>Nuestros Servicios:</b></h4> <br>
				<p><b>Asistencia en Carretera: </b>Desde problemas mecánicos hasta pinchazos, estamos aquí para ayudar en cualquier situación en la que se encuentre varado en la carretera.</p>
				<p><b>Remolque de Vehículos: </b>Contamos con una flota de grúas modernas y bien mantenidas para llevar su vehículo al destino deseado de manera segura y eficiente.</p>
				<h4><b>Comprometidos con Nuestros Clientes:</b></h4>
				<p>En <b>Gruas Puebla</b>, cada cliente es especial. Nos esforzamos por superar sus expectativas y proporcionar un servicio que refleje nuestra dedicación a la calidad y la satisfacción del cliente.</p>
				<h4><b>Contacto:</b></h4>
				<p>Estamos a solo una llamada de distancia. No importa la hora ni el lugar, <b>Gruas Puebla</b> está aquí para ayudar. ¡Confíe en nosotros para ser su socio confiable en momentos de necesidad en la carretera!</p>
				<a class="btn btn-primary btn-lg" href="./pages/mapa/mapa.php" role="button">IR AL MAPA</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="exito"></div>
		<div>
			<div class="col-md-12 order-md-1" id="Formulario">
				<h4 class="mb-3">Formulario de contacto</h4>
				<form id="contact">
					<div class="row">
						<div class="col-md-6 mb-3 validar">
							<label for="firstName">Nombre</label>
							<input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="" required>

						</div>
						<div class="col-md-6 mb-3 validar">
							<label for="lastName">Apellido/s</label>
							<input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="" required>
							<div class="invalid-feedback">
								Por favor, introduce tu apellido.
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="username">NIF</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">@</span>
							</div>
							<input type="text" class="form-control" id="docIdent" name="docIdent" placeholder="Introduce tu DNI" required>

						</div>
					</div>

					<div class="mb-3 validar">
						<label for="email">Email </label>
						<input type="email" class="form-control" id="email" placeholder="you@example.com" required>
						<div class="invalid-feedback">
							Debes introducir un email válido
						</div>
					</div>

					<div class="mb-3">
						<label for="address">Móbil</label>
						<input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
						<div class="invalid-feedback">
							Please enter your shipping address.
						</div>
					</div>

					<div class="mb-3">
						<label for="address2">Empresa <span class="text-muted">(Optional)</span></label>
						<input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
					</div>

					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="country">Country</label>
							<select class="custom-select d-block w-100" id="solicitud" required>
								<option value="">Choose...</option>
								<option value="motivo-1">Motivo 1</option>
								<option value="motivo-2">Motivo 2</option>

							</select>

						</div>
						<div class="col-md-4 mb-3 motivo" id="motivo-1" style="display:none">
							<label for="state">Selecciona tu motivo</label>
							<select class="custom-select d-block w-100" required>
								<option value="">Choose...</option>
								<option>California</option>
							</select>
						</div>

						<div class="col-md-4 mb-3 motivo" id="motivo-2" style="display:none">
							<label for="state">Selecciona tu motivo</label>
							<select class="custom-select d-block w-100" required>
								<option value="">Choose...</option>
								<option>California</option>
							</select>
						</div>
						<div class="col-md-3 mb-3">
							<label for="zip">Código postal</label>
							<input type="text" class="form-control" id="cp" name="cp" placeholder="" pattern="[0-9]{5}" title="Six or more characters" required>

						</div>
					</div>
					<hr class="mb-4">
					<div class="custom-control custom-checkbox">
						<label for="agree">
							<input type="checkbox" id="agree" name="agree" value="agree" required> Aceptar la política de privacidad
						</label>
					</div>
					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
				</form>
			</div>
		</div>


	</div>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp1GHx7r5x2HOHdckpcZeUjBZ7QUyMCoc&callback=initMap"></script>
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/ajax.js"></script>
	<script src="assets/js/map.js"></script>
</body>

</html>