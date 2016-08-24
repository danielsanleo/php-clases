<!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
		 <link rel="stylesheet" href="animate.css">
		 <link rel="stylesheet" type="text/css" href="css/estilos_base.css">
	</head>
	
	<body>
		<?php
		
		require("clases/clase_base.php");
		$base = new base;
		
		$base -> consulta = "SELECT imagen,nombre,cantidad,valor,descripcion,iditem AS Eliminar,iditem as Mensaje 
		                        FROM personaje_items INNER JOIN productos 
		                        ON personaje_items.iditem=productos.id  
		                        WHERE idpersonaje=$idpersonaje";
		
		$base -> mensaje_consulta = "SELECT nombre_atributo,valor_atributo from producto_atributos inner join atributos on producto_atributos.id_atributo=atributos.id where id_producto=";
		$base -> campos = array(0,1);
		
		
		$base -> tabla_primera_marginLeft = '10%';
		$base -> tabla_primera_marginTop = '3%';
		
		$base -> migasdepan = 0;
		$base -> footer = 0;
		
		$base -> tabla_primera_width = '75%';
		$base -> tabla_titulo = "Items del personaje: ";
		
		$base -> tabla_imagen = 'images/cofre.png';
		$base -> tabla_ruta = 'menu.php?action=items.php';
		
		$base -> columna = array('0' => 'imagen','5' => 'operacion','6' => 'mensaje');
		
		$base -> animacion = array('1' => 'fadeIn','0' => 'fadeIn', '2' => 'fadeIn', '3' => 'fadeIn','4' => 'fadeIn','5' => 'fadeIn');
		$base -> nuevo_registro = 0;
		$base -> boton_submit = 1;
		$base -> boton_submit_texto = 'Aplicar';
		$base -> tabla();

		?>
	</body>
</html>
