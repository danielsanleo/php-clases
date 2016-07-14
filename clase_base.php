<?php 
class base
{
	# CONSULTA GENERAL
	# ----------------
	public $consulta = 'SELECT nombre,id as Ficha from oficinas';
	
	# Variables Globales
	# ------------------
	//Archivo de configuracion, donde toma los datos para la conexion a la base de datos
	public $ruta_archivo_config = 'config.php';
	public $protocolo='http://';
	public $db;
	
	# MODULOS  EJ: array('2' => 'ficha'); 
	# -----------------------------------
	public $columna=array();
	
	# Animaciones
	public $animacion=array();
	
	# NUEVO REGISTRO
	# --------------
	// Insertar un nuevo registo, si nuevo_registro es 1 se habilita el boton para crearlo
	public $nuevo_registro=0;
	public $url_nuevo;
	public $class_nuevo_registro;
	public $imagen_nuevo ='images/boton-nuevo-operador.png';
		
		//CSS
		public $nuevo_registro_fila_backgroundColor='#F2F2F2';
		
		public $nuevo_registro_td_padding='4px';
		public $nuevo_registro_td_backgroundColor='#BBBBBB';
		
		public $nuevo_registro_imagen_height='28px';
		public $nuevo_registro_imagen_border='0';
	
	# TOTAL REGISTROS
	# ---------------
	// Si es igual a uno, muestra el total de registros encontrados
	public $mostrar_total_registros = 1;
		
		//CSS
		public $total_registros_fila_backgroundColor='#F2F2F2';
		
		public $total_registros_texto_backgroundColor='#F2F2F2';
		public $total_registros_texto_fontFamily="'basic Sans sf', arial, helvetica, sans-serif";
		public $total_registros_texto_padding='5px';
		
		
	# FORM
	# ----
	public $form_name='formulario';
	public $form_id='formulario';
	public $method='POST';
	public $action='#';
	public $enctype;
	public $form_charset="UTF-8";
	
	# TABLAS
	# ------
	
	// Tabla Primera
	public $tabla_primera_class;
		// CSS
		public $tabla_primera_width='100%';
		public $tabla_primera_marginLeft;
		public $tabla_primera_marginTop;
		public $tabla_primera_marginRight;
		
	
	// Tabla Segunda
	public $tabla_segunda_activar = 1;
	public $tabla_segunda_class = 'bordeExterior';
		
		// CSS
		public $tabla_segunda_marginBottom='10px';
		public $tabla_segunda_padding='6px';
		public $tabla_segunda_width='100%';
		public $tabla_segunda_textAlign='left';
		public $tabla_segunda_border='0';
		public $tabla_segunda_borderSpacing='0px';
		public $tabla_segunda_borderRadius='10px';
		public $tabla_segunda_backgroundColor='#999999';
		
		public $tabla_segunda_td_backgroundColor='#FFFFFF';
		
		// SubTabla Segunda
		public $sub_tabla_segunda_img_alt='Foto';
		
			//CSS
			public $sub_tabla_segunda_width='100%';
			public $sub_tabla_segunda_padding='6px';
			public $sub_tabla_segunda_border='0';
			public $sub_tabla_segunda_borderSpacing='0';
			
			public $sub_tabla_segunda_td_borderSpacing='0';
			public $sub_tabla_segunda_td_width='5%';
			
			public $sub_tabla_segunda_td_titulo_fontFamily="'basic Sans sf', arial, helvetica, sans-serif";
			
			public $sub_tabla_segunda_img_width='64px';
			public $sub_tabla_segunda_img_border='0';
			
	
			
	// Tabla Mensaje
		// CSS
		public $tabla_mensaje_texto_padding='5px';
		public $tabla_mensaje_texto_color='#FFFFFF';
		public $tabla_mensaje_texto_fontFamily="'basic Sans sf', arial, helvetica, sans-serif";
		public $tabla_mensaje_texto_border='0';
		public $tabla_mensaje_texto_borderSpacing='0px';
		public $tabla_mensaje_texto_borderRadius='10px';
	
	
	// Tabla Listado
		// CSS
		public $tabla_listado_width='100%';
		public $tabla_listado_backgroundColor='#999999';
		public $tabla_listado_borderSpacing='1px';
		public $tabla_listado_padding='4px';
		public $tabla_listado_textAlign='left';
		public $tabla_listado_marginLeft='auto';
		public $tabla_listado_marginRight='auto';
		public $tabla_listado_fontFamily="'basic Sans sf', arial, helvetica, sans-serif";
		
		
		public $tabla_listado_columna_textAlign='center';
		public $tabla_listado_columna_fontFamily="'basic Sans sf', arial, helvetica, sans-serif";
		
