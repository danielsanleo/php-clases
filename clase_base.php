<?php 
class base
{
	####################################################################
	# 							Variables Globales                     #
	####################################################################
	
	# Pueden haber variables estandares #
	
	
	
	# Consulta desde la que se extraen los datos de la BBDD para generar la tabla
	public $consulta = 'SELECT nombre,id as Ficha from oficinas';
	
	
	# Archivo de configuracion, donde toma los datos para la conexion a la base de datos
	public $ruta_archivo_config = 'config.php';
	public $protocolo='http://';
	
	##############################################################
	#															 #
	#							MÓDULOS							 #
	#															 #
	# Código personalizado en los campos que se traen de la BBDD #
	#															 #
	##############################################################
	## Por defecto todo modulo cuyo Activar sea 1 ---> Se mostrara
	
	
	# El siguiente array especifica en que columna se utilizará un módulo en la sintaxis
	# Ej: $instancia -> columna = array(3 =>"select");
	public $columna=array();
	
	
	# Insertar un nuevo registo
	# Si nuevo_registro=1 se habilita el boton para crear un nuevo registro
	## Nuevo Registro
		//Activar
		public $nuevo_registro=0;
		//Ruta donde se tramitará el nuevo registro
		public $url_nuevo;
		//Imagen de la ruta
		public $imagen_nuevo ='images/boton-nuevo-operador.png';
		
	
	## FORM
		public $form_name='formulario';
		public $form_id='formulario';
		public $method='POST';
		public $action='#';
		public $enctype='';
	
	
	## TABLE
		//
		public $table_raiz_class;
		public $table_raiz2_class;
		public $table_titulo;
		public $table_ruta;
		public $table_imagen='images/icono-zonas.png';
	#	|
	#	\___TD Columnas
			public $td_class_columna='textoBlanco';
	#	|	
	#	\___Filas
			public $td_class_fila='texto';
	
	
	//MENSAJE
	public $table_mensaje_class='bordeExterior';
	public $mensaje_imagen='images/icoInfo.png';
	
	

	## FICHA
		//Imagen de la Ficha
		public $td_img_ficha;
		
		//Enlace de la Ficha
		public $ruta_ficha;
		

	## IMAGEN 
		public $ruta_imagen;
		public $img_class;
	
	## BUTTON
		//Tipo buton (HTML)
		public $boton_type='submit';
		
		//Nombre del Boton (HTML)
		public $boton_name='enlace';
		
		//Texto a mostrar <button>Aqui</button>
		public $boton_texto;
	
	## ELIMINAR
		public $eliminiar=0;
		public $imagen_eliminar = 'images/boton-eliminar.png';
		public $tabla_eliminar='oficinas';
		public $eliminar_columna='id';
	
	
	## SELECT
		//Activar select
		public $select=1;
		
		//Consulta para traer los campos
		public $select_consulta;
		
		// La segunda Consulta es para ejecutar el cambio en la BBDD en funcion de lo que el usuario ha elegido en el select,
		// Ej: abajo, en la recoleccion POST
		public $select_consulta_final;
		
		// Nombre por defecto del nombre del select
		public $select_name='nombre';
		public $select_option_value='id';
	
