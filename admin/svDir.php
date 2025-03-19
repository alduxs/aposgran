<?PHP
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
include_once('includes/class.inc.php');
//
include("includes/class.upload.php");
//
$strOperacion = sanStrHtmlSpecial($_POST["strOperacion"]);
//
switch ($strOperacion) {
    case 'I':
        //
        $Uploads = new iUpload;
        $target_path = _PATH_DIR_;

        if ($_FILES['archivo']['name'] != "") {
            $Uploads = new iUpload();
            $strImg = $Uploads->renameImage($_FILES['archivo']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['archivo']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'doc_';
                $handle->image_resize          = true;
                $handle->image_ratio_crop      = true;
                $handle->jpeg_quality            = 100;
                $handle->image_y               = _IMG_DOC_HEIGHT_;
                $handle->image_x               = _IMG_DOC_WIDTH_;
                $handle->Process(_PATH_DIR_);

                $handle->image_resize          = true;
   


                if ($handle->processed) {
                    $imagen = $handle->file_dst_name;
                } else {
                    $imagen = "nd";
                }
                $handle->Clean();
            }
        } else {
            $imagen = "nd";
        }

        $arrData[0] = '';
        $arrData[1] = sanStrHtml($_POST["nombre"]);
        $arrData[2] = sanStrHtml($_POST["cargo"]);
        $arrData[3] = sanStrHtml($_POST["empresa"]);
        $arrData[4] = $imagen;
        $arrData[5] = sanInt($_POST["posicion"]);


        //

        $Insert_row = new General();
        $query = "INSERT INTO comision (com_nombre,com_cargo,com_pertenencia,com_imagen,com_posicion) VALUES (?,?,?,?,?)";
        $intIdRegistro = $Insert_row->insertContenido($link, $arrData, $query);
        break;

    case 'U':
        //
        $arrData[0] = sanInt($_POST["id"]);
        $target_path = _PATH_DIR_;
        $Update_row = new General();
        $query = "SELECT * FROM comision WHERE com_id=" . $arrData[0];
        $rsCont = $Update_row->getOneContenido($link, $arrData[0], $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        //
        $Uploads = new iUpload();

        if ($_FILES['archivo']['name'] != "") {

            if ($arrCont["com_imagen"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["com_imagen"]);
            }

            $strImg = $Uploads->renameImage($_FILES['archivo']['name']);
            $handle = new \Verot\Upload\Upload($_FILES['archivo']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'doc_';
                $handle->image_resize          = true;
                $handle->image_ratio_crop      = true;
                $handle->jpeg_quality            = 100;
                $handle->image_y               = _IMG_DOC_HEIGHT_;
                $handle->image_x               = _IMG_DOC_WIDTH_;
                $handle->Process(_PATH_DIR_);

                if ($handle->processed) {
                    $imagen = $handle->file_dst_name;
                } else {
                    $imagen = $arrCont["com_imagen"];
                }
                $handle->Clean();
            }
        } else {
            $imagen = $arrCont["com_imagen"];
        }

        $arrData[1] = sanStrHtml($_POST["nombre"]);
        $arrData[2] = sanStrHtml($_POST["cargo"]);
        $arrData[3] = sanStrHtml($_POST["empresa"]);
        $arrData[4] = $imagen;
        $arrData[5] = sanInt($_POST["posicion"]);

        //
       
        $query = "UPDATE comision SET com_nombre = ?,com_cargo = ?,com_pertenencia = ?,com_imagen = ?,com_posicion = ? WHERE com_id = ?";
        $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);


        break;


    case 'D':
        //Recibo variables
        $arrData[0] = sanInt($_POST["intIdRegistro"]);
        $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);
        $Update_row = new General();

        $query = "SELECT * FROM comision WHERE com_id=" . $arrData[0];
        $rsCont = $Update_row->getOneContenido($link, $arrData[0], $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        
        // Borramos la Imagen de la obra
        $Uploads = new iUpload();

        $target_path = _PATH_DIR_;
        if ($arrCont["com_imagen"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["com_imagen"]);
        }

        // Borro el registro de la DB
        $objRegistro = new ComonClases();
        $rsRegistro = $objRegistro->deleteRegistro($link, $arrData);
        //
        break;
}
//
header("Location: lstDir.php?seccion=cdirectiva");
