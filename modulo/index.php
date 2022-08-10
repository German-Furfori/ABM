<?php
	include("./manejoSesion.inc");
?>

<!DOCTYPE html>
<html>
	<head>
		<!--<link rel="stylesheet" type="text/css" href="./estilos.css">-->

		<!--Bootstrap-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
			rel="stylesheet" 
			integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
			crossorigin="anonymous">
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Tabla de datos</title>
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" href="../cerrarSesion.php">Log Out</a>
						</li>
					</ul>
					<span class="navbar-text">
						Universidad Tecnológica Nacional
					</span>
				</div>
			</div>
		</nav>

		<div class="container mt-4">
			<header>
				<div class="header">
					<button id="botonCargar" class="btn btn-dark">Cargar datos</button>
					<button id="botonVaciar" class="btn btn-dark">Vaciar listado</button>
					<button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#formAlta">Alta</button> <br /> <br />
					Ordenar por:
					<input type="text" name="orden" id="orden" readonly="readonly" value="Legajo">
				</div>
			</header>

			<main>
				<table class="table table-striped mt-3">
					<thead id="tableHead">
						<tr>
							<th class="sticky-top">
								<div class="d-grid">
									<button id="tituloLegajo" class="btn btn-dark">Legajo</button>
								</div>
							</th>
							<th>
								<div class="d-grid">
									<button id="tituloNombre" class="btn btn-dark">Nombre</button>
								</div>
							</th>
							<th>
								<div class="d-grid">
									<button id="tituloApellido" class="btn btn-dark">Apellido</button>
								</div>
							</th>
							<th>
								<div class="d-grid">
									<button id="tituloDNI" class="btn btn-dark">DNI</button>
								</div>
							</th>
							<th>
								<div class="d-grid">
									<button id="tituloEmail" class="btn btn-dark">Email</button>
								</div>
							</th>
						</tr>
						<tr>
							<th>
								<div class="d-grid">
									<input type="text" id="filtroLegajo">
								</div>
							</th>
							<th>
								<div class="d-grid">
									<input type="text" id="filtroNombre">
								</div>
							</th>
							<th>
								<div class="d-grid">
									<input type="text" id="filtroApellido">
								</div>
							</th>
							<th>
								<div class="d-grid">
									<input type="text" id="filtroDNI">
								</div>
							</th>
							<th>
								<div class="d-grid">
									<input type="text" id="filtroEmail">
								</div>
							</th>
						</tr>
					</thead>
					<tbody id="tableBody" class="text-center">
						
					</tbody>
					<tfoot class="text-center">
						<tr>
							<th>Legajo</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>DNI</th>
							<th>Email</th>
						</tr>
					</tfoot>
				</table>
					
				<div id="cantidadRegistros">
					
				</div>

				<div class="modal fade" id="formAlta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del alta</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<label class="form-label">Legajo</label>
								<input type="text" name="ALegajo" id="ALegajo" class="form-control"> <br />
								<label class="form-label">Nombre</label>
								<input type="text" name="ANombre" id="ANombre" class="form-control"> <br />
								<label class="form-label">Apellido</label>
								<input type="text" name="AApellido" id="AApellido" class="form-control"> <br />
								<label class="form-label">DNI</label>
								<input type="text" name="ADNI" id="ADNI" class="form-control"> <br />
								<label class="form-label">Email</label>
								<input type="text" name="AEmail" id="AEmail" class="form-control"> <br /> <br />
								<button type="submit" class="btn btn-dark" id="botonAltaEnviar" data-bs-dismiss="modal">Enviar</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="formModi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ingrese los datos a modificar</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<label class="form-label">Legajo</label>
								<input type="text" name="MLegajo" id="MLegajo" class="form-control"> <br />
								<label class="form-label">Nombre</label>
								<input type="text" name="MNombre" id="MNombre" class="form-control"> <br />
								<label class="form-label">Apellido</label>
								<input type="text" name="MApellido" id="MApellido" class="form-control"> <br />
								<label class="form-label">DNI</label>
								<input type="text" name="MDNI" id="MDNI" class="form-control"> <br />
								<label class="form-label">Email</label>
								<input type="text" name="MEmail" id="MEmail" class="form-control"> <br /> <br />
								<input type="hidden" name="legajoViejo" id="legajoViejo">
								<button type="submit" class="btn btn-dark" id="botonModiEnviar" data-bs-dismiss="modal">Enviar</button>
							</div>
						</div>
					</div>
				</div>
				
				<input type="hidden" name="BLegajo" id="BLegajo"> <!--input que utilizo para la función de baja, para llevar el legajo de la baja al script php-->
				
			</main>

			<script src="../jquery-3.6.0.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
				integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
				crossorigin="anonymous">
			</script>
			<script type="text/javascript">
				$("#botonCargar").click(function() {
					cargarTabla();
				});

				$("#botonVaciar").click(function() {
					$("#tableBody").empty();
					$("#cantidadRegistros").empty();
				});

				$("#botonAltaEnviar").click(function() {
					alta();
				});

				$("#botonModiEnviar").click(function() {
					modi();
				});

				$("#botonBaja").click(function() {
					baja();
				});

				$("#tituloLegajo").click(function() {
					$("#orden").val("Legajo");
				});

				$("#tituloNombre").click(function() {
					$("#orden").val("Nombre");
				});

				$("#tituloApellido").click(function() {
					$("#orden").val("Apellido");
				});

				$("#tituloDNI").click(function() {
					$("#orden").val("DNI");
				});

				$("#tituloEmail").click(function() {
					$("#orden").val("Email");
				});

				function baja() {
					$.ajax({
						type: "get",
						url: "./baja.php",
						data: {
							BLegajo: $("#BLegajo").val(),
						},
									
						success: function(respuestaDelServer) {
							alert(respuestaDelServer);
							cargarTabla();
						}
					});
				}

				function modi() {
					$.ajax({
						type: "get",
						url: "./modi.php",
						data: {
							legajoViejo: $("#legajoViejo").val(),
							MLegajo: $("#MLegajo").val(),
							MNombre: $("#MNombre").val(),
							MApellido: $("#MApellido").val(),
							MDNI: $("#MDNI").val(),
							MEmail: $("#MEmail").val(),
						},
									
						success: function(respuestaDelServer) {
							alert(respuestaDelServer);
							cargarTabla();
						}
					});
				}

				function alta() {
					$.ajax({
						type: "get",
						url: "./alta.php",
						data: {
							ALegajo: $("#ALegajo").val(),
							ANombre: $("#ANombre").val(),
							AApellido: $("#AApellido").val(),
							ADNI: $("#ADNI").val(),
							AEmail: $("#AEmail").val(),
						},
									
						success: function(respuestaDelServer) {
							alert(respuestaDelServer);
							cargarTabla();
						}
					});
				}

				function cargarTabla() {
					$("#tableBody").empty();
					$("#cantidadRegistros").empty();
					$("#tableBody").html("Cargando...");
					var objAjax = $.ajax({
						type: "get",
						url: "salidaJsonDatos.php",
						data: {
							orden: $("#orden").val(),
							filtroLegajo: $("#filtroLegajo").val(),
							filtroNombre: $("#filtroNombre").val(),
							filtroApellido: $("#filtroApellido").val(),
							filtroDNI: $("#filtroDNI").val(),
							filtroEmail: $("#filtroEmail").val(),
						},

						success: function(respuestaDelServer) {
							$("#tableBody").empty();
							objJson = JSON.parse(respuestaDelServer);
							objJson.alumnos.forEach(function(valor) {
								var objTr = document.createElement("tr");
								var objTd1 = document.createElement("td");
								objTd1.setAttribute("class", "angosto");
								objTd1.innerHTML = valor.Legajo;
								objTr.appendChild(objTd1);

								var objTd2 = document.createElement("td");
								objTd2.setAttribute("class", "medio");
								objTd2.innerHTML = valor.Nombre;
								objTr.appendChild(objTd2);

								var objTd3 = document.createElement("td");
								objTd3.setAttribute("class", "medio");
								objTd3.innerHTML = valor.Apellido;
								objTr.appendChild(objTd3);

								var objTd4 = document.createElement("td");
								objTd4.setAttribute("class", "medio");
								objTd4.innerHTML = valor.DNI;
								objTr.appendChild(objTd4);

								var objTd5 = document.createElement("td");
								objTd5.setAttribute("class", "ancho");
								objTd5.innerHTML = valor.Email;
								objTr.appendChild(objTd5);

								var objTd6 = document.createElement("td");
								objTd6.setAttribute("class", "botones");
								objTd6.innerHTML = '<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#formModi">Modificar</button>';
								objTr.appendChild(objTd6);

								objTd6.onclick = function() {
									$("#legajoViejo").val(valor.Legajo);
									$("#MLegajo").val(valor.Legajo);
									$("#MNombre").val(valor.Nombre);
									$("#MApellido").val(valor.Apellido);
									$("#MDNI").val(valor.DNI);
									$("#MEmail").val(valor.Email);
								}

								var objTd7 = document.createElement("td");
								objTd7.setAttribute("class", "botones");
								objTd7.innerHTML = '<button class="btn btn-secondary">Eliminar</button>';
								objTr.appendChild(objTd7);

								objTd7.onclick = function() {
									$("#BLegajo").val(valor.Legajo);
									baja();
								}

								$("#tableBody").append(objTr);
							});

							$("#cantidadRegistros").append("Cantidad de registros: " + objJson.cantidad);
						}
					});
				}
			</script>
		</div>
	</body>
</html>