<?php
include_once('admin/includes/conexion.inc.php');
include_once('admin/includes/funciones.inc.php');
//
include_once('admin/includes/class.inc.php');
//
$link = Conectarse();
$objContenido = new General();
//
$tipo = $_GET["tipo"];
$query = "SELECT * FROM contenido2  WHERE seccion = " . $tipo . " ORDER BY fecha ASC";
$rsCont = $objContenido->getAllContenido($link, $query);
//TEXTO AÑO
$queryTxtAnio3 = "SELECT * FROM textos WHERE txt_id = 9";
$rsContTxtAnio3 = $objContenido->getAllContenido($link, $queryTxtAnio3);
$arrTxtAnio3 = $rsContTxtAnio3->fetch(PDO::FETCH_BOTH);
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta tags -->
    <meta content="<?php if ($tipo == 1) { ?> IN COMPANY <?php } else if ($tipo == 2) { ?> AGENDA <?php echo $arrTxtAnio3["txt_col_1"]; ?><?php } ?> | CURSOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos" name="title" />
    <meta name="description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
    <meta name="keywords" content="">
    <meta name="author" content="Aldo Iñiguez">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index follow">

    <!--Metatags FB-->
    <meta property="og:title" content="<?php if ($tipo == 1) { ?> IN COMPANY <?php } else if ($tipo == 2) { ?> AGENDA <?php echo $arrTxtAnio3["txt_col_1"]; ?><?php } ?> | CURSOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $_SERVER['SCRIPT_URI']; ?>">
    <meta property="og:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php if ($tipo == 1) { ?> IN COMPANY <?php } else if ($tipo == 2) { ?> AGENDA <?php echo $arrTxtAnio3["txt_col_1"]; ?><?php } ?> | CURSOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta name="twitter:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
    <meta name="twitter:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">


    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _CONST_DOMINIO_ ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo _CONST_DOMINIO_ ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo _CONST_DOMINIO_ ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo _CONST_DOMINIO_ ?>site.webmanifest">
    <link rel="mask-icon" href="<?php echo _CONST_DOMINIO_ ?>safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <title><?php if ($tipo == 1) { ?> IN COMPANY <?php } else if ($tipo == 2) { ?> AGENDA <?php echo $arrTxtAnio3["txt_col_1"]; ?><?php } ?> | CURSOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo _CONST_DOMINIO_ ?>assets/css/component.css" />
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



    <!-- Menú -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/menu.css?v=2" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/form.css?v=7" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/slider-home.css?v=4" rel="stylesheet">

    <!-- Preloader -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/animations/jquery.html5Loader.line.js"></script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.html5Loader.js"></script>


    <!-- Hamburger -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/hamburgers.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/custom.css?v=14" rel="stylesheet">




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
    <header class="header-c">


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

            <div class="container">
                <div class="row">


                    <div class="col-12">
                        <a href="<?php echo _CONST_DOMINIO_ ?>seminario-aposgran-cosecha-fina"><img src="assets/img/banner.jpg" alt="" class="img-fluid"></a>
                    </div>

                </div>
            </div>

        </div>



    </header>
    <!-- Fin Header -->

    

    <main role="main" class="cursos-g-int">
        

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>cursos <?php if ($tipo == 1) { ?> in company <?php } else if ($tipo == 2) { ?> agenda <?php echo $arrTxtAnio3["txt_col_1"]; ?><?php } ?></h1>
                </div>

                <!-- Cursos -->
                <?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <?php
                            $queryImg = "SELECT *
                            FROM contximagenes
                            WHERE contximg_cont_id = " . $arrContenido["id"] . " AND contximg_tipo = 1";
                            $rsContImg = $objContenido->getAllContenido($link, $queryImg);
                            $arrImg = $rsContImg->fetch(PDO::FETCH_BOTH);
                            $intQtyRecords = $rsContImg->rowCount();
                            ?>
                            <?php if ($intQtyRecords > 0) { ?>
                                <img src="<?php echo _CONST_DOMINIO_ ?>assets/post/thumb/<?php echo $arrImg["contximg_imagen"]; ?>" class="card-img-top">
                            <?php } else { ?>
                                <img src="<?php echo _CONST_DOMINIO_ ?>assets/cursos/small/default.jpg" class="card-img-top">
                            <?php } ?>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $arrContenido["titulo"]; ?></h2>
                                <p class="card-text"><?php echo html_entity_decode($arrContenido["bajada"]); ?></p>
                                <p class="text-end"> <a href="<?php echo _CONST_DOMINIO_ ?>cursos/<?php echo $arrContenido["id"]; ?>/<?php echo buildLink($arrContenido["titulo"]); ?>" class="btn btn-primary masinfo">+ info</a></p>

                            </div>
                        </div>

                    </div>
                <?php } ?>




            </div>
        </div>

s

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

    <!-- Easing -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.easing.1.3.js"></script>

    <!-- Preloader -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/animations/jquery.html5Loader.line.js"></script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.html5Loader.js"></script>


    <!-- Custom -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/scripts.js?v=1"></script>

    <!-- ==Google maps== -->
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCquBaspZ7KL1dj1s2B8cYsrUNUJXHAuYk&callback=initMap">
    </script>


    <script>
        var pesActiva = 0;
        var itActive = 0;
        $(document).ready(function() {




            $('.bts').click(function() {

                if (itActive == 0) {
                    var id = $(this).attr("id")

                    var idSpl = id.split("-")

                    for (let index = 0; index < 3; index++) {
                        console.log(index);
                        $("#fr-" + index).css("top", "-100px").css("opacity", "0");
                    }

                    owl.trigger('to.owl.carousel', [idSpl[1]]);
                    itActive = 1;
                }


            })


        });
    </script>


</body>

</html>