<?php 
	class ClaseAfiliacion
	{
		public $idUsuario;
		public $idAfiliacion;
		

		public static function ultima_afiliacion(){
			$resultado= execSqlA("select idAfiliacion FROM form_afiliacion WHERE idAfiliacion=(SELECT MAX(idAfiliacion) FROM form_afiliacion)");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);

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