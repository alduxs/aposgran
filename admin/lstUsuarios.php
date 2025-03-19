<?php
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
//
include_once('includes/class.inc.php');
//

//
$link = Conectarse();
$objContenido = new Usuarios();
$rsCont = $objContenido->getAllUsers($link);
//
if (isset($_GET["intPageId"])) {
	$intPageId = $_GET["intPageId"];
} else {
	$intPageId="";
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
$rsCont = $objContenido->getAllUsersPaginados($link,$arrData);
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
					<h2>Listar Usuarios</h2>
					<ol class="breadcrumb">
						<li><a href="home.php?seccion=inicio">Home</a></li>
						<li><a href="#">Usuarios</a></li>
						<li class="active"><strong>Listar usuarios</strong></li>
					</ol>
				</div>
			</div>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-content">
								<form name="frm" method="post" action="svUsuarios.php">
									<input type="hidden" name="intIdRegistro" value="" />
									<input type="hidden" name="strDb" value="" />
									<input type="hidden" name="intPageId" value="" />
									<input type="hidden" name="strOperacion" value="D" />
									<table class="table table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>Usuario</th>
												<th>Nombre Completo</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php $intCounter = 0; ?>
											<?php if ($intQtyRecords > 0) { ?>
												<?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
													<tr>
														<td><?php echo $arrContenido["id_usuario"]; ?></td>
														<td><?php echo $arrContenido["ds_usuario"]; ?></td>
														<td><?php echo $arrContenido["ds_nombre"]; ?> <?php echo $arrContenido["ds_apellido"]; ?></td>
														<td class="tooltip-demo">
															<a href="updUsuarios.php?seccion=usuarios&id=<?php echo $arrContenido["id_usuario"]; ?>&intPageId=<?php echo $intPageId ?>" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil"></i></a>
															<a href="javascript:;" onclick="delRegistro('<?php echo $arrContenido["id_usuario"]?>','usuarios','<?php echo $intPageId ?>')" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="fa fa-trash-o"></i></a>
														</td>
													</tr>
													<?php $intCounter++; ?>
												<?php } ?>
											<?php } else {?>
												<tr>
													<td colspan="4">No hay registros para mostrar.</td>
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
						<?php echo printPaginado("lstUsuarios.php", $intQtyPages, $intPage, "usuarios");?>
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
