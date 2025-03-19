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
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
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
                <h2>Agregar Galería</h2>
                <ol class="breadcrumb">
                    <li><a href="home.php?seccion=inicio">Home</a></li>
                    <li><a href="#">Galerías</a></li>
                    <li class="active"><strong>Agregar galería</strong></li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <form action="svGalerias.php" method="post" enctype="multipart/form-data" name="form1">
                                <input type="hidden" name="strOperacion" value="I" />
                                <input type="hidden" name="idusuario" value="0">
                                <!-- Título -->
                                <div class="form-group col-xs-12">
                                	<label for="nombre">Nombre</label>
                                	<input type="text" class="form-control" name="nombre" id="nombre">
                                </div>
                                <div class="hr-line-dashed col-xs-12"></div>
                                <!-- Publicado -->
                                <div class="form-group col-xs-12">
                                	<label for="publicada">Publicada</label>
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
            <div>&copy; 2014 - <?php echo date ("Y") ?></div>
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
<!-- Data picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<!-- Tinymce -->
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<!-- Select2 -->
<script src="js/plugins/select2/select2.full.min.js"></script>

<script>
$(document).ready(function () {
	$('.i-checks').iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green',
	});
	
	$('#data_1 .input-group.date').datepicker({
			format: 'dd/mm/yyyy',
			todayBtn: "linked",
			keyboardNavigation: false,
			forceParse: false,
			calendarWeeks: true,
			autoclose: true
	});
	$(".select2_demo_3").select2({
		placeholder: "Seleccionar una galería o una imagen",
		allowClear: true
	});
	$(".select2_demo_4").select2({
		placeholder: "Seleccionar un archivo",
		allowClear: true
	});
});
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ],
	relative_urls: false
});
</script>
</body>
</html>
