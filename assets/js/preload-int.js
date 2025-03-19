/* Preloader */
var cadena = "";
$.html5Loader({
  //filesToLoad: 'http://bienbosque.com/files.json',
  filesToLoad: 'http://localhost/aposgran/includes/files-home.json',
  onComplete: function() {
    $("#html5Loader").fadeOut("slow");
  }
});
/* Fin preloader */