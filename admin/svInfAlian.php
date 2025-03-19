<?PHP
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

        $arrData[0] = '';
        $arrData[1] = sanStrHtml($_POST["nombre"]);
        $arrData[2] = sanStrHtml($_POST["texto"]);
        $arrData[3] = sanInt($_POST["publicada"]);

        //
        $Insert_row = new General();
        $query = "INSERT INTO alianzas (al_nombre,al_texto,al_publicado) VALUES (?,?,?)";
        $intIdRegistro = $Insert_row->insertContenido($link, $arrData, $query);
        

        //Notas relacionadas
        if (count($_POST["integrantes"]) > 0) {

            $arrData3[0] = '';
            $arrData3[1] = $intIdRegistro;


            for ($i = 0; $i < count($_POST["integrantes"]); $i++) {

                $tag = $_POST["integrantes"][$i];

                $arrData3[2] = $tag;

                $query = "INSERT INTO alianzasxintegrantes (axi_id_alianza,axi_id_integrante) VALUES (?,?)";
                $idTag = $Insert_row->insertContenido($link, $arrData3, $query);
            }
        }
        break;

    case 'U':
        //
        $arrData[0] = sanInt($_POST["id"]);
        $target_path = _PATH_DOC_;
        $Update_row = new General();

        $arrData[1] = sanStrHtml($_POST["nombre"]);
        $arrData[2] = sanStrHtml($_POST["texto"]);
        $arrData[3] = sanInt($_POST["publicada"]);
        //

        $query = "UPDATE alianzas SET al_nombre = ?,al_texto = ?,al_publicado = ? WHERE al_id = ?";
        $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);

        //Borra notas  relacionadas
        $strQuery = "DELETE FROM alianzasxintegrantes WHERE axi_id_alianza = " . $arrData[0];
        $rsContd = $Update_row->getAllContenido($link, $strQuery);


        //Notas relacionadas
        if (count($_POST["integrantes"]) > 0) {

            $arrData3[0] = '';
            $arrData3[1] = $arrData[0];


            for ($i = 0; $i < count($_POST["integrantes"]); $i++) {

                $tag = $_POST["integrantes"][$i];

                $arrData3[2] = $tag;

                $query = "INSERT INTO alianzasxintegrantes (axi_id_alianza,axi_id_integrante) VALUES (?,?)";
                $idTag = $Update_row->insertContenido($link, $arrData3, $query);
            }
        }


        break;


    case 'D':
        //Recibo variables
        $arrData[0] = sanInt($_POST["intIdRegistro"]);
        $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);
        $Update_row = new General();

        //Borra notas  relacionadas
        $strQuery = "DELETE FROM alianzasxintegrantes WHERE axi_id_alianza = " . $arrData[0];
        $rsContd = $Update_row->getAllContenido($link, $strQuery);

         //Borra notas  relacionadas
         $strQuery = "DELETE FROM alianzasxintegrantes WHERE axi_id_alianza = " . $arrData[0];
         $rsContd = $Update_row->getAllContenido($link, $strQuery);


        // Borro el registro de la DB
        $objRegistro = new ComonClases();
        $rsRegistro = $objRegistro->deleteRegistro($link, $arrData);
        //
        break;
}
//
header("Location: lstInfAlian.php?seccion=alianzas");
