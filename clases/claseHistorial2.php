<?php 
	class ClaseHistorial{
		public $idHistorial_sueldo;
		public $total_ganado;
		public $liquido_pagable;
		public $monto_aporte;
		public $idMes;
		public $idUsuario;

		public static function encontrar_historiales(){
			$resultados= execSqlA("SELECT * FROM historial_sueldo");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		public static function historiales_por_ci($ci){
			$resultado= execSqlA("SELECT a.* FROM historial_sueldo a,usuario b where b.ci=$ci and  a.idUsuario=b.idUsuario");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);
			return $objeto_array;
		}
		public function historial_por_ci($ci){
			$ultima_modificacion= execSqlA("SELECT Max(a.idHistorial_sueldo) as maximo FROM historial_sueldo a, usuario b where  a.idUsuario=b.idUsuario and b.ci=$ci");
			$var=0;
			while ($row =mysqli_fetch_array($ultima_modificacion)) {
	 	 	 $var=$row['maximo'];
	  				}
	  		$resultado= execSqlA("SELECT * FROM historial_sueldo where idHistorial_sueldo=$var ");	
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return !empty($objeto_array)? array_shift($objeto_array):false;
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