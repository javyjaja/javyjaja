<?php
	require 'database.php';
	try{
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT  * FROM Articulos LIMIT 6";
            $q = $pdo->prepare($sql);
            $q->execute();
            Database::disconnect();
			
		$resultado = $q->fetchAll();
		
		$primero = true;
$idPrimero = "";
		foreach ($resultado as $valor) {
			$clase = "";
			$style = "none";

			if ($primero)
			{
				$clase = "Activo";
				$style = "block";
$idPrimero = "img". $valor["articuloId"];
			}
				$valor["tipoId"];
				echo "<div id='img". $valor["articuloId"] ."' class='fill ".$clase."' style='display:".$style.";'>
					<div class='col-md-12 text-center'><h3>".$valor["nombre"]."</h3></div>
					<div class='col-md-12'>&nbsp;&nbsp;&nbsp;</div>
					<div class='col-md-6' >
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<img class='imgSlide' src='php/imagenesSubidas/".$valor["imagenClave"]."'>
					</div>
					<div class='col-md-6'>
						<ul id='ulimg".$valor["articuloId"]."'>
							
						</ul>
						<div>
							<button type='button' class='btn btn-primary'>
								<i class='fa fa-shopping-cart' aria-hidden='true'></i>&nbsp;&nbsp;Agregar
							</button>
							<button type='button' class='btn btn-danger'>
								<i class='fa fa-usd' aria-hidden='true'></i>&nbsp;&nbsp;Comprar
							</button>
								
						</div>
						<br />
					</div>
				</div>";
				$primero = false;
			}
echo "|";
	foreach($resultado as $valor){
				echo "<div class='cuadroChico col-md-2 col-xs-5' onclick='mostrar(\"img".$valor["articuloId"]."\")'>
			<img class='imgchica' src='php/imagenesSubidas/".$valor["imagenClave"]."'>
			<div class='abajo'>".$valor["nombre"]."</div>
		</div>"; 
			}
	echo "|" . $idPrimero;
		}
		catch(Exception $e){
			echo "error: " . $e->getMessage();
		} 
?>