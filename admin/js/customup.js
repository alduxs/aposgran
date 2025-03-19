$(document).ready(function () {

    var $modal = $('#modal');
    var image = document.getElementById('sample_image');
    var nombreOriginal;
    var cropper;
    var imgOldCuad;
    var imgNewCuad;
    var imgCuadState;

    $('#upload_image').change(function (event) {

        var files = event.target.files;

        nombreOriginal = files[0]["name"];
        
        imgOldCuad = $("#imageOldCuadrada").val();
        imgNewCuad = $("#imageNewCuadrada").val();
        imgCuadState = $("#iSquareStat").val();

        var done = function (url) {
            image.src = url;

            $modal.modal('show');

        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function (event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 4/2.8,
            viewMode: 3,
            preview: '.preview',
            crop: function (e) {

                $("#alto").val(Math.round(e.detail.height));
                $("#ancho").val(Math.round(e.detail.width));

            }
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function () {
        canvas = cropper.getCroppedCanvas({
            width: 600,
            height: 417
        });

        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $.ajax({
                    url: 'upload.php',
                    method: 'POST',
                    data: {
                        image: base64data,
                        nombre: nombreOriginal,
                        tipo: 1,
                        imgActual: imgNewCuad
                    },
                    success: function (data) {
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data);

                        var divide = data.split("/");
                        var imageUp = divide[3];

                        if(imgCuadState == 0 && imgOldCuad == "nd"){
                            $("#iSquareStat").val(1);
                        } else if(imgCuadState == 0 && imgOldCuad != "nd"){
                            $("#iSquareStat").val(2);
                        }
                        $("#imageNewCuadrada").val(imageUp);
                    }
                });
            };
        }, 'image/jpeg', 0.95);

    });

    //------------------------ Segunda Imagen
    var $modal2 = $('#modal2');
    var image2 = document.getElementById('sample_image2');
    var nombreOriginal2;
    var cropper2;
    var altoImg2;
    var anchoImg2;

    var imgOldRect;
    var imgNewRect;
    var imgRectState;

    $('#upload_image2').change(function (event) {

        var files2 = event.target.files;

        nombreOriginal2 = files2[0]["name"];

        imgOldRect = $("#imageOldRect").val();
        imgNewRect = $("#imageNewRect").val();
        imgRectState = $("#iRectStat").val();

        var done = function (url2) {
            image2.src = url2;

            $modal2.modal('show');

        };

        if (files2 && files2.length > 0) {
            reader = new FileReader();
            reader.onload = function (event) {
                done(reader.result);
            };
            reader.readAsDataURL(files2[0]);
        }
    });

    $modal2.on('shown.bs.modal', function () {
        cropper2 = new Cropper(image2, {
            aspectRatio: 16 / 9,
            viewMode: 3,
            preview: '.preview2',
            crop: function (e) {

                $("#alto2").val(Math.round(e.detail.height));
                $("#ancho2").val(Math.round(e.detail.width));

                anchoImg2 = Math.round(e.detail.width);
                altoImg2 = Math.round(e.detail.height);

            }
        });
    }).on('hidden.bs.modal', function () {
        cropper2.destroy();
        cropper2 = null;
    });

    $('#crop2').click(function () {
        console.log(altoImg2);
        canvas = cropper2.getCroppedCanvas({
            width: anchoImg2,
            height: altoImg2
        });

        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $.ajax({
                    url: 'upload.php',
                    method: 'POST',
                    data: {
                        image: base64data,
                        nombre: nombreOriginal2,
                        tipo: 2,
                        imgActual: imgNewRect
                    },
                    success: function (data) {
                        $modal2.modal('hide');
                        $('#uploaded_image2').attr('src', data);

                        var divide = data.split("/");
                        var imageUp = divide[3];

                        if(imgRectState == 0 && imgOldRect == "nd"){
                            $("#iRectStat").val(1);
                        } else if(imgRectState == 0 && imgOldRect != "nd"){
                            $("#iRectStat").val(2);
                        }

                        $("#imageNewRect").val(imageUp);

                    }
                });
            };
        }, 'image/jpeg', 0.95);

    });

});