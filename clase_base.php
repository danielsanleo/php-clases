<?php 
class base
{
	# CONSULTA GENERAL
	public $consulta = 'SELECT nombre,id as Ficha from oficinas';
	
	# Variables Globales
	//Archivo de configuracion, donde toma los datos para la conexion a la base de datos
	public $ruta_archivo_config = 'config.php';
	public $protocolo='http://';
	
	# Codigo a insertar en la columna especificada. 
	public $columna=array();
	
	// NUEVO REGISTRO
	// Insertar un nuevo registo, si nuevo_registro es 1 se habilita el boton para crearlo
	public $nuevo_registro=0;
	public $url_nuevo;
	public $class_nuevo_registro;
	public $imagen_nuevo ='images/boton-nuevo-operador.png';
	
	// TOTAL REGISTROS
	// Si es igual a uno, muestra el total de registros encontrados
	public $mostrar_total_registros = 1;
	
		
	//FORM
	public $form_name='formulario';
	public $form_id='formulario';
	public $method='POST';
	public $action='#';
	public $enctype='';
	public $form_charset="UTF-8";
	
	//TABLE
	public $table_primera_class;
	public $table_segunda_class = 'bordeExterior';
	public $table_titulo;
	public $table_ruta;
	public $table_imagen='images/icono-zonas.png';
		
		//TD Columnas
		public $td_class_columna='textoBlanco';
		
		//Filas
		public $td_class_fila='texto';
	
	//MENSAJE
	public $table_mensaje_class='bordeExterior';
	public $mensaje_imagen='images/icoInfo.png';
	
	
	// Código personalizado en los campos que se traen de la BBDD
	//FICHA
	public $td_img_ficha;
	public $ruta_ficha;
	
	// IMAGEN 
	public $img_ruta;
	public $img_alt='Imagen';
	public $img_height;
	public $img_width;
	
	public $img_class;
	
	//BUTTON
	public $boton_type='submit';
	public $boton_name='enlace';
	public $boton_value;
	public $boton_texto;
	
