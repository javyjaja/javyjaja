<?php
	session_start();
	require 'database.php';
	
	$uploadedfileload="true";
	$uploadedfile_size=$_FILES['uploadedfile'][size];
	echo $_FILES[uploadedfile][name];
	if ($_FILES[uploadedfile][size]>200000)
	{
		$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
		$uploadedfileload="false";
	}
	if (!($_FILES[uploadedfile][type] =="image/jpeg" OR $_FILES[uploadedfile][type] =="image/png" OR $_FILES[uploadedfile][type] =="image/jpg"))
	{
		$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
		$uploadedfileload="false";
	}	
	$file_name=$_FILES[uploadedfile][name];
	$numLetras = strlen($file_name);
	$imgClave = $_SESSION['userid']. "_" . $_POST["Nombre"] . "." . substr($file_name,($numLetras - 3));
	$add = "imagenesSubidas/" . $imgClave;
	if($uploadedfileload=="true")
	{
        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $add))
		{
			cargarDatos($imgClave);
			
		}
		else
		{
			echo "Error al subir el archivo";
		}

	}
	else
	{
		echo $msg;
	}
	
	function cargarDatos($imgClave){
	echo "<<*" . $_SESSION['userid'] . "*" . date("Y-m-d") . "*" . $_POST["Nombre"] . "*" . $_POST["Descripcion"] . "*" . $imgClave, $_POST["categoria"] ."*>>";
	try{
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Articulos(usuarioId,fecha,nombre,descripcion,imagenClave,categoriaId) VALUES (?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($_SESSION['userid'], date("Y-m-d"), $_POST["Nombre"], $_POST["Descripcion"], $imgClave, $_POST["categoria"]));
            Database::disconnect();
			
			
echo "Guardado Correctamente";
			
		}
		catch(Exception $e){
			echo "error: " . $e->getMessage();
		} 
	}
	

	
?>
