var hamburger = 0; //Variable Menú Hamburguesa
var menuActivo = "";

$(document).ready(function () {

  // Menu Hamburguesa
  $(".hamburger").click(function () {
    if (hamburger == 0) {
      $(".hamburger").addClass("is-active");
      hamburger = 1;
      abrirMenu();
    } else {
      $(".hamburger").removeClass("is-active");
      hamburger = 0;
      cerrarMenu()
    }
  });

  /* Menu responsive */
  $('.menu-res span').click(function (event) {
    event.preventDefault();
    var menuId = $(this).attr("id");//Consigue el id del menu

    if (menuId == menuActivo) {
      $("#" + menuId).removeAttr("style");
      $("#m" + menuId).slideUp("slow");
      menuActivo = "";
    } else {
      if (menuActivo != "") {
        $("#" + menuActivo).removeAttr("style");
        $("#m" + menuActivo).slideUp("slow");
      }
      //
      $("#" + menuId).css("background", "#014997").css("border-bottom", "0px");
      $("#m" + menuId).slideDown("slow");
      //

      //
      menuActivo = menuId;
    }


  });

  resizeImage();
});


/* Fin preloader */

$(window).on('resize', function () {
  resizeImage();
});

function resizeImage() {

  var anchoPantalla2 = $(window).width();
  var altoPantalla = $(window).height();


}


// Function Scroll-----------------------------------------------------
jQuery(function ($) {
  /**
   * Demo binding and preparation, no need to read this part
   */
  //borrowed from jQuery easing plugin
  //http://gsgd.co.uk/sandbox/jquery.easing.php

  $.easing.elasout = function (x, t, b, c, d) {
    return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
  };

  $('#btc,#btbc').click(function () {
    $.scrollTo(document.getElementById('contacto'), 1000, { easing: 'elasout' });
  });

  $('#btbarr,#btbusc').click(function () {
    $.scrollTo(document.getElementById('busqueda'), 1000, { easing: 'elasout' });
  });

});

// Dropdown Menu Fade    
jQuery(document).ready(function () {
  $(".dropdown").hover(
    function () {
      $('.dropdown-menu', this).fadeIn("fast");
    },
    function () {
      $('.dropdown-menu', this).fadeOut("fast");
    });
});


// ************************************************************************************************* //
//Función que abre el menú cuando se presiona el botón hamburguesa
function abrirMenu() {

  $(".menu-responsive").stop().animate({
    right: '0px',
  }, 500, "easeOutQuint");

  $(".boton-menu").css("position", "fixed");

}

//Función que cierra el menú cuando se presiona el botón hamburguesa
function cerrarMenu() {
  $(".menu-responsive").stop().animate({
    right: '-250px',
  }, 500, "easeOutQuint");

  $(".boton-menu").css("position", "absolute");

}

/* Preloader */
var cadena = "";
$.html5Loader({
  filesToLoad: 'https://aposgran.org.ar/includes/files-int.json',
  //filesToLoad: 'http://localhost/aposgran/includes/files-int.json',
  //filesToLoad: 'http://192.168.100.16/aposgran/includes/files-int.json',
  onComplete: function() {
    $("#html5Loader").fadeOut("slow");
  }
});
/* Fin preloader */