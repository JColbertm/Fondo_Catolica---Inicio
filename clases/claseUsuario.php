<?php 
	class ClaseUsuario
	{
		public $idUsuario;
		public $ci;
		public $nombre;
		public $nombre2;
		public $apellido_p;
		public $apellido_m;
		public $idTipo_usuario;
		public $idUsuarioCreador;
		public $idDatos;
		public $direccion;
		public $telefono;
		public $celular;
		public $departamento;
		public $interno;
		public $correos;
		public $estado;
		public $nombre_usuario;
		public $password;
		
		//selecciona todos los usuarios
		public static function encontrar_a_todos(){
			$resultados= execSqlA("SELECT a.*,b.* FROM usuario a, datos_secundario b where a.idUsuario=b.idUsuario and a.estado=1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		
		public static function encontrar_por_id($id){
			$resultado= execSqlA("SELECT a.*,b.* FROM usuario a, datos_secundario b where  a.idUsuario=b.idUsuario and a.idUsuario=$id and a.estado=1 limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public static function encontrar_por_nom($nom){
			$resultado= execSqlA("SELECT a.*,b.* FROM usuario a, datos_secundario b where a.estado=1 and a.idUsuario=b.idUsuario and a.nombre LIKE '%$nom%' ");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		public static function encontrar_por_ci($ci){
			$resultado= execSqlA("SELECT a.*,b.* FROM usuario a, datos_secundario b where  a.idUsuario=b.idUsuario and a.ci=$ci limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);

			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public function registrar_afiliado(){
				$nom = explode(" ", $this->nombre);
				$c1 = count($nom);
				$ap = explode(" ", $this->apellido_p);
				$c2 = count($ap);
				if($c1==1){$nom1=$nom[0]; $nom2='';}
				else{$nom1=$nom[0]; $nom2=$nom[1];}
				if($c2==1){$ap1=$nom[0]; $ap2='';}
				else{$ap1=$ap[0]; $ap2=$ap[1];}
				ini_set('date.timezone','America/Manaus'); 
				
				$user = substr($this->nombre,0,1).'.'.$ap1.'.'.substr($ap2,0,1);
				$pass = '1234';
				$key='catolica';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    			$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $pass, MCRYPT_MODE_CBC, md5(md5($key))));
				//$_SESSION['id_en']
    			
				$result= insertA('usuario', array('ci','nombre','nombre2', 'apellido_p', 'apellido_m', 'idTipo_usuario', 'idUsuarioCreador','password','nombre_usuario','estado'), array(2,2,2,2,2,2,2,2,2,2) , array($this->ci,$nom1,$nom2,$ap1,$ap2,1,$this->idUsuarioCreador,$encrypted,$user,1));
				//obtenemos el ultimo id de usuarios
				$row= execSqlA("select idUsuario FROM usuario WHERE idUsuario=(SELECT MAX(idUsuario) FROM usuario)");
				while ($data = mysqli_fetch_array($row)){$var = $data[0];}
				$result2= insertA('datos_secundario', array('idUsuario','direccion','telefono','celular','departamento','correos','interno'), array(2,2,2,2,2,2,2) , array($var,$this->direccion,$this->telefono,$this->celular,$this->departamento,$this->correos,$this->interno));

				$nn=$nom1.' '.$nom2;
				$mm=$ap1.' '.$ap2;
				if ($result && $result2){		
					$response['resp']=1;
					$response['password']=1234;
					$response['usuario']=$user;
					$response['nombre']=$nn;
					$response['apellido']=$mm;
				}else{	$response['resp']=0;}
			
			return $response;
		}
		public function modificar_afiliado($id){			
				$nom = explode(" ", $this->nombre);
				$c1 = count($nom);
				$ap = explode(" ",  $this->apellido_p);
				$c2 = count($ap);
				if($c1==1){$nom1=$nom[0]; $nom2='';}
				else{$nom1=$nom[0]; $nom2=$nom[1];}
				if($c2==1){$ap1=$nom[0]; $ap2='';}
				else{$ap1=$ap[0]; $ap2=$ap[1];}
				$result = updateA('usuario',array('ci','nombre','nombre2', 'apellido_p', 'apellido_m'),array(2,2,2,2,2),array($this->ci,$nom1,$nom2,$ap1,$ap2),'idUsuario',$id);
				$result2 = updateA('datos_secundario',array('idUsuario','direccion','telefono','celular','departamento','correos','interno'),array(2,2,2,2,2,2,2),array($id, $this->direccion,$this->telefono,$this->celular,$this->departamento,$this->correos,$this->interno),'idUsuario',$id);
				
				if ($result && $result2){		
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
			$user = $result['nombre_usuario'];
			//obtener datos
		
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
			if($result && $result4){
				
				
				$response['ida']=$result4['idAfiliacion'];
				$response['ci']=$result['ci'];
				$response['pass']=$cad;
				$response['nombre']=$nom;
				$response['apellido']=$ap;
				$response['user']=$user;
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
