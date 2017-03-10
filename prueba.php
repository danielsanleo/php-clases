<?php
  // SI NO SE TIENEN PERMISOS
  if ($clase_usuarios->login()!=true)
  {
    require_once("includes/acceso-restringido.php");
  }
  else {
		require("clases/clase_base.php");
		$base = new base;
		
		$base -> ruta_archivo_config = "../config.php"; 
		
		$base -> tabla_imagen = "images/icono-compras.png"; 
		
		$base -> consulta = "SELECT id as clave_primaria, n_compra AS 'Nº Compra', fecha AS Fecha ,id AS 'Ver', id as Editar FROM compras";
		
		$base -> migasdepan = 1;
		$base -> migas = array('Menú' => 'menu.php', 'Listado Compras' => '');
		
		$base -> tabla_titulo = "<span class='departamento'>Compras &raquo Listado de compras</span>";
		
		$base -> tabla_ruta = 'menu.php?action=admin-compras-listado';
		
		$base -> columna = array(0 => 'clave_primaria', 2 => 'fecha', 3 => 'enlace', 4 => 'enlace');
		
		$base -> enlace_title = array(3 => "Ver compra", 4 => "Editar");
		$base -> enlace_img = array(3 => "images/ver.png", 4 => "images/boton-modificar.png");
		$base -> enlace_url = array(3 => "menu.php?action=admin-compras-ver&id=", 4 => "menu.php?action=admin-compras-ficha&id=");
		$base -> enlace_nueva_ventana = array(3 => false,4 => false);
		
		$base -> menu = false;
		$base -> menu_url = array('1' => 'menu.php?action=admin-proveedores-gestion');
		$base -> menu_imagen = array( 1 => "images/boton-nuevo-proveedor.png");

		$base -> paginacion = 1;
		$base -> pagesize = 10;

		$base -> footer = 1;
		$base -> radio_inferior = 0;
		$base -> tabla();
  }
?>
