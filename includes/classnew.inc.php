<?php

include_once('constantes.inc.php');
//require_once 'includes//library/HTMLPurifier.auto.php';

if (file_exists('vendor/autoload.php')) {
  require_once 'vendor/autoload.php';
} else if (file_exists('../vendor/autoload.php')) {
  require_once '../vendor/autoload.php';
} else if (file_exists('../../vendor/autoload.php')) {
  require_once '../../vendor/autoload.php';
}

use Respect\Validation\Validator as v;
//
function valError($regvalue1, $dirty_post)
{

  $mensaje = $regvalue1 . "<br>";
  $mensaje .= "Formato de dato incorrecto\n";
  echo $mensaje;


  exit();
}
//
function registerValidation($tipo, $regvalue, $dirty_post = false)
{



  $additionalChars = "/_.,×-áéíóúÁÉÍÓÚÜñÑÃ­!?¡¿@&+*:;=°´$| " . utf8_encode("/_.,×-áéíóúÁÉÍÓÚÜñÑÃ­!?¡¿@&+*:;=°´$| ") . utf8_decode("/_.,×-áéíóúÁÉÍÓÚÜñÑÃ­!?¡¿@&+*:;=°´$| ");
  //$additionalCharsFind = ".,-áéíóúÁÉÍÓÚÜñÑÃ­!?¡¿@+*:=°´%".utf8_encode(".,-áéíóúÁÉÍÓÚÜñÑÃ­!?¡¿@+*:=°´%").utf8_decode(".,-áéíóúÁÉÍÓÚÜñÑÃ­!?¡¿@+*:=°´%");

  if ($tipo) {

    //funcion verificar el tipo de datos con Respect validator.php
    /*
        * AB = Alfabetico
        * TE = Teléfono
        * AN = Alfanumérico
        * NU = Numérico
        * TH = Texto Html
        * TH2 = Texto Html
        * EM = Email
        * DN = DNI
        * LG = Login
        * PW = Password
        */

    switch ($tipo) {
      case 'AB':

        if (v::alpha($additionalChars)->length(1, 200)->validate($regvalue)) {
        } else {

          valError($regvalue, $dirty_post);
        }
        break;

      case 'ABF':

        if (v::alpha($additionalChars)->length(1, 200)->validate($regvalue)) {
        } else {

          valError($regvalue, $dirty_post);
        }
        break;

      case 'ABF2':

        if (v::alpha($additionalChars)->length(1, 200)->validate($regvalue)) {
        } else {

          valError($regvalue, $dirty_post);
        }
        break;

      case 'TE':
        if (v::phone()->length(1, 25)->validate($regvalue)) {
        } else valError($regvalue, $dirty_post);

        break;

      case 'AN':

        if (v::alnum(' ', $additionalChars)->length(1, 200)->validate(utf8_decode($regvalue))) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'NU':

        if (v::number()->length(1, 2000)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'TH':
        if (v::length(1, 2000000)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'TH2':
        if (v::length(1, 2000000)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'EM':
        if (v::email()->length(1, 100)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'DN':

        if (v::number()->length(5, 12)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'LG':
        if (v::alnum('- , . /')->length(1, 100)->noWhitespace()->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'PW':
        if (v::alnum('- , . /')->length(1, 100)->noWhitespace()->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      default:
        # code...
        break;
    }
  }
}
//
class General
{

  public function dataCleaner($dirty_post, $tipodato)
  {

    if (file_exists('includes/library/HTMLPurifier.auto.php')) {
      require_once('includes/library/HTMLPurifier.auto.php');
    } else if (file_exists('../includes/library/HTMLPurifier.auto.php')) {
      require_once('../includes/library/HTMLPurifier.auto.php');
    } else if (file_exists('../../includes/library/HTMLPurifier.auto.php')) {
      require_once('../../includes/library/HTMLPurifier.auto.php');
    }

    if ($tipodato == "TH") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'Windows-1252');
      $config->set('HTML.Allowed', 'p[class,style],u,b,span[class,style],a[href|title|target],abbr[title],table[class],td,tr,strong,blockquote[cite],em,i,div[class,id],span,img[src],table,li[class,style],ol,h2[class,style],br');
      $config->set('HTML.TidyLevel', 'medium');
      $config->set('URI.AllowedSchemes', ['data' => true]);
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else if ($tipodato == "TH2") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'UTF-8');
      /*$config->set('HTML.Allowed', 'p[class,style],u,b,span[class,style],a[href|title],abbr[title],table[class],td,tr,strong,blockquote[cite],em,i,div[class,id],span,img[src],table,li[class,style],ol,h2[class,style],br');
      $config->set('HTML.TidyLevel', 'medium');
      $config->set('URI.AllowedSchemes', ['data' => true]);*/
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else if ($tipodato == "NU") {
      registerValidation($tipodato, $dirty_post);
      $arrayPost_Clean = $dirty_post;
    } else if ($tipodato == "ABF") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'Windows-1252');
      $config->set('HTML.TidyLevel', 'heavy');
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else if ($tipodato == "ABF2") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'UTF-8');
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else if ($tipodato == "AN") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'UTF-8');
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'Windows-1252');
      $config->set('HTML.TidyLevel', 'heavy');
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    }

    return $arrayPost_Clean;
  }


  function getAllContenido($link, $strQuery)
  { /* *NORMALIZADA */
    $strQuery = $strQuery;
    $stmt = $link->prepare($strQuery);
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, selfURL(), $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    } else {
      return $stmt;
    }
  }



  function getOneContenido($link, $pintIdCont, $strQuery)
  { /* *NORMALIZADA */

    $link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $stmt = $link->prepare($strQuery);
    $resultado = count($pintIdCont);

    for ($i = 0; $i < $resultado; $i++) {
      if (isset($pintIdCont[$i]['validar']) && $pintIdCont[$i]['validar'] == 0) {
        $postClean = $pintIdCont[$i]['value'];
        $stmt->bindValue(($i + 1), $postClean);
      } else {
        $postClean = $this->dataCleaner($pintIdCont[$i]['value'], $pintIdCont[$i]['tipo']);
        $stmt->bindValue(($i + 1), $postClean);
      }
    }
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, selfURL(), $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    } else {
      return $stmt;
    }
  }

  function updateContenido($link, $parrData, $strQuery)
  { /* *NORMALIZADA */
    $stmt = $link->prepare($strQuery);
    $resultado = count($parrData);
    for ($i = 0; $i < $resultado; $i++) {
      /*$postClean = $this->dataCleaner($parrData[$i]['value'],$parrData[$i]['tipo']);
      $stmt->bindValue(($i+1), $postClean);*/

      if (isset($parrData[$i]['validar']) && $parrData[$i]['validar'] == 0) {
        $postClean = $parrData[$i]['value'];
        $stmt->bindValue(($i + 1), $postClean);
      } else {
        $postClean = $this->dataCleaner($parrData[$i]['value'], $parrData[$i]['tipo']);
        $stmt->bindValue(($i + 1), $postClean);
      }
    }
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, selfURL(), $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    }
    return true;
  }

  function insertContenido($link, $parrData, $strQuery)
  { /* *NORMALIZADA */
    $stmt = $link->prepare($strQuery);
    $resultado = count($parrData);
    for ($i = 0; $i < $resultado; $i++) {
      if (isset($parrData[$i]['validar']) && $parrData[$i]['validar'] == 0) {
        $postClean = $parrData[$i]['value'];
        $stmt->bindValue(($i + 1), $postClean);
      } else {
        $postClean = $this->dataCleaner($parrData[$i]['value'], $parrData[$i]['tipo']);
        $stmt->bindValue(($i + 1), $postClean);
      }

      /*$postClean = $this->dataCleaner($parrData[$i]['value'],$parrData[$i]['tipo']);
      $stmt->bindValue(($i+1), $postClean);*/
    }
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, selfURL(), $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    }
    $lastReg = $link->lastInsertId();
    return $lastReg;
  }


  function deleteContenido($link, $strSeccion, $strQuery)
  {
    $strQuery = $strQuery;
    $stmt = $link->prepare($strQuery);
    $stmt->bindValue(1, $strSeccion[1]);
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, selfURL(), $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    }
    return true;
  }
}
//
class errorHandler
{
  function reportError($pstrMysqlError, $pstrQueryError, $pstrURL, $pstrIP)
  {
    $strHTML = "<strong>MYSQL ERROR:</strong> " . $pstrMysqlError . "<br /><br />";
    $strHTML .= "<strong>QUERY ERROR:</strong> " . $pstrQueryError . "<br /><br />";
    $strHTML .= "<strong>URL:</strong> " . $pstrURL . "<br /><br />";
    $strHTML .= "<strong>IP ADDRESS:</strong> " . $pstrIP . "<br /><br />";
    $strSubject = "SITE UNDER ATTACK [\"" . _CONST_TITLE_  . "\"]";

    echo $strHTML;

    //sendMail("agi.iniguez@gmail.com", "agi.iniguez@gmail.com", $strSubject, $strHTML);
    exit();
  }
}

