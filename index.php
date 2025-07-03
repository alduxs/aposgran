<?php
include_once('admin/includes/conexion.inc.php');
include_once('admin/includes/funciones.inc.php');
//
include_once('admin/includes/class.inc.php');
//
$link = Conectarse();
$objContenido = new General();
//
//CURSOS
$query = "SELECT * FROM contenido2 WHERE publicada = 1 AND home = 1 ORDER BY fecha DESC, titulo ASC LIMIT 0,3";
$rsCont = $objContenido->getAllContenido($link, $query);

//REVISTAS
$queryRev = "SELECT * FROM revistas WHERE rev_publicada = 1 AND rev_destacada = 1 ORDER BY rev_titulo ASC LIMIT 0,1";
$rsContRev = $objContenido->getAllContenido($link, $queryRev);
$arrRev = $rsContRev->fetch(PDO::FETCH_BOTH);

//TEXTO CONTACTO
$queryTxt = "SELECT * FROM textos WHERE txt_id = 3";
$rsContTxt = $objContenido->getAllContenido($link, $queryTxt);
$arrTxt = $rsContTxt->fetch(PDO::FETCH_BOTH)
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Meta tags -->
  <meta content="APOSGRAN | Asociación Argentina de Poscosecha de Granos" name="title" />
  <meta name="description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
  <meta name="keywords" content="">
  <meta name="author" content="Aldo Iñiguez">
  <meta name="revisit-after" content="15 days">
  <meta name="robots" content="index follow">

  <!--Metatags FB-->
  <meta property="og:title" content="APOSGRAN | Asociación Argentina de Poscosecha de Granos">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo _CONST_DOMINIO_ ?>">
  <meta property="og:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="500">
  <meta property="og:image:height" content="500">
  <meta property="og:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="APOSGRAN | Asociación Argentina de Poscosecha de Granos">
  <meta name="twitter:description" content="Asociación de carácter técnico, sin fines de lucro. Capacitación en poscosecha de granos.">
  <meta name="twitter:image" content="<?php echo _CONST_DOMINIO_ ?>assets/img/FB.jpg">


  <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="favicon.svg" />
  <link rel="shortcut icon" href="favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="manifest" href="site.webmanifest" />



  <title>APOSGRAN | Asociación Argentina de Poscosecha de Granos</title>

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
  <link href="<?php echo _CONST_DOMINIO_ ?>assets/css/custom.css?v=13" rel="stylesheet">


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
  <header class="header-h">

    <!-- Menu -->



    <!-- Slider -->
    <div class="slider-g">

      <div class="text-slide">
        <div class="text" id="fr-0">Asociación Argentina<br>de poscosecha de granos</div>
        <div class="text" id="fr-1" style="opacity:0;top:-100px;">40 años trabajando<br>para el sector agro industrial</div>
        <div class="text" id="fr-2" style="opacity:0;top:-100px;">Capacitando en materia<br>de Poscosecha de Granos</div>

        <div class="txt-slide-bt">ASOCIACIÓN DE CARÁCTER TÉCNICO</div>
      </div>

      <div class="owl-carousel">

        <div class="item slider1" style="background-image: url('assets/slider/slide01.jpg');">

        </div>

        <div class="item slider2" style="background-image: url('assets/slider/slide02.jpg');">

        </div>

        <div class="item slider3" style="background-image: url('assets/slider/slide03.jpg');">

        </div>


      </div>

      <div class="navegador-slide">
        <div class="linea"></div>
        <div class="linea2"></div>
        <ul>
          <li>
            <div class="bts nn-item nn-item-activo" id="b-0"></div>
          </li>
          <li>
            <div class="bts nn-item" id="b-1"></div>
          </li>
          <li>
            <div class="bts nn-item" id="b-2"></div>
          </li>

        </ul>
      </div>

      <div class="fondo-degrade">

      </div>

    </div>

    <!-- Fin Slider -->

    <div class="menu-g">

      <div class="container">
        <div class="row">
          <div class="col-6 col-md-12 col-lg-2 logo">
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


  </header>
  <!-- Fin Header -->

  <main role="main">

    <!-- Videos -->
    <section class="cursos-g">
      <div class="container">
        <div class="row">
          

          <div class="col-12">
             <a href="<?php echo _CONST_DOMINIO_ ?>seminario-girasol"><img src="assets/img/banner-seminario.png" alt="" class="img-fluid"></a>
          </div>

        </div>
      </div>
    </section>

    <section class="video-g">
      <div class="container">
        <div class="row">
          

          <div class="col-12 offset-0 col-lg-10 offset-lg-1">
            <div class="ratio ratio-16x9">
              <iframe src="https://www.youtube.com/embed/vNafNhEQrik?rel=0" title="YouTube video" allowfullscreen></iframe>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Cursos -->
    <section class="cursos-g">
      <div class="container">
        <div class="row">
          <!-- Título -->
          <div class="col-12">
            <h1>próximas actividades</h1>
          </div>
          <?php $contador = 0; ?>
          <?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>

            <!-- Cursos -->

            <div class="col-lg-4">
              <div class="card card-anim1" id="card-anim1<?php echo $contador; ?>">
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
            <?php $contador++; ?>
          <?php } ?>




        </div>
      </div>
    </section>
    <!-- Fin Cursos -->

    <!-- Revistas -->
    <section class="revista-g">
      <div class="container">
        <div class="row">
          <!-- Título -->
          <div class="col-12">
            <h1>revistas</h1>
          </div>

          <div class="col-md-3 col-lg-4 revista-margin revista-anim1" id="revista-anim10">
            <div class="envoltorio">
              <h3>Última<br>edición</h3>
            </div>

          </div>

          <div class="col-md-9 offset-md-0 col-lg-7 offset-lg-1 revista-anim1" id="revista-anim11">
            <div class="row">
              <div class="col-md-4 mb-revista">
                <img src="<?php echo _CONST_DOMINIO_ ?>assets/revistas/<?php echo $arrRev["rev_imagen"]; ?>" alt="" class="img-fluid">
              </div>

              <div class="col-md-8 ">
                <p>La revista de Aposgran es un material en el cual se ve reflejado el trabajo de la entidad en conjunto con el sector agroindustrial.</p>
                <h4><?php echo $arrRev["rev_titulo"]; ?></h4>
                <?php if ($arrRev["rev_pdf"] != "nd" && $arrRev["rev_pdf"] != "") { ?>
                  <p class="text-end"> <a href="<?php echo _CONST_DOMINIO_ ?>assets/revistas/<?php echo $arrRev["rev_pdf"]; ?>" class="btn btn-primary leermas" target="_blank">Leer</a></p>
                <?php } else { ?>
                  <p class="text-end"><a href="<?php echo $arrRev["rev_link"]; ?>" class="btn btn-primary leermas" target="_blank">Leer</a></p>
                <?php } ?>
              </div>

            </div>
          </div>



        </div>
      </div>
    </section>
    <!-- Fin Revistas -->

    <!-- Entidades -->
    <section class="entidades-g">
      <div class="container">
        <div class="row">
          <!-- Título -->
          <div class="col-12">
            <h1>ENTIDADES QUE NOS ACOMPAÑAN</h1>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-2 offset-lg-1 text-center mb-3 socios-anim1" id="socios-anim10">
            <img src="assets/socios/t6.png" alt="" class="img-fluid">
          </div>

          <div class="col-sm-6 col-md-4 col-lg-2 text-center mb-3 socios-anim1" id="socios-anim11">
            <img src="assets/socios/agd.png" alt="" class="img-fluid">
          </div>
          <div class="col-sm-6 col-md-4 col-lg-2 text-center mb-3 socios-anim1" id="socios-anim12">
            <img src="assets/socios/aca.png" alt="" class="img-fluid">
          </div>
          <div class="col-sm-6 col-md-6 col-lg-2 text-center mb-3 socios-anim1" id="socios-anim13">
            <img src="assets/socios/fugran.png" alt="" class="img-fluid">
          </div>
          <div class="col-sm-12 col-md-6 col-lg-2 text-center mb-3 socios-anim1" id="socios-anim14">
            <img src="assets/socios/bcr.png" alt="" class="img-fluid">
          </div>


        </div>
      </div>
    </section>
    <!-- Fin Entidades -->

    <!-- Contacto -->
    <section class="contacto-g">
      <div class="container">
        <div class="row">
          <!-- Título -->
          <div class="col-12">
            <h1>contacto</h1>
          </div>

          <div class="col-md-6 col-lg-3 contacto-anim11" id="contacto-anim110">


            <p id="mfinal1" class="alert alert-success">Su mensaje fue enviado. Nos comunicaremos con usted a la brevedad.</p>
            <p id="mfinal2" class="alert alert-danger">Su mensaje no pudo ser enviado. Vuelva a intentarlo.</p>


            <form class="needs-validation form-home" novalidate="" name="commentForm" id="commentForm">
              <div class="row g-3 mb-5">
                <div class="col-sm-12">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder="" value="" required="" name="nombre">
                  <div class="invalid-feedback">
                    Nombre obligatorio.
                  </div>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required="">
                  <div class="invalid-feedback">
                    Ingrese una dirección de e-mail válida.
                  </div>
                </div>


                <div class="col-sm-12">
                  <label for="mensaje" class="form-label">Mensaje <span class="text-muted"></span></label>
                  <textarea class="form-control" id="mensaje" rows="3" name="mensaje"></textarea>

                </div>



              </div>


              <button class="btn btn-primary bt-enviar enviar" type="button">ENVIAR</button>
            </form>

          </div>

          <div class="col-md-6 col-lg-3 info contacto-anim11" id="contacto-anim111">
            <p><strong>OFICINA APOSGRAN</strong></p>
            <p>Bolsa de Comercio de Rosario</p>
            <p>Córdoba 1402- Subsuelo</p>
            <p>2000 Rosario</p>
            <p>Tel: +54 (0341) 5258300-4102600</p>
            <p>Int. 2265</p>
            <p>Móvil: 54 (341) 2108093</p>
            <p><a href="http://www.aposgran.org.ar">www.aposgran.org.ar</a></p>
          </div>

          <div class="col-md-12 col-lg-6 contacto-anim11" id="contacto-anim112">
            <div id="map"></div>
          </div>




        </div>
      </div>
    </section>
    <!-- Fin Contacto -->

    <!-- Contacto 2-->
    <section class="contacto-d">
      <div class="container">
        <div class="row">

          <div class="col-12">

            <div class="datos-contacto contacto-anim21">

              <?php echo $arrTxt["txt_col_1"]; ?>


            </div>
          </div>



        </div>
      </div>
    </section>
    <!-- Fin Contacto 2 -->

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
  
  
  <!-- ==Owl== -->
  <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/owl.carousel.js"></script>
  <!-- Easing -->
  <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.easing.1.3.js"></script>

  <!-- Scroll Home -->
  <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/scroll-home.js?v=3"></script>

  <!-- Preloader -->
  <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/animations/jquery.html5Loader.line.js"></script>
  <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/jquery.html5Loader.js"></script>

  <!-- Custom -->
  <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/scripts-home.js?v=3"></script>

  <!-- ==Google maps== -->
  <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCquBaspZ7KL1dj1s2B8cYsrUNUJXHAuYk&callback=initMap">
  </script>


  <script>
    var pesActiva = 0;
    var itActive = 0;
    $(document).ready(function() {

      /* z-index novedad inical */
      $("#img-bl-hom-1").css("z-index", "200");

      var owl = $(".owl-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        nav: false,
        autoplayTimeout: 10000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        dots: false,
      });


      owl.on('changed.owl.carousel', function(event) {
        var item = event.item.index;
        if (item == 1) {
          item = 4;
        }
        var id = item - 2;



        $("#b-" + pesActiva).removeClass("nn-item-activo");
        $("#b-" + id).addClass("nn-item-activo");

        /* Frases */
        for (let index = 0; index < 3; index++) {

          $("#fr-" + index).css("top", "-100px").css("opacity", "0");
        }



        $("#fr-" + id).stop().animate({
          top: '0px',
          opacity: '1',
        }, 1000, "easeOutExpo", function() {
          itActive = 0;
        });

        //owl.trigger('to.owl.carousel', [id]);
        pesActiva = id;

      })


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

    var map;

    function initMap() {

      var styledMapType = new google.maps.StyledMapType(
        [{
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#d3d3d3"
            }]
          },
          {
            "featureType": "transit",
            "stylers": [{
                "color": "#808080"
              },
              {
                "visibility": "off"
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
                "visibility": "on"
              },
              {
                "color": "#b3b3b3"
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#ffffff"
            }]
          },
          {
            "featureType": "road.local",
            "elementType": "geometry.fill",
            "stylers": [{
                "visibility": "on"
              },
              {
                "color": "#ffffff"
              },
              {
                "weight": 1.8
              }
            ]
          },
          {
            "featureType": "road.local",
            "elementType": "geometry.stroke",
            "stylers": [{
              "color": "#d7d7d7"
            }]
          },
          {
            "featureType": "poi",
            "elementType": "geometry.fill",
            "stylers": [{
                "visibility": "on"
              },
              {
                "color": "#ebebeb"
              }
            ]
          },
          {
            "featureType": "administrative",
            "elementType": "geometry",
            "stylers": [{
              "color": "#a7a7a7"
            }]
          },
          {
            "featureType": "road.arterial",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#ffffff"
            }]
          },
          {
            "featureType": "road.arterial",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#ffffff"
            }]
          },
          {
            "featureType": "landscape",
            "elementType": "geometry.fill",
            "stylers": [{
                "visibility": "on"
              },
              {
                "color": "#efefef"
              }
            ]
          },
          {
            "featureType": "road",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#696969"
            }]
          },
          {
            "featureType": "administrative",
            "elementType": "labels.text.fill",
            "stylers": [{
                "visibility": "on"
              },
              {
                "color": "#737373"
              }
            ]
          },
          {
            "featureType": "poi",
            "elementType": "labels.icon",
            "stylers": [{
              "visibility": "off"
            }]
          },
          {
            "featureType": "poi",
            "elementType": "labels",
            "stylers": [{
              "visibility": "off"
            }]
          },
          {
            "featureType": "road.arterial",
            "elementType": "geometry.stroke",
            "stylers": [{
              "color": "#d6d6d6"
            }]
          },
          {
            "featureType": "road",
            "elementType": "labels.icon",
            "stylers": [{
              "visibility": "off"
            }]
          },
          {},
          {
            "featureType": "poi",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#dadada"
            }]
          }
        ]
      );


      var myLatLng = {
        lat: -32.9457048737971,
        lng: -60.64244032611096
      };
      var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 15,
        disableDefaultUI: true,

      });

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
      });

      //Associate the styled map with the MapTypeId and set it to display.
      map.mapTypes.set('styled_map', styledMapType);
      map.setMapTypeId('styled_map');

    }

    $(".enviar").click(function() {
      validas();
    });

    function validas() {

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {

          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          } else {

            var formData = new FormData($("#commentForm")[0]);

            $.ajax({
              url: 'envio-h.php',
              type: 'POST',
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              success: function(data) {
                console.log(data);

                if (data == "enviado") {
                  $("#mfinal1").show();
                  $("#mfinal2").hide();
                  $("#nombre").val("");
                  $("#email").val("");
                  $("#mensaje").val("");

                  $("#commentForm").removeClass("was-validated");

                } else if (data == "noenviado") {
                  $("#mfinal1").hide();
                  $("#mfinal2").show();
                  $("#commentForm").removeClass("was-validated");
                }
              }
            });
          }

          form.classList.add('was-validated')
        })



    }

    /* Preloader */
    var cadena = "";
    $.html5Loader({
      filesToLoad: 'https://aposgran.org.ar/includes/files-home.json',
      //filesToLoad: 'http://localhost/aposgran/includes/files-home.json',
      //filesToLoad: 'http://192.168.100.16/aposgran/includes/files-home.json',
      onComplete: function() {
        $("#html5Loader").fadeOut("slow");
      }
    });
    /* Fin preloader */
  </script>


</body>

</html>