<?php
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
include_once('includes/class.inc.php');
include ("includes/class.upload.php");

$id_imagen = $_GET["id_imagen"];
$pie = $_GET["pie"];

$arrData[0] = $id_imagen;
$arrData[1] = $pie;

$Update_row = new General();
$query = "UPDATE galeriasgximag SET gxi_pie = ?  WHERE gxi_id = ?";
$intIdRegistro = $Update_row->updateContenido($link,$arrData,$query);

?>