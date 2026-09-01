<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
include_once('includes/class.inc.php');

$link = Conectarse();
$objContenido = new General();
$intIdRes = sanInt($_GET["id"]);
$query = "SELECT * FROM resenias WHERE res_id = " . $intIdRes;
$rsRes = $objContenido->getAllContenido($link, $query);
$arrRes = $rsRes->fetch(PDO::FETCH_BOTH);

$queryCursos = "SELECT id, titulo FROM contenido2 ORDER BY titulo ASC";
$rsCursos = $link->query($queryCursos);
?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <?php include_once('includes/columnaTop.inc.php'); ?>
          <?php include_once('includes/columnaLeft.inc.php'); ?>
        </ul>
      </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
      <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
          </div>
          <ul class="nav navbar-top-links navbar-right">
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log out</a></li>
          </ul>
        </nav>
      </div>

      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-12">
          <h2>Modificar Reseña</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Reseñas</a></li>
            <li class="active"><strong>Modificar Reseña</strong></li>
          </ol>
        </div>
      </div>

      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content">
                <form action="svResenias.php" method="post" name="form1">
                  <input type="hidden" name="strOperacion" value="U" />
                  <input type="hidden" name="id" value="<?php echo $arrRes["res_id"]; ?>" />

                  <div class="form-group col-xs-12">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $arrRes["res_titulo"]; ?>" required>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $arrRes["res_nombre"]; ?>" required>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="curso">Curso</label>
                    <select name="curso" id="curso" class="form-control" required>
                      <option value="">Seleccione un curso</option>
                      <?php while ($arrCurso = $rsCursos->fetch(PDO::FETCH_BOTH)) { ?>
                        <option value="<?php echo $arrCurso["id"]; ?>" <?php if ($arrRes["res_curso"] == $arrCurso["id"]) { ?>selected<?php } ?>>
                          <?php echo $arrCurso["titulo"]; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="texto">Texto</label>
                    <textarea name="texto" rows="12" id="texto" class="form-control" required><?php echo $arrRes["res_texto"]; ?></textarea>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="publicado">Publicado</label>
                    <p>
                      <label class="checkbox-inline i-checks"><input type="radio" value="1" name="publicado" <?php if ($arrRes["res_publicado"] == 1) { ?>checked<?php } ?>> <i></i> Si </label>
                      <label class="checkbox-inline i-checks"><input name="publicado" type="radio" value="0" <?php if ($arrRes["res_publicado"] == 0 || empty($arrRes["res_publicado"])) { ?>checked<?php } ?>> <i></i> No </label>
                    </p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="home">Home</label>
                    <p>
                      <label class="checkbox-inline i-checks"><input type="radio" value="1" name="home" <?php if ($arrRes["res_home"] == 1) { ?>checked<?php } ?>> <i></i> Si </label>
                      <label class="checkbox-inline i-checks"><input name="home" type="radio" value="0" <?php if ($arrRes["res_home"] == 0 || empty($arrRes["res_home"])) { ?>checked<?php } ?>> <i></i> No </label>
                    </p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="destacado">Destacado</label>
                    <p>
                      <label class="checkbox-inline i-checks"><input type="radio" value="1" name="destacado" <?php if ($arrRes["res_destacado"] == 1) { ?>checked<?php } ?>> <i></i> Si </label>
                      <label class="checkbox-inline i-checks"><input name="destacado" type="radio" value="0" <?php if ($arrRes["res_destacado"] == 0 || empty($arrRes["res_destacado"])) { ?>checked<?php } ?>> <i></i> No </label>
                    </p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="lstResenias.php?seccion=resenias" class="btn btn-default">Cancelar</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
