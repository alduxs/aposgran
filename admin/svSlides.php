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
        //
        $Uploads = new iUpload();
        $Insert_row = new General();


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
                $arrData[0] = '';
                $arrData[1] = sanStrHtml($_POST["titulo"]);
                $arrData[2] = $imagenRect;
                $arrData[3] = sanInt($_POST["publicada"]);
                $arrData[4] = sanInt($_POST["posicion"]);

                $query = "INSERT INTO slides (ds_titulo,ds_imagen,id_publicado,id_posicion) VALUES (?,?,?,?)";
                $intIdRegistro3 = $Insert_row->insertContenido($link, $arrData, $query);

                //Borra el registro de la Tabla Temporal
                $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenRect . "'";
                $rsCont = $Insert_row->getAllContenido($link, $query);

                //Mueve el archivo
                rename("../assets/post-temp/" . $imagenRect . "", "../assets/slides/" . $imagenRect . "");
            }
        } else {
            //Inserta registro en Tabla definitiva
            $arrData[0] = '';
            $arrData[1] = sanStrHtml($_POST["titulo"]);
            $arrData[2] = "nd";
            $arrData[3] = sanInt($_POST["publicada"]);
            $arrData[4] = sanInt($_POST["posicion"]);

            $query = "INSERT INTO slides (ds_titulo,ds_imagen,id_publicado,id_posicion) VALUES (?,?,?,?)";
            $intIdRegistro3 = $Insert_row->insertContenido($link, $arrData, $query);
        }

        break;

    case 'U':
        //
        $arrData[0] = sanInt($_POST["id"]);
       
        //
        $Uploads = new iUpload();
        $Update_row = new General();


       


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
                    $arrData[1] = sanStrHtml($_POST["titulo"]);
                    $arrData[2] = $imagenRect;
                    $arrData[3] = sanInt($_POST["publicada"]);
                    $arrData[4] = sanInt($_POST["posicion"]);


                    $query = "UPDATE slides SET ds_titulo = ?, ds_imagen = ?,id_publicado = ?,id_posicion = ? WHERE id_slide = ?";
                    $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);


                    //Borra el registro de la Tabla Temporal
                    $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenRect . "'";
                    $rsCont = $Update_row->getAllContenido($link, $query);

                    //Mueve el archivo
                    rename("../assets/post-temp/" . $imagenRect . "", "../assets/slides/" . $imagenRect . "");
                }
            } else if ($_POST["iRectStat"] == 2) {

                $imagenRect = $_POST["imageNewRect"];
                $imagenOldRect = $_POST["imageOldRect"];


                //Borra Archivo de carpeta
                $target_path = _CONST_PATH_SLD_IMG_;
                $Uploads->deleteFile($target_path . $imagenOldRect); //Borra Archivo


                $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenRect . "'";
                $rsCont = $Update_row->getAllContenido($link, $query);
                $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
                $intQtyRecords = $rsCont->rowCount();

                if ($intQtyRecords > 0) {

                    ///Inserta registro en Tabla definitiva
                    $arrData[1] = sanStrHtml($_POST["titulo"]);
                    $arrData[2] = $imagenRect;
                    $arrData[3] = sanInt($_POST["publicada"]);
                    $arrData[4] = sanInt($_POST["posicion"]);


                    $query = "UPDATE slides SET ds_titulo = ?, ds_imagen = ?,id_publicado = ?,id_posicion = ? WHERE id_slide = ?";
                    $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);

                    //Borra el registro de la Tabla Temporal
                    $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenRect . "'";
                    $rsCont = $Update_row->getAllContenido($link, $query);

                    //Mueve el archivo
                    rename("../assets/post-temp/" . $imagenRect . "", "../assets/slides/" . $imagenRect . "");
                }
            }
        } else {
            $imagenOldRect = $_POST["imageOldRect"];
            //var_dump($_POST);exit();
            ///Inserta registro en Tabla definitiva
            $arrData[1] = sanStrHtml($_POST["titulo"]);
            $arrData[2] = $imagenOldRect;
            $arrData[3] = sanInt($_POST["publicada"]);
            $arrData[4] = sanInt($_POST["posicion"]);


            $query = "UPDATE slides SET ds_titulo = ?, ds_imagen = ?,id_publicado = ?,id_posicion = ? WHERE id_slide = ?";
            $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);

        };


        break;

    case 'D':
        //Recibo variables
        $arrData[0] = sanInt($_POST["intIdRegistro"]);
        $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);

        // Borramos la Imagen de la obra
        $Update_row = new General();
        $Uploads = new iUpload();
        $target_path_bg = _CONST_PATH_SLD_IMG_;

        $query = "SELECT * FROM slides WHERE id_slide =" . $arrData[0];
        $rsCont = $Update_row->getAllContenido($link, $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        $intQtyRecords = $rsCont->rowCount();

        if ($arrCont["ds_imagen"] != "nd") {

            $Uploads->deleteFile($target_path_bg . $arrCont["ds_imagen"]); //Borra Archivo
        }


        // Borro el registro de la DB
        $objRegistro = new ComonClases();
        $rsRegistro = $objRegistro->deleteRegistro($link, $arrData);
        //
        break;
}
//
header("Location: lstSlides.php?seccion=slides");
