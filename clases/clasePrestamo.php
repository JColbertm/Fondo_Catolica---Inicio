<?php 

class ClasePrestamo{
	protected static $db_tabla="prestamo";
	public $idPrestamo;
	public $cod_form_pres;
	public $idUsuario;
	public $cantidad;
	public $meses;
	public $porcentaje;
	public $cuota_aporte;
	public $cant_sueldo;
	public $liquido;
	public $cuota_pres;
	public $idGarante;
	public $idRegistrador;
	public $numero_cheque;
	public $fecha;
	public $estado;

	public static function encontrar_prestamos(){
			$resultados= execSqlA("SELECT * FROM prestamo");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
	public static function prestamo_por_ci($ci){
			$resultado= execSqlA("SELECT a.* FROM prestamo a,usuario b where b.ci=$ci and  a.idUsuario=b.idUsuario");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);

			return $objeto_array;
		}
	public static function solicitud_por_id($id){
			$resultado= execSqlA("SELECT * FROM prestamo where idPrestamo=$id");
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
	public function crear_prestamo(){
			$result2= insertA(self::$db_tabla, array('idUsuario', 'cantidad', 'meses', 'porcentaje', 'cuota_aporte', 'cant_sueldo', 'liquido', 'cuota_pres', 'idGarante', 'idRegistrador', 'numero_cheque', 'fecha', 'estado'),array(2,2,2,2,2,2,2,2,2,2,2,2,2), array($this->idUsuario,$this->cantidad,$this->meses,$this->porcentaje,$this->cuota_aporte,$this->cant_sueldo,$this->liquido,$this->cuota_pres,$this->idGarante,$this->idRegistrador,$this->numero_cheque,$this->fecha,$this->estado));
			 if($result2){
			 	$row= execSqlA("SELECT MAX(idPrestamo) FROM prestamo");
			 	while ($data = mysqli_fetch_array($row)){			  
					   $var1 = $data[0];
					}
				$this->cod_form_pres=$var1;
				$this->idPrestamo=$var1;

				$update=updateA(self::$db_tabla,array('cod_form_pres'),array(2),array("FPR-".$var1),'idPrestamo',$this->idPrestamo);
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
	public static function verificar_garante($ci_garante){
			$contar_garante=execSqlA("SELECT count(a.idGarante) as total FROM prestamo a,usuario b WHERE b.ci=$ci_garante and b.idUsuario=a.idGarante and a.estado=1");
			$var=0;
			while ($row =mysqli_fetch_array($contar_garante)) {
	 	 	 $var=$row['total'];
	  				}
	  		return $var;
		}
}



 ?>