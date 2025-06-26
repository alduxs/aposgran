<?php
include_once('admin/includes/conexion.inc.php');
include_once('admin/includes/funciones.inc.php');
//
include_once('admin/includes/class.inc.php');
//
$link = Conectarse();
$objContenido = new General();
//
$id = $_GET["id"];
$query = "SELECT * FROM contenido2  WHERE id = " . $id;
$rsCont = $objContenido->getAllContenido($link, $query);
$arrContenido = $rsCont->fetch(PDO::FETCH_BOTH);
// Magen
$queryImg = "SELECT *
FROM contximagenes
WHERE contximg_cont_id = " . $id . " AND contximg_tipo = 2";
$rsContImg = $objContenido->getAllContenido($link, $queryImg);
$arrImg = $rsContImg->fetch(PDO::FETCH_BOTH);
$intQtyRecords = $rsContImg->rowCount();
//
//
$queryImg2 = "SELECT *
FROM contximagenes
WHERE contximg_cont_id = " . $id . " AND contximg_tipo = 1";
$rsContImg2 = $objContenido->getAllContenido($link, $queryImg2);
$arrImg2 = $rsContImg2->fetch(PDO::FETCH_BOTH);
$intQtyRecords2 = $rsContImg2->rowCount();
//
$query2 = "SELECT * FROM contenido2  WHERE seccion = " . $arrContenido["seccion"] . " AND id != " . $id . " ORDER BY fecha ASC LIMIT 0,3";
$rsCont2 = $objContenido->getAllContenido($link, $query2);
$intQtyRecords2 = $rsCont2->rowCount();
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta tags -->
    <meta content="<?php echo $arrContenido["titulo"]; ?> | CURSOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos" name="title" />
    <meta name="description" content="<?php echo strip_tags(html_entity_decode($arrContenido["bajada"])); ?>">
    <meta name="keywords" content="">
    <meta name="author" content="Aldo Iñiguez">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index follow">

    <!--Metatags FB-->
    <meta property="og:title" content="<?php echo $arrContenido["titulo"]; ?> | CURSOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $_SERVER['SCRIPT_URI']; ?>">
    <?php if ($intQtyRecords2 > 0) { ?>
        <meta property="og:image" content="<?php echo _CONST_DOMINIO_ ?>assets/post/thumb/<?php echo $arrImg2["contximg_imagen"]; ?>">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="500">
        <meta property="og:image:height" content="417">
    <?php } else { ?>
        <meta property="og:image" content="<?php echo _CONST_DOMINIO_ ?>assets/cursos/small/default.jpg">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="500">
        <meta property="og:image:height" content="417">
    <?php }  ?>

    <meta property="og:description" content="<?php echo strip_tags(html_entity_decode($arrContenido["bajada"])); ?>">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $arrContenido["titulo"]; ?> | CURSOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta name="twitter:description" content="<?php echo strip_tags(html_entity_decode($arrContenido["bajada"])); ?>">
    <meta name="twitter:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">


    <link rel="icon" type="image/png" href="<?php echo _CONST_DOMINIO_ ?>favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?php echo _CONST_DOMINIO_ ?>favicon.svg" />
    <link rel="shortcut icon" href="<?php echo _CONST_DOMINIO_ ?>favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _CONST_DOMINIO_ ?>apple-touch-icon.png" />
    <link rel="manifest" href="<?php echo _CONST_DOMINIO_ ?>site.webmanifest" />


    <title><?php echo $arrContenido["titulo"]; ?> | CURSOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo _CONST_DOMINIO_ ?>assets/css/component.css" />
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Owl -->
    <link rel="stylesheet" href="<?php echo _CONST_DOMINIO_ ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo _CONST_DOMINIO_ ?>assets/css/owl.theme.default.min.css">

    <!-- Select2 -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/select2.css" rel="stylesheet" />

    <!-- Menú -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/menu.css?v=2" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/form.css?v=7" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/slider-home.css?v=4" rel="stylesheet">

    <!-- Hamburger -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/hamburgers.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/custom.css?v=15" rel="stylesheet">




</head>

