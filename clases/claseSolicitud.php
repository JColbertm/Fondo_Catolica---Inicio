<?php 

class ClaseSolicitud{
	protected static $db_tabla="solicitud";
	public $idSolicitud;
	public $cod_form_solpres;
	public $idUsuario;
	public $cantidad_sol;
	public $meses_sol;
	public $porcentaje_sol;
	public $cuota_sol;
	public $cantidad_sueldo_sol;
	public $liquido_sol;
	public $ciGarante;
	public $nombres_ga;
	public $apellidos_ga;
	public $idRegistrador;
	public $idTipo_estado;
	public $nombre_estado;

	public static function encontrar_solicitudes(){
			$resultados= execSqlA("SELECT DISTINCT a.*,b.*,c.*,d.nombre_estado FROM solicitud a,usuario b,datos_secundario c, estado_solicitud d where a.idUsuario=b.idUsuario and a.idUsuario=c.idUsuario and a.idTipo_estado=d.idTipo_estado and not a.idTipo_estado=2 and not d.idTipo_estado=4 and not d.idTipo_estado=5 ORDER BY a.idSolicitud");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
	public static function solicitud_por_id($id){
			$resultado= execSqlA("SELECT * FROM solicitud where idSolicitud=$id");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
	
	public function modificar_solicitud($id){
			$result = updateA('solicitud',array('idTipo_estado'),array(2),array($this->idTipo_estado),'idSolicitud',$id);			
			if ($result){		
					$response['resp']=1;
				}
				else
				{
					$response['resp']=0;
				}
			return $response;
		}
	
	public function crear_solicitud(){
			$result2= insertA(self::$db_tabla, array('idUsuario', 'cantidad_sol', 'meses_sol', 'porcentaje_sol', 'cuota_sol', 'cantidad_sueldo_sol', 'liquido_sol', 'ciGarante', 'nombres_ga', 'apellidos_ga', 'idRegistrador', 'idTipo_estado'),array(2,2,2,2,2,2,2,2,2,2,2,2), array($this->idUsuario,$this->cantidad_sol,$this->meses_sol,$this->porcentaje_sol,$this->cuota_sol,$this->cantidad_sueldo_sol,$this->liquido_sol,$this->ciGarante,$this->nombres_ga,$this->apellidos_ga,$this->idRegistrador,$this->idTipo_estado));
			 if($result2){
			 	$row= execSqlA("SELECT MAX(idSolicitud) FROM solicitud");
			 	while ($data = mysqli_fetch_array($row)){			  
					   $var1 = $data[0];
					}
				$this->cod_form_pres=$var1;
				$this->idSolicitud=$var1;

				$update=updateA(self::$db_tabla,array('cod_form_solpres'),array(2),array("SOL-".$var1),'idSolicitud',$this->idSolicitud);
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}

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
