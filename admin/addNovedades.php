<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
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
          <h2>Agregar Novedad</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Novedades</a></li>
            <li class="active"><strong>Agregar Novedad</strong></li>
          </ol>
        </div>
      </div>

      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content">
                <form method="post" action="svNovedades.php" enctype="multipart/form-data" name="form1">
                  <input type="hidden" name="strOperacion" value="I" />

                  <div class="form-group col-xs-12">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="texto">Texto</label>
                    <textarea name="texto" rows="12" id="texto" class="form-control" required></textarea>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="publicado">Publicado</label>
                    <p>
                      <label class="checkbox-inline i-checks"><input type="radio" value="1" name="publicado"> <i></i> Si </label>
                      <label class="checkbox-inline i-checks"><input name="publicado" type="radio" value="0" checked> <i></i> No </label>
                    </p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="destacado">Destacado</label>
                    <p>
                      <label class="checkbox-inline i-checks"><input type="radio" value="1" name="destacado"> <i></i> Si </label>
                      <label class="checkbox-inline i-checks"><input name="destacado" type="radio" value="0" checked> <i></i> No </label>
                    </p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="lstNovedades.php?seccion=novedades" class="btn btn-default">Cancelar</a>
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
