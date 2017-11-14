<?php
 
    class Conexion {
 
        private $LinkId; //objeto resource que indicara si se ha conectado
        private $_Servidor;
        private $NombreBD;
        private $Usuario;
        private $Clave;
        private $Puerto;
        private $enlace;
        public static $Mensaje;
        private static $Self = null; //Almacenara un objeto de tipo Conexion


        public function __construct() {
 
            $this->Servidor = '127.0.0.1';
            $this->NombreBD = 'DB_PINTEREST';
            $this->Usuario = 'SYSTEM';
            $this->Clave = 'oracle';
            $this->Puerto = '1521'; // PUERTO QUE ESCUCHA ORACLE
        }
 
      
 

        public function conectar() {
 			$this->enlace=oci_connect($this->NombreBD, $this->Clave, 'localhost/XE');
       		if(!$this->enlace){
       			echo "no conectado";
       		}
        }
        public static function desconectar() {
 
            $conexion_activa = false;
            if (self::$Self instanceof self) {
                $bandera = true;
                $instancia = self::$Self;
                oci_close($instancia->LinkId); //cierro la conexion activa
                self::$Self = null; //destruyo el objeto
            }
            return $conexion_activa;
        } 
       

        public function ejecutarInstruccion($sql){
			$stid=oci_parse($this->enlace, $sql);
			oci_execute($stid);
			return $stid;
		}

		public function obtenerRegistro($resultado){
			return oci_fetch_array($resultado, OCI_BOTH); //por nombre o numero de campo
		}

		/*public function cantidadRegistros($resultado){
			$results=array();
			return oci_fetch_all($resultado1, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
		}*/

		public function getNombreBD(){
			return $this->NombreBD;
		}
		public function setNombreBD($NombreBD){
			$this->NombreBD = $NombreBD;
		}
		public function getUsuario(){
			return $this->Usuario;
		}
		public function setUsuario($Usuario){
			$this->Usuario = $Usuario;
		}
		public function getClave(){
			return $this->Clave;
		}
		public function setClave($Clave){
			$this->Clave = $Clave;
		}
		public function getPuerto(){
			return $this->Puerto;
		}
		public function setPuerto($Puerto){
			$this->Puerto = $Puerto;
		}
		public function getEnlace(){
			return $this->enlace;
		}
		public function setEnlace($enlace){
			$this->enlace = $enlace;
		}
		public function _toString(){
			return "NombreBD: " . $this->NombreBD . 
				" Usuario: " . $this->Usuario . 
				" Clave: " . $this->Clave . 
				" Puerto: " . $this->Puerto . 
				" Enlace: " . $this->enlace;
		}
 
 
    }
 
 ?>