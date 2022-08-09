<?php
	include("./auth.inc");

	$usuario = $_GET['usuario'];
	$password = $_GET['password'];

	if (authenticate($usuario, $password) == false) {
		header("location:./formularioLogin.html");
		exit();
	}

	session_start(); // Esta funcion se usa en dos puntos de la aplicación: En este punto inicia una nueva sesion. En la primer línea de todos los demás scripts, lee el identificativo, lo registra y lo busca entre los arreglos globales almacenados en la tabla de sesiones establecidas para cada usuario en sesión.

	$_SESSION['idSesion'] = session_create_id(); // Crea un nuevo identificador para la session.
	$_SESSION['usuario'] = $usuario;
	$_SESSION['password'] = $password;

	header("location:./index.php");
?>