		public $tabla_listado_celda_textAlign='center';
		
			//TR Columnas
			public $td_class_columna='textoBlanco';
			
			//Filas
			public $td_class_fila='texto';
	
	
	public $tabla_titulo;
	public $tabla_ruta;
	public $tabla_imagen='images/icono-zonas.png';
	
	// Migas de Pan
	public $migasdepan=1;
	public $migas;		
		
	# MENSAJE INFORMACION
	# -------
	public $tabla_mensaje_class='bordeExterior';
	public $mensaje_tiempo=3000;
	public $mensaje_imagen='images/icoInfo.png';
	
		// CSS
		public $mensaje_fila_backgroundColor='#FFFFFF';
	
	# --------- #
	#  MÓDULOS  #
	# --------  #
	// FICHA
	public $td_img_ficha;
	public $ruta_ficha;
	
	// IMAGEN 
	public $img_ruta;
	public $img_alt='Imagen';
	public $img_height;
	public $img_width;
	
	public $img_class;
	
	// BUTTON
	public $boton_type='submit';
	public $boton_name='enlace';
	public $boton_value;
	public $boton_texto;
	
	// ELIMINAR
	public $eliminiar=0;
	public $eliminar_imagen = 'images/boton-eliminar.png';
	public $eliminar_tabla='oficinas';
	public $eliminar_columna='id';
	
	// OPERACION
	// Realiza operaciones con los valores indicados de la fila
	public $type='number';
	public $name_operacion = 'operacion';
	
	// MENSAJE
	// El sistema permite especificar una consulta en particular para cada una de las filas, es decir,
	// mostrando los registros correspodientes a la clave primaria de dicha fila.
	// La fila que contiene la clave
	public $mensaje_width='200px';
	public $mensaje_img_ruta="http://www.ader.es/fileadmin/_processed_/b/1/csm_een-servicio-alertas_78dbc1029f.png";
	public $mensaje_consulta='';
	public $campos=array(0,1);
	
	public $mensaje_codigo_previo='';
	public $mensaje_codigo_posterior='<br>';
		
		
		//CSS
		public $mensaje_img_width='25px';
		public $mensaje_img_height='25px';
		
	
	
	// SELECT
	// Consulta para traer los campos
	// La segunda Consulta es para saber el total de campos de la tabla 
	// y poder saber cual de ellos se ha elegido
	public $select_consulta;
	public $select_tabla;
	public $select_name = 'seleccionar';
	public $select_texto_defecto = 'Seleccione...';
	public $select_option_value = 'id';
	public $select_option_texto = array();

