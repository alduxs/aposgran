<?php
include_once('admin/includes/conexion.inc.php');
include_once('admin/includes/funciones.inc.php');
//
include_once('admin/includes/class.inc.php');
//
$link = Conectarse();
$objContenido = new General();
//
//TEXTO QUIENES SOMOS
$queryTxt = "SELECT * FROM textos WHERE txt_id = 6";
$rsContTxt = $objContenido->getAllContenido($link, $queryTxt);
$arrTxt = $rsContTxt->fetch(PDO::FETCH_BOTH);
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta tags -->
    <meta content="COSECHA FINA 2023 | SEMINARIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos" name="title" />
    <meta name="description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
    <meta name="keywords" content="">
    <meta name="author" content="Aldo Iñiguez">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index follow">

    <!--Metatags FB-->
    <meta property="og:title" content="COSECHA FINA 2023 | SEMINARIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo _CONST_DOMINIO_ ?>seminarios/cosecha-fina">
    <meta property="og:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="COSECHA FINA 2023 | SEMINARIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta name="twitter:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
    <meta name="twitter:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">


    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _CONST_DOMINIO_ ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo _CONST_DOMINIO_ ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo _CONST_DOMINIO_ ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo _CONST_DOMINIO_ ?>site.webmanifest">
    <link rel="mask-icon" href="<?php echo _CONST_DOMINIO_ ?>safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <title>COSECHA FINA 2023 | SEMINARIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos</title>

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
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/custom.css?v=16" rel="stylesheet">




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
        <div class="slider-i slide-seminariocf sliercf23">

        </div>

        <!-- Fin Slider -->

    </header>
    <!-- Fin Header -->

    <main role="main">

        <section class="menu-seminario">

            <div class="container">
                <div class="row">
                    <div class="col-md-12"> <a href="#programa">Programa</a> <a href="#disertantes">Disertantes</a> <a href="#inscripcion">Inscripción</a></div>
                </div>
            </div>



        </section>

        <!-- Contenido 1 -->
        <section class="contenido-curso cont-seminarioscf2023" id="programa">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Programa</h1>

                        <h2><span class="brown">8:30</span> ACREDITACIONES</h2>

                        <h2><span class="brown">9:00</span> PALABRAS A CARGO DE AUTORIDAD DELA BOLSA DE COMERCIO DE ROSARIO</h2>

                        <h2><span class="brown">9:15</span> PALABRAS A CARGODELPRESIDENTE DE APOSGRANSR: HUGO GARCÍA DE LA VEGA</h2>

                        <h2><span class="brown">9:30 a 10:00</span> CEBADA CERVECERA</h2>
                        <p>Calidad comercial para la industria y exportación</p>
                        <p><strong>Ing. Agr. Gonzalo Di Luca - BOORTMALT</strong></p>

                        <h2><span class="brown">10:05 A 10:35</span> POSCOSECHA TRIGO Y CEBADA</h2>
                        <p>Almacenaje, buenas prácticas y operación en silos bolsa</p>
                        <p><strong>Ing. Agrónomo (PhD) Ricardo Bartosik - INTA (EEA Balcarce) - CONICET</strong></p>

                        <h2><span class="brown">10:40 A 11:00</span> COFFEE BREAK</h2>

                        <h2><span class="brown">11:15 A 11:45</span> TRIGO ARGENTINO</h2>
                        <p>Relevamiento de calidad</p>
                        <p><strong>Silvio Di Vanni - CÁMARA ARBITRAL DE CEREALES DE ROSARIO</strong></p>

                        <h2><span class="brown">11:50 A 12:20</span> TRIGO PAN</h2>
                        <p>Panorama global del comercio internacional y local.</p>
                        <p><strong>Lic. En Econ. Bruno Ferrari - BOLSA DE COMERCIO DE ROSARIO</strong>/p>

                        <h2><span class="brown">12:25 A 13:00</span> TRIGO HB4</h2>
                        <p>Nuevas tecnologías para afrontar el cambio climático y la sustentabilidad.</p>
                        <p><strong>Msc. Martín Mariani Ventura - BIOCERES CROPS SOLUTIONS</strong></p>

                        <h2><span class="brown">13:00 A 13:15</span> SUSTANCIAS DESEABLES Y NO DESEABLES EN AGROPRODUCTOS</h2>
                        <p><strong>Dra. Ángela Orlando - GREENLAB</strong></p>

                        <h2><span class="brown">13:05</span> RONDA FINAL DE PREGUNTAS</h2>
                    </div>

                    <div class="col-md-5 topmargin">

                        <div class="presencialcf">encuentro presencial</div>

                        <div class="data1">
                            <p><i class="far fa-calendar-alt fa-lg"></i> 5 de OCTUBRE</p>
                            <p> <i class="far fa-clock fa-lg"></i> 8:30 a 13:30 Hs.</p>
                            <p><i class="fas fa-map-marker-alt fa-lg"></i> Foyer del salón auditorio de la Bolsa de Comercio de Rosario</p>
                        </div>

                        <div class="data2">
                            <p><strong>Capacitación arancelada. Costo $2500</strong></p>
                        </div>



                    </div>
                </div>

            </div>
        </section>
        <!-- Fin Contenido 1 -->


        <!-- Contenido 2 -->
        <section class="contenido-curso cont2-seminarioscf2023" id="disertantes">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h1>Disertantes</h1>
                    </div>

                    <div class="col-md-6 col-lg-4 ">
                        <div class="disert"><img src="assets/img/conf01.jpg" alt="" class="img-fluid"></div>

                    </div>

                    <div class="col-md-6 col-lg-4">

                        <div class="disert"><img src="assets/img/conf02.jpg" alt="" class="img-fluid"></div>
                    </div>

                    <div class="col-md-6 col-lg-4 ">
                        <div class="disert"><img src="assets/img/conf03.jpg" alt="" class="img-fluid"></div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="disert"><img src="assets/img/conf04.jpg" alt="" class="img-fluid"></div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="disert"><img src="assets/img/conf05.jpg" alt="" class="img-fluid"></div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="disert"><img src="assets/img/conf06.jpg" alt="" class="img-fluid"></div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Fin Contenido 2 -->

        <!-- Contenido 3 -->
        <section class="contenido-curso cont3-seminarioscf2023" id="inscripcion">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Inscripción</h1>

                    </div>

                    <div class="col-md-12 mt-4">
                        <form method="post" action="" enctype="multipart/form-data" id="commentForm" name="commentForm" class="row g-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre y Apellido <span class="asteriscored">*</span></label>
                                <input type="text" class="form-control" id="cnombre" name="nombre">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">E-mail <span class="asteriscored">*</span></label>
                                <input type="text" class="form-control" id="cemail" name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                            </div>
                            <div class="col-md-6">
                                <label for="ciudad" class="form-label">Ciudad <span class="asteriscored">*</span></label>
                                <input type="text" class="form-control" id="cciudad" name="ciudad">
                            </div>
                            <div class="col-md-6">
                                <fieldset class="row mt-3">
                                    <legend class="col-form-label col-sm-4 pt-0">Participa de forma</legend>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="esafiliado" id="cafiliado1" value="1" checked>
                                            <label class="form-check-label" for="cafiliado1">
                                                Particular
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="esafiliado" id="cafiliado2" value="2">
                                            <label class="form-check-label" for="cafiliado2">
                                                Empresa
                                            </label>
                                        </div>

                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-6" id="astdni">
                                <label for="dni" class="form-label">DNI <span class="asteriscored">*</span></label>
                                <input type="text" class="form-control" id="cdni" name="dni">
                            </div>

                            <div class="col-md-6" style="display: none;" id="astcuit">
                                <label for="cuit" class="form-label">CUIT <span class="asteriscored">*</span></label>
                                <input type="text" class="form-control" id="ccuit" name="cuit">
                            </div>

                            <div class="col-md-12">
                                <label for="organizacion" class="form-label">Organización </label>
                                <input type="text" class="form-control" id="organizacion" name="organizacion">
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btins" id="btinsc">Inscribirse</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
        <!-- Fin Contenido 3 -->

        <!-- Contenido 4 -->
        <div class="contenido-curso cont5-seminarioscf2023">

            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h1>AUSPICIAN COSECHA FINA 2023</h1>
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/01-camada.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/02-aca.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/03-fugran.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/04-agroentregas.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/05-lasegunda.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/06-greenlab.jpg" alt="" class="img-fluid">
                    </div>

                    <!-- --->

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/07-tecnocientifica.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/08-tscanner.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/09-jorgensen.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/10-gualtieri.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/11-tecnogram.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/12-martino.jpg" alt="" class="img-fluid">
                    </div>

                     <!-- --->

                     <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/13-escuela.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/14-upl.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/15-caaf.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/16-mega.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/17-bcr.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/18-lostanos.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 disert02">
                        <img src="assets/img/19-williams.jpg" alt="" class="img-fluid">
                    </div>

                </div>

            </div>

        </div>
         <!-- Fin Contenido 4 -->

        <!-- Contenido 5 -->
        <div class="contenido-curso cont4-seminarioscf2023">

            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="data3">
                            <p><strong>NUESTRAS FORMAS DE PAGO PARA ARGENTINA</strong></p>
                            <p>Transferencia Bancaria o Depósito en cuenta corriente a APOSGRAN</p>
                            <p>Banco: Macro S.A. Cuenta Corriente en $: 3-793-0000008631-0</p>
                            <p>Sucursal: 793 – Bolsa de Comercio de Rosario</p>
                            <p>CBU: 285-0793-6-3000000086310-1 </p>
                            <p>CUIT: 30-67692633-6</p>
                            <p>&nbsp;</p>
                            <p><strong>NUESTRA UNICA FORMA DE PAGO PARA EL EXTERIOR: </strong></p>
                            <p>La única forma de pago disponible que tenemos para el exterior, es por Western Unión</p>
                        </div>

                    </div>
                </div>

            </div>

        </div>
         <!-- Fin Contenido 5 -->





    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>
    <!-- Fin Entidades -->


    <!-- MODAL -->
    <div class="modal fade" id="modalmensaje0" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalmensaje0" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    Enviando inscripción. Aguarde un momento.
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalmensaje" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalmensaje" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    Su inscripción se completo. Nos comunicaremos a la brevedad.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="modalmensaje2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalmensaje2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    Su inscripción no pudo completarse sorrectamente. Vuelva a intentarlo mas tarde.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

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

    <!-- ==Validate== -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.validate.js"></script>

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

    <script>
        var myModal0;
        var myModal;
        $("input[name='esafiliado']").change(function() {
            selected_value = $("input[name='esafiliado']:checked").val();
            if (selected_value == 1) {
                $("#astdni").show();
                $("#astcuit").hide();
            } else {
                $("#astdni").hide();
                $("#astcuit").show();
            }
        });


        $("#commentForm").validate({
            rules: {
                nombre: "required",
                email: {
                    required: true,
                    email: true
                },
                ciudad: "required",
                dni: {
                    required: function(element) {
                        return $("input[name='esafiliado']:checked").val() == 1;
                    }
                },
                cuit: {
                    required: function(element) {
                        return $("input[name='esafiliado']:checked").val() == 2;
                    }
                },
                consulta: "required",
            },
            messages: {
                nombre: {
                    required: " Campo Obligatorio"
                },
                email: {
                    required: " Campo Obligatorio",
                    email: " Ingrese una dirección válida"
                },
                dni: {
                    required: " Campo Obligatorio"
                },
                cuit: {
                    required: " Campo Obligatorio"
                },
                ciudad: {
                    required: " Campo Obligatorio"
                }

            },
            submitHandler: function(form) {

                $("#btinsc").hide();
                myModal0 = new bootstrap.Modal(document.getElementById('modalmensaje0'), {
                        keyboard: false
                });
                myModal0.show();

                var formData = new FormData($("#commentForm")[0]);

                $.ajax({
                    url: '<?php echo _CONST_DOMINIO_ ?>envio.php',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(data) {
                        if (data == "enviado") {

                            $("#cnombre").val("");
                            $("#cemail").val("");
                            $("#telefono").val("");
                            $("#cciudad").val("");
                            $("#cdni").val("");
                            $("#ccuit").val("");

                            $("#astdni").show();
                            $("#astcuit").show();

                            $("#afiliado1").attr("checked", false);
                            $("#afiliado2").attr("checked", true);

                            $("#cciudad").val("");

                            $("#organizacion").val("");

                            myModal = new bootstrap.Modal(document.getElementById('modalmensaje'), {
                                keyboard: false
                            });
                            myModal0.hide();
                            myModal.show();


                        } else if (data == "noenviado") {

                             myModal = new bootstrap.Modal(document.getElementById('modalmensaje2'), {
                                keyboard: false
                            });
                            myModal0.hide();
                            myModal.show();


                        }
                    }
                });
            }

        });
    </script>


</body>

</html>
