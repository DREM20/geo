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
	<link rel="stylesheet" href="assets/css/estilo.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/map.css">
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
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="controller/controlador_cerrar_session.php">Salir</a>
			</div>
			
		</div>

	</nav>
<style>
	
.has-error .form-control {
    border-color: #a94442;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
}


.has-success .form-control {
    border-color: green;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
}
</style>
<script>
	
	$( document ).ready( function ()  {
        $('#solicitud').change(function(){
            $('.motivo').hide();
            $('#' + $(this).val()).show().attr("name", "motivo");
        });
    });

$.validator.setDefaults( {
  //solo test
			submitHandler: function () {
				alert( "submitted!" );
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
		} );
//fin solo test

		$( document ).ready( function () {
			$( "#contact" ).validate( {
        
				rules: {
          
          
					firstname: "required",
					lastname: "required",
          motivo: "required",
					docIdent:{ docID: true
              
               },
					email: {
						required: true,
						email: true
					},
          
          cp: {
          required: true,
          number:true,
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
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".validar" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".validar" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			} );

			
		} );



function validar_dni_nif_nie(value){
 
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
<div class="bd-example mb-0" style="height: 80vh">
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active" style="height: 80vh">
				<img src="assets/img/1.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="display-4 mb-4 font-weight-bold">BOOTSTRAP 4</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				</div>
			</div>
			<div class="carousel-item" style="height: 80vh">
				<img src="assets/img/1.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="display-4 mb-4 font-weight-bold">BOOTSTRAP 4</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
			</div>
			<div class="carousel-item" style="height: 80vh">
				<img src="assets/img/1.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="display-4 mb-4 font-weight-bold">BOOTSTRAP 4</h5>
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
				</div>
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
	<div class="jumbotron bg-dark text-light rounded-0">
		<h1 class="display-4"> Gestión de Grúas del Estado de Puebla</h1>
		<p class="lead">Acerca de Nosotros</p>
		<hr class="my-4 bg-light">
		<div class="d-flex justify-content-between align-items-center flex-wrap">
			<p>Bienvenidos a [Nombre de tu Empresa de Grúas en Puebla], su socio confiable cuando se trata de servicios de remolque y asistencia en carretera en la hermosa ciudad de Puebla y sus alrededores. Desde [año de fundación], hemos estado comprometidos en brindar soluciones de grúas de alta calidad para satisfacer las necesidades de nuestros clientes, estableciendo un estándar de excelencia en la industria.
            En [Nombre de tu Empresa], entendemos que las situaciones de emergencia en la carretera pueden ser estresantes y desafiantes, por lo que nos enorgullece ofrecer un servicio rápido, confiable y amigable que puede marcar la diferencia en esos momentos críticos. Nuestro equipo de profesionales altamente capacitados y experimentados está disponible las 24 horas del día, los 7 días de la semana, para brindar asistencia y remolque de vehículos en toda la región de Puebla.</p>
			<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
		</div>
	</div>

</div>




<div class="container">
  <div class="exito"></div>

 
	 
	<div>
	<div class="col-md-8 order-md-1">
	  <h4 class="mb-3">Formulario de contacto</h4>
	  <form  id="contact">
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
		  <div class="col-md-4 mb-3 motivo"    id="motivo-1" style="display:none">
			<label for="state">Selecciona tu motivo</label>
			<select class="custom-select d-block w-100" required>
			  <option value="">Choose...</option>
			  <option>California</option>
			</select>
		 </div>
		  
		   <div class="col-md-4 mb-3 motivo"    id="motivo-2" style="display:none">
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
		 
		  <label  for="agree">
		  <input type="checkbox" id="agree"  name="agree" value="agree" required> Aceptar la política de privacidad
</label>
		   
		</div>
		


		
	  
		<hr class="mb-4">
		<button class="btn btn-primary btn-lg btn-block" type="submit" >Enviar</button>
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