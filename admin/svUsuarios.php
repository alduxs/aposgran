<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
include_once('includes/class.inc.php');
//
$strOperacion = sanStrHtmlSpecial($_POST["strOperacion"]);
//
//$intPageId = sanInt($_POST["intPageId"]);
//
switch ($strOperacion) {
  case 'I':
  //
  $arrData[0] = '';
  $arrData[1] = sanStrHtmlSpecial($_POST["strNombre"]);
  $arrData[2] = sanStrHtmlSpecial($_POST["strApellido"]);
  $arrData[3] = sanStrHtmlSpecial($_POST["strEmail"]);
  $arrData[4] = sanStrHtmlSpecial($_POST["strUsuario"]);
  $arrData[5] = sha1($_POST["strPassword"]);
  $arrData[6] = sanInt($_POST["tipo"]);
  //
  $Insert_row = new Usuarios();
  $intIdRegistro = $Insert_row->insertUser($link,$arrData);
  break;

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
  $arrData[6] = sanInt($_POST["tipo"]);
  //
  $Update_row = new Usuarios();
  $intIdRegistro = $Update_row->updateUser($link,$arrData);
  break;

  case 'D':
  //Recibo variables
  $arrData[0] = sanInt($_POST["intIdRegistro"]);
  $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);
  // Borro el registro de la DB
  $objRegistro = new ComonClases();
  $rsRegistro = $objRegistro->deleteRegistro($link,$arrData);
  //
  break;
}
//
header("Location: lstUsuarios.php?seccion=usuarios&intPageId=$intPageId");
?>
