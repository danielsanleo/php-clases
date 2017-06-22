<?php 
class base
{
    # CONSULTA GENERAL
    # ----------------
    public $consulta = 'SELECT nombre,id as Ficha from oficinas';
    public $debug = False;

    // ORDENACIÓN
    # Orden predeterminado que mostrará la tabla.
    # Array en el que pasamos los parámetros en la forma nº de columna a ordenar => tipo de ordenación.
    # Ejemplo → array(2 => 'ASC', 3 => 'DESC', 1 => 'DESC');
    public $orden_predeterminado = array();
	public $orden_anidado = 1; # Existen dos tipos de orden: Por varias columnas conjuntamente o solo por una
	
	# Filtros
	# --------
	# Funcionan de forma similar a los modulos del listado
	# Existen dos tipos:
	# buscar: input de tipo texto
	# select: input select
	# Los de tipo select necesitan una consulta que devolverá dos campos (id, valor)
	# Ademas podemos especificar mas de una columna en la que realice la busqueda
	
	# Array con los filtros a crear, contiene el total de filtros
	//~ public $filtros = array(1 => 'buscar', 2 => 'select', 3 => 'select');
	public $filtros = array();
							
	# Array con los nombres visibles de los campos
	//~ public $filtros_texto = array(1 => 'Descripcion', 2 => 'Fabricante', 3 => 'Subfamilia');
	public $filtros_texto = array();
								   
	# Consultas para los filtros de tipo select
	//~ public $filtros_consultas = array(2 => 'SELECT id, nombre FROM fabricantes', 3 => 'SELECT id, nombre FROM subfamilias');
	public $filtros_consultas = array(); 
	
	# Columnas de la BBDD a la que aplicar los filtros, podemos especificar un solo valor o un array con varios
	//~ public $filtros_where = array(1 => array('referencia', 'descripcion'), 2 => 'id_fabricante', 3 => 'id_subfamilia');
	public $filtros_where = array();
								  
	# Array con los operadores correspondientes a cada filtro, son los mismos que podemos utilizar en las sentencias SQL
	//~ public $filtros_where_tipo = array(1 => 'LIKE', 2 => '=', 3 => '=');
	public $filtros_where_tipo = array();
								       
	public $filtros_boton_buscar = True;  # Muestra el boton submit
	
	
    # Variables Globales
    # ------------------
    //Archivo de configuracion, donde toma los datos para la conexion a la base de datos
    public $ruta_archivo_config = 'config.php';
    public $db_charset = 'utf8';
    public $protocolo = 'http://';
    public $db;
    
    # MODULOS  EJ: $columna = array('2' => 'enlace'); 
    # -----------------------------------
    # Array donde definir los modulos a utilizar
    public $columna = array();
    
    # Animaciones
    # Para habilitar el modulo hay que incluir en la cabecera HTML
    # el link hacia los estilos: <link rel="stylesheet" href="clases/animate.css">
    public $animacion = array();
    
    public $abcedario = 1; # 1 -> Habilitamos el filtro por letra
    public $abcedario_columnas = array('nombre', 'codigo_postal'); # Array de columnas donde debe buscar
    
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
    public $descarga_ruta_iconos = './images/iconos/'; # Path de los iconos
    
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

    // LISTA
	public $lista_consulta; # Consulta para cada una de las filas (devuelve un unico valor)
    
    // DESACTIVAR
    # Permite cambiar (UPDATE) un valor de una columna de una fila
    # 
    public $desactivar = 1;
    public $desactivar_tabla = 'familias';
	public $desactivar_columna = 'activo';
	public $desactivar_valor = 0;
	public $desactivar_id = 'id';
	public $desactivar_imagen = 'images/boton-eliminar.png';
	public $desactivar_alt = 'Eliminar';
	public $desactivar_texto_confirmar = '¿Seguro que quiere eliminarlo?';
    
