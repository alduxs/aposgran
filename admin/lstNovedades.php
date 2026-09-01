<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
include_once('includes/class.inc.php');

$link = Conectarse();
$objContenido = new General();
$query = "SELECT * FROM novedades ORDER BY nov_destacado DESC, nov_publicado DESC, nov_id DESC";
$rsCont = $objContenido->getAllContenido($link, $query);
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
          <h2>Listar Novedades</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Novedades</a></li>
            <li class="active"><strong>Listar Novedades</strong></li>
          </ol>
        </div>
      </div>

      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content">
                <form name="frm" method="post" action="svNovedades.php">
                  <input type="hidden" name="intIdRegistro" value="" />
                  <input type="hidden" name="strDb" value="" />
                  <input type="hidden" name="strOperacion" value="D" />
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Título</th>
                        <th>Publicado</th>
                        <th>Destacado</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
                        <tr>
                          <td><?php echo $arrContenido["nov_titulo"]; ?></td>
                          <td>
                            <?php if ($arrContenido["nov_publicado"] == 0) { ?>
                              <span class="label label-default">No</span>
                            <?php } else { ?>
                              <span class="label label-info">Si</span>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if ($arrContenido["nov_destacado"] == 0) { ?>
                              <span class="label label-default">No</span>
                            <?php } else { ?>
                              <span class="label label-warning">Si</span>
                            <?php } ?>
                          </td>
                          <td class="tooltip-demo">
                            <a href="updNovedades.php?seccion=novedades&id=<?php echo $arrContenido["nov_id"]; ?>" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:;" onclick="delRegistro('<?php echo $arrContenido["nov_id"]; ?>','','novedades');" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="fa fa-trash-o"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer">
        <div>&copy; 2014 - <?php echo date("Y") ?></div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="js/inspinia.js"></script>
  <script type="text/javascript">
    function delRegistro(pIdRegistro, pDsArchivo, strDb) {
      if (!window.confirm("Esta seguro que desea borrar este registro?")) {
        return;
      } else {
        document.frm.intIdRegistro.value = pIdRegistro;
        document.frm.strDb.value = strDb;
        document.frm.submit();
      }
    }
  </script>
</body>
</html>
