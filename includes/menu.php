<?php
$queryMn1 = "SELECT * FROM alianzas WHERE al_publicado = 1 ORDER BY al_nombre ASC, al_id ASC";
$rsContMn1 = $objContenido->getAllContenido($link, $queryMn1);
//TEXTO AÑO
$queryTxtAnio = "SELECT * FROM textos WHERE txt_id = 9";
$rsContTxtAnio = $objContenido->getAllContenido($link, $queryTxtAnio);
$arrTxtAnio = $rsContTxtAnio->fetch(PDO::FETCH_BOTH);
?>
<div class="navbar navbar-fixed-top px-0">
  <div class="navbar-inner">

    <!-- Navigation -->
    <nav class="nav-collapse">
      <ul class="nav menu-c">

        <li class="lifirst"><a href="<?php echo _CONST_DOMINIO_ ?>quienes-somos" class="afirst">Quienes Somos</a></li>

        <li class="dropdown lifirst">
          <a href="#" class="dropdown-toggle afirst afirst-first" data-toggle="dropdown">Cursos</a>

          <ul class="dropdown-menu mega-menu mega-menu-sl">

            <li class="mega-menu-column colum-menu-1 lia" style="margin-top: 10px;width: 100%;">
              <ul>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>cursos/in-company"><i class="fas fa-caret-right"></i> In Company</a></li>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>cursos/agenda"><i class="fas fa-caret-right"></i> Agenda <?php echo $arrTxtAnio["txt_col_1"]; ?></a></li>

              </ul>
            </li>

          </ul><!-- dropdown-menu -->

        </li><!-- /.dropdown -->

        

        <li class="lifirst"><a href="<?php echo _CONST_DOMINIO_ ?>revistas" class="afirst">Revistas</a></li>

        <li class="dropdown lifirst">
          <a href="#" class="dropdown-toggle afirst" data-toggle="dropdown">Seminarios</a>

          <ul class="dropdown-menu mega-menu mega-menu-sl">

            <li class="mega-menu-column colum-menu-1 lia" style="margin-top: 10px;width: 100%;">
              <ul>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>seminarios/cosecha-fina"><i class="fas fa-caret-right"></i> Cosecha Fina</a></li>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>seminarios/cosecha-gruesa"><i class="fas fa-caret-right"></i> Cosecha Gruesa</a></li>
              </ul>
            </li>

          </ul><!-- dropdown-menu -->

        </li><!-- /.dropdown -->

        <li class="dropdown lifirst">
          <a href="#" class="dropdown-toggle afirst" data-toggle="dropdown">Alianzas</a>


          <ul class="dropdown-menu mega-menu mega-menu-sl">

            <li class="mega-menu-column colum-menu-1 lia" style="margin-top: 10px;width: 100%;">
              <ul>
                <?php while ($arrContenidoMn1 = $rsContMn1->fetch(PDO::FETCH_BOTH)) { ?>
                  <li><a href="<?php echo _CONST_DOMINIO_ ?>alianzas/<?php echo $arrContenidoMn1["al_id"]; ?>/<?php echo buildLink($arrContenidoMn1["al_nombre"]) ; ?>"><i class="fas fa-caret-right"></i> <?php echo $arrContenidoMn1["al_nombre"]; ?></a></li>
                <?php } ?>

              </ul>
            </li>

          </ul><!-- dropdown-menu -->

        </li>

        <li class="dropdown lifirst">
          <a href="#" class="dropdown-toggle afirst" data-toggle="dropdown">Socios</a>

          <ul class="dropdown-menu mega-menu mega-menu-sl">

            <li class="mega-menu-column colum-menu-1 lia" style="margin-top: 10px;width: 100%;">
              <ul>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>socios/formar-parte"><i class="fas fa-caret-right"></i> Formar parte</a></li>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>socios/beneficios"><i class="fas fa-caret-right"></i> Beneficios</a></li>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>socios/nuestros-socios"><i class="fas fa-caret-right"></i> Nuestros Socios</a></li>
              </ul>
            </li>

          </ul><!-- dropdown-menu -->

        </li><!-- /.dropdown -->

      </ul><!-- /.nav -->
    </nav>
    <!--/.nav-collapse -->

  </div><!-- /.nav-inner -->
</div>