<?php 
	/**
	* 
	*/
	class ClaseAhorro
	{
		public $idAhorro;
		public $idUsuario;
		public $cantidad_ahorro;

		public static function encontrar_ahorro_id($id){
			$resultado= execSqlA("SELECT * FROM ahorro where idUsuario=$id limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public static function encontrar_ahorro_ci($ci){
			$resultado= execSqlA("SELECT a.* FROM ahorro a,usuario b where b.ci=$ci and  a.idUsuario=b.idUsuario limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public function registrar_ahorro($id){
				$result= insertA('ahorro', array('idUsuario','cantidad_ahorro'), array(2,2) , array($id,$this->cantidad_ahorro));
				if ($result){		
					$response['resp']=1;	
				}else{	$response['resp']=0;}
			
			return $response;
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