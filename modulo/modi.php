<?php
	include("./manejoSesion.inc");
	include("../datosConexionDB.inc");

	$legajoViejo = $_GET['legajoViejo'];
	$MLegajo = $_GET['MLegajo'];
	$MNombre = $_GET['MNombre'];
	$MApellido = $_GET['MApellido'];
	$MDNI = $_GET['MDNI'];
	$MEmail = $_GET['MEmail'];
	
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);

	$sql = "select * from Alumno where ";

	$sql = $sql . "Legajo LIKE ('" . $MLegajo . "');";

	$stmt = $dbh->prepare($sql); // Preparación de la sentencia
	$stmt->setFetchMode(PDO::FETCH_ASSOC); // Método para fijar el tipo de variable en la cual se resolverá la sentencia
	$stmt->execute();

	if (!$stmt->fetch() || $MLegajo == $legajoViejo) {
		$sql = "update Alumno set Legajo=:Legajo, Nombre=:Nombre, Apellido=:Apellido, DNI=:DNI, Email=:Email where Legajo like ('" . $legajoViejo . "');";

		$stmt = $dbh->prepare($sql);

		$stmt->bindParam(':Legajo', $MLegajo);
		$stmt->bindParam(':Nombre', $MNombre);
		$stmt->bindParam(':Apellido', $MApellido);
		$stmt->bindParam(':DNI', $MDNI); 
		$stmt->bindParam(':Email', $MEmail);

		$stmt->execute();

		echo "Modificación exitosa";
	}
	else {
		echo "Ya existe el legajo";
	}

	$dbh = null;
?>