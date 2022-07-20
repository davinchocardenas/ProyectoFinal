<?php
//SE CREA LA CLASE PARA ORGANIZAR EL CODIGO
    class EntradaModel{

        private $id_Registro;
        private $id_Producto;
        private $id_Proveedor;
        private $id_Bodega;
        private $id_Categoria;
        private $cantidad;
        private $fecha;

        //SE CREA LA FUNCION CONSTRUCT PARA INICIALIZAR LOS ATRIBUTOS DEL OBJDTOENTRADA
        public function __construct($objDtoEntrada){
           $this-> id_Registro    = $objDtoEntrada -> getId_Registro();
           $this-> id_Producto    = $objDtoEntrada -> getId_Producto();
           $this-> id_Proveedor   = $objDtoEntrada -> getId_Proveedor();
           $this-> id_Bodega      = $objDtoEntrada -> getId_Bodega();
           $this-> id_Categoria   = $objDtoEntrada ->  getId_Categoria();
           $this-> fecha          = $objDtoEntrada -> getFecha();
           $this-> cantidad       = $objDtoEntrada -> getCantidad();

        }//FIN CONSTRUCT

        //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "INSERTENTRADA" PARA LA INSERCION DE DATOS
        public function mldInsertEntrada( ){
            //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
            $sql = "CALL `SpInsertEntrada`(?, ?, ?, ?, ?, ?);";  
            $estado = false;
            //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
            try {
                //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
                $objcon = new Conexion();
                //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
                $stmt = $objcon -> getConect() -> prepare($sql);
                //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
                $stmt -> bindParam(1, $this -> id_Producto,     PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> id_Proveedor,    PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> id_Bodega,       PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> id_Categoria,    PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> fecha,           PDO::PARAM_STR);
                $stmt -> bindParam(6, $this -> cantidad,        PDO::PARAM_INT);
                $estado = $stmt -> execute();
                
            } catch (PDOexepcion $e) {
                print "error al insertar entrada";

        }//end try-catch
        return $estado;
    }//FIN DEL LLAMADO DE INSERTENTRADA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHENTRADA" PARA LLAMAR LOS DATOS
    public function mldSearchEntrada(){
        $respon=false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "call SpSearchEntrada()";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objcon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> execute();
            $respon = $stmt;
            
        } catch (PDOExeption $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
        }//end try-catch
        return $respon;
    }//FIN DEL LLAMADO DE LOS DATOS DE BODEGA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHALLENTRADA" PARA LLAMAR TODOS LOS DATOS
    public function mldSearchAllEntrada(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "call spSearchAllEntrada()";
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
    }//FIN LLAMADO DE TODOS LOS DATOS ENTRADA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "ERASEENTRADA" PARA LA ELIMINACION DE LOS DATOS
    public function mldEraseEntrada(){
        $sql ="call SpDeleteEntrada(?)";
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $respon = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objcon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objcon -> getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt -> bindParam(1, $this -> id_Registro,        PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
            
        } catch (PDOExeption $e) {
            print "hubo un error al borrar el registro ". $e -> getMessage();
        }//end try-catch
        return $respon;

    }//FIN DEL LLAMADO DE ERASEENTRADA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "UPDATEENTRADA" PARA LA MODIFICACION DE LOS DATOS
    public function mldUpdateEntrada(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "CALL spUpdateEntrada(?, ?, ?, ?, ?, ?, ?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objcon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objcon -> getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt -> bindParam(1, $this -> id_Registro,     PDO::PARAM_STR);
            $stmt -> bindParam(2, $this -> id_Producto,     PDO::PARAM_STR);
            $stmt -> bindParam(3, $this -> id_Proveedor,    PDO::PARAM_STR);
            $stmt -> bindParam(4, $this -> id_Bodega,       PDO::PARAM_STR);
            $stmt -> bindParam(5, $this -> id_Categoria,    PDO::PARAM_STR);
            $stmt -> bindParam(6, $this -> fecha,           PDO::PARAM_STR);
            $stmt -> bindParam(7, $this -> cantidad,        PDO::PARAM_STR);
            $estado = $stmt -> execute();
  
            
        } catch (PDOExepcion $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
        }//end try-catch
        return $estado;
    }//FIN LLAMADO MODIFICAR ENTRADA
}//FIN CLASE

?>