<?php
	$destino = "javier.hernandez.rangel@gmail.com";
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"];
	$mensaje = $_POST["mensaje"];
	$contenido = "Nombre: " . $nombre . "\nCorreo: " . $email . "\nTeléfono: " . $telefono . "\nMensaje: " . $mensaje;

	mail($destino,"de www.javyjaja.com",$contenido);
	echo "enviado";
?>