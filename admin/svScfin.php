<?php
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
  

  case 'U':
    //
    $arrData[0] = sanInt($_POST["id"]);
    //
    $Update_row = new General();

    $arrData[1] = sanStrHtml($_POST["nombre"]);
    $arrData[2] = sanStrHtml($_POST["email"]);
    $arrData[3] = sanStrHtml($_POST["telefono"]);
    $arrData[4] = sanStrHtml($_POST["ciudad"]);
    $arrData[5] = sanInt($_POST["participa"]);
    $arrData[6] = sanStrHtml($_POST["dni"]);
    $arrData[7] = sanStrHtml($_POST["cuit"]);
    $arrData[8] = sanStrHtml($_POST["organizacion"]);

    //

    $query = "UPDATE scf2023 SET scf2023_nombre = ?, scf2023_email = ?, scf2023_tel = ?,scf2023_ciudad = ?,scf2023_tipo = ?,scf2023_dni = ?,scf2023_cuit = ?,scf2023_organizacion = ? WHERE scf2023_id = ?";
    $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);


    break;

  case 'D':
    //Recibo variables
    $arrData[0] = sanInt($_POST["intIdRegistro"]);
    $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);

    // Borramos la Imagen de la obra
    $Update_row = new General();
  
    //Borra notas  relacionadas
    $strQuery = "DELETE FROM scf2023 WHERE scf2023_id = " . $arrData[0];
    $rsContd = $Update_row->getAllContenido($link, $strQuery);

    //
    break;
}
//
header("Location: lstScfin.php?seccion=scf23");