<body id="top">

    <div id="html5Loader">
        <div class="loader">

            <div class="cargador">
                <div class="lds-dual-ring"></div>


            </div>
        </div>
    </div>

    <div class="boton-menu">
        <button class="hamburger hamburger--slider" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner" id="hb"></span>
            </span>
        </button>
    </div>

    <!-- Menu responsive -->
    <?php include("includes/menu-reponsive-h.php"); ?>
    <!-- Fin Menu responsive -->

    <!-- Inicio Header -->
    <header class="header-i">


        <!-- Menu -->

        <div class="menu-g menu-i">

            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-12 col-lg-2 col-xl-2 logo logo-int">
                        <a href="<?php echo _CONST_DOMINIO_ ?>"><img src="<?php echo _CONST_DOMINIO_ ?>assets/img/logo.png" alt="" class="img-fluid"></a>
                    </div>

                    <div class="col-md-12 col-lg-10 col-xl-7 menu-st">
                        <?php include("includes/menu.php"); ?>
                    </div>

                    <div class="col-md-12 col-lg-9 col-xl-3 redes-home">
                        <?php include("includes/redes-top.php"); ?>
                    </div>

                </div>
            </div>

        </div>

        <!-- Slider -->
        <?php if ($intQtyRecords > 0) { ?>
            <div class="slider-i" style="background-image: url('<?php echo _CONST_DOMINIO_ ?>assets/post/big/<?php echo $arrImg["contximg_imagen"]; ?>');"></div>
        <?php } else { ?>
            <div class="slider-i" style="background-image: url('<?php echo _CONST_DOMINIO_ ?>assets/cursos/big/default.jpg');"></div>
        <?php }  ?>
        <!-- Fin Slider -->



    </header>
    <!-- Fin Header -->

    <main role="main">

        <!-- Contenido 1 -->
        <section class="contenido-curso">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-lg-8 cont-curso">
                        <h1><?php echo $arrContenido["titulo"]; ?></h1>

                        <?php echo html_entity_decode($arrContenido["texto"]); ?>


                    </div>

                    <div class="col-12  offset-0 col-lg-4 offset-lg-0 col-xl-3 offset-xl-1">
                        <div class="row">

                            <?php if ($arrContenido["modalidad"] != "") { ?>
                                <div class="col-sm-6 col-md-6 col-lg-12 mb-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?php echo _CONST_DOMINIO_ ?>assets/img/i-modalidad.png" alt="">
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Modalidad</strong></p>
                                            <p><?php echo ($arrContenido["modalidad"]); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($arrContenido["costo"] != "") { ?>
                                <div class="col-sm-6 col-md-6 col-lg-12 mb-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?php echo _CONST_DOMINIO_ ?>assets/img/i-costo.png" alt="">
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Costo</strong></p>
                                            <p><?php echo ($arrContenido["costo"]); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($arrContenido["fechas_adic"] != "") { ?>

                                <div class="col-sm-6  col-md-6 col-lg-12 mb-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?php echo _CONST_DOMINIO_ ?>assets/img/i-fecha.png" alt="">
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Fechas</strong></p>
                                            <p><?php echo revertFecha($arrContenido["fecha"]); ?> - <?php echo $arrContenido["fechas_adic"]; ?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>

                                <div class="col-sm-6  col-md-6 col-lg-12 mb-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?php echo _CONST_DOMINIO_ ?>assets/img/i-fecha.png" alt="">
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Fecha</strong></p>
                                            <p><?php echo revertFecha($arrContenido["fecha"]); ?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($arrContenido["hora"] != "") { ?>
                                <div class="col-sm-6  col-md-6 col-lg-12 mb-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?php echo _CONST_DOMINIO_ ?>assets/img/i-clock.png" alt="">
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Hora</strong></p>
                                            <p><?php echo $arrContenido["hora"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($arrContenido["link"] != "") { ?>
                                <div class="col-sm-6 col-md-6 col-lg-12 mb-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?php echo _CONST_DOMINIO_ ?>assets/img/i-link.png" alt="">
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Link</strong></p>
                                            <p><a href="<?php echo ($arrContenido["link"]); ?>" target="_blank"><?php echo ($arrContenido["link"]); ?></a> </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($arrContenido["lugar"] != "") { ?>
                                <div class="col-sm-6 col-md-6 col-lg-12 mb-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?php echo _CONST_DOMINIO_ ?>assets/img/i-lugar.png" alt="">
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Lugar</strong></p>
                                            <p><?php echo ($arrContenido["lugar"]); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <?php if ($arrContenido["docente"] != 0) { ?>
                        <?php
                        $queryDoc = "SELECT * FROM docentes  WHERE doc_id = " . $arrContenido["docente"];
                        $rsDoc = $objContenido->getAllContenido($link, $queryDoc);
                        $arrDoc = $rsDoc->fetch(PDO::FETCH_BOTH);
                        ?>
                        <div class="col-md-12">
                            <div class="disertante">
                                <div class="row">
                                    <?php if ($arrDoc["doc_imagen"] != "nd") { ?>
                                        <div class="col-lg-2"> <img src="<?php echo _CONST_DOMINIO_ ?>assets/docentes/<?php echo $arrDoc["doc_imagen"]; ?>" class="card-img-top"> </div>
                                        <div class="col-lg-10">
                                            <h2>Disertante: <?php echo $arrDoc["doc_nombre"]; ?></h2>
                                            <?php echo html_entity_decode($arrDoc["doc_text"]); ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-lg-10">
                                            <h2>Disertante: <?php echo $arrDoc["doc_nombre"]; ?></h2>
                                            <?php echo html_entity_decode($arrDoc["doc_text"]); ?>
                                        </div>
                                    <?php } ?>
                                </div>


                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </section>
        <!-- Fin Contenido 1 -->

        <!-- Contenido 2 -->
        <?php if ($intQtyRecords2  > 0) { ?>
            <section class="contenido-mas-cursos">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <h3>Otros cursos</h3>
                        </div>

                        <?php while ($arrContenido2 = $rsCont2->fetch(PDO::FETCH_BOTH)) { ?>

                            <div class="col-sm-6 col-lg-4">
                                <div class="card">
                                    <?php
                                    $queryImg = "SELECT *
                                    FROM contximagenes
                                    WHERE contximg_cont_id = " . $arrContenido2["id"] . " AND contximg_tipo = 1";
                                    $rsContImg = $objContenido->getAllContenido($link, $queryImg);
                                    $arrImg2 = $rsContImg->fetch(PDO::FETCH_BOTH);
                                    $intQtyRecords3 = $rsContImg->rowCount();
                                    ?>
                                    <?php if ($intQtyRecords3 > 0) { ?>
                                        <img src="<?php echo _CONST_DOMINIO_ ?>assets/post/thumb/<?php echo $arrImg2["contximg_imagen"]; ?>" class="card-img-top">
                                    <?php } else { ?>
                                        <img src="<?php echo _CONST_DOMINIO_ ?>assets/cursos/small/default.jpg" class="card-img-top">
                                    <?php } ?>
                                    <div class="card-body">
                                        <h2 class="card-title"><?php echo $arrContenido2["titulo"]; ?></h2>
                                        <p class="text-end"> <a href="<?php echo _CONST_DOMINIO_ ?>cursos/<?php echo $arrContenido2["id"]; ?>/<?php echo buildLink($arrContenido2["titulo"]); ?>" class="btn btn-primary masinfo">+ info</a></p>

                                    </div>
                                </div>

                            </div>

                        <?php } ?>



                    </div>
                </div>
            </section>
        <?php } ?>
        <!-- Fin Contenido 2 -->



    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>
    <!-- Fin Entidades -->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/custom-file-input.js"></script>
    <!-- ==ScrollTo== -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.scrollTo.js"></script>
    <!-- Scrollmagic -->
    <script type="text/javascript" src="<?php echo _CONST_DOMINIO_ ?>assets/js/greensock/TweenMax.min.js"></script>
    <script type="text/javascript" src="<?php echo _CONST_DOMINIO_ ?>assets/js/ScrollMagic.js"></script>
    <script type="text/javascript" src="<?php echo _CONST_DOMINIO_ ?>assets/js/plugins/animation.gsap.js"></script>
    <script type="text/javascript" src="<?php echo _CONST_DOMINIO_ ?>assets/js/plugins/debug.addIndicators.js"></script>

    <!-- Preloader -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/animations/jquery.html5Loader.line.js"></script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.html5Loader.js"></script>


    <!-- Easing -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.easing.1.3.js"></script>

    <!-- Custom -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/scripts.js?v=1"></script>

    <!-- ==Google maps== -->
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCquBaspZ7KL1dj1s2B8cYsrUNUJXHAuYk&callback=initMap">
    </script>


    <script>
        var pesActiva = 0;
        var itActive = 0;
        $(document).ready(function() {

            /* z-index novedad inical */
            $("#img-bl-hom-1").css("z-index", "200");



        });
    </script>


</body>

</html>