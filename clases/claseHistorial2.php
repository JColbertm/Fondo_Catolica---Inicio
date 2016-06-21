<?php 
	class ClaseHistorial{

		public $idHistorial_sueldo;
		public $cantidad_sueldo;
		public $liquido;
		public $monto_aporte;
		public $idMes;
		public $antiguedad;
		public $idUsuario;
		public $fecha_mod;

		public static function encontrar_historiales(){
			$resultados= execSqlA("SELECT * FROM historial_sueldo");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		public static function historiales_por_ci($ci){
			$resultado= execSqlA("SELECT a.* FROM historial_sueldo a,usuario b where b.ci=$ci and  a.idUsuario=b.idUsuario limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public static function historial_por_ci($ci){
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
		public static function registrar_saldo($ci,$sueldo,$liquido,$fecha){
			$ultima_modificacion= execSqlA("SELECT Max(a.idHistorial_sueldo) as maximo FROM historial_sueldo a, usuario b where  a.idUsuario=b.idUsuario and b.ci=$ci");
			$var=0;
			while ($rows =mysqli_fetch_array($ultima_modificacion)) {
	 	 	 $var=$rows['maximo'];
	  				}
	  		$resultado= execSqlA("SELECT monto_aporte,idMes,idUsuario,antiguedad FROM historial_sueldo where idHistorial_sueldo=$var limit 1");
	  		while ($row = mysqli_fetch_array($resultado)) {
	 	 	 $monto=$row['monto_aporte'];
	 	 	 $mes=$row['idMes'];
	 	 	 $usu=$row['idUsuario'];
	 	 	 $anti=$row['antiguedad'];
			}

			$result2= insertA('historial_sueldo', array('cantidad_sueldo', 'monto_aporte', 'idMes', 'idUsuario', 'liquido', 'antiguedad', 'fecha_mod'),array(2,2,2,2,2,2,2), array($sueldo,$monto,$mes,$usu,$liquido,$anti,$fecha));
				if ($result2){		
					$response['resp']=1;
				}
				else
				{
					$response['resp']=0;
				}
			
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