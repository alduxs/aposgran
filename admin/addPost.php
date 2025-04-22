<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
//
include_once('includes/class.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();

?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
  <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
  <link rel="stylesheet" href="css/dropzone.css" />
  <link rel="stylesheet" href="css/cropper.css" />
  <link href="css/image.css" rel="stylesheet" type="text/css">

  <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/amsify.suggestags.css">
  <link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<head>

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
          <h2>Agregar Curso</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Cursos</a></li>
            <li class="active"><strong>Agregar Curso</strong></li>
          </ol>
        </div>
      </div>



      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content">
                <form method="post" action="svPost.php" enctype="multipart/form-data" name="form1">
                  <input type="hidden" name="strOperacion" value="I" />
                  <input type="hidden" name="idusuario" value="<?php echo $_SESSION["id"]; ?>">

                  <!-- Seccion -->
                  <div class="form-group col-xs-12">
                    <label for="seccion">Sección</label>
                    <select class="form-control" name="seccion">
                      <option value="0">Elija la sección</option>
                      <option value="1">In company</option>
                      <option value="2">Agenda Anual</option>
                    </select>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Alianza -->
                  <!--<div class="form-group col-xs-12">
                    <label for="alianza">En alianza con</label>
                    <select class="form-control" name="alianza">
                      <option value="0">Elegir</option>
                      <option value="1">CACER BCER CAGER </option>
                      <option value="2">ERGR</option>
                    </select>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>-->

                  <!-- Notas relacionadas -->
                  <div class="form-group col-xs-12">
                    <label for="alianza">En alianza con</label>
                    <select name="alianza[]" class="select2_demo_4 form-control" id="alianza" multiple="">

                      <option></option>
                      <?php
                      $queryPost = "SELECT * FROM alianzas";
                      $rsPost = $objContenido->getAllContenido($link, $queryPost);
                      ?>
                      <?php while ($arrPost = $rsPost->fetch(PDO::FETCH_BOTH)) { ?>
                        <option value="<?php echo $arrPost["al_id"] ?>"><?php echo $arrPost["al_nombre"] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Título -->
                  <div class="form-group col-xs-12">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Bajada -->
                  <div class="form-group col-xs-12">
                    <label for="bajada">Bajada</label>
                    <textarea name="bajada" rows="6" id="bajada"></textarea>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>


                  <!-- Texto -->
                  <div class="form-group col-xs-12">
                    <label for="texto">Texto</label>
                    <textarea name="texto" rows="12" id="texto"></textarea>
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>


                  <!-- Imagen -->
                  <div class="row">
                    <div class="col-md-4">
                      <h4>Imagen Muestra (Relación 1:1 - Tamaño mínimo: 400 px)</h4>
                      <div class="image_area">
                        <label for="upload_image">

                          <img src="img/imagen.png" id="uploaded_image" class="img-responsive" />
                          <div class="overlay">
                            <div class="text">Cambiar Imagen</div>
                          </div>
                          <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                          <input type="hidden" name="imageNewCuadrada" id="imageNewCuadrada" value="nd">
                          <input type="hidden" name="imageNewCuadradaB64" id="imageNewCuadradaB64" value="">
                        </label>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <h4>Imagen Principal (Relación 16:9 - Tamaño mínimo: 1200 px de ancho)</h4>
                      <div class="image_area2">
                        <label for="upload_image2">
                          <img src="img/imagen2.png" id="uploaded_image2" class="img-responsive" />
                          <div class="overlay">
                            <div class="text">Cambiar Imagen</div>
                          </div>
                          <input type="file" name="image2" class="image" id="upload_image2" style="display:none" />
                          <input type="hidden" name="imageNewRect" id="imageNewRect" value="nd">
                          <input type="hidden" name="imageNewRectB64" id="imageNewRectB64" value="">
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Modalidad -->
                  <div class="form-group col-xs-12">
                    <label for="modalidad">Modalidad</label>
                    <input type="text" name="modalidad" id="modalidad" class="form-control">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Costo -->
                  <div class="form-group col-xs-12">
                    <label for="costo">Costo</label>
                    <input type="text" name="costo" id="costo" class="form-control">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Fecha -->
                  <div class="form-group col-xs-12" id="data_1">
                    <label for="fecha">Fecha Inicial</label>
                    <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="fecha" type="text" class="form-control" id="fecha" value="">
                    </div>
                  </div>

                  <div class="form-group col-xs-12" id="data_1">
                    <label for="hora">Hora</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                      <input type="text" class="form-control" value="08:00" name="hora" id="hora">
                      <span class="input-group-addon">
                        <span class="fa fa-clock-o"></span>
                      </span>
                    </div>
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Fechas Adicionales -->
                  <div class="form-group col-xs-12" id="data_1">
                    <label for="fecha_adic">Fechas Adicionales</label>
                    <input type="text" name="fecha_adic" id="fecha_adic" class="form-control">
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Link -->
                  <div class="form-group col-xs-12">
                    <label for="link">Link</label>
                    <input type="text" name="link" id="link" class="form-control">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Lugar -->
                  <div class="form-group col-xs-12">
                    <label for="lugar">Lugar</label>
                    <input type="text" name="lugar" id="lugar" class="form-control">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Destacada -->
                  <div class="form-group col-xs-12">
                    <label for="destacada">Destacado</label>
                    <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="destacada"> <i></i> Si </label><label class="checkbox-inline i-checks"> <input name="destacada" type="radio" value="0" checked> <i></i> No </label></p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Publicado -->
                  <div class="form-group col-xs-12">
                    <label for="publicada">Publicado</label>
                    <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="publicada"> <i></i> Si </label><label class="checkbox-inline i-checks"> <input name="publicada" type="radio" value="0" checked> <i></i> No </label></p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>



                  <!-- Notas relacionadas -->
                  <div class="form-group col-xs-12">
                    <label for="integrantes">Docente</label>
                    <select name="docente" class="select2_demo_3 form-control" id="docente"="">

                      <option></option>
                      <?php
                      $queryPost = "SELECT * FROM docentes";
                      $rsPost = $objContenido->getAllContenido($link, $queryPost);
                      ?>
                      <?php while ($arrPost = $rsPost->fetch(PDO::FETCH_BOTH)) { ?>
                        <option value="<?php echo $arrPost["doc_id"] ?>"><?php echo $arrPost["doc_nombre"] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>



                  <div class="form-group text-center">
                    <input name="agregar" type="submit" class="btn btn-primary" id="agregar" value="Enviar">
                  </div>

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


  <!-- Mainly scripts -->
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="js/inspinia.js"></script>
  <script src="js/plugins/pace/pace.min.js"></script>

  <!-- Tinymce -->
  <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

  <!-- Data picker -->
  <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

  <script src="js/dropzone.js"></script>
  <script src="js/cropper.js"></script>

  <!-- Clock picker -->
  <script src="js/plugins/clockpicker/clockpicker.js"></script>

  <!-- iCheck -->
  <script src="js/plugins/iCheck/icheck.min.js"></script>

  <!-- Select2 -->
  <script src="js/plugins/select2/select2.full.min.js"></script>

  <!--tag sugest -->
  <script src="js/jquery.amsify.suggestags.js"></script>

  <script src="js/custom.js?v=1"></script>
  <script>
    $(document).ready(function() {
      $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
      });


      $('#data_1 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
      });

      $('.clockpicker').clockpicker();

    });

    tinymce.init({
      selector: "textarea",
      theme: "modern",
      plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor'
      ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
      image_advtab: true,
      relative_urls: false,
      content_css: '/labsonew/admin/css/css.css',
      style_formats: [

        {
          title: 'Imagen Derecha',
          selector: 'p',
          classes: 'imgpost'
        }
      ],

    });

    $(".select2_demo_4").select2({
      placeholder: "Seleccionar integrantes de alianzas",
      allowClear: true,
      width: '100%'
    });
  </script>


  <!-- *********************************** MODALS *********************************-->
  <!-- Modal imagen chica -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">M 1 Crop Image Before Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <div class="row">
              <div class="col-md-8">
                <img src="" id="sample_image" />
              </div>
              <div class="col-md-4">
                <div class="preview"></div>
                <div class="input-group" style="width: 80%;margin-bottom:10px;">
                  <div class="input-group-addon">Ancho</div>
                  <input type="text" class="form-control" id="ancho" placeholder="0">
                  <div class="input-group-addon">px</div>
                </div>
                <div class="input-group" style="width: 80%;">
                  <div class="input-group-addon">Alto</div>
                  <input type="text" class="form-control" id="alto" placeholder="0">
                  <div class="input-group-addon">px</div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="crop" class="btn btn-primary">Crop</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal imagen grande -->
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">M 2 Crop Image Before Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <div class="row">
              <div class="col-md-8">
                <img src="" id="sample_image2" />
              </div>
              <div class="col-md-4">
                <div class="preview2"></div>
                <div class="input-group" style="width: 80%;margin-bottom:10px;">
                  <div class="input-group-addon">Ancho</div>
                  <input type="text" class="form-control" id="ancho2" placeholder="0">
                  <div class="input-group-addon">px</div>
                </div>
                <div class="input-group" style="width: 80%;">
                  <div class="input-group-addon">Alto</div>
                  <input type="text" class="form-control" id="alto2" placeholder="0">
                  <div class="input-group-addon">px</div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="crop2" class="btn btn-primary">Crop</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- *********************************** FIN MODALS *********************************-->
</body>

</html>