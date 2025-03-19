<?php
if (isset($_GET["seccion"])) {
	$seccion = $_GET["seccion"];
} else {
	$seccion = "inicio";
}
if (isset($_GET["subseccion"])) {
	$subseccion = $_GET["subseccion"];
} else {
	$subseccion = "";
}
?>
<li <?php if ($seccion=="inicio"): ?>class="active"<?php endif; ?>>
	<a href="home.php?seccion=inicio"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span>  </a>
</li>



<li <?php if ($seccion=="post"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Cursos</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstPost.php?seccion=post">Listar </a></li>
		<li><a href="addPost.php?seccion=post">Agregar </a></li>
	</ul>
</li>

<li <?php if ($seccion=="docentes"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-user"></i> <span class="nav-label">Docentes</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstDoc.php?seccion=docentes">Listar </a></li>
		<li><a href="addDoc.php?seccion=docentes">Agregar </a></li>
	</ul>
</li>

<li <?php if ($seccion=="revistas"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Revistas</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstRevistas.php?seccion=revistas">Listar </a></li>
		<li><a href="addRevistas.php?seccion=revistas">Agregar </a></li>
	</ul>
</li>

<!--<li <?php if ($seccion=="orden"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-database"></i> <span class="nav-label">Orden Post Home</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="ordenPost.php?seccion=orden">Ordenar</a></li>
	</ul>
</li>

<li <?php if ($seccion=="galerias"): ?>class="active"<?php endif; ?>>
    <a href="#"><i class="fa fa-file-photo-o"></i> <span class="nav-label">Galerias</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="lstGalerias.php?seccion=galerias">Listar </a></li>
        <li><a href="addGaleria.php?seccion=galerias">Agregar </a></li>
    </ul>
</li>-->

<li <?php if ($seccion=="cdirectiva"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-group"></i> <span class="nav-label">Comisión</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstDir.php?seccion=cdirectiva">Listar </a></li>
		<li><a href="addDir.php?seccion=cdirectiva">Agregar </a></li>
	</ul>
</li>

<li <?php if ($seccion=="socios"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-certificate"></i> <span class="nav-label">Socios</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstSocios.php?seccion=socios">Listar </a></li>
		<li><a href="addSocios.php?seccion=socios">Agregar </a></li>
	</ul>
</li>



<li <?php if ($seccion=="alianzas" || $seccion=="intalianzas" || $seccion=="correlatcarreras"): ?>class="active"<?php endif; ?>>
		<a href="#"><i class="fa fa-puzzle-piece"></i> <span class="nav-label">Alianzas</span> <span class="fa arrow"></span></a>
		<ul class="nav nav-second-level collapse">
				<li <?php if ($seccion=="alianzas"): ?>class="active"<?php endif; ?>>
						<a href="#"><i class="fa fa-puzzle-piece"></i> <span class="nav-label">Alianzas Info</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-third-level">
							<li><a href="lstInfAlian.php?seccion=alianzas">Listar</a></li>
							<li><a href="addInfAlian.php?seccion=alianzas">Agregar</a></li>
						</ul>
				</li>

				<li <?php if ($seccion=="intalianzas"): ?>class="active"<?php endif; ?>>
						<a href="#"><i class="fa fa-puzzle-piece"></i> <span class="nav-label">Integrantes</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-third-level">
							<li><a href="lstIntAlianz.php?seccion=intalianzas">Listar</a></li>
							<li><a href="addIntAlianz.php?seccion=intalianzas">Agregar</a></li>
						</ul>
				</li>

				
		</ul>
</li>

<li <?php if ($seccion=="textos"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-font"></i> <span class="nav-label">Textos</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstTextos.php?seccion=textos">Listar</a></li>
	</ul>
</li>

<li <?php if ($seccion=="archivos"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-folder"></i> <span class="nav-label">Archivos</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstArchivos.php?seccion=archivos">Listar </a></li>
		<li><a href="addArchivos.php?seccion=archivos">Agregar </a></li>
	</ul>
</li>

<li <?php if ($seccion=="scf23"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Seminario CF 2023</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstScfin.php?seccion=scf23">Listar </a></li>
	</ul>
</li>


<li <?php if ($seccion=="usuarios"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-male"></i> <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstUsuarios.php?seccion=usuarios">Listar </a></li>
		<li><a href="addUsuario.php?seccion=usuarios">Agregar </a></li>
	</ul>
</li>
