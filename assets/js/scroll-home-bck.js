var pbreak;
var anchoPantalla2 = $(window).width();
var myInterval1;
var myInterval2;
var myInterval3;
var myInterval4;
var contador1 = 0;
var contador2 = 0;
var contador3 = 0;
var contador4 = 0;
var estAnimacion1 = 0;
//



var controller = new ScrollMagic.Controller();


// Cursos Home
var scene = new ScrollMagic.Scene({ triggerElement: ".cursos-g", duration: 200 })
  .addTo(controller)
  //.addIndicators() // add indicators (requires plugin)
  .on("enter", function (e) {
    if(estAnimacion1 == 0){
      tempAsignClass("card-anim1", "card-anim2", 1);
    }
    
  })


// Revistas Home
var scene2 = new ScrollMagic.Scene({ triggerElement: ".revista-g", duration: 200 })
  .addTo(controller)
  //.addIndicators() // add indicators (requires plugin)
  .on("enter", function (e) {
    //$(".revista-anim1").addClass("revista-anim2");
    tempAsignClass("revista-anim1", "revista-anim2", 2);
  })

// Socios Home
var scene3 = new ScrollMagic.Scene({ triggerElement: ".entidades-g", duration: 200 })
  .addTo(controller)
  //.addIndicators() // add indicators (requires plugin)
  .on("enter", function (e) {
    //$(".socios-anim1").addClass("socios-anim2");
    tempAsignClass("socios-anim1", "socios-anim2", 3);
  })

// Contacto Home
var scene4 = new ScrollMagic.Scene({ triggerElement: ".contacto-g", duration: 200 })
  .addTo(controller)
  //.addIndicators() // add indicators (requires plugin)
  .on("enter", function (e) {
    //$(".contacto-anim11").addClass("contacto-anim12");
    tempAsignClass("contacto-anim11", "contacto-anim12", 4);
    $(".contacto-anim21").addClass("contacto-anim22");
  })
//---------------------------------------------------------------------------------------//
function tempAsignClass(classInciail, classFinal, animacion) {
  var matches = document.querySelectorAll('div.' + classInciail);
  var longMatch = matches.length;
  if (animacion == 1) {
    myInterval1 = setInterval(asignClass, 500, longMatch, classInciail, classFinal, animacion);
  } /*else if (animacion == 2) {
    myInterval2 = setInterval(asignClass, 100, longMatch, classInciail, classFinal, animacion);
  } else if (animacion == 3) {
    myInterval3 = setInterval(asignClass, 100, longMatch, classInciail, classFinal, animacion);
  } else if (animacion == 4) {
    myInterval4 = setInterval(asignClass, 100, longMatch, classInciail, classFinal, animacion);
  }*/

}

function asignClass(longMatch, classInciail, classFinal, animacion) {
  if (animacion == 1) {
    console.log(contador1);
    console.log(longMatch);
    console.log(animacion);
    clearInterval(myInterval1);
    
    if (contador1 < longMatch) {
      $("#" + classInciail + contador1).addClass(classFinal);
      contador1++;
    } else {
      contador1 = 100;
      clearInterval(myInterval1);
      animacion = 100;
    }
    estAnimacion1 = 0;
  } else if (animacion == 2) {
    if (contador2 < longMatch) {
      $("#" + classInciail + contador2).addClass(classFinal);
      contador2++;
    } else {
      contador2 = 100;
      clearInterval(myInterval2);

    }
  } else if (animacion == 3) {
    if (contador3 < longMatch) {
      $("#" + classInciail + contador3).addClass(classFinal);
      contador3++;
    } else {
      contador3 = 100;
      clearInterval(myInterval3);

    }
  } else if (animacion == 4) {
    if (contador4 < longMatch) {
      $("#" + classInciail + contador4).addClass(classFinal);
      contador4++;
    } else {
      contador4 = 100;
      clearInterval(myInterval4);

    }
  }

}