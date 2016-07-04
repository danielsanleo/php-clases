<!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
		 <link rel="stylesheet" href="animate.css">
	</head>
	
	
	<body>
		<?php
		
		  include('clase_base.php');
		  $base = new base;
			
		  
		  $base -> consulta = 'SELECT codigo_postal,ciudad,id as Ficha,id as Eliminar  from llamadas limit 1,10';
		  
		  $base -> table_titulo = '<a href="menu.php?action=sub-datos">Listado</a> &raquo; Oficinas';
		  $base -> table_width = '100%';
		  $base -> table_ruta = "menu.php?action=admin-oficinas-listado";
		  
		  $base -> td_img_ficha = 'images/ico-ficha.png';
		  
		  $base -> td_class_columna = 'textoBlanco';
		  $base -> td_class_fila = 'texto';
		  $base -> tabla_mensaje_class = 'bordeExterior';
		  
		  $base -> tabla_primera_width = '30%';
		  
		  
		  
		  $base -> boton_type ='submit';
		  $base -> boton_name ='enlace';
		  $base -> eliminar_tabla = 'llamadas';
		  
		  $base -> columna = array('1' => 'imagen','3' => 'eliminar');
		  
		  $base -> animacion = array('1' => 'fadeIn', '2' => 'fadeIn', '3' => 'fadeIn' ,'0' => 'fadeIn'  );
		  
		  $base -> ruta_ficha='menu.php?action=admin-oficinas-gestion&id=';
		  $base -> nuevo_registro=1;
		  $base -> url_nuevo='prueba-gestion.php';
		  
		  $base -> tabla();
		
		
		

    

		
		
		?>
	</body>
</html>
