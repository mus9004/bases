<?php
 
    class Conexion {
 
        private $LinkId; //objeto resource que indicara si se ha conectado
        private $_Servidor;
        private $NombreBD;
        private $Usuario;
        private $Clave;
        private $Puerto;
        public static $Mensaje;
        private static $Self = null; //Almacenara un objeto de tipo Conexion


        public function __construct() {
 
            $this->Servidor = '127.0.0.1';
            $this->NombreBD = 'DB_PINTEREST';
            $this->Usuario = 'SYSTEM';
            $this->Clave = 'oracle';
            $this->Puerto = '1521'; // PUERTO QUE ESCUCHA ORACLE
        }
 
        public static function getInstancia() {
 
            if (!self::$Self instanceof self) {
                $instancia = new self(); //new self ejecuta __construct()
                self::$Self = $instancia;
                if (!is_resource($instancia->conectar())) {
                    self::$Self = null;
                }
            }
            $conex = self::$Self;
            return $conex->LinkId; //Se devuelve el link a la conexion
        }
 

        public function conectar() {
 
            $this->LinkId = null;
            $intentos = 0;
            while (!is_resource($this->LinkId) && $intentos < 20) {
                $intentos++;
                $this->LinkId = oci_connect($this->Usuario, $this->Clave, 'localhost/XE');
            }
 
            if (is_resource($this->LinkId)) {
                self::$Mensaje = "Conexion exitosa!<br/>";
            } else {
                self::$Mensaje = "ERROR: No se puede conectar a la base de datos..!<br/>";
            }
            echo self::$Mensaje;
            return $this->LinkId;
        }
 
        /**
         * Este método verifica si había una conexión abierta anteriormenete. Si había la cierra.
         */
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
			return oci_parse($this->LinkId, $sql);
		}

		public function obtenerRegistro($resultado){
			return oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULL); 
		}
 
 
    }
 
 ?>