<?php
//SE CREA LA CLASE PARA ORGANIZAR EL CODIGO
    class UserModel{

        private $cc;
        private $nombre;
        private $apellido;
        private $direccion;
        private $telefono;
        private $edad;
        private $rol;
        private $contrasena;

        //SE CREA LA FUNCION CONSTRUCT PARA INICIALIZAR LOS ATRIBUTOS DEL OBJDTOUSUARIO
        public function __construct($objDtoUser){
           $this-> cc    = $objDtoUser -> getcc();
           $this-> nombre    = $objDtoUser -> getnombre();
           $this-> apellido = $objDtoUser -> getapellido();
           $this-> direccion     = $objDtoUser -> getdireccion();
           $this-> telefono = $objDtoUser -> gettelefono();
           $this-> edad = $objDtoUser -> getedad();
           $this-> rol     = $objDtoUser -> getrol();
           $this-> contrasena = $objDtoUser -> getcontrasena();  
        }//FIN CONSTRUCT

        //SE CREA LA FUNCION PARA LLAMAR EL LOGIN
        public function getQueryLogin(){

            $sql = "SELECT * FROM usuario
                    WHERE CC = ? AND CONTRASENA = ?";
            
            //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
            try {
                //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
                $objcon = new Conexion();
                //SE CONECTA CON LA BASE DE DATOS
                $stmt = $objcon -> getConect() -> prepare($sql); 
                //YA CONECTADO SE LLAMARA LOS PARAMETROS
                $stmt -> bindParam(1, $this -> cc, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> contrasena, PDO::PARAM_STR);
                $stmt -> execute();

                $result = $stmt;

            } catch (Exception $e) {
                print "error al consultar usuario ". $e -> getMessage();
            }//end try-catch

            return $result;
        }//FIN LLAMADO LOGIN

        //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "INSERTUSUARIO" PARA LA INSERCION DE DATOS
        public function mldInsertusuario( ){
            //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
            $sql = "CALL `SpInsertUsuario`(?, ?, ?, ?, ?, ?, ? , ?);";
            $estado = false;
            //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
            try {
                //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
                $objcon = new Conexion();
                //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
                $stmt = $objcon -> getConect() -> prepare($sql); 
                //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
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

        }//end try-catch
        return $estado;
    }//FIN DEL LLAMADO DE INSERTUSUARIO

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHUSUARIO" PARA LLAMAR A TODOS LOS DATOS
    public function mldSearchAllUsuario(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "call spSearchAllUsuario()";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objcon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> execute();
            $respon = $stmt;
            
        } catch (Exeption $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
        }//end try-catch
        return $respon;
    }//FIN DEL LLAMADO DE LOS DATOS DE USUARIO

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "ERASESALIDA" PARA LA ELIMINACION DE LOS DATOS
    public function mldEraseusuario(){
        $sql ="call spDeleteUsuario(?)";
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $respon = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objcon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objcon -> getConect() -> prepare($sql); 
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt -> bindParam(1, $this -> cc,        PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
            
        } catch (Exeption $e) {
            print "hubo un error al borrar el registro ". $e -> getMessage();
        }//end try-catch
        return $respon;

    }//FIN DEL LLAMADO DE ERASEUSUARIO

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "UPDATEUSUARIO" PARA LA MODIFICACION DE LOS DATOS
    public function mldUpdateUsuario(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "CALL `spUpdateUsuario`(?, ?, ?, ?, ?, ?, ? , ?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objcon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objcon -> getConect() -> prepare($sql); 
                //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
                $stmt -> bindParam(1, $this -> cc,        PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> nombre,    PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> apellido,        PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> direccion,    PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> telefono,        PDO::PARAM_STR);
                $stmt -> bindParam(6, $this -> edad,    PDO::PARAM_STR);
                $stmt -> bindParam(7, $this -> rol,        PDO::PARAM_STR);
                $stmt -> bindParam(8, $this -> contrasena,        PDO::PARAM_STR);

                $estado = $stmt -> execute();
  
            
        } catch (PDOExepcion $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
    }//end try-catch
    }//FIN LLAMADO MODIFICAR USUARIO
}//FIN CLASE

    

?>