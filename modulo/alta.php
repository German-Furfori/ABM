<?php
	include("./manejoSesion.inc");
	include("../datosConexionDB.inc");

	$ALegajo = $_GET['ALegajo'];
	$ANombre = $_GET['ANombre'];
	$AApellido = $_GET['AApellido'];
	$ADNI = $_GET['ADNI'];
	$AEmail = $_GET['AEmail'];
	
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);

	$sql = "select * from Alumno where ";

	// Concatenación de la consulta SQL

	$sql = $sql . "Legajo LIKE ('" . $ALegajo . "')";

	// Fin de concatenación, toda la consulta se guarda en el string $sql

	$stmt = $dbh->prepare($sql); // Preparación de la sentencia
	$stmt->setFetchMode(PDO::FETCH_ASSOC); // Método para fijar el tipo de variable en la cual se resolverá la sentencia
	$stmt->execute();

	if ($stmt->fetch()) {
		echo "Ya existe";
	}
	else {
		$sql = "insert into Alumno (Legajo, Nombre, Apellido, DNI, Email) values (:Legajo, :Nombre, :Apellido, :DNI, :Email)";

		$stmt = $dbh->prepare($sql);

		$stmt->bindParam(':Legajo', $ALegajo);
		$stmt->bindParam(':Nombre', $ANombre); 
		$stmt->bindParam(':Apellido', $AApellido);
		$stmt->bindParam(':DNI', $ADNI); 
		$stmt->bindParam(':Email', $AEmail);

		$stmt->execute();

		echo "Operación exitosa";
	}

	$dbh = null;
?>