<?php 

class ClaseSolicitud{
	protected static $db_tabla="solicitud";
	public $idSolicitud;
	public $cod_form_solpres;
	public $idUsuario;
	public $cantidad_sol;
	public $meses_sol;
	public $porcentaje_sol;
	public $idGarante;
	public $idRegistrador;
	public $estado_sol;
	public static function encontrar_solicitudes(){
			$resultados= execSqlA("SELECT * FROM solicitud where estado_sol=1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
	public static function solicitud_por_id($id){
			$resultado= execSqlA("SELECT * FROM solicitud where b.idUsuario=$id and estado_sol=1");
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
	public function crear_solicitud(){
			$result2= insertA(self::$db_tabla, array('idUsuario', 'cantidad', 'meses', 'porcentaje', 'idGarante', 'idRegistrador', 'numero_cheque', 'estado'),array(2,2,2,2,2,2,2,2), array($this->idUsuario,$this->cantidad,$this->meses,$this->porcentaje,$this->idGarante,$this->idRegistrador,$this->numero_cheque,$this->estado));
			 if($result2){
			 	$row= execSqlA("SELECT MAX(idSolicitud) FROM solicitud");
			 	while ($data = mysqli_fetch_array($row)){			  
					   $var1 = $data[0];
					}
				$this->cod_form_pres=$var1;
				$this->idSolicitud=$var1;

				$update=updateA(self::$db_tabla,array('cod_form_solpres'),array(2),array("SOL-".$var1),'idSolicitud',$this->idPrestamo);
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}

		}
	private function tomar_atributos($atributo){
			$propiedades_objeto=get_object_vars($this);
			return array_key_exists($atributo, $propiedades_objeto);
		}
	
}



 ?>
