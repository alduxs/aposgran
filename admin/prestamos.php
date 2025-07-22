<?php
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
include_once('includes/class.inc.php');
//
$link = Conectarse();

$objContenido = new General();
$query = "SELECT * FROM apisjava ORDER BY id ASC";
$rsCont = $objContenido->getAllContenido($link,$query);

$data = array();
$data["status"] = "success";
$data["data"] = array();


foreach ($rsCont as $row) {
    $data["data"][] = array(
        'id' => $row['id'],
        'title' =>  mb_convert_encoding(html_entity_decode($row['title']), 'UTF-8'),
        'description' => mb_convert_encoding(html_entity_decode($row['description']), 'UTF-8'),
        'interest' => $row['interest'],
        'image' => $row['image'],
        'alt' => mb_convert_encoding(html_entity_decode($row['alt']), 'UTF-8'),
    );
}

//echo json_encode($data);

// Convertir el array a JSON
$json_data = json_encode($data);

// Establecer la cabecera Content-Type
header('Content-Type: application/json');

// Imprimir la cadena JSON
echo $json_data;

//var_dump($json_data); // This will output the contents of the $rsCont variable for debugging purposes

?>