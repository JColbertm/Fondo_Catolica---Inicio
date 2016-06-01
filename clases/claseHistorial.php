<?php 
	class ClaseHistorial
	{
		
		public $monto_aporte;
		public $idMes;
		public $idAfiliacion;
		public $liquido;
		public $antiguedad;
		public $cantidad_sueldo;
		public $fecha_mod;
		//selecciona todos los usuarios
		public static function encontrar_a_todos(){
			$resultados= execSqlA("SELECT a.*,b.* FROM usuario a, datos_secundario b where a.idUsuario=b.idUsuario and a.estado=1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		//busca por id usuarios
		/*public static function encontrar_por_id($id){
			$resultado= execSqlA("SELECT a.*,b.* FROM usuario a, datos_secundario b where  a.idUsuario=b.idUsuario and a.ci=$id limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}*/
		public static function encontrar_por_id($id){
			$resultado= execSqlA("SELECT * FROM historial_sueldo where idHistorial_sueldo=(SELECT MIN(idHistorial_sueldo) FROM historial_sueldo where idUsuario=".$id.") limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public function registrar_historial($id){
				$result= insertA('historial_sueldo', array('cantidad_sueldo','monto_aporte','idMes','idUsuario','liquido','antiguedad','fecha_mod'), array(2,2,2,2,2,2,2) , array($this->cantidad_sueldo,$this->monto_aporte,$this->idMes,$id,$this->liquido,$this->antiguedad,$this->fecha_mod));
				if ($result){		
					$response['resp']=1;	
				}else{	$response['resp']=0;}
			
			return $response;
		}
		public function modificar_historial($id){
			
				$result = updateA('historial_sueldo',array('cantidad_sueldo','monto_aporte','idMes','idUsuario','liquido','antiguedad','fecha_mod'),array(2,2,2,2,2,2,2),array($this->cantidad_sueldo,$this->monto_aporte,$this->idMes,$id,$this->liquido,$this->antiguedad,''),'idUsuario',$id,$this->fecha_mod);
				if ($result){		
					$response['resp']=1;
				}
				else
				{
					$response['resp']=0;
				}
			
			return $response;
		}
		public static function modificar_password($id,$password){	
			$key='catolica';
			$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $password, MCRYPT_MODE_CBC, md5(md5($key))));
				$result = updateA('usuario',array('password'),array(2),array($encrypted),'idUsuario',$id);
				if ($result ){		
					$response['resp']=1;
				}
				else
				{
					$response['resp']=0;
				}
			
			return $response;
		}
		public static function genera_password($id){
			$result = RecuperarIdItemA('usuario',array('idUsuario'),array($id));
			$nom = $result['nombre'].' '.$result['nombre2'];
			$ap = $result['apellido_p'].' '.$result['apellido_m'];
			//obtener datos
			$result2 = RecuperarIdItemA('datos_secundario',array('idUsuario'),array($id));
			$result3 = RecuperarIdItemA('historial_sueldo',array('idUsuario'),array($id));
			$result4 = RecuperarIdItemA('form_afiliacion',array('idUsuario'),array($id));;
				
			$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
			$cad = "";
			for($i=0;$i<8;$i++) {
			$cad .= substr($str,rand(0,62),1);
			}
			$key='catolica';
			  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cad, MCRYPT_MODE_CBC, md5(md5($key))));
           // $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    		  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
				$psw=$result['password'];
				$pas2= rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($psw), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
			if($result && $result2 && $result3 && $result4){
				
				
				$response['ida']=$result4['idAfiliacion'];
				$response['ci']=$result['ci'];
				$response['pass']=$cad;
				$response['nombre']=$nom;
				$response['apellido']=$ap;
				//$response['apellido2']=$result['apellido_m'];
				//$response['nombre2']=$result['nombre2'];
				$response['original']=$pas2;
				$response['fecha_afi']=$result4['fecha'];
				$response['resp']=1;
			}
			else{
				$response['resp']=0;
			}
			return $response;
		}
		public static function eliminar_afiliado($id){
				if (updateA('usuario',array('estado'),array(2),array('0'),'idUsuario',$id) ){		
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