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
  $target_path = _PATH_SOCIOS_;

  if ($_FILES['archivo']['name'] != "") {
    $Uploads = new iUpload();
    $strImg = $Uploads->renameImage($_FILES['archivo']['name']);

    $handle = new \Verot\Upload\Upload($_FILES['archivo']);

    if ($handle->uploaded) {

      // IMAGEN SLIDE
      $handle->file_new_name_body = $strImg;
      $handle->file_name_body_pre = 'soc_';
      $handle->image_resize          = true;
      $handle->image_ratio_fill      = true;
      /*$handle->image_ratio_x         = true;*/
      $handle->jpeg_quality 		   = 100;
      $handle->image_y               = _IMG_SOCIOS_HEIGHT_;
      $handle->image_x               = _IMG_SOCIOS_WIDTH_;
      $handle->image_background_color = '#FFF';
      $handle->Process(_PATH_SOCIOS_);


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
  $query = "INSERT INTO socios (soc_nombre,soc_imagen) VALUES (?,?)";
  $intIdRegistro = $Insert_row->insertContenido($link,$arrData,$query);
  break;


  case 'D':
  //Recibo variables
  $arrData[0] = sanInt($_POST["intIdRegistro"]);
  $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);
  $Archivo = sanStrHtmlSpecial($_POST["Archivo"]);
  // Borramos la Imagen de la obra
  $Uploads = new iUpload();

  $target_path = _PATH_SOCIOS_;
  $Uploads->deleteFile($target_path.$Archivo); //Borra Archivo

  // Borro el registro de la DB
  $objRegistro = new ComonClases();
  $rsRegistro = $objRegistro->deleteRegistro($link,$arrData);
  //
  break;
}
//
header("Location: lstSocios.php?seccion=socios");
?>
