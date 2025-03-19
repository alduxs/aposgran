<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
//
include_once('includes/class.inc.php');
//
$link = Conectarse();

$objContenido = new General();
$query = "SELECT * FROM archivos";
$rsCont = $objContenido->getAllContenido($link, $query);
//
if (isset($_GET["intPageId"])) {
	$intPageId = $_GET["intPageId"];
} else {
	$intPageId = "";
}
//
if ($intPageId == "") {
	$arrData[0] = 0;
	$intPage = 1;
} else {
	$arrData[0] = ((sanInt($_GET["intPageId"]) - 1) * _CONST_PAGINADO_);
	$intPage = sanInt($_GET["intPageId"]);
}
//
$arrData[1] = _CONST_PAGINADO_;
//ALMACENO EL TOTAL DE REGISTROS
$intQtyRecords = $rsCont->rowCount();
//
//CALCULO EL TOTAL DE PAGINAS
$intQtyPages = ceil($intQtyRecords / _CONST_PAGINADO_);
//HAGO NUEVAMENTE LA CONSULTA PERO YA CON EL LIMIT SETEADO
$query = "SELECT * FROM archivos ORDER BY id DESC, nombre ASC LIMIT ?,?";
$rsCont = $objContenido->getAllContenidoPG($link, $arrData, $query);
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>


<body>

	<div id="wrapper">
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav metismenu" id="side-menu">
					<?php include_once('includes/columnaTop.inc.php'); ?>
					<?php include_once('includes/columnaLeft.inc.php'); ?>
				</ul>
			</div>
		</nav>
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li><a href="logout.php"><i class="fa fa-sign-out"></i> Log out</a></li>
					</ul>
				</nav>
			</div>
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-sm-12">
					<h2>Listar Archivos</h2>
					<ol class="breadcrumb">
						<li><a href="home.php?seccion=inicio">Home</a></li>
						<li><a href="#">Archivos</a></li>
						<li class="active"><strong>Listar archivos</strong></li>
					</ol>
				</div>
			</div>


			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">

					<div class="col-lg-12 animated fadeInRight">

						<form name="frm" method="post" action="svArchivos.php">
							<input type="hidden" name="intIdRegistro" value="" />
							<input type="hidden" name="strDb" value="" />
							<input type="hidden" name="Archivo" value="" />
							<input type="hidden" name="intPageId" value="" />
							<input type="hidden" name="strOperacion" value="D" />
							<div class="row">
								<div class="col-lg-12">
									<?php $intCounter = 0; ?>
									<?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
										<?php if ($arrContenido["tipo"] == 2) { ?>
											<div class="file-box">
												<div class="file">
													<a href="<?php echo _CONST_DOMINIO_ . "assets/archivos/" ?><?php echo $arrContenido["archivo"]; ?>" target="_blank">
														<span class="corner"></span>

														<div class="icon">
															<i class="fa fa-file"></i>
														</div>
														<div class="file-name">
															<?php if ($arrContenido["nombre"] != "") { ?>
																<?php echo $arrContenido["nombre"]; ?>
															<?php } else { ?>
																Sin título
															<?php } ?>
															<!--<br>
															<small>Added: Jan 11, 2014</small>-->

														</div>
													</a>
													
													<div class="url">
                                                        <small><strong>URL:</strong> <?php echo _CONST_DOMINIO_."assets/archivos/" ?><?php echo $arrContenido["archivo"]; ?> </small>
                                                    </div>
															
													<div class="bucket">
														<a href="javascript:;" onclick="delRegistro('<?php echo $arrContenido["id"] ?>','<?php echo $arrContenido["archivo"] ?>','archivos',<?php echo $intPageId ?>);" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="fa fa-trash-o"></i></a>
													</div>

												</div>

											</div>
										<?php } else if ($arrContenido["tipo"] == 1) { ?>
											<div class="file-box">
												<div class="file">
													<a href="<?php echo _CONST_DOMINIO_ . "assets/archivos/" ?><?php echo $arrContenido["archivo"]; ?>" target="_blank">
														<span class="corner"></span>

														<div class="image">
															<img alt="image" class="img-responsive" src="<?php echo _CONST_DOMINIO_ . "assets/archivos/" ?><?php echo $arrContenido["archivo"]; ?>">
														</div>
														<div class="file-name">
															<?php if ($arrContenido["nombre"] != "") { ?>
																<?php echo $arrContenido["nombre"]; ?>
															<?php } else { ?>
																Sin título
															<?php } ?>
															<!--<br>
															<small>Added: Jan 6, 2014</small>-->

														</div>
													</a>
													<div class="url">
                                                        <small><strong>URL:</strong> <?php echo _CONST_DOMINIO_."assets/archivos/" ?><?php echo $arrContenido["archivo"]; ?> </small>
                                                    </div>
															
													<div class="bucket">
														<a href="javascript:;" onclick="delRegistro('<?php echo $arrContenido["id"] ?>','<?php echo $arrContenido["archivo"] ?>','archivos',<?php echo $intPageId ?>);" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="fa fa-trash-o"></i></a>
													</div>
												</div>
											</div>
										<?php } ?>
										<?php $intCounter++; ?>
									<?php } ?>




								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- Paginación -->
				<div class="row">
					<div class="col-lg-12 paginador">
						<?php echo printPaginado("lstArchivosf.php", $intQtyPages, $intPage, "archivosf"); ?>
					</div>
				</div>
			</div>


			<div class="footer">
				<div>&copy; 2014 - <?php echo date("Y") ?></div>
			</div>
		</div>
	</div>

	<!-- Mainly scripts -->
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Custom and plugin javascript -->
	<script src="js/inspinia.js"></script>
	<script src="js/plugins/pace/pace.min.js"></script>
	<script type="text/javascript">
		function delRegistro(pIdRegistro, pDsArchivo, strDb, intPageId) {
			if (!window.confirm("Esta seguro que desea borrar este registro?")) {
				return;
			} else {
				document.frm.intIdRegistro.value = pIdRegistro;
				document.frm.strDb.value = strDb;
				document.frm.Archivo.value = pDsArchivo;
				document.frm.intPageId.value = intPageId;
				document.frm.submit();
			}
		}
	</script>
</body>

</html>