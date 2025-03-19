<?PHP
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
include_once('includes/class.inc.php');
//
$strOperacion = sanStrHtmlSpecial($_POST["strOperacion"]);
//
switch ($strOperacion) {

  case 'U':
  //
  $arrData[0] = sanInt($_POST["id"]);
  $arrData[1] = sanStrHtmlSpecial($_POST["strNombre"]);
  $arrData[2] = sanStrHtmlSpecial($_POST["strApellido"]);
  $arrData[3] = sanStrHtmlSpecial($_POST["strEmail"]);
  $arrData[4] = sanStrHtmlSpecial($_POST["strUsuario"]);
  if ($_POST["strPassword"]!="") {
    $arrData[5] = sha1($_POST["strPassword"]);
  } else {
    $arrData[5] = $_POST["oldPas"];
  }
  
  //
  $Update_row = new Usuarios();
  $intIdRegistro = $Update_row->updatePerfil($link,$arrData);
  break;


}
//
header("Location: updPerfil.php?seccion=perfil&id=$arrData[0]");
?>
