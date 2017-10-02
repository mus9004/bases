<?php
 
    class Conexion {
 
        private $_LinkId; //objeto resource que indicara si se ha conectado
        private $_Servidor;
        private $NombreBD;
        private $Usuario;
        private $Clave;
        private $Puerto;
        public static $Mensaje;
        private static $Self = null; //Almacenara un objeto de tipo Conexion


        private function __construct() {
 
            $this->Servidor = '127.0.0.1';
            $this->NombreBD = 'pinterestdb';
            $this->Usuario = 'SYSTEM';
            $this->Clave = 'oracle';
            $this->Puerto = '1521'; && PUERTO QUE ESCUCHA ORACLE
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
 

        private function conectar() {
 
            $this->_LinkId = null;
            $intentos = 0;
            while (!is_resource($this->LinkId) && $intentos < 20) {
                $intentos++;
                $this->LinkId =
                        oci_connect($this->Usuario, $this->Clave, "(DESCRIPTION = (LOAD_BALANCE = yes)
                               (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = {$this->Servidor}) (PORT = 1521) ) )
                               (CONNECT_DATA = (FAILOVER_MODE = (TYPE = select) (METHOD = basic) (RETRIES = 180) (DELAY = 5) )
                               (SERVICE_NAME = {$this->NombreBD}) ) )");
            }
 
            if (is_resource($this->LinkId)) {
                self::$sMensaje = "Conexion exitosa!<br/>";
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
 
    }
 
 ?>