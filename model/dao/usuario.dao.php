<?php

   // require_once "../model/conexion.php";
   // require_once "../model/dto/user.dto.php";
    class UserModel{

        private $cc;
        private $nombre;
        private $apellido;
        private $direccion;
        private $telefono;
        private $edad;
        private $rol;
        private $contrasena;

        public function __construct($objDtoUser){
           $this-> cc    = $objDtoUser -> getcc();
           $this-> nombre    = $objDtoUser -> getnombre();
           $this-> apellido = $objDtoUser -> getapellido();
           $this-> direccion     = $objDtoUser -> getdireccion();
           $this-> telefono = $objDtoUser -> gettelefono();
           $this-> edad = $objDtoUser -> getedad();
           $this-> rol     = $objDtoUser -> getrol();
           $this-> contrasena = $objDtoUser -> getcontrasena();  
        }

        public function getQueryLogin(){

            $sql = "SELECT * FROM usuario
                    WHERE CC = ? AND CONTRASENA = ?";
            
            try {
                $objcon = new Conexion();

                $stmt = $objcon -> getConect() -> prepare($sql); 
                $stmt -> bindParam(1, $this -> cc, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> contrasena, PDO::PARAM_STR);
                $stmt -> execute();

                $result = $stmt;

            } catch (Exception $e) {
                print "error al consultar usuario ". $e -> getMessage();
            }

            return $result;
        }

        public function mldInsertusuario( ){
            $sql = "CALL `SpInsertUsuario`(?, ?, ?, ?, ?, ?, ? , ?);";
            $estado = false;

            try {
                $objcon = new Conexion();

                $stmt = $objcon -> getConect() -> prepare($sql); 
                $stmt -> bindParam(1, $this -> cc,        PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> nombre,    PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> apellido,        PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> direccion,    PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> telefono,        PDO::PARAM_STR);
                $stmt -> bindParam(6, $this -> edad,    PDO::PARAM_STR);
                $stmt -> bindParam(7, $this -> rol,        PDO::PARAM_STR);
                $stmt -> bindParam(8, $this -> contrasena,        PDO::PARAM_STR);
                $estado = $stmt -> execute();
                
            } catch (exepcion $e) {
                print "error al insertar usuario";

        }
        return $estado;
    }

    public function mldSearchAllUsuario(){
        $sql = "call spSearchAllUsuario()";

        try {
            $objcon = new Conexion();

            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> execute();
            $respon = $stmt;
            
        } catch (Exeption $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
        }
        return $respon;
    }

    public function mldEraseusuario(){
        $sql ="call spDeleteUsuario(?)";

        $respon = false;
        try {
            $objcon = new Conexion();
            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> bindParam(1, $this -> cc,        PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
            
        } catch (Exeption $e) {
            print "hubo un error al borrar el registro ". $e -> getMessage();
        }
        return $respon;

    }
    public function mldUpdateUsuario(){
        $sql = "CALL `spUpdateUsuario`(?, ?, ?, ?, ?, ?, ? , ?);";


        try {
            $objcon = new Conexion();

            $stmt = $objcon -> getConect() -> prepare($sql); 
                $stmt -> bindParam(1, $this -> cc,        PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> nombre,    PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> apellido,        PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> direccion,    PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> telefono,        PDO::PARAM_STR);
                $stmt -> bindParam(6, $this -> edad,    PDO::PARAM_STR);
                $stmt -> bindParam(7, $this -> rol,        PDO::PARAM_STR);
                $stmt -> bindParam(8, $this -> contrasena,        PDO::PARAM_STR);
  
            
        } catch (PDOExepcion $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
    }
    }
}

    

?>