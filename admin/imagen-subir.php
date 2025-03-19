<?php
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
include_once('includes/class.inc.php');
include ("includes/class.upload.php");

$id_galeria = $_GET["id_galeria"];
$pie="";
$destacada=0;

$status = "";
//$handle = new Upload($_FILES['uploadfile']);
$handle = new \Verot\Upload\Upload($_FILES['uploadfile']);

$Uploads = new iUpload();

$target_pathSM = _CONST_PATH_IMAGEN_SMALL_;
$target_pathBG = _CONST_PATH_IMAGEN_BIG_;

// SI SELECCIONO UNA IMAGEN HAGO EL UPLOAD

	$strImg = $Uploads->renameImage($_FILES['uploadfile']['name']);

	if ($handle->uploaded) {
		// IMAGEN CHICA
		$handle->file_new_name_body = $strImg;
		$handle->file_name_body_pre = 'img_';
		$handle->image_resize          = true;
		$handle->image_ratio_crop      = true;
		$handle->jpeg_quality 		   = 100;
		$handle->image_x               = _CONST_IMAGEN_SMALL_WIDTH_;
		$handle->image_y               = _CONST_IMAGEN_SMALL_HEIGHT_;
		$handle->Process($target_pathSM);

		// IMAGEN GRANDE
		$handle->file_new_name_body = $strImg;
		$handle->file_name_body_pre = 'img_';
		$handle->image_resize            = true;
		$handle->image_ratio_y           = true;
		$handle->image_x                 =_CONST_IMAGEN_BIG_WIDTH_;
		$handle->Process($target_pathBG);

		if ($handle->processed) {
			$imagen=$handle->file_dst_name;
			$arrData[0] = '';
			$arrData[1] = $id_galeria;
			$arrData[2] = $imagen;
			$arrData[3] = $pie;

			$InsertImagen = new General();
			$query = "INSERT INTO galeriasgximag (gxi_galeriag_id, gxi_imagen, gxi_pie) VALUES (?,?,?)";
			$intIdRegistro = $InsertImagen->insertContenido($link,$arrData,$query);
			echo $imagen."&".$intIdRegistro;

		} else {
			echo '  Error: ' . $handle->error . '';
		}
		$handle-> Clean();
	}
//
