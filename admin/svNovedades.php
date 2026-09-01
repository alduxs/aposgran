<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
include_once('includes/class.inc.php');
$link = Conectarse();

$strOperacion = sanStrHtmlSpecial($_POST["strOperacion"]);
$Uploads = new iUpload();
$Insert_row = new General();

switch ($strOperacion) {
  case 'I':
    $imagen = 'nd';

    if (isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != "") {
      $nombreOriginal = $_FILES["image"]["name"];
      $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
      $nombreFinal = $Uploads->renameImage($nombreOriginal);
      $imagen = $nombreFinal . "." . $extension;
      move_uploaded_file($_FILES["image"]["tmp_name"], '../assets/newnovedades/' . $imagen);
    }

    $arrData[0] = sanStrHtml($_POST["titulo"]);
    $arrData[1] = sanStrHtml($_POST["texto"]);
    $arrData[2] = $imagen;
    $arrData[3] = sanInt($_POST["publicado"]);
    $arrData[4] = sanInt($_POST["destacado"]);

    $query = "INSERT INTO novedades (nov_titulo, nov_texto, nov_imagen, nov_publicado, nov_destacado) VALUES (?,?,?,?,?)";
    $Insert_row->insertContenido($link, $arrData, $query);
    break;

  case 'U':
    $id = sanInt($_POST["id"]);
    $imagen = sanStrHtml($_POST["imagen_actual"]);

    if (isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != "") {
      if (!empty($imagen) && $imagen != 'nd') {
        $Uploads->deleteFile('../assets/newnovedades/' . $imagen);
      }

      $nombreOriginal = $_FILES["image"]["name"];
      $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
      $nombreFinal = $Uploads->renameImage($nombreOriginal);
      $imagen = $nombreFinal . "." . $extension;
      move_uploaded_file($_FILES["image"]["tmp_name"], '../assets/newnovedades/' . $imagen);
    }

    $arrData[0] = $id;
    $arrData[1] = sanStrHtml($_POST["titulo"]);
    $arrData[2] = sanStrHtml($_POST["texto"]);
    $arrData[3] = $imagen;
    $arrData[4] = sanInt($_POST["publicado"]);
    $arrData[5] = sanInt($_POST["destacado"]);

    $query = "UPDATE novedades SET nov_titulo = ?, nov_texto = ?, nov_imagen = ?, nov_publicado = ?, nov_destacado = ? WHERE nov_id = ?";
    $Insert_row->updateContenido($link, $arrData, $query);
    break;

  case 'D':
    $id = sanInt($_POST["intIdRegistro"]);
    $query = "SELECT nov_imagen FROM novedades WHERE nov_id = " . $id;
    $rs = $Insert_row->getAllContenido($link, $query);
    $arr = $rs->fetch(PDO::FETCH_BOTH);

    if (!empty($arr["nov_imagen"]) && $arr["nov_imagen"] != 'nd') {
      $Uploads->deleteFile('../assets/newnovedades/' . $arr["nov_imagen"]);
    }

    $query = "DELETE FROM novedades WHERE nov_id = ?";
    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    break;
}

header("Location: lstNovedades.php?seccion=novedades");
