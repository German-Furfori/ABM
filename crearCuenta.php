<?php
    include("./datosConexionDB.inc");

    $altaUsuario = $_GET['altaUsuario'];
    $altaPassword = sha1($_GET['altaPassword']);

    $dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);

    $sql = "select * from Usuarios where nickname like ('" . $altaUsuario . "')";

    $stmt = $dbh->prepare($sql); // Preparación de la sentencia
	$stmt->setFetchMode(PDO::FETCH_ASSOC); // Método para fijar el tipo de variable en la cual se resolverá la sentencia
	$stmt->execute();

	if ($stmt->fetch()) {
		echo "Ya existe el usuario";
	}
	else {
		$sql = "insert into Usuarios (nickname, password) values (:nickname, :password)";

		$stmt = $dbh->prepare($sql);

		$stmt->bindParam(':nickname', $altaUsuario);
		$stmt->bindParam(':password', $altaPassword);

		$stmt->execute();

		echo "Operación exitosa";
	}

	$dbh = null;
?>