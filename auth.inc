<?php
	function authenticate($login, $pass) {
		include("./datosConexionDB.inc");
		$clave = sha1($pass);

		$dsn = "mysql:host=$host;dbname=$dbname";
		$dbh = new PDO($dsn, $user, $password);

		$sql = $sql = "select * from Usuarios where nickname like ('" . $login . "') and password LIKE ('" . $clave . "');";

		$stmt = $dbh->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

		if ($stmt->fetch()) {
			return true;
		}
		else {
			return false;
		}
	}
?>