<?php
include_once('admin/includes/conexion.inc.php');
include_once('admin/includes/funciones.inc.php');
//
include_once('admin/includes/class.inc.php');
//
$link = Conectarse();
$objContenido = new General();
//
$query = "SELECT * FROM socios ORDER BY soc_nombre ASC, soc_id ASC";
$rsCont = $objContenido->getAllContenido($link, $query);
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta tags -->
    <meta content="NUESTROS SOCIOS | SOCIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos" name="title" />
    <meta name="description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
    <meta name="keywords" content="">
    <meta name="author" content="Aldo Iñiguez">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index follow">

    <!--Metatags FB-->
    <meta property="og:title" content="NUESTROS SOCIOS | SOCIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo _CONST_DOMINIO_ ?>">
    <meta property="og:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="NUESTROS SOCIOS | SOCIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta name="twitter:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
    <meta name="twitter:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">


    <link rel="icon" type="image/png" href="<?php echo _CONST_DOMINIO_ ?>favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?php echo _CONST_DOMINIO_ ?>favicon.svg" />
    <link rel="shortcut icon" href="<?php echo _CONST_DOMINIO_ ?>favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _CONST_DOMINIO_ ?>apple-touch-icon.png" />
    <link rel="manifest" href="<?php echo _CONST_DOMINIO_ ?>site.webmanifest" />


    <title>NUESTROS SOCIOS | SOCIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos</title>

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
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/custom.css?v=19" rel="stylesheet">




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
        <div class="slider-i" style="background-image: url('<?php echo _CONST_DOMINIO_ ?>assets/slider/beneficios.jpg');margin-top:0px;">

            <h2>Nuestros Socios</h2>

        </div>

        <!-- Fin Slider -->

    </header>
    <!-- Fin Header -->

    <main role="main">

        <!-- Contenido 1 -->
        <section class="contenido-curso">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">

                        <div class="row">
                            <?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
                                <div class="col-6 col-md-4 col-lg-3 col-xl-2 socioimg">
                                    <img src="<?php echo _CONST_DOMINIO_ ?>assets/socios/<?php echo $arrContenido["soc_imagen"]; ?>" alt="" class="img-fluid">
                                </div>
                            <?php } ?>

                        </div>


                    </div>


                </div>
            </div>
        </section>
        <!-- Fin Contenido 1 -->


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




    <script>
        var pesActiva = 0;
        var itActive = 0;
        $(document).ready(function() {




        });

        var map;
    </script>


</body>

</html>