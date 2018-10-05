<?php
	require 'database.php';
	$txtUsername = $_POST["txtUsername"];
	$txtpassword = $_POST["txtpassword"];
	
	try{
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Usuarios(username,password,facebookId,empresaId,rolId,activo) VALUES (?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($txtUsername, $txtpassword, '0', 0, 1, 1));
            Database::disconnect();
			
			
echo "Guardado Correctamente";
			
		}
		catch(Exception $e){
			echo "error: " . $e->getMessage();
		} 
		
		?>