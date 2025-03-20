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
  case 'I':

    var_dump($_POST);exit();
    //
    $Uploads = new iUpload();
    $Insert_row = new General();

    $imagen = "nd";

    $arrData[0] = '';
    $arrData[1] = sanInt($_POST["seccion"]);
    if(isset($_POST["alianza"]) && count($_POST["alianza"]) > 0){
      $arrData[2] = sanInt($_POST["alianza"]);
    } else{
      $arrData[2] = 0;
    }

    $arrData[3] = sanStrHtml($_POST["titulo"]);
    $arrData[4] = sanStrHtml($_POST["bajada"]);
    $arrData[5] = sanStrHtml($_POST["texto"]);
    $arrData[6] = $imagen;
    $arrData[7] = sanStrHtml($_POST["modalidad"]);
    $arrData[8] = invertFecha(sanStrHtml($_POST["fecha"]));
    $arrData[9] = sanStrHtml($_POST["link"]);
    $arrData[10] = sanStrHtml($_POST["lugar"]);
    $arrData[11] = sanInt($_POST["destacada"]);
    $arrData[12] = sanInt($_POST["publicada"]);
    $arrData[13] = sanInt($_POST["docente"]);

    $arrData[14] = sanStrHtml($_POST["fecha_adic"]);
    $arrData[15] = sanStrHtml($_POST["hora"]);
    $arrData[16] = sanStrHtml($_POST["costo"]);


    //
    $query = "INSERT INTO contenido2 (seccion,alianza,titulo,bajada,texto,imagen,modalidad,fecha,link,lugar,home,publicada,docente,fechas_adic,hora,costo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $intIdRegistro = $Insert_row->insertContenido($link, $arrData, $query);

    //Processa Imagenes
    //Imagen Cuadrada
    if ($_POST["imageNewCuadrada"] != "nd") {


      //Consulta en la Tabla Temporal
      $imagenCuadrada = $_POST["imageNewCuadrada"];
      $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenCuadrada . "'";
      $rsCont = $Insert_row->getAllContenido($link, $query);
      $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
      $intQtyRecords = $rsCont->rowCount();

      if ($intQtyRecords > 0) {

        //Inserta registro en Tabla definitiva
        $arrData2[0] = '';
        $arrData2[1] = $intIdRegistro;
        $arrData2[2] = $imagenCuadrada;
        $arrData2[3] = $arrCont["cxi_tipo"];

        $query = "INSERT INTO contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
        $intIdRegistro2 = $Insert_row->insertContenido($link, $arrData2, $query);

        //Borra el registro de la Tabla Temporal
        $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenCuadrada . "'";
        $rsCont = $Insert_row->getAllContenido($link, $query);

        //Mueve el archivo
        rename("../assets/post-temp/" . $imagenCuadrada . "", "../assets/post/thumb/" . $imagenCuadrada . "");
      }
    }

    //Imagen Rectangular
    if ($_POST["imageNewRect"] != "nd") {


      //Consulta en la Tabla Temporal
      $imagenRect = $_POST["imageNewRect"];
      $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenRect . "'";
      $rsCont = $Insert_row->getAllContenido($link, $query);
      $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
      $intQtyRecords = $rsCont->rowCount();

      if ($intQtyRecords > 0) {

        //Inserta registro en Tabla definitiva
        $arrData2[0] = '';
        $arrData2[1] = $intIdRegistro;
        $arrData2[2] = $imagenRect;
        $arrData2[3] = $arrCont["cxi_tipo"];

        $query = "INSERT INTO contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
        $intIdRegistro3 = $Insert_row->insertContenido($link, $arrData2, $query);

        //Borra el registro de la Tabla Temporal
        $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenRect . "'";
        $rsCont = $Insert_row->getAllContenido($link, $query);

        //Mueve el archivo
        rename("../assets/post-temp/" . $imagenRect . "", "../assets/post/big/" . $imagenRect . "");
      }
    }

    //Notas relacionadas
    //if (count($_POST["alianza"]) > 0) {
    if(isset($_POST["alianza"]) && count($_POST["alianza"]) > 0){

      $arrData3[0] = '';
      $arrData3[1] = $intIdRegistro;


      for ($i = 0; $i < count($_POST["alianza"]); $i++) {

        $tag = $_POST["alianza"][$i];

        $arrData3[2] = $tag;

        $query = "INSERT INTO alianzasxcursos (axc_id_curso,axc_id_alianza) VALUES (?,?)";
        $idTag = $Insert_row->insertContenido($link, $arrData3, $query);
      }
    }


    break;

  case 'U':
    //

    $arrData[0] = sanInt($_POST["id"]);
    
    $target_path = _CONST_PATH_IMG_;
    $Update_row = new General();
    $query = "SELECT * FROM contenido2 WHERE id=" . $arrData[0];
    $rsCont = $Update_row->getAllContenido($link, $query);
    $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);


    //
    $Uploads = new iUpload();
    $Update_row = new General();




    $imagen = "nd";

    $arrData[1] = sanInt($_POST["seccion"]);

    if(isset($_POST["alianza"]) && count($_POST["alianza"]) > 0){
      $arrData[2] = sanInt($_POST["alianza"]);
    } else{
      $arrData[2] = 0;
    }
    $arrData[3] = sanStrHtml($_POST["titulo"]);
    $arrData[4] = sanStrHtml($_POST["bajada"]);
    $arrData[5] = sanStrHtml($_POST["texto"]);
    $arrData[6] = $imagen;
    $arrData[7] = sanStrHtml($_POST["modalidad"]);
    $arrData[8] = invertFecha(sanStrHtml($_POST["fecha"]));
    $arrData[9] = sanStrHtml($_POST["link"]);
    $arrData[10] = sanStrHtml($_POST["lugar"]);
    $arrData[11] = sanInt($_POST["destacada"]);
    $arrData[12] = sanInt($_POST["publicada"]);
    $arrData[13] = sanInt($_POST["docente"]);

    $arrData[14] = sanStrHtml($_POST["fecha_adic"]);
    $arrData[15] = sanStrHtml($_POST["hora"]);
    $arrData[16] = sanStrHtml($_POST["costo"]);

    //


    $query = "UPDATE contenido2 SET seccion = ?, alianza = ?, titulo = ?,bajada = ?,texto = ?,imagen = ?,modalidad = ?,fecha = ?,link = ?,lugar = ?, home = ?,publicada = ?,docente = ?,fechas_adic = ?,hora = ?,costo = ? WHERE id = ?";
    $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);

    //Processa Imagenes
    //Imagen Cuadrada
    if ($_POST["iSquareStat"] != 0) {

      if ($_POST["iSquareStat"] == 1) {
        //Consulta en la Tabla Temporal
        $imagenCuadrada = $_POST["imageNewCuadrada"];
        $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenCuadrada . "'";
        $rsCont = $Update_row->getAllContenido($link, $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        $intQtyRecords = $rsCont->rowCount();

        if ($intQtyRecords > 0) {

          //Inserta registro en Tabla definitiva
          $arrData2[0] = '';
          $arrData2[1] = $arrData[0];
          $arrData2[2] = $imagenCuadrada;
          $arrData2[3] = $arrCont["cxi_tipo"];

          $query = "INSERT INTO contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
          $intIdRegistro2 = $Update_row->insertContenido($link, $arrData2, $query);

          //Borra el registro de la Tabla Temporal
          $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenCuadrada . "'";
          $rsCont = $Update_row->getAllContenido($link, $query);

          //Mueve el archivo
          rename("../assets/post-temp/" . $imagenCuadrada . "", "../assets/post/thumb/" . $imagenCuadrada . "");
        }
      } else if ($_POST["iSquareStat"] == 2) {

        $imagenCuadrada = $_POST["imageNewCuadrada"];
        $imagenOldCuadrada = $_POST["imageOldCuadrada"];

        //Consulta en la Tabla Final
        $query = "SELECT * FROM contximagenes WHERE contximg_imagen ='" . $imagenOldCuadrada . "'";
        $rsCont = $Update_row->getAllContenido($link, $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        $intQtyRecords = $rsCont->rowCount();

        if ($intQtyRecords > 0) {
          //Borra Archivo de carpeta
          $target_path = _CONST_PATH_THUMB_IMG_;
          $Uploads->deleteFile($target_path . $imagenOldCuadrada); //Borra Archivo

          //Borra el registro de la Tabla final
          $query = "DELETE FROM contximagenes WHERE contximg_imagen = '" . $imagenOldCuadrada . "'";
          $rsCont = $Update_row->getAllContenido($link, $query);
        }


        $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenCuadrada . "'";
        $rsCont = $Update_row->getAllContenido($link, $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        $intQtyRecords = $rsCont->rowCount();

        if ($intQtyRecords > 0) {

          //Inserta registro en Tabla definitiva
          $arrData2[0] = '';
          $arrData2[1] = $arrData[0];
          $arrData2[2] = $imagenCuadrada;
          $arrData2[3] = $arrCont["cxi_tipo"];

          $query = "INSERT INTO contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
          $intIdRegistro2 = $Update_row->insertContenido($link, $arrData2, $query);

          //Borra el registro de la Tabla Temporal
          $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenCuadrada . "'";
          $rsCont = $Update_row->getAllContenido($link, $query);

          //Mueve el archivo
          rename("../assets/post-temp/" . $imagenCuadrada . "", "../assets/post/thumb/" . $imagenCuadrada . "");
        }
      }
    }

    //Imagen Rectangular
    if ($_POST["iRectStat"] != 0) {
      if ($_POST["iRectStat"] == 1) {
        //Consulta en la Tabla Temporal
        $imagenRect = $_POST["imageNewRect"];
        $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenRect . "'";
        $rsCont = $Update_row->getAllContenido($link, $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        $intQtyRecords = $rsCont->rowCount();

        if ($intQtyRecords > 0) {

          //Inserta registro en Tabla definitiva
          $arrData2[0] = '';
          $arrData2[1] = $arrData[0];
          $arrData2[2] = $imagenRect;
          $arrData2[3] = $arrCont["cxi_tipo"];

          $query = "INSERT INTO contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
          $intIdRegistro2 = $Update_row->insertContenido($link, $arrData2, $query);

          //Borra el registro de la Tabla Temporal
          $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenRect . "'";
          $rsCont = $Update_row->getAllContenido($link, $query);

          //Mueve el archivo
          rename("../assets/post-temp/" . $imagenRect . "", "../assets/post/big/" . $imagenRect . "");
        }
      } else if ($_POST["iRectStat"] == 2) {

        $imagenRect = $_POST["imageNewRect"];
        $imagenOldRect = $_POST["imageOldRect"];


        //Consulta en la Tabla Final
        $query = "SELECT * FROM contximagenes WHERE contximg_imagen ='" . $imagenOldRect . "'";
        $rsCont = $Update_row->getAllContenido($link, $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        $intQtyRecords = $rsCont->rowCount();

        if ($intQtyRecords > 0) {
          //Borra Archivo de carpeta
          $target_path = _CONST_PATH_BIG_IMG_;
          $Uploads->deleteFile($target_path . $imagenOldRect); //Borra Archivo

          //Borra el registro de la Tabla final
          $query = "DELETE FROM contximagenes WHERE contximg_imagen = '" . $imagenOldRect . "'";
          $rsCont = $Update_row->getAllContenido($link, $query);
        }

        $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenRect . "'";
        $rsCont = $Update_row->getAllContenido($link, $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        $intQtyRecords = $rsCont->rowCount();

        if ($intQtyRecords > 0) {

          //Inserta registro en Tabla definitiva
          $arrData2[0] = '';
          $arrData2[1] = $arrData[0];
          $arrData2[2] = $imagenRect;;
          $arrData2[3] = $arrCont["cxi_tipo"];

          $query = "INSERT INTO contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
          $intIdRegistro2 = $Update_row->insertContenido($link, $arrData2, $query);

          //Borra el registro de la Tabla Temporal
          $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenRect . "'";
          $rsCont = $Update_row->getAllContenido($link, $query);

          //Mueve el archivo
          rename("../assets/post-temp/" . $imagenRect . "", "../assets/post/big/" . $imagenRect . "");
        }
      }
    };

    //Borra notas  relacionadas
    $strQuery = "DELETE FROM alianzasxcursos WHERE axc_id_curso = " . $arrData[0];
    $rsContd = $Update_row->getAllContenido($link, $strQuery);

    //Notas relacionadas
    if(isset($_POST["alianza"]) && count($_POST["alianza"]) > 0){

      $arrData3[0] = '';
      $arrData3[1] = $arrData[0];


      for ($i = 0; $i < count($_POST["alianza"]); $i++) {

        $tag = $_POST["alianza"][$i];

        $arrData3[2] = $tag;

        $query = "INSERT INTO alianzasxcursos (axc_id_curso,axc_id_alianza) VALUES (?,?)";
        $idTag = $Update_row->insertContenido($link, $arrData3, $query);
      }
    }




    break;

  case 'D':
    //Recibo variables
    $arrData[0] = sanInt($_POST["intIdRegistro"]);
    $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);

    // Borramos la Imagen de la obra
    $Update_row = new General();
    $Uploads = new iUpload();
    $target_path_th = _CONST_PATH_THUMB_IMG_;
    $target_path_bg = _CONST_PATH_BIG_IMG_;

    $query = "SELECT * FROM contximagenes WHERE contximg_cont_id =" . $arrData[0];
    $rsCont = $Update_row->getAllContenido($link, $query);
    $intQtyRecords = $rsCont->rowCount();

    if ($intQtyRecords > 0) {
      while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) {
        if ($arrContenido["contximg_tipo"] == 1) {
          $Uploads->deleteFile($target_path_th . $arrContenido["contximg_imagen"]); //Borra Archivo
        } else if ($arrContenido["contximg_tipo"] == 2) {
          $Uploads->deleteFile($target_path_bg . $arrContenido["contximg_imagen"]); //Borra Archivo
        }
      }
      $query = "DELETE FROM contximagenes WHERE contximg_cont_id =" . $arrData[0];
      $rsCont = $Update_row->getAllContenido($link, $query);
    }

    //Borra notas  relacionadas
    $strQuery = "DELETE FROM alianzasxcursos WHERE axc_id_curso = " . $arrData[0];
    $rsContd = $Update_row->getAllContenido($link, $strQuery);

    // Borro el registro de la DB
    $objRegistro = new ComonClases();
    $rsRegistro = $objRegistro->deleteRegistro($link, $arrData);
    //
    break;
}
//
header("Location: lstPost.php?seccion=post");
