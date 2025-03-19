<?php
$queryMn2 = "SELECT * FROM alianzas WHERE al_publicado = 1 ORDER BY al_nombre ASC, al_id ASC";
$rsContMn2 = $objContenido->getAllContenido($link, $queryMn2);
//TEXTO AÑO
$queryTxtAnio2 = "SELECT * FROM textos WHERE txt_id = 9";
$rsContTxtAnio2 = $objContenido->getAllContenido($link, $queryTxtAnio2);
$arrTxtAnio2 = $rsContTxtAnio2->fetch(PDO::FETCH_BOTH);
?>
<div class="menu-responsive">
  <ul>
    <li id="m-1"><a href="<?php echo _CONST_DOMINIO_ ?>quienes-somos">Quiénes somos</a></li>

    <li class="menu-res"><span id="m-2">Cursos</span>
      <ul id="mm-2">
        <li><a href="<?php echo _CONST_DOMINIO_ ?>cursos/in-company">In Company</a></li>
        <li><a href="<?php echo _CONST_DOMINIO_ ?>cursos/agenda">Agenda <?php echo $arrTxtAnio2["txt_col_1"]; ?></a></li>
      </ul>
    </li>

    <li id="m-3"><a href="<?php echo _CONST_DOMINIO_ ?>revista">Revistas</a></li>

    <li class="menu-res"><span id="m-4">Seminarios</span>
      <ul id="mm-4">
        <li><a href="<?php echo _CONST_DOMINIO_ ?>seminarios/cosecha-fina">Cosecha Fina</a></li>
        <li><a href="<?php echo _CONST_DOMINIO_ ?>seminarios/cosecha-gruesa">Cosecha Gruesa</a></li>
      </ul>
    </li>

    <li  class="menu-res"><span id="m-5">Alianzas</span>
      <ul id="mm-5">
        <?php while ($arrContenidoMn2 = $rsContMn2->fetch(PDO::FETCH_BOTH)) { ?>
          <li><a href="<?php echo _CONST_DOMINIO_ ?>alianzas/<?php echo $arrContenidoMn2["al_id"]; ?>/<?php echo buildLink($arrContenidoMn2["al_nombre"]); ?>"><?php echo $arrContenidoMn2["al_nombre"]; ?></a></li>
        <?php } ?>
      </ul>
    </li>

    <li class="menu-res"><span id="m-6">Socios</span>
      <ul id="mm-6">
        <li><a href="<?php echo _CONST_DOMINIO_ ?>socios/formar-parte">Formar parte</a></li>
        <li><a href="<?php echo _CONST_DOMINIO_ ?>socios/beneficios">Beneficios</a></li>
        <li><a href="<?php echo _CONST_DOMINIO_ ?>socios/nuestros-socios">Nuestros Socios</a></li>
      </ul>
    </li>

  </ul>

</div>