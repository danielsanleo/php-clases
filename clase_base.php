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
    public $protocolo = 'http://';
    public $db;

    # MODULOS  EJ: array('2' => 'ficha'); 
    # -----------------------------------
    public $columna = array();

    # Animaciones
    # Para habilitar el modulo hay que incluir en la cabecera HTML
    # el link hacia los estilos: <link rel="stylesheet" href="clases/animate.css">
    public $animacion = array();

    # BARRA DE MENUS
    # --------------
    // Hace referencia a la barra de menus situada encima del listado y los filtros
    // En la version anterior era el nuevo_registro
	# Activar o desactivar
	public $menu = 1;
    # Arrays con las urls y las imagenes, los que tengan las mismas claves se entiende que deben aparecer como IMAGEN => URL
    public $menu_url = array( 1 => 'http://www.google.com' );
    public $menu_imagen = array( 1 => 'images/boton-nuevo-operador.png' );

    # TOTAL REGISTROS
    # ---------------
    // Si es igual a uno, muestra el total de registros encontrados
    public $mostrar_total_registros = 1;

    # FORM
    # ----
    public $form_name = 'formulario';
    public $form_id = 'formulario';
    public $method = 'POST';
    public $action = '#';
    public $enctype;
    public $form_charset = 'UTF-8';
    
    # TABLAS
    # ------
    // Tabla Primera
    public $tabla_primera_class;
    // Tabla Segunda
    public $tabla_segunda_activar = 1;
    public $tabla_segunda_class = 'bordeExterior';
        
        // SubTabla Segunda
        public $sub_tabla_segunda_img_alt = 'Foto';
        
    // Tabla Mensaje
        //Vacio
    
    
    // Tabla Listado
        //Vacio
        
    
    public $tabla_titulo;
    public $tabla_ruta;
    public $tabla_imagen = 'images/icono-zonas.png';
    
    // Migas de Pan
    public $migasdepan = 1;
    public $migas;      
        
    # MENSAJE INFORMACION
    # -------
    public $tabla_mensaje_class = 'bordeExterior';
    public $mensaje_tiempo = 3000;
    public $mensaje_imagen = 'images/icoInfo.png';
    
    
    # --------- #
    #  MÓDULOS  #
    # --------  #
    // FICHA
    public $ficha_img;
    public $ficha_url;
    
    // IMAGEN 
    public $img_ruta;
    public $img_alt = 'Imagen';
    public $img_height;
    public $img_width;
    
    public $img_class;
    // BUTTON
    public $boton_type = 'submit';
    public $boton_name = 'enlace';
    public $boton_value;
    public $boton_texto;
    
    // ESTADO
    // Con el primer array establecemos los estados que queramos. 
    //~ $listado -> estados = array( '0' => 'Apto','1' => 'No Apto' );
    //~ $listado -> estados_colores = array( '0' => '#ff0000','1' => '#00cc00' );
    public $estados = array();
    public $estados_colores = array();
    
    // ELIMINAR
    public $eliminar_imagen = 'images/boton-eliminar.png';
    public $eliminar_tabla = 'oficinas';
    public $eliminar_columna = 'id';
    
    // OPERACION
    // Realiza operaciones con los valores indicados de la fila
    public $type = 'number';
    public $name_operacion = 'operacion';
    
    // MENSAJE
    // El sistema permite especificar una consulta en particular para cada una de las filas, es decir,
    // mostrando el mensaje correspodiente a la clave primaria de dicha fila.
    // La fila que contiene la clave
    // (Faltan cosas o eso creo)
    public $mensaje_width = '200px';
    public $mensaje_img_ruta = "http://www.ader.es/fileadmin/_processed_/b/1/csm_een-servicio-alertas_78dbc1029f.png";
    public $mensaje_consulta = '';
    public $campos = array(0,1);
    public $mensaje_codigo_previo='';
    public $mensaje_codigo_posterior='<br>';
        
        // CSS para el tamaño de la imagen
        public $mensaje_img_width='25px';
        public $mensaje_img_height='25px';
    
    // SELECT (input)
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
    
    // PIE Y RADIO INFERIOR
    public $footer = 1;
    public $radio_inferior = 1;
    
