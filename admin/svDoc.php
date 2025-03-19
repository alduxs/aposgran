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
        $target_path = _PATH_DOC_;

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
                $handle->Process(_PATH_DOC_);

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
        $arrData[2] = sanStrHtml($_POST["texto"]);
        $arrData[3] = $imagen;

        //

        $Insert_row = new General();
        $query = "INSERT INTO docentes (doc_nombre,doc_text,doc_imagen) VALUES (?,?,?)";
        $intIdRegistro = $Insert_row->insertContenido($link, $arrData, $query);
        break;

    case 'U':
        //
        $arrData[0] = sanInt($_POST["id"]);
        $target_path = _PATH_DOC_;
        $Update_row = new General();
        $query = "SELECT * FROM docentes WHERE doc_id=" . $arrData[0];
        $rsCont = $Update_row->getOneContenido($link, $arrData[0], $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        //
        $Uploads = new iUpload();

        if ($_FILES['archivo']['name'] != "") {

            if ($arrCont["doc_imagen"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["doc_imagen"]);
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
                $handle->Process(_PATH_DOC_);

                if ($handle->processed) {
                    $imagen = $handle->file_dst_name;
                } else {
                    $imagen = $arrCont["doc_imagen"];
                }
                $handle->Clean();
            }
        } else {
            $imagen = $arrCont["doc_imagen"];
        }

        $arrData[1] = sanStrHtml($_POST["nombre"]);
        $arrData[2] = sanStrHtml($_POST["texto"]);
        $arrData[3] = $imagen;

        //
       
        $query = "UPDATE docentes SET doc_nombre = ?,doc_text = ?,doc_imagen = ? WHERE doc_id = ?";
        $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);


        break;


    case 'D':
        //Recibo variables
        $arrData[0] = sanInt($_POST["intIdRegistro"]);
        $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);
        $Update_row = new General();

        $query = "SELECT * FROM docentes WHERE doc_id=" . $arrData[0];
        $rsCont = $Update_row->getOneContenido($link, $arrData[0], $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        
        // Borramos la Imagen de la obra
        $Uploads = new iUpload();

        $target_path = _PATH_DOC_;
        if ($arrCont["doc_imagen"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["doc_imagen"]);
        }

        // Borro el registro de la DB
        $objRegistro = new ComonClases();
        $rsRegistro = $objRegistro->deleteRegistro($link, $arrData);
        //
        break;
}
//
header("Location: lstDoc.php?seccion=docentes");
