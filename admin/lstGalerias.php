<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
//
include_once('includes/class.inc.php');
//
$link = Conectarse();
$objContenido = new General();
$query = "SELECT * FROM geleriasg";
$rsCont = $objContenido->getAllContenido($link,$query);
//
if (isset($_GET["intPage"])) {
	$intPage = $_GET["intPage"];
} else {
	$intPage="";
}
//
if ($intPage == "") {
	$arrData[0] = 0;
	$intPage = 1;
} else {
	$arrData[0] = ((sanInt($_GET["intPage"]) - 1) * _CONST_PAGINADO_);
	$intPage = sanInt($_GET["intPage"]);
}
//
$arrData[1] = _CONST_PAGINADO_;
//ALMACENO EL TOTAL DE REGISTROS
$intQtyRecords = $rsCont->rowCount();
//
//CALCULO EL TOTAL DE PAGINAS
$intQtyPages = ceil($intQtyRecords / _CONST_PAGINADO_);
//HAGO NUEVAMENTE LA CONSULTA PERO YA CON EL LIMIT SETEADO
$query = "SELECT * FROM geleriasg ORDER BY galeria_publicada DESC,galeria_id DESC LIMIT ?,?";
$rsCont = $objContenido->getAllContenidoPG($link,$arrData,$query);
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
	<link href="css/estilos.css" rel="stylesheet">
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
					<h2>Listar Galerías</h2>
					<ol class="breadcrumb">
						<li><a href="home.php?seccion=inicio">Home</a></li>
						<li><a href="#">Galerías</a></li>
						<li class="active"><strong>Listar galerías</strong></li>
					</ol>
				</div>
			</div>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-content">
								<form name="frm" method="post" action="svGalerias.php">
									<input type="hidden" name="intIdRegistro" value="" />
									<input type="hidden" name="strDb" value="" />
									<input type="hidden" name="intPageId" value="" />
									<input type="hidden" name="strOperacion" value="D" />
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Publicada</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php $intCounter = 0; ?>
											<?php if ($intQtyRecords > 0) { ?>
												<?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
													<tr>
														<td><?php echo $arrContenido["galeria_nombre"]; ?></td>
														<td><?php if ($arrContenido["galeria_publicada"]==0) { ?><a href="#" class="btn btn-default btn-circle"><i class="fa fa-check"></i></a><?php } else { ?><a href="#" class="btn btn-info btn-circle"><i class="fa fa-check"></i></a><?php } ?></td>
														<td class="tooltip-demo">
															<a href="insertImagen.php?seccion=galerias&id_galeria=<?php echo $arrContenido["galeria_id"]; ?>&intPageId=<?php echo $intPage ?>" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Agregar Imágenes"><i class="fa fa-picture-o"></i></a>
															<a href="updGaleria.php?seccion=galerias&id=<?php echo $arrContenido["galeria_id"]; ?>&intPageId=<?php echo $intPage ?>" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil"></i></a>
															<a href="javascript:;" onclick="delRegistro('<?php echo $arrContenido["galeria_id"]?>','galerias',<?php echo $intPage ?>);" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="fa fa-trash-o"></i></a>
														</td>
													</tr>
													<?php $intCounter++; ?>
												<?php } ?>
											<?php } else {?>
												<tr>
													<td colspan="3">No hay registros para mostrar.</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Paginación -->
				<div class="row">
					<div class="col-lg-12 paginador">
						<?php echo printPaginado("lstGalerias.php", $intQtyPages, $intPage, "galerias");?>
					</div>
				</div>
			</div>
			<div class="footer">
				<div>&copy; 2014 - <?php echo date ("Y") ?></div>
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
	function delRegistro(pIdRegistro,strDb,intPageId){
		console.log("ok");
		if (!window.confirm("Esta seguro que desea borrar este registro?")){
			return;
		}
		else{
			document.frm.intIdRegistro.value = pIdRegistro;
			document.frm.strDb.value = strDb;
			document.frm.intPageId.value = intPageId;
			document.frm.submit();
		}
	}
	</script>
</body>
</html>
