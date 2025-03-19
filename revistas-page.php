<?php
include_once('admin/includes/conexion.inc.php');
include_once('admin/includes/funciones.inc.php');
//
include_once('admin/includes/class.inc.php');
//
$link = Conectarse();
$objContenido = new General();
//
//TEXTO CONTACTO
$queryTxt = "SELECT * FROM textos WHERE txt_id = 5";
$rsContTxt = $objContenido->getAllContenido($link, $queryTxt);
$arrTxt = $rsContTxt->fetch(PDO::FETCH_BOTH);
//REVISTAS Destacadas
$queryRev = "SELECT * FROM revistas WHERE rev_publicada = 1 AND rev_destacada = 1 ORDER BY rev_titulo ASC LIMIT 0,1";
$rsContRev = $objContenido->getAllContenido($link, $queryRev);
$arrRev = $rsContRev->fetch(PDO::FETCH_BOTH);
//Todas Las Revistas
$queryRev2 = "SELECT * FROM revistas WHERE rev_publicada = 1  AND rev_destacada = 0 ORDER BY rev_titulo DESC";
$rsContRev2 = $objContenido->getAllContenido($link, $queryRev2);

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta tags -->
    <meta content="REVISTAS | APOSGRAN | Asociación Argentina de Poscosecha de Granos" name="title" />
    <meta name="description" content="La revista de Aposgran es un material en el cual se ve reflejado el trabajo de la entidad en conjunto con el sector agroindustrial, haciendo hincapié en la trasmisión y producción de conocimientos y capacitación, fuente de consulta por el interesante material técnico que propone, como así también innovador soporte para toda la cadena agroindustrial.">
    <meta name="keywords" content="">
    <meta name="author" content="Aldo Iñiguez">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index follow">

    <!--Metatags FB-->
    <meta property="og:title" content="REVISTAS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo _CONST_DOMINIO_ ?>revistas">
    <meta property="og:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:description" content="La revista de Aposgran es un material en el cual se ve reflejado el trabajo de la entidad en conjunto con el sector agroindustrial, haciendo hincapié en la trasmisión y producción de conocimientos y capacitación, fuente de consulta por el interesante material técnico que propone, como así también innovador soporte para toda la cadena agroindustrial.">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="REVISTAS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta name="twitter:description" content="La revista de Aposgran es un material en el cual se ve reflejado el trabajo de la entidad en conjunto con el sector agroindustrial, haciendo hincapié en la trasmisión y producción de conocimientos y capacitación, fuente de consulta por el interesante material técnico que propone, como así también innovador soporte para toda la cadena agroindustrial.">
    <meta name="twitter:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">


    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _CONST_DOMINIO_ ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo _CONST_DOMINIO_ ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo _CONST_DOMINIO_ ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo _CONST_DOMINIO_ ?>site.webmanifest">
    <link rel="mask-icon" href="<?php echo _CONST_DOMINIO_ ?>safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <title>REVISTAS | APOSGRAN | Asociación Argentina de Poscosecha de Granos</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo _CONST_DOMINIO_ ?>assets/css/component.css" />
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Owl -->
    <link rel="stylesheet" href="<?php echo _CONST_DOMINIO_ ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo _CONST_DOMINIO_ ?>assets/css/owl.theme.default.min.css">

    
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
                        <a href="<?php echo _CONST_DOMINIO_ ?>"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
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
        <div class="slider-r" style="background-image: url('assets/slider/fondo-revistas-int.jpg');margin-top:0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>revistas</h1>
                    </div>

                    <div class="col-md-12">
                        <?php echo html_entity_decode($arrTxt["txt_col_1"]);  ?>
                    </div>
                </div>

            </div>


        </div>

        <!-- Fin Slider -->



    </header>
    <!-- Fin Header -->

    <main role="main">

        <!-- Contenido 1 -->
        <section class="seccion-revistas-g">
            <div class="container">
                <div class="row">

                    <div class="col-md-4">
                        <img src="<?php echo _CONST_DOMINIO_ ?>assets/revistas/<?php echo $arrRev["rev_imagen"]; ?>" alt="" class="img-fluid">

                    </div>

                    <div class="col-md-7 offset-md-1">
                        <div class="acceso-revista">
                            <h1><?php echo $arrRev["rev_titulo"]; ?></h1>
                            <?php if ($arrRev["rev_pdf"] != "nd" && $arrRev["rev_pdf"] != "") { ?>
                                <a href="<?php echo _CONST_DOMINIO_ ?>assets/revistas/<?php echo $arrRev["rev_pdf"]; ?>" class="btn btn-primary leermas" target="_blank">Leer</a>
                            <?php } ?>
                            <?php if ($arrRev["rev_link"] != "") { ?>
                                <a href="<?php echo $arrRev["rev_link"]; ?>" class="btn btn-primary leermas" target="_blank">Leer</a>
                            <?php } ?>
                        </div>


                        <?php echo html_entity_decode($arrRev["rev_texto"]); ?>

                    </div>

                </div>
            </div>
        </section>
        <!-- Fin Contenido 1 -->

        <!-- Contenido 2 -->
        <section class="seccion-revistas-g2">
            <div class="container">
                <div class="row border-top-blue">
                    <div class="col-md-12">
                        <h2>Ediciones anteriores</h2>
                    </div>
                    <?php $contador = 0; ?>
                    <?php while ($arrRev2 = $rsContRev2->fetch(PDO::FETCH_BOTH)) { ?>
                        <div class="col-sm-6 col-lg-4 mb-4 anim-g1" id="anim-g1<?php echo $contador; ?>">
                            <div class="card card2">
                                <div class="row g-0">
                                    <div class="col-4 col-sm-12 col-md-4">
                                        <img src="<?php echo _CONST_DOMINIO_ ?>assets/revistas/<?php echo $arrRev2["rev_imagen"]; ?>" class="img-fluid" alt="...">
                                    </div>
                                    <div class="col-8 col-sm-12 col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $arrRev2["rev_titulo"]; ?></h5>
                                            <!--<p class="text-end"> <a href="<?php echo _CONST_DOMINIO_ ?>assets/revistas/<?php echo $arrRev2["rev_pdf"]; ?>" class="btn btn-primary masinfo">Leer</a></p>-->

                                            <?php if ($arrRev2["rev_pdf"] != "nd" && $arrRev2["rev_pdf"] != "") { ?>
                                                <p class="text-end"><a href="<?php echo _CONST_DOMINIO_ ?>assets/revistas/<?php echo $arrRev2["rev_pdf"]; ?>" class="btn btn-primary masinfo" target="_blank">Leer</a></p>
                                            <?php } ?>
                                            <?php if ($arrRev2["rev_link"] != "") { ?>
                                                <p class="text-end"><a href="<?php echo $arrRev2["rev_link"]; ?>" class="btn btn-primary masinfo" target="_blank">Leer</a></p>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $contador++; ?>
                    <?php } ?>








                </div>
            </div>
        </section>
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


    <!-- Easing -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.easing.1.3.js"></script>

    <!-- Preloader -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/animations/jquery.html5Loader.line.js"></script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.html5Loader.js"></script>

    <!-- Scroll Home -->
    <script type="text/javascript">
        var seccion = "revistas";
    </script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/scroll-int.js"></script>


    <!-- Custom -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/scripts.js?v=1"></script>



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