<?php
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
  

  case 'U':
  //
  $arrData[0] = sanInt($_POST["id"]);
  
  //
  
  $arrData[1] = sanStrHtml($_POST["titulo"]);
  for ($i=1; $i <= $_POST["col_number"]; $i++) {
    $string = "texto".$i;
    $arrData[$i+1] = $_POST[$string];
  }
  
  //
  $query = "UPDATE textos SET txt_nombre = ?";
  for ($i=1; $i <= $_POST["col_number"]; $i++) {
    $query .= ",txt_col_".$i." = ?";
  }
  $query .= "  WHERE txt_id = ?";

  //var_dump($query);exit();

  $Update_row = new General();
  $intIdRegistro = $Update_row->updateContenido($link,$arrData,$query);

  break;

}
//
header("Location: lstTextos.php?seccion=textos");
?>
