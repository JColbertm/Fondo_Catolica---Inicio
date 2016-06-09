<?php 
	class ClaseParametros
	{

	public $idParametro;
	public $parametro;
	public $condicion;
	public $imagen;
	public $tipoima;
	public $fecha_creacion;
	public $info;

		// function __construct()
		// {
		// 	$this->encontrar_parametros();
		// }

		//Encontrara todos los parametros de la tabla
		public static function encontrar_parametros(){
			$resultados= execSqlA("SELECT * FROM parametros");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		//Buscara solo un parametro en especifico
		public static function encontrar_parametro_prestamo($id){
			$resultados= execSqlA("SELECT * FROM parametros WHERE idParametros=$id limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		//Bucara todos los parametros que sean de tipo prestamo
		public static function encontrar_parametros_prestamo($tipo){
			$resultado= execSqlA("SELECT * FROM parametros where idTipo_parametro=$tipo ORDER BY idParametros");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}


		public static function instanciacion($var){
			$objeto=new self;
			foreach ($var as $atributo => $value) {
				if ($objeto-> tomar_atributos($atributo)) {
					$objeto -> $atributo = $value;
				}			
			}
			return $objeto;
		}

		private function tomar_atributos($atributo){
			$propiedades_objeto=get_object_vars($this);
			return array_key_exists($atributo, $propiedades_objeto);
		}
	}
	


 ?>