	## FOOTER
		//Activar
		public $footer=0;
	
	
	#############################################################################################################
	#										COMIENZO DEL PROGRAMA												#
	#############################################################################################################	

public function tabla() {
	
	require($this-> ruta_archivo_config);
	
	if ($db = new mysqli("$db_host", "$db_usuario","$db_clave", "$db_nombre")) {
		
		mysqli_set_charset($db,"utf8");
		
		
		$resultados = $db -> query($this->consulta);
		
		$total_registros = $resultados->num_rows;
		
		// ELIMINAR
		if (isset($_GET['delid']))
		{
			$ideliminar=$_GET['delid'];
			$db -> query("DELETE FROM $this->tabla_eliminar WHERE $this->eliminar_columna ='$ideliminar'");
		}
		
		if ($_POST) {
			if ($this->select==1) {
					for ($i=0; $i<=$total_registros; $i++) {
						$nombre_select=$this->select_name.$i;
						if (!empty($_POST[$nombre_select])) {
							$nombre_hidden='id'.$i;
							$id=$_POST[$nombre_hidden];
							$select_fila=$_POST[$nombre_select];
							
							$array = array ($select_fila, $id);
							
							# Ahora podemos utilizar los valores que devuelve de la base de datos el hidden del HTMl que se corresponen con la columna
							# O utilizar el valor unico que devuelve el select del formulario de cad
							
							echo "ID del option :$select_fila <br> ID de la cassilla de la BBDD: $id";
							
							//~ $db -> query($this->select_consulta_final);
							}
					}
			}
		}
		
		
		//Control del Select (en caso de que exista)
		$url_formulario=$this->protocolo . $_SERVER['HTTP_HOST'] .":". $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
		
				?>
		<form name="<?=$this->form_name;?>" id="<?=$this->form_id;?>" action="<?=$this->action;?>" method="<?=$this->method;?>" enctype="<?=$this->enctype;?>" style="margin:0px;">
			<table width="100%" class='<?=$this->table_raiz_class;?>' border="0" cellspacing="0" cellpadding="20">
				<tr>
				  <td>	
					<table class='<?=$this->table_raiz2_class;?>' width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="# " class="bordeExterior">
							<tr>
								<td bgcolor="#F2F2F2" class="bordeAbajo">
									<table width="100%" border="0" cellpadding="6" cellspacing="0">
									<tr>
										<td width="5%"> <a href="<?=$this->table_ruta?>"><img src="<?=$this->table_imagen?>" alt="Foto" width="64" border="0" /></a></td>
										<td class="departamento"><?=$this->table_titulo?></td>
									</tr>
								</td>
							</tr>
						</table>
						 
						 <?php
						 if (!empty($_GET['mensaje']))
						  {
							?>
							  <tr bgcolor="#F2F2F2">
								<td>
								  <div class="limpiar10"></div>
								  <table width="45%" class="<?=$this->table_mensaje_class?>" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#BBBBBB" >
									<tr>
									  <td class="textoBlanco"><div align="center"><img src="<?=$this->mensaje_imagen?>" alt="Informacion" border="0" align="absmiddle">&nbsp;<?=$_GET['mensaje'];?></div></td>
									</tr>
								   </table>
								</td>
							  </tr>
							  <tr bgcolor="#F2F2F2">
								<td>&nbsp;</td>
							  </tr>
							<?php
						  }
						  ?>
						  
						  <?php
						  if ($this->nuevo_registro==1) {
							  ?>
							   <tr>
									<td bgcolor="#ABABAB" style="padding:4px;"><a href="<?=$this->url_nuevo;?>"><img src="<?=$this->imagen_nuevo?>" alt="Insertar" height="28" border="0" /></a></td>
							   </tr>
							   <tr bgcolor="#F2F2F2">
									<td>&nbsp;</td>
							   </tr>
							   <?php
							  }
						 
				
				
				$resultados = $db -> query($this->consulta);
				
				$total_registros = $resultados->num_rows;
				
				?>
				<tr bgcolor="#F2F2F2">
					<td>
						<div class="limpiar10"></div>
						<div class="textoPeque" style="padding:4px;">Se han encontrado <?=$total_registros;?> registros</div>
					</td>
                </tr> 
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#999999">
				<tr>
				<?php		
				## Generamos las columnas	  
				while ($finfo = $resultados->fetch_field()) {
					  $casilla = str_replace('_',' ',$finfo->name);
					  $casilla = str_replace('-',' ',$casilla);
					  $casilla[0] = substr_replace($casilla[0], strtoupper($casilla[0]),0, 1);
					  
					  ?>
					  <td class='<?=$this->td_class_columna?>'> <?=$casilla?> </td>
					  <?php 
					  
					  $columnas[] = $casilla;
					  
				}
				
				if ($this->eliminiar==1) {
					?>
					  <td class='<?=$this->td_class_columna?>'> Eliminar </td>
					  <?php 
					  $columnas[]='Eliminar';
					}
				?> 
				</tr>
				<?php
				
				$resultados = $db -> query($this->consulta);
				
				## Generamos cada fila de cada columna 
				$total_columnas = count($columnas);
				$cont=0;
				
				while ($fila = mysqli_fetch_array($resultados)) {
					
					#Color de fila
					if (($cont%2)==0)
					{
					  $fondo_color='#FFFFFF';
					}
					else
					{
					  $fondo_color='#CBCBCB';
					}
					?> 
					<tr>
					<?php
					if ($this->select==1) {
						$selects = $db -> query($this->select_consulta);
						}
					
					for ($i=0;$i<$total_columnas;$i++) {
						if (!empty($this->columna)) {
						
							foreach ($this->columna as $posicion => $valor) {
								
								# La $i representa el numero de columna en el que estamos.
								# Si $i es igual al numero de columna que debe insertar un modulo, lo cambia.
								# En caso contrario no hace nada.
								
								if ($i == $posicion)  {
									
										switch($valor) {
												# A continuacion definimos los campos estandar para cada una de las etiquetas
												case 'imagen':
													if (!empty($fila[$i])) {
														?>
														<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>"> <img width='60' class='<?=$this->img_class?>' src='<?=$this->ruta_imagen.$fila[$i]?>' alt="foto"> </td>
														<?php
													}
													else {
														?>
														<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>"></td>
														<?php
														}
													break;
													
													
												case 'ficha':
													?>
													<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>"> <div align="center"><a href="<?=$this->ruta_ficha .$fila[$i]?>"><img src="<?=$this->td_img_ficha?>" alt="Ver Ficha" title="Ver Ficha" width="16" border="0" /></a></div></td>
													<?php
													break;
													
													
												case 'button':
													?>
													<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>"> <button name='<?=$this->boton_name?>' type="<?=$this->boton_type?>" value='<?=$fila[$i]?>'><?=$this->boton_texto?></button>
													<?php
													break;
													
													
												case 'eliminar':
													?>
													<td bgcolor="<?=$fondo_color;?>" align='center'><a href="javascript:eliminar('<?=$fila[$i];?>');"><img src="<?=$this->imagen_eliminar?>" alt="Eliminar" title="Eliminar" width="16" border="0" /></a></td>
													<?php
													break;
													
													
												case 'activo':
													if ($fila[$i]==1) {
														?>
														<td bgcolor="#3ADF00" align='center'></td>
														<?php
														}
													else {
														?>
														<td bgcolor="#FF0000" align='center'></td>
														<?php
														}
													break;
													
													
												case 'select':
													while ($finfo = $resultados->fetch_field()) {
														 $columnas2[] = $finfo->name;
														}
													$total_columnas2 = count($columnas2);
													//~ onchange="this.form.submit()"
													?>
													
													<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>">
														<input type='hidden' name='id<?=$cont?>' value='<?=$fila[$i]?>'>
														<select name='<?=$this->select_name.$cont?>' form="<?=$this->form_id;?>" onchange="this.form.submit();">
														<option value=''>Seleccione...</option>
														<?php
														while ($fila2 = mysqli_fetch_array($selects)) {
															?>
															<option value='<?=$fila2[0]?>'>
															<?php
															for ($a=1;$a<$total_columnas2;$a++) {
																if (!empty($fila2[$a])) {
																	echo "$fila2[$a] ";
																	}
																}
															?>
															</option> 
															<?php
															}
														?>
														</select>
													</td>
													<?php
												break;
												}
										  break;
										}
								}
							if ($i != $posicion)  {
								?>
								<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>"><?=$fila[$i]?> </td>
								<?php
								}
						}
						else {
							?>
							<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>"><?=$fila[$i]?> </td>
							<?php
							}
					}
					
					?> 	
					</tr>
					<?php
					$cont++;
				}
					?>
				</table>
				</table>
				<?php
				if ($this->footer==1) {
					
					}
				?>
				<table width="85%" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF" class="bordeExterior">
				  <tr>
					<td width="2"><div align="right"><a href="menu.php"><img src="images/icono-volver.png" alt="Volver" title="Volver" width="16" height="16" border="0" /></a></div></td>
					<td width="40"><a href="menu.php" class="enlace">atr&aacute;s</a></td>
					<td width="2"><div align="right"><a href="menu.php?action=soporte"><img src="images/icono-soporte.png" alt="Soporte t&eacute;cnico" title="Soporte" width="16" height="16" border="0"></a></div></td>
					<td><a href="menu.php?action=soporte" class="enlace">soporte</a></td>
					<td><div align="right"><a href="salir.php"><img src="images/icono-salir.png" alt="Cerrar" title="Salir" width="16" height="16" border="0"></a></div></td>
					<td width="80"><a href="salir.php" class="enlace">cerrar sesi&oacute;n</a></td>
				  </tr>
				</table> 
			
			</form>	
			  </tr>
			  <tr>
				<td><div class="radioinferior"></div></td>
				<script type="text/javascript">
				  function eliminar(id)
				  { 
					if (confirm('¿Seguro que quiere eliminarlo?'))
					{
					  document.location.href='<?=$url_formulario;?>&delid='+id;
					}
				  }
				</script>
			  </tr>
			</table>
         </table>
      <?php
		}
	else {
		echo "Error en la conexión a la base de datos";
		}		
		
	$db -> close();	
}
}
?>
