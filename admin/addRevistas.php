<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
//
include_once('includes/class.inc.php');
//
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
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
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
                    <h2>Agregar revista</h2>
                    <ol class="breadcrumb">
                        <li><a href="home.php?seccion=inicio">Home</a></li>
                        <li><a href="#">Revistas</a></li>
                        <li class="active"><strong>Agregar revista</strong></li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form method="post" action="svRevistas.php" enctype="multipart/form-data" name="form1">
                                    <input type="hidden" name="strOperacion" value="I" />


                                    <div class="form-group col-xs-12">
                                        <!-- Nombre y Apellido -->
                                        <label for="titulo">Título</label>
                                        <input type="text" name="titulo" id="titulo" class="form-control">
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <!-- Texto -->
                                    <div class="form-group col-xs-12">
                                        <label for="texto">Texto</label>
                                        <textarea name="texto" rows="8" id="texto"></textarea>
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <div class="form-group col-xs-12">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control form-file">
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <div class="form-group col-xs-12">
                                        <label for="archivo">Archivo PDF</label>
                                        <input type="file" name="archivo" id="archivo" class="form-control form-file">
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <div class="form-group col-xs-12">
                                        <!-- Nombre y Apellido -->
                                        <label for="link">Link</label>
                                        <input type="text" name="link" id="link" class="form-control">
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

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- Tinymce -->
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
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

        });
    </script>

</html>