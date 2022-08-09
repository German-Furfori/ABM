<?php
	include("./manejoSesion.inc");
	include("../datosConexionDB.inc");

	$BLegajo = $_GET['BLegajo'];
	
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);

	$sql = "delete from Alumno where Legajo=:Legajo;";

	$stmt = $dbh->prepare($sql); 

	$stmt->bindParam(':Legajo', $BLegajo);

	$stmt->execute();

	echo "Se eliminó correctamente";

	$dbh = null;
?>