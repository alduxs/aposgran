<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
//
include_once('includes/class.inc.php');
//
$link = Conectarse();
//
$intIdCont[0] = 0;
$intIdCont[1] = sanInt($_GET["id_galeria"]);
//
$objContenido = new General();
$query = "SELECT * FROM galeriasgximag WHERE  gxi_galeriag_id = '" . $intIdCont[1] . "' ORDER BY gxi_orden ASC, gxi_id ASC";
$rsImag = $objContenido->getAllContenido($link, $query);

$query2 = "SELECT * FROM geleriasg WHERE galeria_id = ". $intIdCont[1];
$rsCont2 = $objContenido->getAllContenido($link,$query2);
$arrCont2 = $rsCont2->fetch(PDO::FETCH_BOTH);
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>

    
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/bootstrap.css?v=1" rel="stylesheet">
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
                    <h2>Agregar Imágenes en Galería</h2>
                    <ol class="breadcrumb">
                        <li><a href="home.php?seccion=inicio">Home</a></li>
                        <li><a href="#">Galerías</a></li>
                        <li class="active"><strong>Agregar Imágenes en Galería</strong></li>
                    </ol>
                </div>
            </div>

       

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">

                    <!-- Galeria de imagenes -->
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Imagenes para:</h5>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3><?php echo $arrCont2["galeria_nombre"] ?></h3>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p class="text-center"><input name="upload" type="submit" class="btn btn-primary" id="upload" value="Subir Imagen"></p>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="spiner-example" id="status">
                                            <div class="sk-spinner sk-spinner-wave">
                                                <div class="sk-rect1"></div>
                                                <div class="sk-rect2"></div>
                                                <div class="sk-rect3"></div>
                                                <div class="sk-rect4"></div>
                                                <div class="sk-rect5"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Carga -->
                                <div class="tooltip-demo">
                                    <div class="row" id="files">
                                        <?php while ($arrImagen = $rsImag->fetch(PDO::FETCH_BOTH)) { ?>
                                            <div class="col-xs-4 col-md-2 bloque" id="<?php echo $arrImagen["gxi_id"] ?>">
                                                <div class="bimagen">
                                                    <img src="../assets/galerias/small/<?php echo $arrImagen["gxi_imagen"] ?>" class="img-responsive center-block">
                                                    <input type="text" name="<?php echo $arrImagen["gxi_id"] ?>-pie" id="<?php echo $arrImagen["gxi_id"] ?>-pie" value="<?php echo $arrImagen["gxi_pie"] ?>" class="form-control">
                                                    <div class="acciones">
                                                        <button type="button" onclick="return borrarImagen('<?php echo $arrImagen["gxi_id"] ?>')" class="btn btn-primary btn-xs btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar Imagen"><i class="fa fa-trash-o"></i></button>
                                                        <button type="button" onclick="return pieImagen('<?php echo $arrImagen["gxi_id"] ?>')" class="btn btn-primary btn-xs btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Editar pie de imagen"><i class="fa fa-info"></i></button>
                                                    </div>
                                                </div>
                                                <div class="puntuacion-imagen" id="p<?php echo $arrImagen["gxi_id"]; ?>">
                                                    <span class="badge badge-primary puntaje"><?php echo $arrImagen["gxi_orden"]; ?></span>
                                                </div>

                                            </div>
                                        <?php } ?>
                                    </div>
                                    <input name="orden" value="" type="hidden" id="orden">
                                   
                                </div>
                                <!-- Fin carga -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin galeria de imagenes -->
                </div>
            </div>

            <div class="footer">
                <div>&copy; 2014 - <?php echo date("Y") ?></div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.3.1.js"></script>
    
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- Tinymce -->
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <!-- AJAX Upload -->
    <script type="text/javascript" src="js/ajaxupload.3.5.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


            //--------------------------------------------------------------------
            $(".acciones a").click(function(event) {
                event.preventDefault();
            });
        }); 
        // Carga mediante AJAX de Imagenes en la galería
        jQuery(function() {
            var btnUpload = $('#upload');
            var status = $('#status');
            new AjaxUpload(btnUpload, {
                action: 'imagen-subir.php?id_galeria=<?php echo $intIdCont[1]; ?>',
                name: 'uploadfile',
                onSubmit: function(file, ext) {
                    if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                        // extension is not allowed
                        status.text('Only JPG, PNG or GIF files are allowed');
                        return false;
                    }
                    status.fadeIn('slow');
                },
                onComplete: function(file, response) {
                    //On completion clear the status
                    status.fadeOut('slow');
                    var divide = response.split("&");
                    var image = divide[0];
                    var id = divide[1];
                    $('<div class="col-xs-4 col-md-2 bloque" id="' + id + '"></div>').appendTo('#files').html('<div class="bimagen"><img src="../assets/galerias/small/' + image + '" class="img-responsive center-block" /><input type="text" name="' + id + '-pie" id="' + id + '-pie" value="" placeholder="Pie de Foto" class="form-control"><div class="acciones"><button type="button" onclick="return borrarImagen(' + id + ')" class="btn btn-primary btn-xs btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar Imagen"><i class="fa fa-trash-o"></i></button> <button type="button" onclick="return pieImagen(' + id + ')" class="btn btn-primary btn-xs btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Editar pie de imagen"><i class="fa fa-info"></i></button></div></div>');
                }
            });
        }); 
        //Eliminar una imagen
        function borrarImagen(id) {
            if (confirm('Desea borrar la imagen?')) {
                $.getScript('imagen-borrar.php?id_imagen=' + id);
                $('#' + id + '').remove();
                return false;
            }
        }; 
        // Modificar el pie de imagen
        function pieImagen(id) {
            var pie = $("#" + id + "-pie").val();
            $.get('./imagen-pie.php?id_imagen=' + id + '&pie=' + pie);
        };

        $(function() {


            $("#files").sortable({
                update: function() {
                    var result = $("#files").sortable('toArray');
                    $("#orden").attr("value", result);
                    var resulta = $("#orden").attr("value");
                    $.post("svOrdenImagenes.php", {
                            orden: resulta
                        })
                        .done(function(data) {
                            var n = $("#files .bloque").length;
                            var divide = resulta.split(",");
                            console.log(n);
                            var number;
                            for (i = 0; i < n; i++) {
                                number = i + 1;

                                $("#p" + divide[i]).html('<span class="badge badge-primary puntaje">' + number + '</span>');
                            }

                        });


                }
            });
            $("#sortable").disableSelection();

        });
    </script>
</body>

</html>