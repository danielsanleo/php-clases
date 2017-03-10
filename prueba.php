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
		
		$base -> tabla_imagen = "images/icono-productos.png"; 
		
		$base -> consulta = "SELECT id as clave_primaria, nombre, email AS Correo, fecha, id AS Editar, id AS Eliminar  FROM proveedores";
		
		$base -> migasdepan = 1;
		$base -> migas = array('Menú' => 'menu.php', 'Listado Proveedores' => '');
		
		$base -> tabla_titulo = "<span class='departamento'>Proveedores &raquo Listado de proveedores</span>";
		
		$base -> ficha_url = "menu.php?action=admin-proveedores-gestion&id=";
		
		$base -> tabla_ruta = 'menu.php?action=admin-proveedores-listado';
		
		$base -> columna = array(0 => 'clave_primaria', 3 => 'fecha', 4 => 'enlace', 5 => 'eliminar');
		
		$base -> eliminar_columna = 'id';
		$base -> eliminar_tabla = 'proveedores';
		$base -> eliminar_imagen = "images/boton-eliminar.gif";
		
		$base -> enlace_title = array(4 => "Editar");
		$base -> enlace_img = array(4 => "images/boton-modificar.png");
		$base -> enlace_url = array(4 => "menu.php?action=admin-proveedores-gestion&id=");
		
		$base -> ficha_img = "images/boton-modificar.png ";
		
		$base -> menu = 1;
		$base -> menu_url = array('1' => 'menu.php?action=admin-proveedores-gestion');
		$base -> menu_imagen = array( 1 => "images/boton-nuevo-proveedor.png");
		
		$base -> paginacion = 1;
		$base -> pagesize = 10;
		
		$base -> footer = 1;
		$base -> radio_inferior = 0;
		$base -> tabla();
  }
?>
