<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
//
include_once('includes/class.inc.php');
//
$link = Conectarse();
$objContenido = new General();

//
$query2 = "SELECT * FROM contenido2 WHERE publicada = 1  AND home = 1 ORDER BY orden ASC, id DESC";
$rsCont2 = $objContenido->getAllContenido($link,$query2);
$intQtyRecords = $rsCont2->rowCount();
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _CONST_DOMINIO_ ?>apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo _CONST_DOMINIO_ ?>favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo _CONST_DOMINIO_ ?>favicon-16x16.png">
  <link rel="manifest" href="<?php echo _CONST_DOMINIO_ ?>site.webmanifest">
  <link rel="mask-icon" href="<?php echo _CONST_DOMINIO_ ?>safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/estilos.css" rel="stylesheet">
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
          <h2>Orden de Post en el Home</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Orden de Post</a></li>
            <li class="active"><strong>Orden de Post en el home</strong></li>
          </ol>
        </div>
      </div>



      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content list-orden">
                <form name="frm" method="post" action="#">
                  <input type="hidden" name="intIdRegistro" value="" />
                  <input type="hidden" name="strDb" value="" />
                  <input type="hidden" name="intPage" value="" />
                  <input type="hidden" name="strOperacion" value="D" />
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Título</th>
                        <th>Posicion</th>
                      </tr>
                    </thead>
                    <tbody id="sortable">
                      <?php $intCounter = 0; ?>
                      <?php if ($intQtyRecords > 0) { ?>
                        <?php while ($arrContenido = $rsCont2->fetch(PDO::FETCH_BOTH)) { ?>
                          <tr id="<?php echo $arrContenido["id"]; ?>">
                            <td><?php echo $arrContenido["titulo"]; ?></td>

                            <td id="p<?php echo $arrContenido["id"]; ?>"><span class="badge badge-primary" ><?php echo $arrContenido["orden"]; ?></span></td>
                          </tr>
                          <?php $intCounter++; ?>
                        <?php } ?>
                      <?php } else {?>
                        <tr>
                          <td colspan="3">No hay registros para mostrar.</td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <input name="orden" value="" type="hidden" id="orden">
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Paginación -->
      </div>
      <div class="footer">
        <div>&copy; 2014 - <?php echo date ("Y") ?></div>
      </div>
    </div>
  </div>

  <!-- Mainly scripts -->
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

  <!-- Custom and plugin javascript -->
  <script src="js/inspinia.js"></script>
  <script src="js/plugins/pace/pace.min.js"></script>
  <script type="text/javascript">
  function delRegistro(pIdRegistro,strDb,intPage){
    if (!window.confirm("Esta seguro que desea borrar este registro?")){
      return;
    }
    else{
      document.frm.intIdRegistro.value = pIdRegistro;
      document.frm.strDb.value = strDb;
      document.frm.intPage.value = intPage;
      document.frm.submit();
    }
  }
  $( function() {


    $("#sortable").sortable({
      update: function(){
        var result = $("#sortable").sortable('toArray');
        $("#orden").attr("value",result);
        var resulta = $("#orden").attr("value");
        $.post( "svOrdenPost.php", { orden: resulta })
        .done(function( data ) {
          var n = $( "#sortable tr" ).length;
          var divide = resulta.split(",");
          var number;
          for (i = 0; i < n; i++) {
            number = i+1;
            $("#p"+divide[i]).html('<span class="badge badge-primary">'+number+'</span>');
          }

        });

      }
    });
    $("#sortable").disableSelection();

  });
</script>
</body>
</html>
