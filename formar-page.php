<?php
include_once('admin/includes/conexion.inc.php');
include_once('admin/includes/funciones.inc.php');
//
include_once('admin/includes/class.inc.php');
//
$link = Conectarse();
$objContenido = new General();
//

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta tags -->
    <meta content="FORMAR PARTE | SOCIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos" name="title" />
    <meta name="description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
    <meta name="keywords" content="">
    <meta name="author" content="Aldo Iñiguez">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index follow">

    <!--Metatags FB-->
    <meta property="og:title" content="FORMAR PARTE | SOCIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo _CONST_DOMINIO_ ?>">
    <meta property="og:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="FORMAR PARTE | SOCIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos">
    <meta name="twitter:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
    <meta name="twitter:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">


    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _CONST_DOMINIO_ ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo _CONST_DOMINIO_ ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo _CONST_DOMINIO_ ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo _CONST_DOMINIO_ ?>site.webmanifest">
    <link rel="mask-icon" href="<?php echo _CONST_DOMINIO_ ?>safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <title>FORMAR PARTE | SOCIOS | APOSGRAN | Asociación Argentina de Poscosecha de Granos</title>

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
    <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/custom.css?v=17" rel="stylesheet">




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

            <h2>Formar parte</h2>

        </div>

        <!-- Fin Slider -->



    </header>
    <!-- Fin Header -->

    <main role="main">

        <!-- Contenido 1 -->
        <section class="contenido-curso">
            <div class="container" id="cont">
                <form class="needs-validation" novalidate="" name="commentForm" id="commentForm">

                    <div class="row">

                        <div class="col-md-12">
                            <p id="mfinal1" class="alert alert-success">Su mensaje fue enviado. Nos comunicaremos con usted a la brevedad.</p>
                            <p id="mfinal2" class="alert alert-danger">Su mensaje no pudo ser enviado. Vuelva a intentarlo.</p>
                        </div>

                        <!-- Socio INdividuak o Empresa -->
                        <div class="col-12 mb-5">
                            <button type="button" class="btn btn-primary btn-socio-act btntipo1">Socio indivudual</button>
                            <button type="button" class="btn btn-primary btn-socio-inact btntipo2">Empresa</button>

                        </div>
                        <input class="form-check-input" type="hidden" name="tipo" id="tipo" value="Individuo">


                        <div id="contenido">

                        </div>


                        <input type="hidden" name="conoc" id="conoc">

                    </div>
                </form>

                <div class="col-12 mb-4">
                    <div class="titulo-label">¿Cómo nos conoció?</div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="conoc1" value="Por un asociado">
                        <label class="form-check-label" for="conoc1">Por un asociado</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="conoc2" value="Recomendación">
                        <label class="form-check-label" for="conoc2">Recomendación</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="conoc3" value="Internet/Redes sociales">
                        <label class="form-check-label" for="conoc3">Internet/Redes sociales</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="conoc4" value="Otros">
                        <label class="form-check-label" for="conoc4">Otros</label>
                    </div>

                    <div class="invalid-feedback-ck" id="menchk">
                        Elija una opción.
                    </div>

                </div>

                <div class="col-lg-10 col-xl-8 mt-3 text-end">
                    <!--<button type="submit" class="btn btn-primary bt-enviar">Enviar</button>-->
                    <p class="text-end"><button class="btn btn-primary bt-enviar enviar" type="button">ENVIAR</button></p>
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

    <!-- ==Select 2== -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/select2.js"></script>
    <!-- ==Owl== -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/owl.carousel.js"></script>
    <!-- Easing -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.easing.1.3.js"></script>

    <!-- Preloader -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/animations/jquery.html5Loader.line.js"></script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.html5Loader.js"></script>


    <!-- Custom -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/scripts.js?v=1"></script>

    <!-- ==Google maps== -->



    <script>
        var pesActiva = 0;
        var itActive = 0;
        var conditions1 = 0;
        var conditions2 = 0;
        var tipo = "";
        cars = new Array("-", "-", "-", "-");
        $(document).ready(function() {

            $.post("../includes/form-individuo.php", function(data) {
                $("#contenido").html(data);
            });


            $('.btntipo1').click(function() {

                $.post("../includes/form-individuo.php", function(data) {
                    $("#contenido").html(data);
                });

                $(this).removeClass("btn-socio-inact").addClass("btn-socio-act");
                $(".btntipo2").removeClass("btn-socio-act").addClass("btn-socio-inact");
                $("#tipo").attr("value", "Individuo")

            })

            $('.btntipo2').click(function() {

                $.post("../includes/form-empresa.php", function(data) {
                    $("#contenido").html(data);
                });

                $(this).removeClass("btn-socio-inact").addClass("btn-socio-act");
                $(".btntipo1").removeClass("btn-socio-act").addClass("btn-socio-inact");
                $("#tipo").attr("value", "Empresa")

            })

        });

        $(".enviar").click(function() {
            validas();
        });

        function validas() {



            if ($('input[type=checkbox]:checked').length === 0) {
                $("#menchk").css("display", "block");
                conditions1 = 1;
            } else {
                conditions1 = 0;
            }


            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {

                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        conditions2 = 1;
                    } else {
                        conditions2 = 0;
                    }

                    form.classList.add('was-validated')
                }, false)



            if (conditions1 == 0 && conditions2 == 0) {
                var formData = new FormData($("#commentForm")[0]);
                $.ajax({
                    url: '../envio-s.php',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        tipo = $("#tipo").attr("value");

                        if (tipo == "Individuo") {

                            if (data == "enviado") {
                                $("#mfinal1").show();
                                $("#mfinal2").hide();
                                $("#nombre").val("");
                                $("#dni").val("");
                                $("#fnacimiento").val("");

                                $("#cuit").val("");
                                $("#domicilioentrega").val("");
                                $("#localidad").val("");
                                $("#provincia").val("");
                                $("#cp").val("");
                                $("#tfijo").val("");
                                $("#tmovil").val("");
                                $("#email").val("");

                                //$("#conoc1,#conoc2,#conoc3,#conoc4").removeAttr('checked');
                                $("#conoc1,#conoc2,#conoc3,#conoc4").prop("checked", false);


                                // Uncheck #x
                                $("#iva1,#iva2,#iva3").prop("checked", false);

                                $("#commentForm").removeClass("was-validated");

                            } else if (data == "noenviado") {
                                $("#mfinal1").hide();
                                $("#mfinal2").show();

                                $("#commentForm").removeClass("was-validated");
                            }

                        } else if (tipo == "Empresa") {

                            if (data == "enviado") {
                                $("#mfinal1").show();
                                $("#mfinal2").hide();

                                $("#enombre").val("");
                                $("#efecha").val("");
                                $("#eactividad").val("");
                                $("#edireccion").val("");
                                $("#elocalidad").val("");
                                $("#eprovincia").val("");
                                $("#ecp").val("");
                                $("#etfijo").val("");
                                $("#eemail").val("");
                                $("#ecuit").val("");

                                //$("#conoc1,#conoc2,#conoc3,#conoc4").removeAttr('checked');
                                $("#conoc1,#conoc2,#conoc3,#conoc4").prop("checked", false);

                                $("#iva1,#iva2,#iva3").prop("checked", false);

                                $("#commentForm").removeClass("was-validated");

                            } else if (data == "noenviado") {
                                $("#mfinal1").hide();
                                $("#mfinal2").show();

                                $("#commentForm").removeClass("was-validated");
                            }

                        }


                    }
                });
            }


        }

        var checkbox1 = document.getElementById('conoc1');
        var checkbox2 = document.getElementById('conoc2');
        var checkbox3 = document.getElementById('conoc3');
        var checkbox4 = document.getElementById('conoc4');

        checkbox1.addEventListener('change', function() {
            if (this.checked) {
                $("#menchk").css("display", "none");
                var valor = $("#conoc1").val();
                cars[0] = valor;
            } else {
                cars[0] = "-";
            }
            valorConoc(cars)
        });

        checkbox2.addEventListener('change', function() {
            if (this.checked) {
                $("#menchk").css("display", "none");
                var valor = $("#conoc2").val();
                cars[1] = valor;
            } else {
                cars[1] = "-";
            }
            valorConoc(cars)
        });

        checkbox3.addEventListener('change', function() {
            if (this.checked) {
                $("#menchk").css("display", "none");
                var valor = $("#conoc3").val();
                cars[2] = valor;
            } else {
                cars[2] = "-";
            }
            valorConoc(cars)
        });

        checkbox4.addEventListener('change', function() {
            if (this.checked) {
                $("#menchk").css("display", "none");
                var valor = $("#conoc4").val();
                cars[3] = valor;
            } else {
                cars[3] = "-";
            }
            valorConoc(cars)
        });

        function valorConoc(cars) {
            var string = "";
            //console.log(cars);
            for (let index = 0; index < cars.length; index++) {


                if (cars[index] != "-") {
                    if (string != "") {
                        string = string + "," + cars[index];
                    } else {
                        string = string + cars[index];
                    }

                }



            }
            //console.log(string);
            $("#conoc").attr("value", string);

        }
    </script>


</body>

</html>