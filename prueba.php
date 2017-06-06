<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Pruebas</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
		
		<script src="js/jquery-3.1.1.min.js"></script>
		
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		
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
					require("clase_base.php");
					
					$base = new base('config.php');
					$base -> debug = True; 
					
					$base -> abcedario = False; 
					$base -> buscar = False; 

					$base -> tabla_imagen = "images/icono-almacen.png"; 

					$base -> consulta = "SELECT almacenes.nombre, 
												articulos.referencia, 
												accion AS 'Entrada/Salida', 
												cantidad AS Uds, 
												movimientos.fecha,
												movimientos.id AS Eliminar
										 FROM movimientos INNER JOIN almacenes ON movimientos.id_almacen=almacenes.id 
														  INNER JOIN articulos ON movimientos.id_articulo=articulos.id";
					$buscar_ref = 1;
					$buscar_cantidad = 2;
					$select_entrada = 3;
					$select_almacen = 4;

					$base -> filtros = array($buscar_ref => 'periodo'); 
											 
					$base -> filtros_texto = array($buscar_ref => 'Fechas');
													
					//~ $base -> filtros_consultas = array($select_almacen => 'SELECT id, nombre FROM almacenes WHERE activo=0 ORDER BY id DESC');
													
					$base -> filtros_where = array($buscar_ref => 'movimientos.fecha');
					$base -> filtros_where_tipo = array();
					$base -> filtros_boton_buscar = True;
					
					$base -> migasdepan = 1;
					$base -> migas = array('Menú' => 'menu.php', 'Listado Entradas/Salidas' => '');

					$base -> tabla_titulo = "Almacen &raquo Listado de Entradas/Salidas";

					$base -> orden_predeterminado = array(4 => 'ASC');
					$base -> ordenar = array(0 => 'DESC', 1 => 'DESC', 2 => 'DESC', 3 => 'DESC', 4 => 'DESC');
					$base -> orden_anidado = 0;

					$fecha = 'Fecha';
					$eliminar = 'Eliminar';
					$entrada = 'Entrada/Salida';
					$base -> columna = array($fecha => 'fecha', $eliminar => 'eliminar', $entrada => 'estado');

					$base -> estados = array(0 => 'Entrada', 1 => 'Salida');

					$base -> eliminar = 1;
					$base -> eliminar_columna = 'id';
					$base -> eliminar_tabla = 'movimientos';
					$base -> eliminar_imagen = 'images/icono-eliminar.png';
					
					$base -> fecha_formato_entrada = 'Y-m-d H:i:s';
					$base -> fecha_formato_salida = 'd/m/Y \a \l\a\s H:i';

					$base -> enlace_nueva_ventana = array($eliminar => false);

					$base -> menu = True;
					$base -> menu_url = array(1 => 'menu.php?action=admin-movimientos-gestion&entrada', 2 => 'menu.php?action=admin-movimientos-gestion&salida');
					$base -> menu_imagen = array(1 => "images/boton-entrada.png", 2 => "images/boton-salida.png");

					$base -> mostrar_total_registros = 1;

					$base -> pagesize = 50;

					$base -> footer = 1;
					$base -> radio_inferior = False;
					$base -> tabla();
					?>
	</body>
</html>
