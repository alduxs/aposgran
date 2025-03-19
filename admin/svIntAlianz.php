<?PHP
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
include_once('includes/class.inc.php');
//
include ("includes/class.upload.php");
//
$strOperacion = sanStrHtmlSpecial($_POST["strOperacion"]);
//
switch ($strOperacion) {
  case 'I':
  //
  $Uploads = new iUpload;
  $target_path = _PATH_INT_ALI_;

  if ($_FILES['archivo']['name'] != "") {
    $Uploads = new iUpload();
    $strImg = $Uploads->renameImage($_FILES['archivo']['name']);

    $handle = new \Verot\Upload\Upload($_FILES['archivo']);

    if ($handle->uploaded) {

      // IMAGEN SLIDE
      $handle->file_new_name_body = $strImg;
      $handle->file_name_body_pre = 'alz_';
      $handle->image_resize          = true;
      $handle->image_ratio_fill      = true;
      /*$handle->image_ratio_x         = true;*/
      $handle->jpeg_quality 		   = 100;
      $handle->image_y               = _IMG_INT_ALI_HEIGHT_;
      $handle->image_x               = _IMG_INT_ALI_WIDTH_;
      $handle->image_background_color = '#FFF';
      $handle->Process(_PATH_INT_ALI_);


      if ($handle->processed) {
        $imagen=$handle->file_dst_name;
      } else {
        $imagen="nd";
      }
      $handle-> Clean();
    }
  } else {
    $imagen="nd";
  }

  $arrData[0] = '';
  $arrData[1] = sanStrHtml($_POST["nombre"]);
  $arrData[2] = $imagen;

  //

  $Insert_row = new General();
  $query = "INSERT INTO integrantesalianzas (int_nombre,int_logo) VALUES (?,?)";
  $intIdRegistro = $Insert_row->insertContenido($link,$arrData,$query);
  //



  break;

  case 'U':
    //
    $arrData[0] = sanInt($_POST["id"]);
    $target_path = _PATH_INT_ALI_;
    $Update_row = new General();
    $query = "SELECT * FROM integrantesalianzas WHERE int_id=" . $arrData[0];
    $rsCont = $Update_row->getOneContenido($link, $arrData[0], $query);
    $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
    //
    $Uploads = new iUpload();

    if ($_FILES['archivo']['name'] != "") {

        if ($arrCont["int_logo"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["int_logo"]);
        }

        $strImg = $Uploads->renameImage($_FILES['archivo']['name']);
        $handle = new \Verot\Upload\Upload($_FILES['archivo']);

        if ($handle->uploaded) {

            // IMAGEN SLIDE
            $handle->file_new_name_body = $strImg;
            $handle->file_name_body_pre = 'alz_';
            $handle->image_resize          = true;
            $handle->image_ratio_fill      = true;
            /*$handle->image_ratio_x         = true;*/
            $handle->jpeg_quality 		   = 100;
            $handle->image_y               = _IMG_INT_ALI_HEIGHT_;
            $handle->image_x               = _IMG_INT_ALI_WIDTH_;
            $handle->image_background_color = '#FFF';
            $handle->Process(_PATH_INT_ALI_);

            if ($handle->processed) {
                $imagen = $handle->file_dst_name;
            } else {
                $imagen = $arrCont["int_logo"];
            }
            $handle->Clean();
        }
    } else {
        $imagen = $arrCont["int_logo"];
    }

    $arrData[1] = sanStrHtml($_POST["nombre"]);
    $arrData[2] = $imagen;

    //
   
    $query = "UPDATE integrantesalianzas SET int_nombre = ?,int_logo = ? WHERE int_id = ?";
    $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);


    break;


  case 'D':
  //Recibo variables
  $arrData[0] = sanInt($_POST["intIdRegistro"]);
  $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);

  $Update_row = new General();
  $query = "SELECT * FROM integrantesalianzas WHERE int_id=" . $arrData[0];
  $rsCont = $Update_row->getOneContenido($link, $arrData[0], $query);
  $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);


  // Borramos la Imagen de la obra
  $Uploads = new iUpload();

  if($arrCont["int_logo"]!="nd"){
    $target_path = _PATH_INT_ALI_;
    $Uploads->deleteFile($target_path.$arrCont["int_logo"]); //Borra Archivo
  }

  

  // Borro el registro de la DB
  $objRegistro = new ComonClases();
  $rsRegistro = $objRegistro->deleteRegistro($link,$arrData);
  //
  break;
}
//
header("Location: lstIntAlianz.php?seccion=intalianzas");
?>
