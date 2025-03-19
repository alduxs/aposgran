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
        $target_path = _PATH_REVISTAS_;

        if ($_FILES['archivo']['name'] != "") {

            $strImg = $Uploads->renameFile($_FILES['archivo']['name']);
            $strImg = "revista_" . $strImg;
            if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
                move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path . $strImg);
                $archivo = $strImg;
            }
        } else {
            $archivo = "nd";
        }

        //---------------------------------------------------------------------------------

        if ($_FILES['imagen']['name'] != "") {
            $Uploads = new iUpload();
            $strImg = $Uploads->renameImage($_FILES['imagen']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['imagen']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'rev_';
                $handle->image_resize          = true;
                $handle->image_ratio_crop      = true;
                $handle->jpeg_quality            = 100;
                $handle->image_y               = _IMG_REVISTAS_HEIGHT_;
                $handle->image_x               = _IMG_REVISTAS_WIDTH_;
                $handle->Process(_PATH_REVISTAS_);

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

        //---------------------------------------------------------------------------------

        $arrData[0] = '';
        $arrData[1] = sanStrHtml($_POST["titulo"]);
        $arrData[2] = sanStrHtml($_POST["texto"]);
        $arrData[3] = $imagen;
        $arrData[4] = $archivo;
        $arrData[5] = sanStrHtml($_POST["link"]);
        $arrData[6] = sanInt($_POST["destacada"]);
        $arrData[7] = sanInt($_POST["publicada"]);

        //

        $Insert_row = new General();
        $query = "INSERT INTO revistas (rev_titulo,rev_texto,rev_imagen,rev_pdf,rev_link,rev_publicada,rev_destacada) VALUES (?,?,?,?,?,?,?)";
        $intIdRegistro = $Insert_row->insertContenido($link, $arrData, $query);
        break;

    case 'U':
        //
        $arrData[0] = sanInt($_POST["id"]);
        $target_path = _PATH_REVISTAS_;
        $Update_row = new General();
        $query = "SELECT * FROM revistas WHERE rev_id=" . $arrData[0];
        $rsCont = $Update_row->getOneContenido($link, $arrData[0], $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        //
        $Uploads = new iUpload();

        //--------------------------------------------------------------------------------------

        if ($_FILES['imagen']['name'] != "") {

            if ($arrCont["rev_imagen"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["rev_imagen"]);
            }

            $strImg = $Uploads->renameImage($_FILES['imagen']['name']);
            $handle = new \Verot\Upload\Upload($_FILES['imagen']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'rev_';
                $handle->image_resize          = true;
                $handle->image_ratio_crop      = true;
                $handle->jpeg_quality            = 100;
                $handle->image_y               = _IMG_REVISTAS_HEIGHT_;
                $handle->image_x               = _IMG_REVISTAS_WIDTH_;
                $handle->Process(_PATH_REVISTAS_);

                if ($handle->processed) {
                    $imagen = $handle->file_dst_name;
                } else {
                    $imagen = $arrCont["rev_imagen"];
                }
                $handle->Clean();
            }
        } else {
            $imagen = $arrCont["rev_imagen"];
        }

        //----------------------------------------------------------------------------------------

        if ($_FILES['archivo']['name'] != "") {

            if ($arrCont["rev_pdf"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["rev_pdf"]);
            }

            $strImg = $Uploads->renameFile($_FILES['archivo']['name']);
            $strImg = "revista_" . $strImg;
            if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
                move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path . $strImg);
                $archivo = $strImg;
            }
        } else {
            $archivo = $arrCont["rev_pdf"];;
        }

        //----------------------------------------------------------------------------------------

        $arrData[1] = sanStrHtml($_POST["titulo"]);
        $arrData[2] = sanStrHtml($_POST["texto"]);
        $arrData[3] = $imagen;
        $arrData[4] = $archivo;
        $arrData[5] = sanStrHtml($_POST["link"]);
        $arrData[6] = sanInt($_POST["destacada"]);
        $arrData[7] = sanInt($_POST["publicada"]);

        //
        
        $query = "UPDATE revistas SET rev_titulo = ?,rev_texto = ?,rev_imagen = ?,rev_pdf = ?,rev_link = ?,rev_destacada = ?,rev_publicada= ? WHERE rev_id = ?";
        $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);


        break;

    case 'D':
        //Recibo variables
        $arrData[0] = sanInt($_POST["intIdRegistro"]);
        $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);
        //
        $target_path = _PATH_REVISTAS_;
        $Uploads = new iUpload();
        $Update_row = new General();
        $query = "SELECT * FROM revistas WHERE rev_id=" . $arrData[0];
        $rsCont = $Update_row->getOneContenido($link, $arrData[0], $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);

        // Borramos la Imagen
        if ($arrCont["rev_imagen"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["rev_imagen"]);
        }
        //Borramos el PDF
        if ($arrCont["rev_pdf"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["rev_pdf"]);
        }

        // Borro el registro de la DB
        $objRegistro = new ComonClases();
        $rsRegistro = $objRegistro->deleteRegistro($link, $arrData);
        //
        break;
}
//
header("Location: lstRevistas.php?seccion=revistas");
