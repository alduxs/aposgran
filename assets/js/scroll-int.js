var anchoPantalla2 = $(window).width();
var estadoanim = 0;
var myInterval;
var contador = 0;
//

console.log(seccion);

var controller = new ScrollMagic.Controller();


if (seccion == "quienes-somos") {
    // Cursos Home
    var scene = new ScrollMagic.Scene({ triggerElement: ".comision-g", duration: 200 })
        .addTo(controller)
        //.addIndicators() // add indicators (requires plugin)
        .on("enter", function (e) {
            if (estadoanim == 0) {
                estadoanim = 1;
                tempAsignClass("anim-g1", "anim-g2");
            }
        })
} else if (seccion == "revistas") {
    // Cursos Home
    var scene = new ScrollMagic.Scene({ triggerElement: ".seccion-revistas-g2", duration: 200 })
        .addTo(controller)
        //.addIndicators() // add indicators (requires plugin)
        .on("enter", function (e) {

            if (estadoanim == 0) {
                estadoanim = 1;
                tempAsignClass("anim-g1", "anim-g2");
            }
        })
}


//---------------------------------------------------------------------------------------//
function tempAsignClass(classInciail, classFinal) {
    var matches = document.querySelectorAll('div.' + classInciail);
    var longMatch = matches.length;

    myInterval = setInterval(asignClass, 100, longMatch, classInciail, classFinal);

}

function asignClass(longMatch, classInciail, classFinal) {
    if (contador < longMatch) {
        $("#" + classInciail + contador).addClass(classFinal);
        contador++;
    } else {
        contador = 0;
        clearInterval(myInterval);

    }
}