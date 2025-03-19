<?PHP
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
include_once('includes/class.inc.php');
//
		$orden = $_POST["orden"];
		$arrayId = explode(',',$orden);
		$contador = 1;
		$pos = 1;
		$largo=count($arrayId);
		$succes=0;

		$objCont = new General();
		$data = "";

		if ($largo!=1) {
			while($contador<=$largo){

				$arrData[0] = $arrayId[$contador-1];
				$arrData[1] = $pos;

				$query = "UPDATE contenido2 SET orden = ? WHERE id = ?";
				$intIdRegistro = $objCont->updateContenidoOrden($link,$arrData,$query);


				if ($intIdRegistro){
					$succes++;
					if($contador == 1){
						$data .= $contador;
					} else {
						$data .= ",".$contador;
					}

				} else {
					$succes--;;
				}
				$contador++;
				$pos++;
			}
			echo $data;

		} else {
			echo("<span class='griss10'>No se ha modificado el orden.</span>");
		}

    //