# El constructor realiza la conexion con la BBDD
public function __construct() {
		require($this-> ruta_archivo_config);

        $db = new mysqli("", "appdelacalle",'sAmArw396%', "detrazos_delacalle") or die("Falló la conexión con MySQL: " . mysqli_connect_error());
        $this -> db = $db;
    }
# El destructor cierra la conexión con la BBDD
public function __destruct() {
    $db = $this->db;
    $db -> close(); 
    }
    
public function tabla() {
        function limpiarArray($array) {
            $array = array_map('trim', $array);
            $array = array_map('stripslashes', $array);
            return $array;
        }
        
        $db = $this->db;
        
        $resultados = $db -> query($this->consulta) or die (mysqli_error($db));
        
        $total_registros = $resultados->num_rows;
        
        // Módulo encargado de eliminar la fila
        # Comprobamos si es una pagina en la que se deberian dar derechos 
        # al usuario final para eliminar filas
        if (in_array('eliminar',$this->columna)) {
            if (isset($_GET['delid'])) {
                    $ideliminar = $db -> real_escape_string($_GET['delid']);
                    
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
        
        $url_formulario = $this->protocolo . $_SERVER['HTTP_HOST'] .":". $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
        ?>
        <style>
            <?php
            if (in_array("mensaje", $this->columna)) {
                ?>
                 /* CSS Para la visualizacion del modulo mensaje */
                /* ########################################### */
                .mensaje_imagen {
                    width: <?=$this->mensaje_img_width?>;
                    height: <?=$this->mensaje_img_height?>;
                    }
                
                .tooltip {
                    position: relative;
                    display: inline-block;
                    border-bottom: 1px dotted black;
                    }
                .tooltip .tooltiptext {
                    visibility: hidden;
                    width: 120px;
                    background-color: black;
                    color: #fff;
                    text-align: center;
                    border-radius: 6px;
                    padding: 5px 0;
                    position: absolute;
                    z-index: 1;
                    bottom: 150%;
                    left: 50%;
                    margin-left: -60px;
                    }
                .tooltip .tooltiptext::after {
                    content: "";
                    position: absolute;
                    top: 100%;
                    left: 50%;
                    margin-left: -5px;
                    border-width: 5px;
                    border-style: solid;
                    border-color: black transparent transparent transparent;
                    }
                .tooltip:hover .tooltiptext {
                    visibility: visible;
                    }
                 /* ########################################### */
                /* ########################################### */
            <?php
            }
            ?>
        </style>    
        
    
    <form accept-charset="<?=$this->form_charset;?>" name="<?=$this->form_name;?>" id="<?=$this->form_id;?>" action="<?=$this->action;?>" method="<?=$this->method;?>" enctype="<?=$this->enctype;?>">
        <!-- Primera Tabla: Contiene todo el listado -->
            <table id='tabla_primera' class='<?=$this->tabla_primera_class;?>' border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td>
                    <?php
                    if ($this->tabla_segunda_activar==1) {
                        ?>
                         <!-- Segunda Tabla: 
                             - Imagen del listado
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
                                        $total_enlaces = count($this->migas);
                                        $contador = 0;
                                        foreach ($this-> migas as $texto => $enlace) {
                                            ?>
                                            <a href="<?=$enlace?>" class="migas"> <?=$texto?> <?php if ($contador < $total_enlaces-1) { echo "»"; } ?></a>
                                            <?php
                                            
                                            $contador++;
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
                       
                        # Antiguo nuevo_registro
                        # Ahora es el menu de la tabla
						if ($this -> menu == true) {
							?>
							<tr class='nuevo_registro_fila'>
							   <td id='menu_td'> 
								   <?php
								   foreach ($this -> menu_url AS $clave => $url) {
										?>
										<a href="<?=$url;?>" >
											<img id='menu_imagen' src="<?=$this->menu_imagen[$clave]?>" alt="Insertar">
										</a>
										<?php
									   }
								   ?>
							   </td>
							</tr>
							<tr class='menu_fila' >
								<td>&nbsp;</td>
							</tr>
						  <?php
						  }
                             
						## Total de registros encontrados
						if ($this -> mostrar_total_registros == true && $total_registros > 0) {
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
						
						$quitar = array('_','-');
						
						if ($total_registros > 0) {
							## Generamos las columnas que contiene la consulta
							$n_columna = 0;   
							while ($finfo = $resultados->fetch_field()) {
								
								# Realizamos la conversión de caracteres
								// - Quitamos guiones, barra baja
								// - Ponemos la primera con mayuscula
								$casilla = str_replace($quitar,' ',$finfo->name);
								$casilla[0] = substr_replace($casilla[0], strtoupper($casilla[0]),0, 1);
								
								?>
								<td class='columna'> <?=$casilla?> </td>
								<?php 
								$columnas[] = $casilla;
								$n_columna++;  
							}
						}               
						?> 
						</tr>
						<?php
						$resultados = $db -> query($this->consulta);
						
						# En caso de no existir resultados -> decimos que no se han encontrado
						if ($total_registros > 0) {
							
							## Generamos cada fila de cada columna 
							$total_columnas = count($columnas);
							$cont = 0;
							while ($fila = mysqli_fetch_array($resultados)) {
								#Color de fila
								if (($cont%2)==0) {
								  $fondo_color='#FFFFFF';
								}
								else {
								  $fondo_color='#CBCBCB';
								}
								?> 
								<tr>
								<?php
								
								for ($i=0; $i < $total_columnas; $i++) {
									
									# En caso de estar vacío el array de las columnas mostramos solo el contenido de la columna
									if (!empty($this->columna)) {
										
										# Recorremos el array columna para saber que modulo aplicar a cada columna
										foreach ($this->columna as $posicion => $valor) {
											
											# A continuacion disponemos de los MODULOS:
											# Si estamos en la columna a modificar, la cambiamos, sino, no hacemos nada
											if ($i == $posicion)  {
													
												switch($valor) {
													
													case 'imagen':
														if (!empty($fila[$i])) {
															?>
															<td class='tabla_listado_celda <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>' bgcolor="<?=$fondo_color;?>"> 
																<img height='<?=$this->img_width?>' width='<?=$this->img_height?>' class='<?=$this->img_class?>' src='<?=$this->img_ruta.$fila[$i]?>' alt="foto"> 
															</td>
															<?php
															}
														else {
															?>
															<td class="tabla_listado_celda " bgcolor="<?=$fondo_color;?>"></td>
															<?php
															}
														break;
														
													case 'ficha':
														?>
														<td class='tabla_listado_celda  <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>' bgcolor="<?=$fondo_color;?>"> 
															<div align="center">
																<a href="<?=$this->ficha_url .$fila[$i]?>">
																	<img src="<?=$this->ficha_img?>" alt="Ver Ficha" title="Ver Ficha" width="16" border="0" />
																</a>
															</div>
														</td>
														<?php
														break;
														
													case 'button':
														?>
														<td class='tabla_listado_celda  <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>' bgcolor="<?=$fondo_color;?>"> <button value="<?=$this->boton_value?>" name='<?=$this->boton_name?>' type="<?=$this->boton_type?>" value='<?=$fila[$i]?>'><?=$this->boton_texto?></button>
														<?php
														break;
														
													case 'eliminar':
														?>
														<td class='tabla_listado_celda <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo "animated " . $this->animacion[$i]; } ?>' bgcolor="<?=$fondo_color;?>" align='center'> 
															<a href="javascript:eliminar('<?=$fila[$i];?>');">
																<img src="<?=$this->eliminar_imagen?>" alt="Eliminar" title="Eliminar" width="16" border="0" />
															</a>
															<script type="text/javascript">
																function removeParam(key, sourceURL) {
																	var rtn = sourceURL.split("?")[0],
																				param,
																				params_arr = [],
																				queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";

																	if (queryString !== "") {
																		params_arr = queryString.split("&");
																		
																		for (var i = params_arr.length - 1; i >= 0; i -= 1) {
																			param = params_arr[i].split("=")[0];
																			if (param === key) {
																				params_arr.splice(i, 1);
																			}
																		}
																		rtn = rtn + "?" + params_arr.join("&");
																	}
																	return rtn;
																}

																function eliminar(id) {
																	var url = window.location.href;
																	
																	if (confirm('¿Seguro que quiere eliminarlo?')) {
																		url = removeParam('delid',url);
																		document.location.href = url+'&delid='+id;
																	}
																}
															</script>
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
														
													case 'estado':
													
														if ( array_key_exists($fila[$i],$this -> estados)) {
															?>
															<td bgcolor="<?=$this -> estados_colores[$fila[$i]]?>" class='tabla_listado_celda <?php if (!empty($this->animacion)) { echo "animated " . $this->animacion[$i]; } ?>'> <?=$this -> estados[$fila[$i]]?> </td>
															<?php
															}
														else {
															?>
															<td> Error: Estado No definido </td>
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
											<td bgcolor="<?=$fondo_color;?>" class="tabla_listado_celda  <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo"animated " . $this->animacion[$i]; } ?>">
												<?=$fila[$i]?> 
											</td>
											<?php
											}
									}
									else {
										?>
										<td bgcolor="<?=$fondo_color;?>" class="tabla_listado_celda "><?=$fila[$i]?> </td>
										<?php
										}
								}
								
								?>  
								</tr>
								<?php
								$cont++;
							}
						}
						else {
							?>
							<td bgcolor="<?=$fondo_color;?>" class="tabla_listado_celda  <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo"animated " . $this->animacion[$i]; } ?>">
								No se encontraron resultados 
							</td>
							<?php
							}
						if ($this->boton_submit==1) {
							?>
							<td colspan='<?=count($columnas)?>' bgcolor="<?=$fondo_color;?>" class="tabla_listado_celda <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo"animated " . $this->animacion[$i]; } ?>">
								<button name='submit' type='submit'> <?=$this->submit_texto;?> </button>
							</td>
							<?php
							}
							?>
						</table>
					</table>
				</tr>
				
              <?php
              if ($this -> footer == 1) {
                  ?>
					<tr>
						<td class="bordeLateral" bgcolor="#FFFFFF">
							<table width="910" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF" class="bordeExterior">
								<tr>
									<td width="2">
										<div align="right"><a href="javascript:window.history.back();"><img src="images/icono-volver.png" alt="Volver" title="Volver" width="16" height="16" border="0" /></a></div>
									</td>
									<td width="40"><a href="javascript:window.history.back();" class="enlace">atr&aacute;s</a></td>
									<td width="2">
										<div align="right"><a href="menu.php?action=soporte"><img src="images/icono-soporte.png" alt="Soporte tecnico" title="Soporte" width="16" height="16" border="0" /></a></div>
									</td>
									<td><a href="menu.php?action=soporte" class="enlace">soporte</a></td>
									<td>
										<div align="right"><a href="salir.php"><img src="images/icono-salir.png" alt="Cerrar" title="Salir" width="16" height="16" border="0" /></a></div>
									</td>
									<td width="80"><a href="salir.php" class="enlace">cerrar sesi&oacute;n</a></td>
								</tr>
							</table>
						</td>
					</tr>
                <?php
                }
                 
                  
				if ($this -> radio_inferior == 1) {
					?>
					<tr>
						<td> <div class="radioinferior"> </div> </td>
					</tr>
					<?php
				}
              ?>
            </table>
        </table>
    </form> 
    <?php
    }
}
?>
