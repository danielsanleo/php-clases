<!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
	</head>
	<body>
		<?php
	  include('clases/clase_base.php');
	  $base = new base;
	  
	  $base -> consulta = 'SELECT codigo_postal,ciudad,id as Ficha from llamadas limit 2,10';
	  
	  $base -> table_titulo = '<a href="menu.php?action=sub-datos">Listado</a> &raquo; Oficinas';
	  $base -> table_width = '100%';
	  $base -> table_ruta = "menu.php?action=admin-oficinas-listado";
	  
	  $base -> td_img_ficha = 'images/ico-ficha.png';
	  
	  $base -> td_class_columna = 'textoBlanco';
	  $base -> td_class_fila = 'texto';
	  $base -> table_mensaje_class = 'bordeExterior';
	  
	  
	  $base -> boton_type ='submit';
	  $base -> boton_name ='enlace';
	  $base -> columna=array('2' => 'ficha');
	  $base -> ruta_ficha='menu.php?action=admin-oficinas-gestion&id=';
	  $base -> nuevo_registro=1;
	  $base -> url_nuevo='menu.php?action=admin-oficinas-gestion';
	  
	  $base -> tabla();
  
		?>
	</body>
</html>
