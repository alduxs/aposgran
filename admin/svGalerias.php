<?PHP
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
include_once('includes/class.inc.php');
//
$link = Conectarse();
//
$strOperacion = sanStrHtmlSpecial($_POST["strOperacion"]);
//
//$intPageId = sanInt($_POST["intPageId"]);
//
switch ($strOperacion) {
    case 'I':
    //
        $arrData[0] = '';
		$arrData[1] = sanStrHtml($_POST["nombre"]);
		$arrData[2] = sanInt($_POST["publicada"]);
        //
        $Insert_row = new General();
		$query = "INSERT INTO geleriasg (galeria_nombre, galeria_publicada) VALUES (?,?)";
        $intIdRegistro = $Insert_row->insertContenido($link,$arrData,$query);
        break;

    case 'U':
    // BUSCO LOS DATOS DEL CONTENIDO A MODIFICAR
    // PARA VERIFICAR SI SE CAMBIARON LAS IMAGENES
        $arrData[0] = sanInt($_POST["id"]);
		
		$arrData[1] = sanStrHtml($_POST["nombre"]);
		$arrData[2] = sanInt($_POST["publicada"]);
        //
        $Update_row = new General();
		$query = "UPDATE geleriasg SET galeria_nombre = ?, galeria_publicada = ?  WHERE galeria_id = ?";
		$intIdRegistro = $Update_row->updateContenido($link,$arrData,$query);

       
        break;

    case 'D':
		
		//Recibo variables
        $arrData[0] = sanInt($_POST["intIdRegistro"]);
		$arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);
		// Borramos la Imagen de la obra
		$Uploads = new iUpload();

		$objContenido = new General();
		$query = "SELECT * FROM galeriasgximag WHERE  gxi_galeriag_id = '".$arrData[0]."' ORDER BY gxi_id ASC";
		$rsImag = $objContenido->getAllContenido($link,$query);
		$intQtyRecords = $rsImag->rowCount();
		

		if ($intQtyRecords>0){
			$target_pathSmall = _CONST_PATH_IMAGEN_SMALL_;
			$target_pathBig = _CONST_PATH_IMAGEN_BIG_;
			$objRegistroI = new ComonClases();
			$arrDataI[0] = "";
			$arrDataI[1] = "ImagenG";

			while ($arrImag = $rsImag->fetch(PDO::FETCH_BOTH)) {
				$Uploads->deleteFile($target_pathSmall.$arrImag["gxi_imagen"]); //Borra Imagen Chica
				$Uploads->deleteFile($target_pathBig.$arrImag["gxi_imagen"]); // Borra Imagen Grande
				$arrDataI[0] = $arrImag["gxi_id"];
				$rsRegistroI = $objRegistroI->deleteRegistro($link,$arrDataI); // Borra Imagen de DB
			}
		}
        
        
        // Borro el registro de la DB
		$objRegistro = new ComonClases();
		$rsRegistro = $objRegistro->deleteRegistro($link,$arrData);
		//
        break;
}
//
header("Location: lstGalerias.php?seccion=galerias&intPageId=$intPageId");
?>