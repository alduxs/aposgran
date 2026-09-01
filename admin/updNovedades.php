<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
include_once('includes/class.inc.php');

$link = Conectarse();
$objContenido = new General();
$intIdNov = sanInt($_GET["id"]);
$query = "SELECT * FROM novedades WHERE nov_id = " . $intIdNov;
$rsNov = $objContenido->getAllContenido($link, $query);
$arrNov = $rsNov->fetch(PDO::FETCH_BOTH);
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
          <h2>Modificar Novedad</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Novedades</a></li>
            <li class="active"><strong>Modificar Novedad</strong></li>
          </ol>
        </div>
      </div>

      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content">
                <form action="svNovedades.php" method="post" enctype="multipart/form-data" name="form1">
                  <input type="hidden" name="strOperacion" value="U" />
                  <input type="hidden" name="id" value="<?php echo $arrNov["nov_id"]; ?>" />

                  <div class="form-group col-xs-12">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $arrNov["nov_titulo"]; ?>" required>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="texto">Texto</label>
                    <textarea name="texto" rows="12" id="texto" class="form-control" required><?php echo $arrNov["nov_texto"]; ?></textarea>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="image">Imagen</label>
                    <?php if (!empty($arrNov["nov_imagen"]) && $arrNov["nov_imagen"] != "nd") { ?>
                      <div class="mb-2">
                        <img src="../assets/newnovedades/<?php echo $arrNov["nov_imagen"]; ?>" class="img-responsive" style="max-width: 250px;" />
                      </div>
                    <?php } ?>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    <input type="hidden" name="imagen_actual" value="<?php echo $arrNov["nov_imagen"]; ?>">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="publicado">Publicado</label>
                    <p>
                      <label class="checkbox-inline i-checks"><input type="radio" value="1" name="publicado" <?php if ($arrNov["nov_publicado"] == 1) { ?>checked<?php } ?>> <i></i> Si </label>
                      <label class="checkbox-inline i-checks"><input name="publicado" type="radio" value="0" <?php if ($arrNov["nov_publicado"] == 0 || empty($arrNov["nov_publicado"])) { ?>checked<?php } ?>> <i></i> No </label>
                    </p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="destacado">Destacado</label>
                    <p>
                      <label class="checkbox-inline i-checks"><input type="radio" value="1" name="destacado" <?php if ($arrNov["nov_destacado"] == 1) { ?>checked<?php } ?>> <i></i> Si </label>
                      <label class="checkbox-inline i-checks"><input name="destacado" type="radio" value="0" <?php if ($arrNov["nov_destacado"] == 0 || empty($arrNov["nov_destacado"])) { ?>checked<?php } ?>> <i></i> No </label>
                    </p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
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
