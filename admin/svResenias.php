<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
include_once('includes/class.inc.php');
$link = Conectarse();

$strOperacion = sanStrHtmlSpecial($_POST["strOperacion"]);
$Insert_row = new General();

switch ($strOperacion) {
  case 'I':
    $arrData[0] = sanStrHtml($_POST["titulo"]);
    $arrData[1] = sanStrHtml($_POST["texto"]);
    $arrData[2] = sanStrHtml($_POST["nombre"]);
    $arrData[3] = sanInt($_POST["curso"]);
    $arrData[4] = sanInt($_POST["publicado"]);
    $arrData[5] = sanInt($_POST["home"]);
    $arrData[6] = sanInt($_POST["destacado"]);

    $query = "INSERT INTO resenias (res_titulo, res_texto, res_nombre, res_curso, res_publicado, res_home, res_destacado) VALUES (?,?,?,?,?,?,?)";
    $Insert_row->insertContenido($link, $arrData, $query);
    break;

  case 'U':
    $id = sanInt($_POST["id"]);
    $arrData[0] = $id;
    $arrData[1] = sanStrHtml($_POST["titulo"]);
    $arrData[2] = sanStrHtml($_POST["texto"]);
    $arrData[3] = sanStrHtml($_POST["nombre"]);
    $arrData[4] = sanInt($_POST["curso"]);
    $arrData[5] = sanInt($_POST["publicado"]);
    $arrData[6] = sanInt($_POST["home"]);
    $arrData[7] = sanInt($_POST["destacado"]);

    $query = "UPDATE resenias SET res_titulo = ?, res_texto = ?, res_nombre = ?, res_curso = ?, res_publicado = ?, res_home = ?, res_destacado = ? WHERE res_id = ?";
    $Insert_row->updateContenido($link, $arrData, $query);
    break;

  case 'D':
    $id = sanInt($_POST["intIdRegistro"]);
    $query = "DELETE FROM resenias WHERE res_id = ?";
    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    break;
}

header("Location: lstResenias.php?seccion=resenias");
