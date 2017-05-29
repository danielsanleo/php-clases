<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Pruebas</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
		
		<script src="js/jquery-3.1.1.min.js"></script>
		<style type="text/css">
			body {
			background: url(images/fondo-web.jpg) no-repeat center center fixed;
			}
		</style>
	</head>
	<body style="margin:0px;padding:0px;">
		<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td bgcolor="#FFFFFF" style="border-left:1px solid #f0050a;border-right:1px solid #f0050a;"><a href="menu.php"><img src="images/cabecera-gestor.png" alt="Gestion de partes" width="960" border="0" /></a></td>
			</tr>
			<tr>
				<td class="bordeLateral">
					<div class="menu_botones_arriba">
						<div id="menu_botones_up">
							<span class="icono-salir"><a href="salir.php">Cerrar</a></span>  
							<span class="icono-perfil"><a href="menu.php?action=admin-perfil">Settings</a></span>
							<span class="icono-menu"><a href="menu.php">Menú</a></span>
							<div style="float:left;" class="textosuperior">Bienvenido/a</div>
							<div class="limpiar"></div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF" class="bordeLateral">
					<?php
					require("./clase_base.php");
					$base = new base('config.php');
					
					$base -> tabla_imagen = "images/icono-compras.png"; 
					
					$base -> consulta = "SELECT id_operador AS ID, codigo_postal, nombre, direccion, activo, id AS Eliminar FROM llamadas WHERE activo=1";
					
					$base -> migasdepan = 1;
					$base -> migas = array('Menú' => 'menu.php', 'Listado Compras' => '');
					
					$base -> tabla_titulo = "<span class='departamento'>Compras &raquo Listado de compras</span>";
					
					$base -> tabla_ruta = 'menu.php?action=admin-compras-listado';
					
					$base -> orden_predeterminado = array(1 => 'ASC', 2 => 'ASC');
					$base -> ordenar = array(1 => 'DESC', 2 => 'DESC');
					$base -> orden_anidado = 0;
					
					$enlace = 'Direccion';
					$base -> columna = array($enlace => 'enlace', 4 => 'enlace', 5 => 'desactivar');
					
					$base -> enlace_title = array($enlace => "Ver compra", 4 => "Editar");
					$base -> enlace_img = array($enlace => "images/ver.png", 4 => "images/boton-modificar.png");
					$base -> enlace_url = array($enlace => "menu.php?action=admin-compras-ver&id=", 4 => "menu.php?action=admin-compras-ficha&id=");
					$base -> enlace_nueva_ventana = array($enlace => false,4 => false);
					
					$base -> eliminar_columna = 'id';
					$base -> eliminar_tabla = 'llamadas';
					
					$base -> desactivar = True;
					$base -> desactivar_tabla = 'llamadas';
					$base -> desactivar_columna = 'activo';
					$base -> desactivar_valor = 0;
					$base -> desactivar_id = 'id';
					$base -> desactivar_imagen = 'images/boton-eliminar.png';
					$base -> desactivar_alt = 'Eliminar';
					$base -> desactivar_texto_confirmar = '¿Seguro que quiere eliminarlo?';
					
					$base -> menu = false;
					$base -> menu_url = array('1' => 'menu.php?action=admin-proveedores-gestion');
					$base -> menu_imagen = array( 1 => "images/boton-nuevo-proveedor.png");

					$base -> mostrar_total_registros = 1;
					
					$base -> pagesize = 15;

					$base -> footer = 1;
					$base -> radio_inferior = 1;
					$base -> tabla();
				?>
	</body>
</html>