	// BOTON SUBMIT
	public $boton_submit=0;
	public $submit_texto='Enviar';




# El constructor realiza la conexion con la BBDD
public function __construct() {
	require($this-> ruta_archivo_config);
	
		$db = new mysqli("$db_host", "$db_usuario","$db_clave", "$db_nombre") or die("Falló la conexión con MySQL: " . mysqli_connect_error());
       	mysqli_set_charset($db,"utf8");
       	$this -> db=$db;
       		
    }
# El destructor cierra la conexión con la BBDD
public function __destruct() {
	$db = $this->db;
    $db -> close();	
	}

# Variables del formulario
public $clase;

public function formulario() {

	}


public function tabla() {
		include_once('funciones.php');
		
		$db = $this->db;
		
		$resultados = $db -> query($this->consulta) or die (mysqli_error($db));
		
		$total_registros = $resultados->num_rows;
		
		// Módulo encargado de eliminar la fila
		# Comprobamos si es una pagina en la que se deberian dar derechos 
		# al usuario final para eliminar filas
		if(in_array('eliminar',$this->columna)) {
			if (isset($_GET['delid'])) {
					$ideliminar = $_GET['delid'];
					
					$query = "DELETE FROM $this->eliminar_tabla WHERE $this->eliminar_columna ='$ideliminar'";
					$db -> query($query);
				}
			}

		// POST
		if ($_POST) {

			# Valores devueltos por el modulo SELECT
			if (!empty($_POST[$this->select_name])) {
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
				
			# Valores devueltos por el modulo OPERACIONES
			// Por ahora muestra los valores, pero no hace nada con ellos
			elseif (!empty($_POST['operacion'])) {
				foreach ($_POST['operacion'] as $identificador => $valor) {
					if (!empty($operacion) && !empty($valor)) {
						//~ echo " $operacion => $valor ";
						}
					}
				}
		}
		
		$url_formulario=$this->protocolo . $_SERVER['HTTP_HOST'] .":". $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
		require("estilos.php");
		?>

	<form accept-charset="<?=$this->form_charset;?>" name="<?=$this->form_name;?>" id="<?=$this->form_id;?>" action="<?=$this->action;?>" method="<?=$this->method;?>" enctype="<?=$this->enctype;?>" style="margin:0px;">
		<!-- Primera Tabla: Contiene todo el listado -->
			<table id='tabla_primera' class='<?=$this->tabla_primera_class;?>' border="0" cellspacing="0" cellpadding="20">
				<tr>
				  <td>	
					<?php
					if ($this->tabla_segunda_activar==1) {
						?>
						 <!-- Segunda Tabla: - Imagen del listado
											 - Migas de Pan		 
						 -->
						 <table id='tabla_segunda' class='<?=$this->tabla_segunda_class;?>' >
								<tr>
									<td id='tabla_segunda_td'>
										<table id='sub_tabla_segunda'>
										<tr>
											<td id='sub_tabla_segunda_td'> <a href="<?=$this->tabla_ruta?>"> <img id='sub_tabla_segunda_img' src="<?=$this->tabla_imagen?>" alt="<?=$this->sub_tabla_segunda_img_alt?>" ></a></td>
											<td id='sub_tabla_segunda_td_titulo'><?=$this->tabla_titulo?></td>
										</tr>
									</td>
								</tr>
						 </table>
						 
						 <?php
						 if ($this-> migasdepan==1) {
							 ?>
							 <tr>
								<td bgcolor="#222222">
									<div class="migasoff">
										<?php
										foreach ($this-> migas as $texto => $enlace) {
											?>
											<a href="<?=$enlace?>" class="migas"> <?=$texto?> </a>
											<?php
											}
										?>
									</div>
								</td>
							 </tr>
							 <?php
							 }
						 ?>
						 
						 <?php
						 # Mensaje a mostrar en caso de que exista
						 if (!empty($_GET['mensaje']))
						  {
							  $_GET = limpiarArray($_GET);
							  # A los tres segundos se borra el mensaje
							  ?>
							  <script >
								function myFunction() {
									setTimeout(function(){
										var tabla = document.getElementById('tabla_mensaje_texto');
										tabla.parentNode.removeChild(tabla);
										}, <?=$this->mensaje_tiempo?>);
								}
								myFunction();
								</script>
							  <tr class='mensaje_fila'>
								<td>
								  <table id='tabla_mensaje_texto' width="45%" class="<?=$this->tabla_mensaje_class?>" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#BBBBBB" >
									<tr>
									  <td><div align="center"> <img src="<?=$this->mensaje_imagen?>" alt="Informacion" border="0" align="absmiddle">&nbsp;<?=$_GET['mensaje'];?></div></td>
									</tr>
								   </table>
								 </td>
							  </tr>
							<?php
						  }
						 
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
				}
				?>
				
				<table id='tabla_listado'>
					<tr id='tabla_listado_columna'>
					<?php		
					
					## Generamos las columnas que contiene la consulta
					$n_columna = 0;	  
					while ($finfo = $resultados->fetch_field()) {
						// Si el nombre de la clave es igual al nombre de la columna actual -> no hacemos nada, solo contamos el numero de columnas
						# Realizamos la conversión de caracteres  
						$casilla = str_replace('_',' ',$finfo->name);
						$casilla = str_replace('-',' ',$casilla);
						$casilla[0] = substr_replace($casilla[0], strtoupper($casilla[0]),0, 1);
						  
						?>
						<td class='<?=$this->td_class_columna?>'> <?=$casilla?> </td>
						<?php 
						  
						$columnas[] = $casilla;
							  
						$n_columna++;  
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
									# A continuacion disponemos de los MODULOS:
									# Si estamos en la columna a modificar, la cambiamos, sino, no hacemos nada
									
									if ($i == $posicion)  {
											
											switch($valor) {
												
												case 'imagen':
													if (!empty($fila[$i])) {
														?>
														<td class="tabla_listado_celda <?=$this->td_class_fila?> <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>" bgcolor="<?=$fondo_color;?>"> 
															<img height='<?=$this->img_width?>' width='<?=$this->img_height?>' class='<?=$this->img_class?>' src='<?=$this->img_ruta.$fila[$i]?>' alt="foto"> 
														</td>
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
													<td class="tabla_listado_celda <?=$this->td_class_fila?> <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>" bgcolor="<?=$fondo_color;?>"> 
														<div align="center">
															<a href="<?=$this->ruta_ficha .$fila[$i]?>">
																<img src="<?=$this->td_img_ficha?>" alt="Ver Ficha" title="Ver Ficha" width="16" border="0" />
															</a>
														</div>
													</td>
													<?php
													break;


												case 'button':
													?>
													<td class="tabla_listado_celda <?=$this->td_class_fila?> <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>" bgcolor="<?=$fondo_color;?>"> <button value="<?=$this->boton_value?>" name='<?=$this->boton_name?>' type="<?=$this->boton_type?>" value='<?=$fila[$i]?>'><?=$this->boton_texto?></button>
													<?php
													break;

												case 'eliminar':
													?>
													<td class='tabla_listado_celda <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>' bgcolor="<?=$fondo_color;?>" align='center'> 
														<a href="javascript:eliminar('<?=$fila[$i];?>');">
															<img src="<?=$this->eliminar_imagen?>" alt="Eliminar" title="Eliminar" width="16" border="0" />
														</a>
													</td>
													<?php
													break;

												case 'operacion':
												
													?>
													<td class='tabla_listado_celda <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>' bgcolor="<?=$fondo_color;?>" align='center'> 
														<input name='<?=$this->name_operacion?>[<?=$fila[$i]?>]' type='<?=$this->type?>' min="0"> 
													</td>
													<?php
													break;
													
												case 'activo':
													if ($fila[$i]==1) {
														?>
														<td bgcolor="#3ADF00" class='<?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo"animated " . $this->animacion[$i]; } ?>'></td>
														<?php
														}
													else {
														?>
														<td bgcolor="#FF0000" class='<?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>'></td>
														<?php
														}
													break;
													
												case 'mensaje':
													?>
													<td class='tabla_listado_celda <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>' bgcolor="<?=$fondo_color;?>">
														<div class="tooltip"> <img class="mensaje_imagen" src="<?=$this->mensaje_img_ruta?>">
														  <span class="tooltiptext">
															  <?php
															  if (!empty($this->mensaje_consulta)) {
																  # Si la variable clave_primaria existe filtramos la consulta del mensaje por el id correspondiente 
																  # para mostrar el mensaje en funcion de la fila. Para ello concatenamos Con la sintaxis: Temporal = Consulta + clave_primaria
																  if (!empty($fila[$i])) {
																	  $this->mensaje_consulta_tmp = $this->mensaje_consulta.$fila[$i];
																	  }
																  else {
																	  $this->mensaje_consulta_tmp = $this->mensaje_consulta;
																	  }
																  
																  $resultados_mensaje = $db -> query($this->mensaje_consulta_tmp);
																  
																  while ($resultado2 = mysqli_fetch_array($resultados_mensaje)) {
																		# El array campos permite elegir que columnas de la consulta del mensaje se muestran
																		foreach ($this->campos as $row) {
																			echo $resultado2[$row].' ';
																			}
																	  echo $this->mensaje_codigo_posterior;
																	  }
																  // Reinicializamos la variable
																  $this->mensaje_consulta_tmp='';
																  }
															  else {
																echo $fila[$i];
																}
																?>
															</span>
														</div>
													</td>
													<?php
													break;
												
												case 'select':
													$registros = $db -> query($this->select_consulta);
													?>
													<td class='tabla_listado_celda <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>' bgcolor="<?=$fondo_color;?>" align='center'>
														<select name='<?=$this->select_name.$fila[$posicion]?>' form='<?=$this->form_id?>' onchange='this.form.submit()'>
															<option value=''> <?=$this->select_texto_defecto?> </option>
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
									<td bgcolor="<?=$fondo_color;?>" class="tabla_listado_celda <?=$this->td_class_fila?> <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo"animated " . $this->animacion[$i]; } ?>">
										<?=$fila[$i]?> 
									</td>
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
					if ($this->boton_submit==1) {
						?>
						<td colspan='<?=count($columnas)?>' bgcolor="<?=$fondo_color;?>" class="tabla_listado_celda <?=$this->td_class_fila?> <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo"animated " . $this->animacion[$i]; } ?>">
							<button name='submit' type='submit'> <?=$this->submit_texto;?> </button>
						</td>
						<?php
						}
						?>
					</table>
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
}
?>
