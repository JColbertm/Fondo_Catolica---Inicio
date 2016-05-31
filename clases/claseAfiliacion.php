<?php 
	class ClaseAfiliacion
	{
		public $idUsuario;
		public $idAfiliacion;
		public $fecha;
		

		public static function ultima_afiliacion(){
			$resultado= execSqlA("select idAfiliacion FROM form_afiliacion WHERE idAfiliacion=(SELECT MAX(idAfiliacion) FROM form_afiliacion)");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);

			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public function registrar_afiliacion($id){
			ini_set('date.timezone','America/Manaus'); 
				$result= insertA('form_afiliacion', array('idUsuario','fecha','hora','idUsuarioCreador'), array(2,2,2,2) , array($id,$this->fecha,date("g:i A"),1));//$_SESSION['id_en']
				if ($result){		
					$response['resp']=1;	
					$response['fecha']=$this->fecha;	
				}else{	$response['resp']=0;}
			
			return $response;
		}

		public static function encontrar_por_id($id){
			$resultado= execSqlA("SELECT a.* FROM form_afiliacion a where a.idUsuario=$id limit 1");
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