//
class iUpload
{
  function renameFile($pstrFileName)
  {
    //$pstrFileName = strtolower($pstrFileName);

    $valores = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", " ", "ñ", "º", "(", ")", "ä", "ë", "ï", "ö", "ü", "Ä", "Ë", "Ï", "Ö", "Ü", ",", "'", "[", "]", "{", "}", "?", "¿", "/", "$", "+", "*", "&", "!", "#", "@", "%", ";", ":", "|"); // Valores no permitidos
    $valoresr = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "_", "n", "_", "_", "_", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_"); // Valores permitidos
    $pstrFileName = str_replace($valores, $valoresr, $pstrFileName);
    $strPDF = strtolower($pstrFileName);


    $randomNumber = rand(0, 9999);
    $strTMPName = explode('.', $strPDF);
    $strPDF = $strTMPName[0] . $randomNumber . "." . strtolower($strTMPName[1]);
    return $strPDF;
  }

  function renameImage($pstrFileName)
  {
    $pstrFileName = strtolower($pstrFileName); // Pone en minúscula el nombre de la imagen
    $valores = array("á", "é", "í", "ó", "ú", " ", "ñ", "º", "(", ")", "ä", "ë", "ï", "ö", "ü", ",", "'", "[", "]", "{", "}", "?", "¿", "/", "$", "+", "*", "&", "!", "#", "@", "%", ";", ":", "|"); // Valores no permitidos
    $pstrFileName = str_replace($valores, "_", $pstrFileName);
    $randomNumber = rand(0, 9999);
    $strTMPName = explode('.', $pstrFileName);
    $strImage = $strTMPName[0] . $randomNumber;
    return $strImage;
  }

  function deleteFile($pstrArchivo)
  {
    unlink($pstrArchivo);
    return true;
  }
  function renameImageBlob($pstrFileName)
  {
    //$pstrFileName = strtolower($pstrFileName); // Pone en minúscula el nombre de la imagen
    $valores = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", " ", "ñ", "º", "(", ")", "ä", "ë", "ï", "ö", "ü", "Ä", "Ë", "Ï", "Ö", "Ü", ",", "'", "[", "]", "{", "}", "?", "¿", "/", "$", "+", "*", "&", "!", "#", "@", "%", ";", ":", "|"); // Valores no permitidos
    $valoresr = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "_", "n", "_", "_", "_", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_"); // Valores permitidos

    $pstrFileName = str_replace($valores, $valoresr, $pstrFileName);

    $strImage = $pstrFileName;
    return $strImage;
  }
}
//