    // PETICIÓN AJAX
	# Realiza una petición ajax a un fichero de nuestra elección, pasando los parámetros que deseemos
	# Formato: array(<columna> => <parámetro>);
	public $ajx_img; 	#imagen/icono 
	public $ajx_img_dwn;#imagen para la pulsación del ratón sobre la imagen
	public $ajx_title;	#texto alternativo para la imagen
	public $ajx_url;	#url a la que se dirige la petición
	public $ajx_method;	#método get/post
	public $ajx_id;		#nombre para el valor de la columna que se envía por ajax
	public $ajx_params;	#parámetros extra para añadirlos al json que se envía por ajax
						#formato de array bidimensional: array(<columna> => array(<parámetro> => <valor>[, <parámetro> => <valor>...][, <columna> => array(<parámetro> => <valor>[, <parámetro> => <valor>...]])
    
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
public function __construct($ruta) {
	require($ruta);
	unset($ruta);
	$this -> db = new mysqli("$db_host", "$db_usuario","$db_clave", "$db_nombre") or die('Falló la conexión con MySQL: <br>'.$db -> connect_error.'<br>');
	$this -> db -> set_charset($this -> db_charset);
    }
# El destructor cierra la conexión con la BBDD
public function __destruct() {
    $this -> db -> close();
    }
    
private function limpiarArray($array) {
	$array = array_map('trim', $array);
	$array = array_map('stripslashes', $array);
	return $array;
}

# Método para obtener el thumnbnail a partir de la extension del nombre fichero
private function getImageFile ($fichero) {
	$extension = end(explode('.', $fichero));
	
	switch ($extension) {
		case 'ai':
			return 'ai.png';
			break;
		case 'mp3':
		case 'wav':
			return 'audio.png';
			break;
		case 'doc':
		case 'odf':
		case 'docx':
			return 'doc.png';
			break;
		case 'htm':
		case 'html':
		case 'php':
		case 'asp':
			return 'html.png';
			break;
		case 'jpg':
		case 'jpeg':
		case 'gif':
		case 'png':
			return 'jpg.png';
			break;
		case 'pdf':
			return 'pdf.png';
			break;
		case 'psd':
			return 'psd.png';
			break;
		case 'rar':
			return 'rar.png';
			break;
		case 'txt':
			return 'txt.png';
			break;
		case 'avi':
		case 'mpg':
		case 'mpeg':
		case 'mp4':
			return 'video.png';
			break;
		case 'xls':
		case 'xlsx':
			return 'xls.png';
			break;
		case 'zip':
			return 'zip.png';
			break;
		case 'ppt':
		case 'pptx':
		case 'pps':
		case 'ppsx':
			return 'ppt.png';
			break;
		default:
			return 'txt.png';
			break;
		}
}

# Tipos de filtros que pueden existir
# Cada uno va asociada de un tipo de condicion y valores
private function createCondition ($tipo, $columna, $valor) {
	if (!empty($tipo) && !empty($valor)) {
		switch ($tipo) {
			case 'periodo':
				if (!empty($valor[0]) && !empty($valor[1])) {
					return ' ('.$columna.' BETWEEN "'.DateTime::createFromFormat('d/m/Y',$valor[0]) -> format('Y-m-d').'" AND "'.DateTime::createFromFormat('d/m/Y', $valor[1]) -> format('Y-m-d').'")';
					}
				break;
				
			case 'buscar':
				return ' '.$columna.' LIKE "%'.$this -> db -> real_escape_string($valor).'%"';	
				break;
				
			case 'select':
				return ' '.$columna.' = "'.$this -> db -> real_escape_string($valor).'"';
				break;
				
			case 'checkboxes':
				$return = ' (';
				
				$cnt = 0;
				foreach ($valor AS $id => $val) {
					if (!empty($val)) {
						if (!empty($cnt)) {
							$return .= ' OR ';
							}
						
						$return .= ' '.$columna.' = "'.$this -> db -> real_escape_string($id).'"';
						}
					$cnt++;
					}
				
				return $return.')';
				
				break;
				
			default:
				return '';
		}
	}
}

# Metodo encargado de seleccionar el icono para el orden
private function icono($orden_actual) {
	switch ($orden_actual) {
		case 'ASC':
			return 'images/icono-ordenar.png';
			break;
		
		case 'DESC':
			return 'images/icono-ordenar2.png';
			break;
		}
	}

private function str_replace_first($from, $to, $subject) {
	# Función encargada de sustituir la sentencia 'SELECT' por 'SELECT SQL_CALC_FOUND_ROWS'
	$from = '/'.preg_quote($from, '/').'/';

	return preg_replace($from, $to, $subject, 1);
	}

public function tabla() {
        
        if ($this -> debug) {
			echo '<strong>Memoria Inicial:</strong> '.memory_get_usage().' Bytes <br>';
			}
       
        // Módulo encargado de eliminar la fila
        # Comprobamos si es una pagina en la que se deberian dar derechos 
        # al usuario final para eliminar filas
        if (in_array('eliminar', $this -> columna)) {
            if (isset($_GET['delid'])) {
                    $ideliminar = $this -> db -> real_escape_string($_GET['delid']);
                    
                    $query = "DELETE FROM $this->eliminar_tabla WHERE $this->eliminar_columna ='$ideliminar'";
                    
					if ($this -> debug) {
						echo '<strong>Consula eliminar: </strong> <br>';
						echo $query;
					}
                    $this -> db -> query($query);
                }
            }

		# Desactivar fila (activo=0)
		if ($this -> desactivar && !empty($_GET['did'])) {
			$did = $this -> db -> real_escape_string($_GET['did']);
			$columna = $this -> desactivar_columna;
			
			$query = 'UPDATE '.$this -> desactivar_tabla.' SET '.$this ->desactivar_columna.'="'.$this->desactivar_valor.'" WHERE '.$this -> desactivar_id.'="'.$did.'"';
			
			if ($this -> debug) {
				echo '<strong>Consula desactivar: </strong><br>';
				echo $query;
				}
			
			$this -> db -> query($query) or die('Error consulta desactivar:'.$this -> db -> error);
			}
        
        # Eliminamos ; al final de la consulta en caso de que exista
        $this -> consulta = str_ireplace(';', '', $this -> consulta);
        
        # Aplicamos los filtros en caso de que se envie el formulario
        if ($this -> debug && $_POST) {
			echo "<strong>POST:</strong>";
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			}
        
        if ($_POST && !empty($this -> filtros)) {
			
			function tipo($tipo, $valor) {
				switch ($tipo) {
					case 'LIKE':
						return '"%'.$valor.'%"';
						break;
					
					case '=':
						return '"'.$valor.'"';
						break;

					case '!=':
						return '"'.$valor.'"';
						break;
					
					default:
						return '"'.$valor.'"';
						break;
					}
				}
			
			$where = ' WHERE ';
			
			# Comprobamos si existe WHERE 
			$pos_where = stripos($this -> consulta, 'WHERE');
			
			if ($pos_where) {
				# Ponemos unos parentesis para que la nueva condicion no filtre mal
				$this -> consulta = str_ireplace('WHERE ', 'WHERE ( ', $this -> consulta);
				
				# Comprobamos si existe el GROUP BY
				$pos_group = stripos($this -> consulta, 'GROUP BY');
				
				# Si existe el group lo separamos de la consulta principal temporalmente
				if ($pos_group) {
					$group = ' '.substr($this -> consulta, $pos_group);
					$this -> consulta = substr($this -> consulta, 0, $pos_group);
					}
					
				$this -> consulta .= ')';
				
				$where = ' AND ';
				}
			else {
				# Comprobamos si existe el GROUP BY
				$pos_group = stripos($this -> consulta, 'GROUP BY');
				
				if ($pos_group) {
					$group = substr($this -> consulta, $pos_group);
					$this -> consulta = substr($this -> consulta, 0, $pos_group);
					}
				}
				

			# Recorremos los nombres de los filtros para comprobar si contienen algo
			# Iniciamos el FOR en 2 ya que depende del contador ($cnt) que establece el nombre a los inputs y comienza en 2 para poner los TRs
			$where .= '(';
			for ($f = 2; $f <= count($this -> filtros)+1; $f++) {
				
				$nombre = 'filtro'.$f;
				$index = $f - 1;
				
				if (isset($_POST[$nombre]) && $_POST[$nombre] !='-' && $_POST[$nombre] !='') {
				
					# Flag es el encargado de determinar si poner el AND al principio o no.
					if (!empty($flag)) {
						$where .= ' AND ';
						}
						
					if (is_array($_POST[$nombre])) {
						foreach ($_POST[$nombre] AS $a => $b) {
							if (!empty($b)) {
								$flag = 1;
								break;
								}
							}
						}
					else {
						$flag = 1;
						}
					
					# El array filtros_where puede contener un valor o varios (array) en sus valores
					if (is_array($this -> filtros_where[$index])) {
						
						end($this -> filtros_where[$index]);
						$finalito = key($this -> filtros_where[$index]);
						reset($this -> filtros_where[$index]);
						
						$where .= '(';
						foreach ($this -> filtros_where[$index] AS $clave => $busqueda) {
							
							$where .= $this -> createCondition($this -> filtros[$index], $busqueda, $_POST[$nombre]);
							
							if ($clave != $finalito)
								$where .= ' OR';
								}

						$where .= ')';
						}
					else {
						# El switch de momento lo he puesto para los filtros 'periodo' los cuales, entiendo, que lo normal es que filtren por una sola columna de fechas. 
						$where .= $this -> createCondition($this -> filtros[$index], $this -> filtros_where[$index], $_POST[$nombre]);
						}
					}
				}
				$where .= ')';
			}

		# Concatenamos el WHERE
		if (!empty($flag)) {
			$this -> consulta .= $where;
			}
			
		# Concatenamos el GROUP
		if (isset($group)) {
			$this -> consulta .= $group;
			}
		
		# Liberamos memoria
		unset($where);
		unset($group);
        
        # Recogemos el parametro 'ordenar' en caso de que exista para ordenar la/s columnas
		if (isset($_GET['ordenar'])) {
			$ordenar = unserialize(urldecode($_GET['ordenar']));
			$this -> consulta .= ' ORDER BY ';
			
			end($ordenar);
			$ultima_clave = key($ordenar);
			reset($ordenar);
			
			foreach ($ordenar as $clave => $valor) {
				$clave++;
				$this -> consulta .= $this -> db -> real_escape_string($clave).' '.$this -> db -> real_escape_string($valor).(($clave-1 != $ultima_clave)?', ':'');	
			}
		}
		else if (!empty($this -> orden_predeterminado)) {
			$this -> consulta .= ' ORDER BY ';
			
			end($this -> orden_predeterminado);
			$ultima_clave = key($this -> orden_predeterminado);
			reset($this -> orden_predeterminado);
			
			foreach ($this -> orden_predeterminado as $clave => $valor) {
				$this -> consulta .= ($clave+1)." $valor".(($clave != $ultima_clave)?', ':'');	
			}
		}
		
        
        # Si la paginacion esta habilitada:
        # - Reemplazamos en la consulta 'SELECT' por 'SELECT SQL_CALC_FOUND_ROWS' en la primera aparicion 
        # 	lo que nos permite determinar los resultados totales de la tabla a pesar del LIMIT
        # - Comprobamos las variables POST para determinar en que página nos encontramos o si se ha seleccionado otra página (En versiones posteriores seria mejor utilizar metodo GET)
        if ($this -> paginacion == 1) {
			
			// Tamaño de la pagina
			if (!empty($_GET['pagesize']) && is_numeric($_GET['pagesize'])) {
				$this -> pagesize = $_GET['pagesize'];
				}
			
			// Página en la que nos encontramos
			if (!empty($_GET['pagina'])) {
				$pagina = $_GET['pagina'];
				}
			else {
				$pagina = 1;
				}
				
			// Tupla de inicio
			if (!empty($_GET['pagina']) && $pagina > 0) {
				$comienzo = (($pagina-1)*$this -> pagesize);
				}
			else {
				$comienzo = 0;
				}

			$this -> consulta = $this -> str_replace_first('SELECT', 'SELECT SQL_CALC_FOUND_ROWS', $this->consulta);
			$this -> consulta .= " LIMIT ".$this -> pagesize." OFFSET $comienzo";
			}
		
		
		if ($this -> debug) {
			echo '<strong>Consulta:</strong><br>';
			echo $this -> consulta.'<br>';
		
			echo '<br>';
			echo '<strong>Columnas:</strong><br>';
			echo '<pre>';
			print_r($this -> columna);
			echo '</pre>';
			}
			
		
		
        $resultados = $this -> db -> query($this->consulta) or die (mysqli_error($this -> db).'<br>');

		unset($this -> consulta);

		// Total de páginas y registros
        $total_registros = $this -> db -> query("SELECT FOUND_ROWS()") -> fetch_array()[0];
        
        $this -> paginas_total = ceil($total_registros/$this->pagesize);

        // POST
        //~ if ($_POST) {

            # Valores devueltos por el modulo SELECT
            //~ if (!empty($_POST[$this->select_name])) {
                    //~ $_POST = $this -> limpiarArray($_POST);
                    
                    //~ for ($i = $minimo[0]; $i <= $maximo[0] ;$i++) {
                        //~ $tmp = $this -> select_name . $i;
                        //~ if (!empty($_POST[$tmp])) {
                            //~ $_SESSION['valor'] = $_POST[$tmp];
                            //~ $_SESSION['i'] = $i;
                    //~ }
                //~ }
            //~ }
		//~ }
        
        $url_formulario = $this -> protocolo.$_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
        
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
        
        <script>
			function validar() {
					var fecha_ini = document.getElementById('fecha_ini').value;
					var fecha_fin = document.getElementById('fecha_fin').value;

					if (fecha_ini !== null && fecha_fin !== null) {
						if (fecha_ini != '' && fecha_fin == '') {
							alert('Introduzca la fecha de fin');
							return false;
						}
						else if (fecha_ini == '' && fecha_fin != '') {
							alert('Introduzca la fecha de inicio');
							return false;
							}
						else {
							return true;
							}
					}
				}
        </script>
        
        <form accept-charset="<?=$this->form_charset;?>" name="<?=$this->form_name;?>" id="<?=$this->form_id;?>" action="<?=$this->action;?>" method="<?=$this->method;?>" enctype="<?=$this->enctype;?>" onsubmit='return validar()'>
			<?php
			# Primera Tabla: Contiene todo el listado
			?>
			<table id='tabla_primera' width="100%" class='<?=$this->tabla_primera_class;?>' border="0" cellspacing="0" cellpadding="20">
				<tr>
					<td>
                    <?php
                    if ($this -> tabla_segunda_activar==1) {
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
											<a href="<?=$_GET['action']?>"> 
												<img id='sub_tabla_segunda_img' src="<?=$this->tabla_imagen?>" alt="<?=$this->sub_tabla_segunda_img_alt?>" >
											</a>
										</td>
                                        <td id='sub_tabla_segunda_td_titulo'><span class='departamento'><?=$this->tabla_titulo?></span></td>
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
                                <td align='center'>
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
										<a class='menu_enlace' href="<?=$url;?>" ><img class='menu_imagenes' src="<?=$this->menu_imagen[$clave]?>" alt="Menu"></a>
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
							
						?>
						<tr>
							<td>
								<div style="border:1px solid #CCCCCC; margin:5px; padding:5px; background-color:#F3F3F3;">
									<table width="100%" border="0" cellspacing="0" cellpadding="5">
											<?php
											if ($_POST && !empty($this -> filtros)) {
												?>
												<tr>
													<td colspan='2' align='right'><a href='<?=$url_formulario?>'><img src='images/boton-elim-filtro.png'></a></td>
												</tr>
												<?php
												}
											
											if (!empty($this -> abcedario) && !empty($this -> abcedario_columnas)) {
												?>
												<tr>
													<td class="enlacehome" align='center' cellspacing='2'>
													<?php
													
													$letras = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z');
													
													foreach ($letras as $letra) {
														?>
														<a href="<?=$url_formulario;?>&letra=<?=$letra?>" class="enlacehome"><?=strtoupper($letra)?></a> | 	
														<?php
														}
													?>
													</td>
												</tr> 
												<?php
												}
											
											$cnt = 2;
											foreach ($this -> filtros as $id => $filtro) {
												$r = $cnt%2;
												
												if ( $r == 0 ) {
													echo '<tr>';
													}
												
												switch ($filtro) {
													case 'periodo':
															
															# Para utilizar el filtro periodo es necesario incluir JQuery a la cabecera
															# <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
															# <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
															# <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
															?>
															<td>
																<div align="left" class="texto"> 
																	<span class='texto_filtro'> <?=$this -> filtros_texto[$id]?> </span>
																	<input name="filtro<?=$cnt?>[]" id='fecha_ini' type="text" size="20" class="textfield datepicker" value="<?=(!empty($_POST['filtro'.$cnt][0])?$_POST['filtro'.$cnt][0]:'')?>">
																	a
																	<input name="filtro<?=$cnt?>[]" id='fecha_fin' type="text" size="20" class="textfield datepicker" value="<?=(!empty($_POST['filtro'.$cnt][1])?$_POST['filtro'.$cnt][1]:'')?>">
																	
																	<script>
																		$.datepicker.regional['es'] = {
																			  closeText: 'Cerrar',
																			  prevText: '<Ant',
																			  nextText: 'Sig>',
																			  currentText: 'Hoy',
																			  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
																			  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
																			  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
																			  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
																			  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
																			  weekHeader: 'Sm',
																			  dateFormat: 'dd/mm/yy',
																			  firstDay: 1,
																			  isRTL: false,
																			  showMonthAfterYear: false,
																			  yearSuffix: ''
																			  };
																			  
																		$.datepicker.setDefaults($.datepicker.regional['es']);
																		$(function () {
																		$(".datepicker").datepicker();
																	  });
																	</script>
																</div>
															</td>
															<?php
														break;
														
													case 'buscar':
															?>
															<td>
																<div align="left" class="texto"> 
																	<span class='texto_filtro'><?=$this -> filtros_texto[$id]?></span>
																	<input name="filtro<?=$cnt?>" type="text" size="20" class="textfield" value="<?=!empty($_POST['filtro'.$cnt])?$_POST['filtro'.$cnt]:'';?>"> 
																</div>
															</td>
															<?php
														break;

													case 'select':
															?>
															<td>
																<div align="left" class="texto"> 
																	<span class='texto_filtro'><?=$this -> filtros_texto[$id]?></span>
																	<select class='textfield' name='filtro<?=$cnt?>' onchange='this.form.submit()'>
																		<option value='-'>Selecione...</option>
																		<?php
																		$filas_filtros = $this -> db -> query($this -> filtros_consultas[$id]);
																		
																		while ($fila_filtro = $filas_filtros -> fetch_array()) {
																			?>
																			<option value='<?=$fila_filtro[0]?>' <?=(isset($_POST['filtro'.$cnt]) && $_POST['filtro'.$cnt]==$fila_filtro[0])?' selected':''?>> <?=$fila_filtro[1]?> </option>
																			<?php
																			}
																		
																		$filas_filtros -> free();
																		?>
																	</select>
																</div>
															</td>
															<?php
														break;
														
													case 'checkboxes':
															?>
															<td>
																<div align="left" class="texto widget"> 
																	<fieldset>
																	<legend class='texto_filtro'> <strong><?=$this -> filtros_texto[$id]?></strong> </legend>
																		<?php
																		$filas_filtros = $this -> db -> query($this -> filtros_consultas[$id]);
																		
																		while ($fila_filtro = $filas_filtros -> fetch_array()) {
																			?>
																			<label><?=$fila_filtro[1]?></label>
																			<input class='checks' id="checkbox-<?=$cnt?>" name='filtro<?=$cnt?>[<?=$fila_filtro[0]?>]' type='checkbox' <?=(!empty($_POST['filtro'.$cnt][$fila_filtro[0]])?' checked':'')?>><br>
																			<?php
																			}
																		$filas_filtros -> free();
																		?>
																	</fieldset>
																</div>
															</td>
															<?php
														break;
													}

												if ( $r == 1 ) {
													echo '</tr>';
													}
													
												$cnt++;
												}
											
												if ($this -> filtros_boton_buscar) {
													?>
													<tr>
														<td colspan='2' align='right'>
															<input type="submit" name="button" id="button" value="Buscar" class="textfield">													
														</td>
													</tr>
													<?php
													}
											?>
									</table>
								</div>
							</td>
						</tr>
						<?php
							
						  
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
							
							## Generamos las columnas que contiene la consulta
							$n_columnas = 0;
							
							# Eliminamos los anteriores parametros de ordenacion para no saturar la URL añadiendo los mismos parámetros
							if (isset($_GET['ordenar'])) {
								$array_ordenar = unserialize(urldecode($_GET['ordenar']));
								unset($_GET['ordenar']);
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
									# La siguiente condicion permite saber si en esta columna debe ordenarse
									if (!empty($this -> ordenar[$n_columnas])) {
										if (!empty($ordenar)) {
											
											# La siguiente condicion devuelve el icono a mostrar para el orden seleccionado
											$ordenar_icono = (!empty($ordenar[$n_columnas])?$this -> icono($ordenar[$n_columnas]):0);
											
											# A continuacion intercambiamos los valores del array lo que permite revertir el orden del listado
											$ordenar[$n_columnas] = (empty($ordenar[$n_columnas])?$this -> ordenar[$n_columnas]:(($ordenar[$n_columnas]=='DESC')?'ASC':'DESC'));
											
											if ($this -> orden_anidado) {	
												foreach($array_ordenar as $c => $v) {
													$tmp[$c] = $v;
												}
											}
											
											$tmp[$n_columnas] = $ordenar[$n_columnas];
											
											$ordenar0 = urlencode(serialize($tmp));
											unset($tmp);
										}
										else {
											# La siguiente condicion devuelve el icono para el orden predeterminado
											$ordenar_icono = (!empty($this -> orden_predeterminado[$n_columnas])?$this -> icono($this -> orden_predeterminado[$n_columnas]):0);
											$ordenar0 = urlencode(serialize(array($n_columnas => $this -> ordenar[$n_columnas])));
										}
										# Parseamos la URL para crear el enlace para ordenar por columna
										# Revertimos el orden para permitir ordenar de forma ASC y DESC
										
										//~ $ordenar_icono = 'images/icono-ordenar.png';
										
										?>
										<a href='<?=$_SERVER['PHP_SELF'].(!empty($_GET)?'?'.http_build_query($_GET).'&':'?').'ordenar='.$ordenar0?>'><?=$casilla?><?=(!empty($ordenar_icono))?"<img src='$ordenar_icono' alt='Ordenar'>":''?></a>
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
						unset($quitar);
						    
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
									if (!empty($this->columna[$i]) || !empty($this->columna[$columnas[$i]]) ) {
										
										?>
										<td class='tabla_listado_celda <?=$animacion?>' bgcolor="<?=$fondo_color;?>"> 
										<?php
										if (!empty($this->columna[$i])) {
											$tmp = $this->columna[$i];
											$indice = $i;
										}
										elseif (!empty($this->columna[$columnas[$i]])) {
											$tmp = $this->columna[$columnas[$i]];
											$indice = $columnas[$i];
										}
										
										switch($tmp) {
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
													<a href="<?=$this->enlace_url[$indice].$fila[$i]?>" <?=(!empty($this->enlace_nueva_ventana[$indice]) && $this->enlace_nueva_ventana[$indice]==1)?'target="_blank"':'';?>>
														<img src="<?=$this->enlace_img[$indice]?>" alt="<?=$this->enlace_title[$indice]?>" title="<?=$this->enlace_title[$indice]?>" style='width: 16px;'>
													</a>
												</div>
												<?php
												break;

											case 'tipo':
												?>
												<?=(!empty($this->tipo[$fila[$indice]]))?$this->tipo[$fila[$indice]]:"El tipo {$fila[$i]} no existe";?>
												<?php
												break;

											case 'descarga':
												?>
												<div style='text-align:center;' >
													<a href="<?=$this -> descarga_url.$fila[$i]?>" target="<?=$this -> descarga_nueva_ventana == true?'target="_blank"':''?>">
														<img src="<?=$this -> descarga_ruta_iconos.getImageFile($fila[$i])?>" alt="Descargar Archivo" title="Descargar Archivo" width="16">
													</a>
												</div>
												<?php
												break;
												
											case 'button':
												?>
												<button value="<?=$this -> boton_value?>" name='<?=$this -> boton_name?>' type="<?=$this -> boton_type?>" value='<?=$fila[$i]?>'><?=$this->boton_texto?></button>
												<?php
												break;
												
											case 'eliminar':
												?>
												<a href="javascript:eliminar('<?=$fila[$i];?>');">
													<img src="<?=$this -> eliminar_imagen?>" alt="Eliminar" title="Eliminar" width="16" border="0">
												</a>
												<?php
												break;
											
											case 'desactivar':
												?>
												<a href="javascript:desactivar('<?=$fila[$i];?>');">
													<img src="<?=$this -> desactivar_imagen?>" alt="<?=$this -> desactivar_alt?>" title="<?=$this -> desactivar_alt?>" width="16" border="0">
												</a>
												<?php
												break;
											
											case 'lista':
												$listas = $this -> db -> query($this -> lista_consulta.$fila[$i]) or die ($this -> db -> error);
												?>
												<ul>
												<?php
												while ($lista = $listas -> fetch_array()) {
													?>
														<li><?=$lista[0]?></li>
													<?php
													}
												
												$listas -> free();
												?>
												</ul>
												<?php
												break;
												
											case 'moneda':
												?>
												<?=money_format('%+n', $fila[$i])?> <?=$this -> moneda_divisa?>
												<?php
												break;
											
											case 'fecha':
												if (!empty($fila[$i])) {
													echo DateTime::createFromFormat($this -> fecha_formato_entrada, $fila[$i]) -> format($this -> fecha_formato_salida);
													}
												else {
													?>
													<?=$fila[$i]?>
													<?php
													}
													
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
														  
														  $resultados_mensaje = $this -> db -> query($this->mensaje_consulta_tmp);
														  
														  while ($resultado2 = mysqli_fetch_array($resultados_mensaje)) {
																# El array campos permite elegir que columnas de la consulta del mensaje se muestran
																foreach ($this->campos as $row) {
																	echo $resultado2[$row].' ';
																	}
															  echo $this->mensaje_codigo_posterior;
															  }
														   
														   $resultados_mensaje -> free();
														   
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
												$registros = $this -> db -> query($this -> select_consulta);
												?>
												<select name='<?=$this->select_name?>[<?=$fila[$i]?>]' onchange='this.form.submit()'>
													<option value=''> <?=$this->select_texto_defecto?> </option>
													<?php
													while ($fila2 = mysqli_fetch_array($registros)) {
														?>
														<option value='<?=$fila2[0]?>'> <?=$fila2[1]?> </option>
														<?php
														}
														?>
												</select>
												<?php
												break;
											
											case 'ajax':
												if (!empty($this->ajx_id[$indice]))
													$this->ajx_params[$indice][$this->ajx_id[$indice]] = $fila[$indice];
												$json_generado = json_encode($this->ajx_params[$indice]);
												?>
												<div style='text-align:center;' >
													<img src="<?=$this->ajx_img[$indice]?>" alt="<?=$this->ajx_title[$indice]?>" title="<?=$this->ajx_title[$indice]?>" style='width: 16px; cursor: pointer' onClick='$.<?=$this->ajx_method[$indice]?>("<?=$this->ajx_url[$indice]?>", <?=$json_generado?>)<?=($this->debug)?'.done(function(data){alert(data)})':'';?>' <?=(!empty($this->ajx_img_dwn[$indice]))?'onmousedown=\'$(this).attr("src", "'.$this->ajx_img_dwn[$indice].'")\' onmouseup=\'$(this).attr("src", "'.$this->ajx_img[$indice].'")\'':'';?>>
												</div>
												<?php
												break;
												
											default:
												echo 'El módulo '.$this->columna[$indice].' no existe';
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
						
						$resultados -> free();
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
						//~ Declaramos variables que vamos a emplear y les asignamos valores.
						var rtn = sourceURL.split("?")[0],
							params_arr = [],
							queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : ""; // If ternario. Busca en la cadena sourceURL un '?', si lo halla trocea la misma (split) por el '?'.
							
						//~ Comprobamos si existen parámetros enviados mediante GET (si existe '?' en la url y si hay algo después).
						if (typeof(queryString) == 'undefined' || queryString == '') 
							var parametro = '?'; // Si no hay '?' o no tiene nada después, el separador que usaremos será '?'.
						else {
							var parametro = '&'; // En caso de que sí exista algún GET, el separador será '&'.

							params_arr = queryString.split("&"); // Introduce en el array params_arr los valores resultado de separar por '&'.
							
							// El bucle for recorre el array y comprueba si el valor del array en la posición actual es la clave (key) que pasamos a la función.
							for (var i = params_arr.length - 1; i >= 0; i -= 1) {
								param = params_arr[i].split("=")[0];
								
								if (params_arr[i].split("=")[0] === key) {
									params_arr.splice(i, 1); // Si existe la clave (key) en el array, la elimina.
								}
							}
							
							// Reconstruye la url concatenando los valores del array params_arr separados por '&'.
							rtn = rtn + '?' + params_arr.join("&");
						}
						
						return {rtn:rtn,parametro:parametro}; // Devuelve un objeto que contiene rtn (la url) y parametro (el separador que se empleará).
					}
					
					function eliminar(id) {
						var url = window.location.href; // Variable que contiene la url actual.
						if (confirm('¿Seguro que quiere eliminarlo?')) {
							url = removeParam('delid',url); // Una vez confirmado, se elimina el GET 'delid' de la url
							url = removeParam('mensaje',url.rtn) // Del resultado de la línea anterior eliminamos el parametro 'mensaje'.
							// Redirigimos la página hacia la url reconstruida.
							document.location.href = url.rtn + url.parametro + 'delid='+id+'&mensaje=Elemento borrado con éxito.';
						}
					}
					
					function desactivar(id) {
						var url = window.location.href; 
						if (confirm('<?=$this -> desactivar_texto_confirmar?>')) {
							url = removeParam('did',url);
							url = removeParam('mensaje',url.rtn);
							document.location.href = url.rtn + url.parametro + 'did='+id+'&mensaje=Elemento borrado con éxito.';
						}
					}
				</script>
				
				<?php
				if ($this -> paginacion == 1) {
					?>
					<br>
					<tr>
						<td align='center' class="">
							<table cellspacing="2" cellpadding="2" border="0" style="text-align:center; margin: 10px;">
								<tr>
									<td style="text-align:left; padding-left:20px;" class="search">
										<script>
											function cambiar(accion, nombre_parametro) {
												var url = window.location.href;
												url = removeParam(nombre_parametro,url);
												window.location.href = url.rtn + url.parametro +  nombre_parametro + '=' + accion;
												}
										</script>
										Mostrar #
										<select name="pagesize" id="pagesize" style="width:75px;" onchange='cambiar(this.form.pagesize.value, "pagesize")'>
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
										<div class="button2-right" title="Iniciar" style="cursor:pointer;font-family:Arial;" id="lnkFirst" onclick="cambiar(0,'pagina')">
											<div class="start" style="cursor:pointer">
												<span>
													<nobr>Iniciar</nobr>
												</span>
											</div>
										</div>
									</td>
									<td style="text-align:left;">
										<div class="button2-right" title="Anterior" style="cursor:pointer;font-family:Arial;" id="lnkPrev" onclick="cambiar(<?=($pagina>0)?$pagina-1:'0'?>, 'pagina')">
											<div class="prev"><span>Anterior</span></div>
										</div>
									</td>
									<td class="search" style="padding:0px 10px 0px 10px; text-align:left;">
										Página
										<select name="pagina" id="pagina" style="width:75px;" onchange='cambiar(this.form.pagina.value, "pagina")'>
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
										<div class="button2-left" title="Siguiente" style="cursor:pointer;font-family:Arial;" id="lnkNext" <?php if ($this -> paginas_total != $pagina) { ?> onclick="cambiar(<?=($pagina>1)?$pagina+1:'2'?>, 'pagina')" <?php } else { ?> <?php }?>>
											<div class="next" style="cursor:pointer"><span>Siguiente</span></div>
										</div>
									</td>
									<td style="padding-right:20px; text-align:right;">
										<div class="button2-left" title="Final" style="cursor:pointer; font-family:Arial;" onclick="cambiar(<?=$this -> paginas_total?>, 'pagina')">
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
						<td align='center' bgcolor="#FFFFFF" class="">
							<table class="bordeExterior" style='width: 910px; margin-bottom: 20px;text-align:center; background-color:#FFFFFF;' cellpadding="4" cellspacing="0">
								<tr>
									<td style='width: 2px;'>
										<div style='text-align:right;'>
											<a href="javascript:window.history.back();">
												<img src="images/active_undo.gif" alt="Volver" title="Volver" width="16" height="16" border="0">
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
												<img src="images/active_exit.gif" alt="Cerrar" title="Salir" width="16" height="16" border="0">
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
    
    if ($this -> debug) {
		echo '<strong>Memoria Final:</strong> '.memory_get_usage().' Bytes <br>';
		}
    }
}
?>
