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

					$base -> debug = True; 
					$base -> abcedario = True; 
					$base -> buscar = False; 

					$base -> tabla_imagen = "images/icono-compras.png"; 

					$base -> consulta = "SELECT referencia, 
												articulos.nombre, 
												fabricantes.nombre AS Fabricante, 
												subfamilias.nombre, 
												familias.nombre,  
												descripcion, 
												articulos.id as Ficha, 
												articulos.id as Editar, 
												articulos.id as Eliminar 
												FROM articulos INNER JOIN fabricantes ON articulos.id_fabricante=fabricantes.id 
															   INNER JOIN subfamilias ON articulos.id_subfamilia=subfamilias.id  
															   INNER JOIN familias ON subfamilias.id_familia=familias.id 
												WHERE articulos.activo=0";


					$buscar_ref = 1;
					$buscar_nombre = 2;
					$select_fab = 3;
					$select_sub = 4;
					$select_fam = 5;
					
					$base -> filtros = array($buscar_ref => 'buscar', 
											 $buscar_nombre => 'buscar',
											 $select_fab => 'select', 
											 $select_sub => 'select', 
											 $select_fam => 'select'); 
											 
					$base -> filtros_texto = array($buscar_ref => 'Descripcion', 
												   $buscar_nombre => 'Nombre',
												   $select_fab => 'Fabricante', 
												   $select_sub => 'Subfamilia', 
												   $select_fam => 'Familia');
												   
					$base -> filtros_nombre = array($buscar_ref => 'descripcion', 
													$buscar_nombre => 'nombre',
													$select_fab => 'categoria', 
													$select_sub => 'subfamilia', 
													$select_fam => 'familia');
													
					$base -> filtros_consultas = array($select_fab => 'SELECT id, nombre FROM fabricantes', 
													   $select_sub => 'SELECT id, nombre FROM subfamilias', 
													   $select_fam => 'SELECT id, nombre FROM familias');
													   
					$base -> filtros_where = array($buscar_ref => array('referencia', 'descripcion'), 
												   $buscar_nombre => 'articulos.nombre',
												   $select_fab => 'id_fabricante', 
												   $select_sub => 'id_subfamilia', 
												   $select_fam => 'familias.id');
												   
					$base -> filtros_where_tipo = array($buscar_ref => 'LIKE', 
														$buscar_nombre => 'LIKE', 
														$select_fab => '=', 
														$select_sub => '=', 
														$select_fam => '=');
														
					$base -> filtros_boton_buscar = True;
					

					$base -> migasdepan = 1;
					$base -> migas = array('Menú' => 'menu.php', 'Listado Familias' => '');

					$base -> tabla_titulo = "Familias &raquo Listado de Familias";
					$base -> tabla_ruta = 'menu.php?action=admin-familias-listado';

					$base -> orden_predeterminado = array(0 => 'ASC');
					$base -> ordenar = array(0 => 'DESC');
					$base -> orden_anidado = 0;

					$editar = 'Editar';
					$eliminar = 'Eliminar';
					$base -> columna = array($eliminar => 'enlace', $editar => 'enlace', 'Subfamilias' => 'lista');
					
					$base -> lista_consulta = "SELECT nombre FROM subfamilias WHERE id_familia=";
						
					$base -> enlace_title = array($editar => "Editar", $eliminar => "Eliminar");
					$base -> enlace_img = array($editar => "images/icono-add.png", $eliminar => "images/icono-eliminar.png");
					$base -> enlace_url = array($editar => "menu.php?action=admin-familias-gestion&id=", $eliminar => "menu.php?action=admin-familias-listado&eliminar&id=");
					$base -> enlace_nueva_ventana = array($editar => false, $eliminar => false);

					$base -> eliminar_columna = 'id';
					$base -> eliminar_tabla = 'familias';

					$base -> menu = True;
					$base -> menu_url = array(1 => 'menu.php?action=admin-familias-gestion', 2 => 'menu.php?action=admin-subfamilias-gestion');
					$base -> menu_imagen = array(1 => "images/boton-nuevo-articulo.png", 2 => "images/boton-nuevo-articulo.png");

					$base -> mostrar_total_registros = 1;

					$base -> pagesize = 15;

					$base -> footer = 1;
					$base -> radio_inferior = 1;
					$base -> tabla();
				?>
	</body>
</html>
