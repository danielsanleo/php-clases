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
    public $db_charset = 'utf8';
    public $protocolo = 'http://';
    public $db;
    
    # MODULOS  EJ: array('2' => 'enlace'); 
    # -----------------------------------
    # Array donde definir los modulos a utilizar
    public $columna = array();
    
    # Animaciones
    # Para habilitar el modulo hay que incluir en la cabecera HTML
    # el link hacia los estilos: <link rel="stylesheet" href="clases/animate.css">
    public $animacion = array();
    
    # BARRA DE MENUS
    # --------------
    // Hace referencia a la barra de menus situada encima del listado y los filtros
    // En la version anterior era el nuevo_registro
	public $menu = 1; # Activar o desactivar
    # Arrays con las urls y las imagenes, los que tengan las mismas claves se entiende que deben aparecer como IMAGEN => URL
    public $menu_url = array( 1 => 'http://www.google.com' );
    public $menu_imagen = array( 1 => 'images/boton-nuevo-operador.png' );
    
    # TOTAL REGISTROS
    # ---------------
    // Si es igual a uno, muestra el total de registros encontrados
    public $mostrar_total_registros = 0;
    public $tipo_registro = ' registros';
    
    
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
    # \ 
	#	-Tabla Primera
    public $tabla_primera_class;
    
	# |
    # \
    #   -Tabla Segunda
    public $tabla_segunda_activar = 1;
    public $tabla_segunda_class = 'bordeExterior';
        
        # |
        # \
        #   -SubTabla Segunda
        public $sub_tabla_segunda_img_alt = 'Foto';
        
    # |
    # \
    #   -Tabla Mensaje
        //Vacio
    
    # |
    # \ 
    #   -Tabla Listado
        //Vacio
        
    
    public $tabla_titulo;
    public $tabla_ruta;
    public $tabla_imagen = 'images/icono-zonas.png';
    
    # Migas de Pan
    # ------------
    public $migasdepan = 1;
    public $migas; # Array que define el arbol hasta el ultimo nodo Ej: array('Menú' => 'menu.php', 'Listado Proveedores' => '');
        
    # MENSAJE INFORMACION
    # -------
    public $tabla_mensaje_class = 'bordeExterior';
    public $mensaje_tiempo = 3000;
    public $mensaje_imagen = 'images/icoInfo.png';
    
    # --------- #
    #  MÓDULOS  #
    # --------  #
    // ENLACE (En versiones anteriores se llamaba ficha)
    # Permite definir enlaces asociados a imagenes
    # Sintaxis de los arrays: (columna => valor)
    public $enlace_title = array(1 => 'Texto Alternativo');
    public $enlace_url = array(1 => 'http://menu.php?action=admin-compras-gestion&id=');
    public $enlace_img = array(1 => 'images/imagen.jpg');
    public $enlace_nueva_ventana = array(1 => true);
    
    // DESCARGA
    public $descarga_url; # Path donde se encuentran los archivos
    public $descarga_nueva_ventana; # ¿Descargar en una nueva ventana? True o False
    public $descarga_ruta_iconos; # Path de los iconos
    
    // IMAGEN 
    public $img_ruta;
    public $img_alt = 'Imagen';
    public $img_height;
    public $img_width;
    public $img_class;

    // TIPO
    // Sustituye el valor de la fila por el valor acorde en el array
    // Ej: Convertir los tipos de usuarios, tipos de productos, categorias, etc.
    public $tipo = array(1 => 'Usuario Admin', 2 => 'Usuario Gestion', 3 => 'Usuario normal'); 
    public $tipo_class = 'texto';

    // FECHA
    // Muestra la fecha en formato español
    public $fecha_formato_entrada = 'Y-m-d';
    public $fecha_formato_salida = 'd/m/Y';
    
    // MONEDA
    // Formatea la fila como si fuera una moneda
    public $moneda_divisa = '€';
    
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
    ##### Es necesaria una revision para depurar y aplicar la filosofia KISS
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
    
    // PAGINACIÓN
    # Permite la paginación de los resultados
    public $paginacion = 1;
    public $pagesize = 2;
    public $pagesize_opciones = array(10,15,20,25,50,100,150,200,250,300,350);
    private $paginas_total;
    
