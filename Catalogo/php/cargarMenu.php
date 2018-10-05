<?php 
	session_start();
	require 'database.php';
	if(isset($_SESSION['userid']))
	{
	    try{
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT Objetos.objetoId,texto,link,Objetos.tipoId,objetoPadreId FROM Objetos
                    INNER JOIN Permisos ON Objetos.objetoId = Permisos.objetoId
                    INNER JOIN Usuarios ON Permisos.rolId = Usuarios.rolId
                    WHERE  Usuarios.usuarioId  =?";
            $q = $pdo->prepare($sql);
            $q->execute(array($_SESSION['userid']));

            Database::disconnect();
			
			$resultado = $q->fetchAll();

			//-------arreglo con todos los padres
			$padres = array();
			foreach ($resultado as $valor) {
				if($valor["tipoId"] == "2"){
					$padres[] = $valor["objetoPadreId"];
				}
			}
			//--------------------------------------
			foreach ($resultado as $valor) {
				if($valor["tipoId"] == "1"){
                    if (in_array($valor["objetoId"], $padres)) {
                        echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$valor["texto"]."<b class='caret'></b></a><ul class='dropdown-menu'>";
						    foreach ($resultado as $valor2) {
								if($valor2["tipoId"] == "2"){
									if($valor2["objetoPadreId"] == $valor["objetoId"]){
										echo "<li><a href='".$valor2["link"]."'>".$valor2["texto"]."</a></li>";
									}
								}
							}
						echo "</ul></li>";
                    }
					else{
						echo "<li><a href='".$valor["link"] ."'>".$valor["texto"]."</a></li>";
					}
                }
            }
		}
		catch(Exception $e){
			echo "error: " . $e->getMessage();
		} 	
	}
	else
	{
		
	}
?> 		