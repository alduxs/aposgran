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
$extension = array("image/jpeg","image/png","image/gif","application/pdf","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/msword");
//
switch ($strOperacion) {
  case 'I':
  //
  $Uploads = new iUpload;
  $target_path = _PATH_ARCHIVOS_;

  if ($_FILES['archivo']['name']!=""){

    $mime = $_FILES["archivo"]["type"];
    
    if (in_array($mime, $extension)) {

      if($mime == "image/jpeg" || $mime == "image/png" || $mime == "image/gif"){
        $tipo = 1;
      } else if($mime == "application/pdf" || $mime == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $mime == "application/msword"){
        $tipo = 2;
      }

      $strImg = $Uploads->renameFile($_FILES['archivo']['name']);
      $strImg = "archivo_".$strImg;
      if (is_uploaded_file($_FILES['archivo']['tmp_name'])){
        move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path.$strImg);
        $imagen=$strImg;
      }
      
    } else {
      header("Location: addArchivos.php?seccion=archivos&error=1");
    }
    

  } else {
    $imagen="nd";
    $tipo = 0;
  }
  $arrData[0] = '';
  $arrData[1] = sanStrHtml($_POST["nombre"]);
  $arrData[2] = $imagen;
  $arrData[3] = $tipo;
  //
  $Insert_row = new General();
  $query = "INSERT INTO archivos (nombre,archivo,tipo) VALUES (?,?,?)";
  $intIdRegistro = $Insert_row->insertContenido($link,$arrData,$query);
  break;


  case 'D':
  //Recibo variables
  $arrData[0] = sanInt($_POST["intIdRegistro"]);
  $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);
  $Archivo = sanStrHtmlSpecial($_POST["Archivo"]);
  // Borramos la Imagen de la obra
  $Uploads = new iUpload();

  $target_path = _PATH_ARCHIVOS_;
  $Uploads->deleteFile($target_path.$Archivo); //Borra Archivo

  // Borro el registro de la DB
  $objRegistro = new ComonClases();
  $rsRegistro = $objRegistro->deleteRegistro($link,$arrData);
  //
  break;
}
//
header("Location: lstArchivos.php?seccion=archivos");
?>