# El constructor realiza la conexion con la BBDD
public function __construct() {
	require($this-> ruta_archivo_config);
	$this -> db = new mysqli("$db_host", "$db_usuario","$db_clave", "$db_nombre") or die("Falló la conexión con MySQL: " . mysqli_connect_error());
	$this -> db -> set_charset($this -> db_charset);
    }
# El destructor cierra la conexión con la BBDD
public function __destruct() {
    $this -> db -> close();
    }
    
public function tabla() {
        function limpiarArray($array) {
            $array = array_map('trim', $array);
            $array = array_map('stripslashes', $array);
            return $array;
        }
       
        $db = $this -> db;
       
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
        
        # Recogemos el parametro 'ordenar' en caso de que exista con el que podremos ordenar la/s columnas
		if (isset($_GET['ordenar'])) {
			$ordenar_columna = $db -> real_escape_string($_GET['ordenar']);
			$ordenado_columna = $db -> real_escape_string($_GET['ordenado']);
			$ordenar_columna++;
			$order = " ORDER BY $ordenar_columna $ordenado_columna";
			$this -> consulta .= $order;
			}
        
        # Si la paginacion esta habilitada:
        # - Reemplazamos en la consulta 'SELECT' por 'SELECT SQL_CALC_FOUND_ROWS' en la primera aparicion 
        # 	lo que nos permite determinar los resultados totales de la tabla a pesar del LIMIT
        # - Comprobamos las variables POST para determinar en que página nos encontramos o si se ha seleccionado otra página (En versiones posteriores seria mejor utilizar metodo GET)
        if ($this -> paginacion == 1) {
			
			function str_replace_first($from, $to, $subject) {
				# Función encargada de sustituir la sentencia 'SELECT' por 'SELECT SQL_CALC_FOUND_ROWS'
				$from = '/'.preg_quote($from, '/').'/';

				return preg_replace($from, $to, $subject, 1);
			}
			
			// Tamaño de la pagina
			if (!empty($_POST['pagesize']) && is_numeric($_POST['pagesize'])) {
				$this -> pagesize = $_POST['pagesize'];
				}
			
			// Página en la que nos encontramos
			if (!empty($_POST['paginacion_accion'])) {
				$pagina = $_POST['paginacion_accion'];
				}
			else {
				$pagina = 1;
				}
				
			// Tupla de inicio
			if (!empty($_POST['paginacion_accion']) && $pagina > 0) {
				$comienzo = (($pagina-1)*$this -> pagesize);
				}
			else {
				$comienzo = 0;
				}

			$this -> consulta = str_replace_first('SELECT', 'SELECT SQL_CALC_FOUND_ROWS', $this->consulta);
			$this -> consulta .= " LIMIT ".$this -> pagesize." OFFSET $comienzo";
			}
		
        $resultados = $db -> query($this->consulta) or die (mysqli_error($db));

		// Total de páginas y registros
        $total_registros = $db -> query("SELECT FOUND_ROWS()") -> fetch_array()[0];
        
        $this -> paginas_total = ceil($total_registros/$this->pagesize);
            
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
        
        
        $url_formulario = $this->protocolo . $_SERVER['HTTP_HOST'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
        
        ?>
        <style>
            <?php
            if (in_array('mensaje', $this->columna)) {
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
            <table id='tabla_primera' width="100%" class='<?=$this->tabla_primera_class;?>' border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td>
                    <?php
                    if ($this->tabla_segunda_activar==1) {
                        # Segunda Tabla: 
                        #   - Imagen del listado
                        #   - Migas de Pan      
                        ?>
                        <table id='tabla_segunda' class='<?=$this->tabla_segunda_class;?>' width="100%" bgcolor="#F2F2F2">
                            <tr>
                                <td id='tabla_segunda_td'>
                                    <table id='sub_tabla_segunda'>
                                    <tr>
                                        <td id='sub_tabla_segunda_td'> 
											<a href="<?=$this->tabla_ruta?>"> 
												<img id='sub_tabla_segunda_img' src="<?=$this->tabla_imagen?>" alt="<?=$this->sub_tabla_segunda_img_alt?>" >
											</a>
										</td>
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
                                            <a href="<?=$enlace?>" class="textoBlanco"> <?=$texto?> <?=($contador < $total_enlaces-1)?'»':''; ?></a>
                                            <?php
                                            $contador++;
                                            }
                                        ?>
                                    </div>
                                </td>
                             </tr>
                             <?php
                             }
                         # Mensaje a mostrar en caso de que exista en la URL
                         # A los tres segundos se borra
                         if (!empty($_GET['mensaje'])) {
                              $_GET['mensaje'] = htmlspecialchars($_GET['mensaje'], ENT_QUOTES, 'UTF-8');
                              ?>
                              <script>
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
                                  <table id='tabla_mensaje_texto' width="45%" class="<?=$this->tabla_mensaje_class?>" border="0" style='text-align:center;' cellpadding="4" cellspacing="0" bgcolor="#BBBBBB" >
                                    <tr>
                                      <td><div style='text-align:center;'><img src="<?=$this->mensaje_imagen?>" alt="Informacion" border="0" align="absmiddle">&nbsp;<span class='textoBlanco'><?=$_GET['mensaje'];?></span></div></td>
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
							   <td id='menu_td' style="padding:4px;" bgcolor="#ABABAB">
								   <?php
								   foreach ($this -> menu_url AS $clave => $url) {
										?>
										<a class='menu_enlace' href="<?=$url;?>" >
											<img class='menu_imagenes' src="<?=$this->menu_imagen[$clave]?>" alt="">
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
									<div id='total_registros_texto' class="textoPeque">Se han encontrado <?=$total_registros;?> <?=$this -> tipo_registro?></div>
								</td>
							</tr>
							<?php
						}
					}
					?>
					<table id='tabla_listado' width="100%" class='bordeExterior'>
						<tr id='tabla_listado_columna' bgcolor="#999999" class='textoBlanco'>
						<?php
						
						$quitar = array('_','-');
						
						if ($total_registros > 0) {
							
							# Buscamos en el array 'columna' si existe el valor 'clave_primaria' -> en tal caso no mostraremos dicha columna, se utilizará para guardar la clave primaria de la fila
							$posicion_clave_primaria = array_search('clave_primaria', $this -> columna);
							
							
							## Generamos las columnas que contiene la consulta
							$n_columnas = 0;
							
							# Eliminamos los anteriores parametros de ordenacion para no saturar la URL añadiendo los mismos parámetros
							if (isset($_GET['ordenar']) && !empty($_GET['ordenado'])) {
								$param_ordenar = $_GET['ordenar'];
								$param_ordenado = $_GET['ordenado'];
								
								unset($_GET['ordenar']);
								unset($_GET['ordenado']);
								}
							
							while ($finfo = $resultados->fetch_field()) {
								
								# Realizamos la conversión de caracteres
								// - Quitamos guiones, barra baja
								// - Ponemos la primera con mayuscula
						
								$casilla = str_replace($quitar,' ',$finfo->name);
								$casilla[0] = substr_replace($casilla[0], strtoupper($casilla[0]),0, 1);
								
								# Abajo mostramos el nombre de la columna y además, mostramos un enlace para ordenar la columna, si procede
								?>
								<td class='columna'> 
									<?php
									if (!empty($this -> ordenar[$n_columnas])) {
										# Parseamos la URL para crear el enlace para ordenar por columna
										# Revertimos el orden para permitir ordenar de forma ASC y DESC
										
										$ordenado = $this -> ordenar[$n_columnas];
										$ordenar_icono = 'images/icono-ordenar.png';
										
										if (isset($param_ordenar)) {
											if ($param_ordenar == $n_columnas) {
												switch ($param_ordenado) {
													case 'ASC':
														$ordenado = 'DESC';
														$ordenar_icono = 'images/icono-ordenar2.png';
														break;
													
													case 'DESC':
														$ordenado = 'ASC';
														$ordenar_icono = 'images/icono-ordenar.png';
														break;
													}
												}
											}
										?>
										<a href='<?=$_SERVER['PHP_SELF'].(!empty($_GET)?'?'.http_build_query($_GET).'&':'?').'ordenar='.$n_columnas.'&ordenado='.$ordenado?>'><?=$casilla?><?=(isset($param_ordenar) && $param_ordenar == $n_columnas)?"<img src='$ordenar_icono' alt='Ordenar'>":''?></a>
										<?php
										}
									    else {
											echo $casilla;
											}
									?>
								</td>
								<?php
								
								# El array columnas no se utiliza (revisar) 
								$columnas[] = $casilla;
								
								$n_columnas++;
							}
						}           
						?> 
						</tr>
						<?php
						
						$resultados -> data_seek(0);
						
						# En caso de no existir resultados -> decimos que no se han encontrado
						if ($total_registros > 0) {
							
							## Generamos cada fila de cada columna
							$cnt = 0;
							while ($fila = mysqli_fetch_array($resultados)) {
								
								#Color de fila
								if (($cnt%2)==0) {
								  $fondo_color = '#FFFFFF';
								}
								else {
								  $fondo_color = '#CBCBCB';
								}
								?> 
								<tr>
								<?php
								for ($i = 0; $i < $n_columnas; $i++) {
									# Animaciones
									(!empty($this->animacion) && !empty($this->animacion[$i]))?$animacion = 'animated ' . $this -> animacion[$i]:$animacion='';
									
									# En caso de estar vacío el array de las columnas mostramos solo el contenido de la columna
									if (!empty($this->columna[$i])) {

										?>
										<td class='tabla_listado_celda <?=$animacion?>' bgcolor="<?=$fondo_color;?>"> 
										<?php
										
										switch($this->columna[$i]) {
											case 'imagen':
												if (!empty($fila[$i])) {
													?>
													<img height='<?=$this->img_width?>' width='<?=$this->img_height?>' class='<?=$this->img_class?>' src='<?=$this->img_ruta.$fila[$i]?>' alt="Imagen">
													<?php
													}
												break;

											case 'enlace':
												?>
												<div style='text-align:center;' >
													<a href="<?=$this->enlace_url[$i].$fila[$i]?>" <?=(!empty($this->enlace_nueva_ventana[$i]) && $this->enlace_nueva_ventana[$i]==1)?'target="_blank"':'';?>>
														<img src="<?=$this->enlace_img[$i]?>" alt="<?=$this->enlace_title[$i]?>" title="<?=$this->enlace_title[$i]?>" style='width: 16px;'>
													</a>
												</div>
												<?php
												break;

											case 'tipo':
												?>
												<?=(!empty($this->tipo[$fila[$i]]))?$this->tipo[$fila[$i]]:"El tipo {$fila[$i]} no existe";?>
												<?php
												break;

											case 'descarga':
												?>
												<div style='text-align:center;' >
													<a href="<?=$this->descarga_url .$fila[$i]?>" target="<?=$this->descarga_nueva_ventana == true?'target="_blank"':''?>">
														<?php
														# Obtenemos la extension y mostramos el icono correspondiente
														switch (end(explode('.', $fila[$i]))) {
															case 'ai':
																$archivo_icono = 'ai.png';
																break;
															case 'mp3':
															case 'wav':
																$archivo_icono = 'audio.png';
																break;
															case 'doc':
															case 'odf':
															case 'docx':
																$archivo_icono = 'doc.png';
																break;
															case 'htm':
															case 'html':
															case 'php':
															case 'asp':
																$archivo_icono = 'html.png';
																break;
															case 'jpg':
															case 'jpeg':
															case 'gif':
															case 'png':
																$archivo_icono = 'jpg.png';
																break;
															case 'pdf':
																$archivo_icono = 'pdf.png';
																break;
															case 'psd':
																$archivo_icono = 'psd.png';
																break;
															case 'rar':
																$archivo_icono = 'rar.png';
																break;
															case 'txt':
																$archivo_icono = 'txt.png';
																break;
															case 'avi':
															case 'mpg':
															case 'mpeg':
															case 'mp4':
																$archivo_icono = 'video.png';
																break;
															case 'xls':
															case 'xlsx':
																$archivo_icono = 'xls.png';
																break;
															case 'zip':
																$archivo_icono = 'zip.png';
																break;
															case 'ppt':
															case 'pptx':
															case 'pps':
															case 'ppsx':
																$archivo_icono = 'ppt.png';
																break;
															default:
																$archivo_icono = 'txt.png';
																break;
															}
														?>
														<img src="<?=$this -> descarga_ruta_iconos.$archivo_icono?>" alt="Descargar Archivo" title="Descargar Archivo" width="16">
													</a>
												</div>
												<?php
												break;
												
											case 'button':
												?>
												<button value="<?=$this->boton_value?>" name='<?=$this->boton_name?>' type="<?=$this->boton_type?>" value='<?=$fila[$i]?>'><?=$this->boton_texto?></button>
												<?php
												break;
												
											case 'eliminar':
												?>
												<a href="javascript:eliminar('<?=$fila[$i];?>');">
													<img src="<?=$this->eliminar_imagen?>" alt="Eliminar" title="Eliminar" width="16" border="0" />
												</a>
												<?php
												break;
											case 'moneda':
												?>
												<?=$fila[$i]?> <?=$this -> moneda_divisa?>
												<?php
												
												break;
											
											case 'fecha':
												if (!empty($fila[$i])) {
													?>
													<?=DateTime::createFromFormat($this -> fecha_formato_entrada, $fila[$i]) -> format($this -> fecha_formato_salida);?>
													<?php
													}
												else {
													?>
													<?=$fila[$i]?>
													<?php
													}
													
												break;
											
											case 'operacion':
											
												?>
												<input name='<?=$this->name_operacion?>[<?=$fila[$i]?>]' type='<?=$this->type?>' min="0"> 
												<?php
												
												break;
												
											case 'estado':
											
												if ( array_key_exists($fila[$i],$this -> estados)) {
													?>
													<?=$this -> estados[$fila[$i]]?>
													<?php
													}
												else {
													?>
													Error: Estado No definido
													<?php
													}
												break;
											
											case 'mensaje':
												?>
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
												<?php
												break;
											
											case 'select':
												$registros = $db -> query($this->select_consulta);
												?>
												<select name='<?=$this->select_name.$fila[$i]?>' form='<?=$this->form_id?>' onchange='this.form.submit()'>
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
												<?php
												break;
										}
										?>
										</td>
										<?php
									}
									else {
										?>
										<td bgcolor="<?=$fondo_color;?>" class='tabla_listado_celda <?=$animacion?>'>
											<?=$fila[$i]?> 
										</td>
										<?php
									}
								}
								?>  
								</tr>
								<?php
								$cnt++;
							
							}
						}
						else {
							?>
							<td style='text-align: center;' bgcolor="#BCBABA" class="tabla_listado_celda">
								No se encontraron resultados
							</td>
							<?php
							}
						?>
						</table>
						
						<?php
						if ($this -> boton_submit==1) {
							?>
							<td colspan='<?=$n_columnas?>' bgcolor="<?=$fondo_color;?>" class="tabla_listado_celda <?php if (!empty($this->animacion) && !empty($this->animacion[$i])) { echo"animated " . $this->animacion[$i]; } ?>">
								<button name='submit' type='submit'> <?=$this->submit_texto;?> </button>
							</td>
							<?php
							}
							?>
					</table>
				</tr>
				<?php
				# Mostramos el javascript para el modulo eliminar
				?>
				<script type="text/javascript">
					function removeParam(key, sourceURL) {
						var rtn = sourceURL.split("?")[0],
									param,
									params_arr = [],
									queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
						
						var existe = sourceURL.split("?")[1];
						if (typeof(existe) == 'undefined') {
							var parametro = '?';
							}
						else {
							var parametro = '&';
							}
						
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
						return {rtn:rtn,parametro:parametro}	
					}
					
					function eliminar(id) {
						var url = window.location.href;
						if (confirm('¿Seguro que quiere eliminarlo?')) {
							url = removeParam('delid',url);
							document.location.href = url.rtn + url.parametro + 'delid='+id;
						}
					}
				</script>
				
				<?php
				if ($this -> paginacion == 1) {
					?>
					<br>
					<tr>
						<td align='center' class="bordeLateral">
							<table cellspacing="2" cellpadding="2" border="0" style="text-align:center; margin: 10px;">
								<tr>
									<td style="text-align:left; padding-left:20px;" class="search">
										<input type='hidden' id='paginacion_accion' name='paginacion_accion' value='null'>
										<script>
											function cambiar(accion) {
												document.getElementById('paginacion_accion').value=accion;
												document.<?=$this -> form_name?>.submit();
												}
										</script>
										Mostrar #
										<select name="pagesize" id="pagesize" style="width:75px;" onchange='this.form.submit()'>
											<?php 
											foreach ($this -> pagesize_opciones AS $size) {
												?>
												<option value="<?=$size?>" <?=($this->pagesize==$size)?'selected':'';?>><?=$size?></option>
												<?php
												}
											?>
										</select>
									</td>
									<td style="text-align:left; padding-left:20px;" >
										<div class="button2-right" title="Iniciar" style="cursor:pointer;font-family:Arial;" id="lnkFirst" onclick="cambiar(0)">
											<div class="start" style="cursor:pointer">
												<span>
													<nobr>Iniciar</nobr>
												</span>
											</div>
										</div>
									</td>
									<td style="text-align:left;">
										<div class="button2-right" title="Anterior" style="cursor:pointer;font-family:Arial;" id="lnkPrev" onclick="cambiar(<?=($pagina>0)?$pagina-1:'0'?>)">
											<div class="prev"><span>Anterior</span></div>
										</div>
									</td>
									<td class="search" style="padding:0px 10px 0px 10px; text-align:left;">
										Página
										<select name="pagina" id="pagina" style="width:75px;" onchange='cambiar(this.form.pagina.value)'>
											<?php
											for ($i=1; $i<=$this -> paginas_total ;$i++) {
												?>
												<option value="<?=$i?>" <?=($pagina == $i)?' selected':''?>><?=$i?></option>
												<?php
												}
											?>
										</select>
										de <?=$this -> paginas_total;?>
									</td>
									<td style="text-align:right;">
										<div class="button2-left" title="Siguiente" style="cursor:pointer;font-family:Arial;" id="lnkNext" <?php if ($this -> paginas_total != $pagina) { ?> onclick="cambiar(<?=($pagina>1)?$pagina+1:'2'?>)" <?php } else { ?> <?php }?>>
											<div class="next" style="cursor:pointer"><span>Siguiente</span></div>
										</div>
									</td>
									<td style="padding-right:20px; text-align:right;">
										<div class="button2-left" title="Final" style="cursor:pointer; font-family:Arial;" onclick="cambiar(<?=$this -> paginas_total?>)">
											<div class="end">
												<span>
													<nobr>Final</nobr>
												</span>
											</div>
										</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<br>
				<?php
				}
				
				if ($this -> footer == 1) {
				    ?>
					<tr>
						<td align='center' bgcolor="#FFFFFF" class="bordeLateral">
							<table class="bordeExterior" style='width: 910px; margin-bottom: 20px;text-align:center; background-color:#FFFFFF;' cellpadding="4" cellspacing="0">
								<tr>
									<td style='width: 2px;'>
										<div style='text-align:right;'>
											<a href="javascript:window.history.back();">
												<img src="images/_active__undo.gif" alt="Volver" title="Volver" width="16" height="16" border="0">
											</a>
										</div>
									</td>
									<td width="40">
										<a href="javascript:window.history.back();" class="enlace">atr&aacute;s</a>
									</td>
									<td style='width: 2px;'>
										<div style='text-align:left;'>
											<a href="menu.php?action=soporte">
												<img style='width:16px; height: 16px;' src="images/help2.png" alt="Soporte tecnico" title="Soporte">
											</a>
										</div>
									</td>
									<td style='text-align:left;'>
										<a href="menu.php?action=soporte" class="enlace">soporte</a>
									</td>
									<td>
										<div style='text-align:right;'>
											<a href="salir.php">
												<img src="images/_active__exit.gif" alt="Cerrar" title="Salir" width="16" height="16" border="0">
											</a>
										</div>
									</td>
									<td style='width: 80px;'>
										<a href="salir.php" class="enlace">cerrar sesi&oacute;n</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				<?php
				}
                  
				if ($this -> radio_inferior == 1) {
					?>
					<tr style='width:100%;' align='center'>
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
