<?php
//SE CREA LA CLASE PARA ORGANIZAR EL CODIGO
    class SalidaModel{

        private $id_Salida;
        private $id_Producto;
        private $id_Proveedor;
        private $id_Bodega;
        private $id_Categoria;
        private $cantidad;
        private $fecha;

        //SE CREA LA FUNCION CONSTRUCT PARA INICIALIZAR LOS ATRIBUTOS DEL OBJDTOSALIDA
        public function __construct($objDtoSalida){
           $this-> id_Salida    = $objDtoSalida -> getId_Salida();
           $this-> id_Producto    = $objDtoSalida -> getId_Producto();
           $this-> id_Proveedor   = $objDtoSalida -> getId_Proveedor();
           $this-> id_Bodega      = $objDtoSalida -> getId_Bodega();
           $this-> id_Categoria   = $objDtoSalida ->  getId_Categoria();
           $this-> fecha          = $objDtoSalida -> getFecha();
           $this-> cantidad       = $objDtoSalida -> getCantidad();

        }//FIN CONSTRUCT

        //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "INSERTSALIDA" PARA LA INSERCION DE DATOS
        public function mldInsertSalida( ){
            //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
            $sql = "CALL `SpInsertSalida`(?, ?, ?, ?, ?, ?);";  
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
                $stmt -> bindParam(6, $this -> cantidad,        PDO::PARAM_STR);
                $estado = $stmt -> execute();
                
            } catch (PDOexepcion $e) {
                print "error al insertar salida";

        }//end try-catch
        return $estado;
    }//FIN DEL LLAMADO DE INSERTSALIDA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHSALIDA" PARA LLAMAR LOS DATOS
    public function mldSearchSalida(){
        $respon=false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "call SpSearchSalida()";
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
    }//FIN DEL LLAMADO DE LOS DATOS DE SALIDA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHALLSALIDA" PARA LLAMAR TODOS LOS DATOS
    public function mldSearchAllSalida(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "call spSearchAllSalida()";
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
    }//FIN LLAMADO DE TODOS LOS DATOS SALIDA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "ERASESALIDA" PARA LA ELIMINACION DE LOS DATOS
    public function mldEraseSalida(){
        $respon = false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql ="call SpDeleteSalida(?)";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objcon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objcon -> getConect() -> prepare($sql); 
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt -> bindParam(1, $this -> id_Salida,        PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
            
        } catch (PDOExeption $e) {
            print "hubo un error al borrar la salida ". $e -> getMessage();
        }
        return $respon;

    }//FIN DEL LLAMADO DE ERASESALIDA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "UPDATESALIDA" PARA LA MODIFICACION DE LOS DATOS
    public function mldUpdateSalida(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "CALL SpUpdateSalida(?, ?, ?, ?, ?, ?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objcon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objcon -> getConect() -> prepare($sql); 
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt -> bindParam(1, $this -> id_Salida,     PDO::PARAM_STR);
            $stmt -> bindParam(2, $this -> id_Producto,     PDO::PARAM_STR);
            $stmt -> bindParam(3, $this -> id_Proveedor,    PDO::PARAM_STR);
            $stmt -> bindParam(4, $this -> id_Bodega,       PDO::PARAM_STR);
            $stmt -> bindParam(5, $this -> id_Categoria,    PDO::PARAM_STR);
            $stmt -> bindParam(6, $this -> fecha,           PDO::PARAM_STR);
            $stmt -> bindParam(7, $this -> cantidad,        PDO::PARAM_STR);
            $estado = $stmt -> execute();
  
            
        } catch (PDOExepcion $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
        }
        return $estado;
    }//FIN LLAMADO MODIFICAR SALIDA
}//FIN CLASE

?>