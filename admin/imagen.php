<?php
//index.php

?>
<!DOCTYPE html>
<html>

<head>
	<title>Crop Image Before Upload using CropperJS with PHP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />

	<link rel="stylesheet" href="css/dropzone.css" />
	<link rel="stylesheet" href="css/cropper.css" />

	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/dropzone.js"></script>
	<script src="js/cropper.js"></script>

	<style>
		.image_area {
			position: relative;
			background-color: #f8f8f8;
			color: #ccc;
			width: 300px;
			height: 300px;
			text-align: center;
		}
		.image_area2 {
			position: relative;
			background-color: #f8f8f8;
			color: #ccc;
			width: 533px;
			height: 300px;
			text-align: center;
		}

		img {
			display: block;
			max-width: 100%;
		}

		.preview,.preview2 {
			overflow: hidden;
			width: 160px;
			height: 160px;
			margin: 10px;
			border: 1px solid red;
		}

		.modal-lg {
			max-width: 1000px !important;
		}

		.overlay {
			position: absolute;
			bottom: 0px;
			left: 0;
			right: 0;
			background-color: rgba(255, 255, 255, 0.5);
			overflow: hidden;
			height: 0;
			transition: .5s ease;
			width: 100%;
		}

		.image_area:hover .overlay {
			height: 50%;
			cursor: pointer;
		}

		.image_area2:hover .overlay {
			height: 50%;
			cursor: pointer;
		}

		.text {
			color: #333;
			font-size: 18px;
			position: absolute;
			top: 50%;
			left: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="image_area">
					<form method="post">
						<label for="upload_image">
							<img src="img/imagen.png" id="uploaded_image" class="img-responsive" />
							<div class="overlay">
								<div class="text">Cambiar Imagen</div>
							</div>
							<input type="file" name="image" class="image" id="upload_image" style="display:none" />
							<input type="hidden" name="imageNewCuadrada" id="imageNewCuadrada">
						</label>
					</form>
				</div>
			</div>

			<div class="col-md-8">
				<div class="image_area2">
					<form method="post">
						<label for="upload_image2">
							<img src="img/imagen2.png" id="uploaded_image2" class="img-responsive" />
							<div class="overlay">
								<div class="text">Cambiar Imagen</div>
							</div>
							<input type="file" name="image2" class="image" id="upload_image2" style="display:none" />
							<input type="hidden" name="imageNewRect" id="imageNewRect">
						</label>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal imagen chica -->
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">M 1 Crop Image Before Upload</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="img-container">
						<div class="row">
							<div class="col-md-8">
								<img src="" id="sample_image" />
							</div>
							<div class="col-md-4">
								<div class="preview"></div>
								<div class="input-group" style="width: 80%;margin-bottom:10px;">
									<div class="input-group-addon">Ancho</div>
									<input type="text" class="form-control" id="ancho" placeholder="0">
									<div class="input-group-addon">px</div>
								</div>
								<div class="input-group" style="width: 80%;">
									<div class="input-group-addon">Alto</div>
									<input type="text" class="form-control" id="alto" placeholder="0">
									<div class="input-group-addon">px</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="crop" class="btn btn-primary">Crop</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal imagen grande -->
	<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">M 2 Crop Image Before Upload</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="img-container">
						<div class="row">
							<div class="col-md-8">
								<img src="" id="sample_image2" />
							</div>
							<div class="col-md-4">
								<div class="preview2"></div>
								<div class="input-group" style="width: 80%;margin-bottom:10px;">
									<div class="input-group-addon">Ancho</div>
									<input type="text" class="form-control" id="ancho2" placeholder="0">
									<div class="input-group-addon">px</div>
								</div>
								<div class="input-group" style="width: 80%;">
									<div class="input-group-addon">Alto</div>
									<input type="text" class="form-control" id="alto2" placeholder="0">
									<div class="input-group-addon">px</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="crop2" class="btn btn-primary">Crop</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<script>
	$(document).ready(function() {

		var $modal = $('#modal');
		var image = document.getElementById('sample_image');
		var nombreOriginal;
		var cropper;
		var altoImg;
		var anchoImg;

		$('#upload_image').change(function(event) {
			
			var files = event.target.files;
			
			nombreOriginal = files[0]["name"];
			//console.log(nombreOriginal);

			var done = function(url) {
				image.src = url;
				
				$modal.modal('show');
				
			};

			if (files && files.length > 0) {
				reader = new FileReader();
				reader.onload = function(event) {
					done(reader.result);
				};
				reader.readAsDataURL(files[0]);
			}
		});

		$modal.on('shown.bs.modal', function() {
			cropper = new Cropper(image, {
				aspectRatio: 1,
				viewMode: 3,
				preview: '.preview',
				crop: function(e) {

					$("#alto").val(Math.round(e.detail.height));
					$("#ancho").val(Math.round(e.detail.width));

				}
			});
		}).on('hidden.bs.modal', function() {
			cropper.destroy();
			cropper = null;
		});

		$('#crop').click(function() {
			canvas = cropper.getCroppedCanvas({
				width: 400,
				height: 400
			});

			canvas.toBlob(function(blob) {
				url = URL.createObjectURL(blob);
				var reader = new FileReader();
				reader.readAsDataURL(blob);
				reader.onloadend = function() {
					var base64data = reader.result;
					$.ajax({
						url: 'upload.php',
						method: 'POST',
						data: {
							image: base64data,
							nombre: nombreOriginal
						},
						success: function(data) {
							$modal.modal('hide');
							$('#uploaded_image').attr('src', data);

							var divide = data.split("/");
							var imageUp = divide[3];
							$("#imageNewCuadrada").val(imageUp);
							
						}
					});
				};
			},'image/jpeg', 0.95);

		});

		//------------------------ Segunda Imagen
		var $modal2 = $('#modal2');
		var image2 = document.getElementById('sample_image2');
		var nombreOriginal2;
		var cropper2;
		var altoImg2;
		var anchoImg2;

		$('#upload_image2').change(function(event) {

			
			var files2 = event.target.files;
			
			nombreOriginal2 = files2[0]["name"];
			//console.log(nombreOriginal);

			var done = function(url2) {
				image2.src = url2;
				
				$modal2.modal('show');
				
			};

			if (files2 && files2.length > 0) {
				reader = new FileReader();
				reader.onload = function(event) {
					done(reader.result);
				};
				reader.readAsDataURL(files2[0]);
			}
		});

		$modal2.on('shown.bs.modal', function() {
			cropper2 = new Cropper(image2, {
				aspectRatio: 16/9,
				viewMode: 3,
				preview: '.preview2',
				crop: function(e) {

					$("#alto2").val(Math.round(e.detail.height));
					$("#ancho2").val(Math.round(e.detail.width));

					anchoImg2 = Math.round(e.detail.width);
					altoImg2 = Math.round(e.detail.height);

				}
			});
		}).on('hidden.bs.modal', function() {
			cropper2.destroy();
			cropper2 = null;
		});

		$('#crop2').click(function() {
			console.log(altoImg2);
			canvas = cropper2.getCroppedCanvas({
				width: anchoImg2,
				height: altoImg2
			});

			canvas.toBlob(function(blob) {
				url = URL.createObjectURL(blob);
				var reader = new FileReader();
				reader.readAsDataURL(blob);
				reader.onloadend = function() {
					var base64data = reader.result;
					$.ajax({
						url: 'upload.php',
						method: 'POST',
						data: {
							image: base64data,
							nombre: nombreOriginal2
						},
						success: function(data) {
							$modal2.modal('hide');
							$('#uploaded_image2').attr('src', data);

							var divide = data.split("/");
							var imageUp = divide[3];
							$("#imageNewRect").val(imageUp);
							
						}
					});
				};
			},'image/jpeg', 0.95);

		});

	});
</script>