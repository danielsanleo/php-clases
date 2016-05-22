<?php 
class base
{
	# Consulta
	public $consulta='SELECT * FROM alertas';
	# Variable al archivo de configuracion
	public $ruta_archivo_config = 'config.php';
	
	
	# Codigo insertado, tipo de codigo , en la columna especificada
	public $columna=array();
		
		//FORM
		public $form_name='formulario';
		public $form_id='formulario';
		public $method='POST';
		public $action='#';
		public $enctype='';
		
		
		//TABLE
		public $table_raiz_class;
		public $table_raiz2_class;
		public $table_titulo;
		public $table_ruta;
		public $table_imagen;
			
			//TD Columnas
			public $td_class_columna='textoBlanco';
			
			//Filas
			public $td_class_fila='texto';
		
		
		//Mensaje
		public $table_mensaje_class='bordeExterior';
		
		//FICHA
		public $td_img_ficha = 'images/ico-ficha.png';
		
		// IMG
		public $ruta='';
		public $img_class='';
		
		//Button
		public $boton_type='submit';
		public $boton_name='enlace';
		public $boton_texto;
	
public function tabla() {
	
	require($this-> ruta_archivo_config);
	

	if ($db = new mysqli("$db_host", "$db_usuario","$db_clave", "$db_nombre")) {
		
				?>
		<form name="<?=$this->form_name;?>" id="<?=$this->form_id;?>" action="<?=$this->action;?>" method="<?=$this->method;?>" enctype="<?=$this->enctype;?>" style="margin:0px;">
			<table class='<?=$this->table_raiz_class;?>' border="0" cellspacing="0" cellpadding="20">
				<tr>
				  <td>	
					<table class='<?=$this->table_raiz2_class;?>' width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="# " class="bordeExterior">
							<tr>
								<td bgcolor="#F2F2F2" class="bordeAbajo">
								<table width="100%" border="0" cellpadding="6" cellspacing="0">
								<tr>
								  <td width="2"><a href="<?=$this->table_ruta?>"><img src="<?=$this->table_imagen?>" alt="Foto" width="64" border="0" /></a></td>
								  <td class="departamento"><?=$this->table_titulo?></td>
								</tr>
							  </td>
						  </tr>
						 </table>
						 <?php
						 if (!empty($_GET['mensaje']))
						  {
							?>
							  <tr>
								<td>
								  <div class="limpiar10"></div>
								  <table width="45%" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#BBBBBB" class="<?=$this->table_mensaje_class?>">
									<tr>
									  <td class="textoBlanco"><div align="center"><img src="images/icoInfo.png" alt="Informacion" border="0" align="absmiddle">&nbsp;<?=$_GET['mensaje'];?></div></td>
									</tr>
								   </table>
								</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							<?php
						  }
				
				
				$resultados = $db -> query($this->consulta);
				
				$total_registros = $resultados->num_rows;
				
				
				?>
				<div class="limpiar10"></div>
                  <div class="textoPeque" style="padding:4px;">Se han encontrado <?=$total_registros;?> registros</div>
                  
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
											# A continuacion definimos los campos estandar para cada una de las etiquetas
											case 'img':
												?>
												<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>"> <img class='<?=$this->img_class?>' src='<?=$fila[$i]?>' alt="foto"> </td>
												<?php
												break;
											case 'ficha':
												?>
												<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>"> <div align="center"><a href="<?=$this->ruta .$fila[$i]?>"><img src="<?=$this->td_img_ficha?>" alt="Ver Ficha" title="Ver Ficha" width="16" border="0" /></a></div></td>
												<?php
												break;
											case 'button':
												?>
												<td bgcolor="<?=$fondo_color;?>" class="<?=$this->td_class_fila?>"> <button name='<?=$this->boton_name?>' type="<?=$this->boton_type?>" value='<?=$fila[$i]?>'><?=$this->boton_texto?></button>
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
			</form>
			  
					<?php
		}
	else {
		echo "Error en la conexión a la base de datos";
		}		
		
	$db -> close();	
}
}
?>
