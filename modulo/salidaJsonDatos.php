<?php
	include("./manejoSesion.inc");
	include("../datosConexionDB.inc");

	$orden = $_GET['orden'];
	$filtroLegajo = $_GET['filtroLegajo'];
	$filtroNombre = $_GET['filtroNombre'];
	$filtroApellido = $_GET['filtroApellido'];
	$filtroDNI = $_GET['filtroDNI'];
	$filtroEmail = $_GET['filtroEmail'];

	$dsn = "mysql:host=$host;dbname=$dbname"; // String necesario para definir nombre de host que contiene el motor y la base de datos
	$dbh = new PDO($dsn, $user, $password); // DataBase Handle, objeto conexión con la base de datos

	$sql = "select * from Alumno where ";

	// Concatenación de la consulta SQL

	$sql = $sql . "Legajo LIKE CONCAT('%" . $filtroLegajo . "%') and ";
	$sql = $sql . "Nombre LIKE CONCAT('%" . $filtroNombre . "%') and ";
	$sql = $sql . "Apellido LIKE CONCAT('%" . $filtroApellido . "%') and ";
	$sql = $sql . "DNI LIKE CONCAT('%" . $filtroDNI . "%') and ";
	$sql = $sql . "Email LIKE CONCAT('%" . $filtroEmail . "%') order by " . $orden;

	// Fin de concatenación, toda la consulta se guarda en el string $sql

	$stmt = $dbh->prepare($sql); // Preparación de la sentencia
	$stmt->setFetchMode(PDO::FETCH_ASSOC); // Método para fijar el tipo de variable en la cual se resolverá la sentencia
	$stmt->execute(); // Ejecución de la sentencia

	$alumnos = []; // Creo un arreglo para almacenar los datos obtenidos de la consulta

	while($fila = $stmt->fetch()) { // El método fecth aplicado al objeto $stmt asigna cada fila de la consulta en un formado de arreglo asociativo $fila['nombreAtributo']
		$objAlumno = new stdClass(); // Creo un objeto para ir almacenando los atributos 
		$objAlumno->Legajo=$fila['Legajo'];
		$objAlumno->Nombre=$fila['Nombre'];
		$objAlumno->Apellido=$fila['Apellido'];
		$objAlumno->DNI=$fila['DNI'];
		$objAlumno->Email=$fila['Email'];

		array_push($alumnos, $objAlumno); // Y acá pusheo todo, en cada ciclo while se va almacenando toda la tabla de la DB
	}

	$objAlumnos = new stdClass();
	$objAlumnos->alumnos = $alumnos; // Lo convierto a objeto como ya habíamos hecho otras veces
	$objAlumnos->cantidad = count($alumnos); // Este atributo me dice cuantos alumnos hay

	$salidaJson = json_encode($objAlumnos);

	$dbh = null; // Cierro la conexión con la DB

	echo $salidaJson; // Envío el json
?>