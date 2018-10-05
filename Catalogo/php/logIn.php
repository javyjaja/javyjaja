<?php 
	session_start(); //session_start() crea una sesi�n para ser usada mediante una petici�n GET o POST, o pasado por una cookie 
	require 'database.php'; //es la sentencia q usaremos para incluir el archivo de conexi�n a la base de datos que creamos anteriormente.
	/*Funci�n verificar_login() --> Vamos a crear una funci�n llamada verificar_login, esta se encargara de hacer una consulta a la base de datos para saber si el usuario ingresado es correcto o no.*/

	function verificar_login($user,$password,&$result) 
    {
		try{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM Usuarios WHERE username = ? and password   = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($user,$password));

            Database::disconnect();
			
			$count = 0;
			$resultado = $q->fetchAll();

			if($resultado[0][0])
			{

				$result = $resultado[0];
				return 1;
			}
			else
			{
				return 0;
			}
       

			
		}
		catch(Exception $e){
			echo "error: " . $e->getMessage();
		} 	
	
		
    } 

	/*Luego haremos una serie de condicionales que identificaran el momento en el boton de login es presionado y cuando este sea presionado llamaremos a la funci�n verificar_login() pasandole los par�metros ingresados:*/

	if(!isset($_SESSION['userid'])) //para saber si existe o no ya la variable de sesi�n que se va a crear cuando el usuario se logee	
	{ 
		 
			if(verificar_login($_GET['txtUsername'],$_GET['txtpassword'],$result) == 1) //Si el boton fue presionado llamamos a la funci�n verificar_login() dentro de otra condici�n preguntando si resulta verdadero y le pasamos los valores ingresados como par�metros.
			{ 
				/*Si el login fue correcto, registramos la variable de sesi�n y al mismo tiempo refrescamos la pagina index.php.*/

				$_SESSION['userid'] = $result['usuarioId'];
				echo 1;
				//header("location:xd.html"); 
			}	 
			else 
			{ 
				echo 0; //Si la funci�n verificar_login() no pasa, que se muestre un mensaje de error.
			} 
		
	}
	else{
		echo 'ya estabas logeado';
	}
?> 