	//ELIMINAR
	public $eliminiar=0;
	public $eliminar_imagen = 'images/boton-eliminar.png';
	public $eliminar_tabla='oficinas';
	public $eliminar_columna='id';
	
	
	//SELECT
	//Consulta para traer los campos
	//La segunda Consulta es para saber el total de campos de la tabla 
	// y poder saber cual de ellos se ha elegido
	public $select_consulta;
	public $select_tabla;
	public $select_name = 'seleccionar';
	public $select_texto_defecto = 'Seleccione...';
	public $select_option_value = 'id';
	public $select_option_texto = array();
	

public function tabla() {
	
	function limpiarArray($array) {
		$array = array_map('trim', $array);
		$array = array_map('stripslashes', $array);
		return $array;
		
		}

		
	require($this-> ruta_archivo_config);
	
	# Realizamos la conexion
	
	if ($db = new mysqli("$db_host", "$db_usuario","$db_clave", "$db_nombre")) {
		
		mysqli_set_charset($db,"utf8");
		
		$resultados = $db -> query($this->consulta) or die (mysqli_error($db));
		
		$total_registros = $resultados->num_rows;
		
		// Módulo encargado de eliminar la fila
		if (isset($_GET['delid']))
		{
			$ideliminar = $_GET['delid'];
			$db -> query("DELETE FROM $this->eliminar_tabla WHERE $this->eliminar_columna ='$ideliminar'");
		}
		
		if ($_POST) {
			
			$_POST = limpiarArray($_POST);
			
			$maximo = $db -> query('select MAX(id) from '.$this->select_tabla);
			$maximo = mysqli_fetch_array($maximo);
			
			$minimo = $db -> query('select MIN(id) from '.$this->select_tabla);
			$minimo = mysqli_fetch_array($minimo );
			
			
			for ($i = $minimo[0]; $i <= $maximo[0] ;$i++) {
				$tmp = $this -> select_name . $i;
				if (!empty($_POST[$tmp])) {
					$_SESSION['valor'] = $_POST[$tmp];
					$_SESSION['i'] = $i;
				}
			}
		}
		
		
		//Control del Select (en caso de que exista)
		
		$url_formulario=$this->protocolo . $_SERVER['HTTP_HOST'] .":". $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
		?>
		
	<form accept-charset="<?=$this->form_charset;?>" name="<?=$this->form_name;?>" id="<?=$this->form_id;?>" action="<?=$this->action;?>" method="<?=$this->method;?>" enctype="<?=$this->enctype;?>" style="margin:0px;">
	<link rel="stylesheet" type="text/css" href="styles.css">
		<!-- Primera Tabla: Contiene todo el listado -->
			<table id='tabla_primera' width="100%" class='<?=$this->table_primera_class;?>' border="0" cellspacing="0" cellpadding="20">
				<tr>
				  <td>	
					 <!-- Segunda Tabla: - Imagen del listado
										 - Migas de Pan		 
					 -->
					 <table id='tabla_segunda' class='<?=$this->table_segunda_class;?>' >
							<tr>
								<td id='tabla_segunda_td'>
									<table id='sub_tabla_segunda'>
									<tr>
										<td id='sub_tabla_segunda_td'> <a href="<?=$this->table_ruta?>"> <img id='sub_tabla_segunda_img' src="<?=$this->table_imagen?>" alt="Foto" ></a></td>
										<td id='sub_tabla_segunda_td_titulo'><?=$this->table_titulo?></td>
									</tr>
								</td>
							</tr>
					 </table>
					 
					 <?php
					 # Mensaje a mostrar en caso de que exista
					 if (!empty($_GET['mensaje']))
					  {
						  $_GET = limpiarArray($_GET);
						  ?>
						  <tr class='mensaje_fila'>
							<td>
							  <table id='tabla_mensaje_texto' width="45%" class="<?=$this->table_mensaje_class?>" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#BBBBBB" >
								<tr>
								  <td><div align="center"> <img src="<?=$this->mensaje_imagen?>" alt="Informacion" border="0" align="absmiddle">&nbsp;<?=$_GET['mensaje'];?></div></td>
								</tr>
							   </table>
							 </td>
						  </tr>
						  <tr class='mensaje_fila'>
							<td>&nbsp;</td>
						  </tr>
						<?php
					  }
					  ?>
						  
					  <?php
					  if ($this->nuevo_registro==1) {
						  ?>
						   <tr class='nuevo_registro_fila'>
							   <td id='nuevo_registro_td' class='<?=$this->class_nuevo_registro?>'> 
									<a href="<?=$this->url_nuevo;?>" >
										<img id='nuevo_registro_imagen' src="<?=$this->imagen_nuevo?>" alt="Insertar">
									</a>
								</td>
						   </tr>
						   <tr class='nuevo_registro_fila' >
								<td>&nbsp;</td>
						   </tr>
						   <?php
						  }
						 
				
				
				//~ $resultados = $db -> query($this->consulta);
				
				//~ $total_registros = $resultados->num_rows;
				
				
				
				## Total de registros encontrados
				if ($this->mostrar_total_registros) {
					?>
					<tr id='total_registros_fila'>
						<td>
							<div id='total_registros_texto'>Se han encontrado <?=$total_registros;?> registros</div>
						</td>
					</tr>
					<?php
				}
				?>
				 
				<table id='tabla_listado'>
					<tr id='tabla_listado_columna'>
					<?php		
					
					## Generamos las columnas que contiene la consulta	  
					while ($finfo = $resultados->fetch_field()) {
						  
						  # Realizamos la conversión de caracteres  
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
						
						for ($i=0;$i<$total_columnas;$i++) {
							if (!empty($this->columna)) {
							
								foreach ($this->columna as $posicion => $valor) {
									
									# Si estamos en la columna a modificar, la cambiamos, sino, no hacemos nada
									if ($i == $posicion)  {
										
											switch($valor) {
												# A continuacion disponemos de los MODULOS:
												case 'imagen':
													if (!empty($fila[$i])) {
														?>
														<td class="tabla_listado_celda <?=$this->td_class_fila?>" bgcolor="<?=$fondo_color;?>"> <img height='<?=$this->img_width?>' width='<?=$this->img_height?>' class='<?=$this->img_class?>' src='<?=$this->img_ruta.$fila[$i]?>' alt="foto"> </td>
														<?php
													}
													else {
														?>
														<td class="tabla_listado_celda <?=$this->td_class_fila?>" bgcolor="<?=$fondo_color;?>"></td>
														<?php
														}
													break;
													
													
												case 'ficha':
													?>
													<td class="tabla_listado_celda <?=$this->td_class_fila?>" bgcolor="<?=$fondo_color;?>"> <div align="center"><a href="<?=$this->ruta_ficha .$fila[$i]?>"><img src="<?=$this->td_img_ficha?>" alt="Ver Ficha" title="Ver Ficha" width="16" border="0" /></a></div></td>
													<?php
													break;
													
													
												case 'button':
													?>
													<td class="tabla_listado_celda <?=$this->td_class_fila?>" bgcolor="<?=$fondo_color;?>"> <button value="<?=$this->boton_value?>" name='<?=$this->boton_name?>' type="<?=$this->boton_type?>" value='<?=$fila[$i]?>'><?=$this->boton_texto?></button>
													<?php
													break;
													
													
												case 'eliminar':
													?>
													<td class='tabla_listado_celda' bgcolor="<?=$fondo_color;?>" align='center'><a href="javascript:eliminar('<?=$fila[$i];?>');"><img src="<?=$this->eliminar_imagen?>" alt="Eliminar" title="Eliminar" width="16" border="0" /></a></td>
													<?php
													break;
													
													
												case 'activo':
													if ($fila[$i]==1) {
														?>
														<td bgcolor="#3ADF00"></td>
														<?php
														}
													else {
														?>
														<td bgcolor="#FF0000"></td>
														<?php
														}
													break;
													
													
												case 'select':
													$registros = $db -> query($this->select_consulta);
													?>
													<td class='tabla_listado_celda' bgcolor="<?=$fondo_color;?>" align='center'>
													<select name='<?=$this->select_name.$fila[$posicion]?>' form='<?=$this->form_id?>' onchange='this.form.submit()'>
														<option value=''><?=$this->select_texto_defecto?></option>
														<?php
														while ($fila2 = mysqli_fetch_array($registros)) {
															?>
															<option value='<?=$fila2[$this -> select_option_value]?>'>
															<?php
															foreach($this -> select_option_texto as $columna_mostrar) {
																echo "$fila2[$columna_mostrar] ";
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
									<td bgcolor="<?=$fondo_color;?>" class="tabla_listado_celda <?=$this->td_class_fila?>"><?=$fila[$i]?> </td>
									<?php
									}
							}
							else {
								?>
								<td bgcolor="<?=$fondo_color;?>" class="tabla_listado_celda <?=$this->td_class_fila?>"><?=$fila[$i]?> </td>
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
				<script type="text/javascript">
				  function eliminar(id)
				  { 
					if (confirm('¿Seguro que quiere eliminarlo?'))
					{
					  document.location.href='<?=$url_formulario;?>&delid='+id;
					}
				  }
				</script>
				
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
			
			  </tr>
			  <tr>
				<td><div class="radioinferior"></div></td>
			  </tr>
			</table>
		</table>
	</form>	
	<?php
	}
else {
	  echo "Falló la conexión con MySQL: " . mysqli_connect_error();
	}		
	
$db -> close();	
}
}
?>
