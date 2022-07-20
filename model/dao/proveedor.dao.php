<?php
//SE CREA LA CLASE PARA ORGANIZAR EL CODIGO
class ProveedorModel{
    private $id_Proveedor;
    private $nombre;
    private $direccion;
    private $agente;
    private $telefono;

    //SE CREA LA FUNCION CONSTRUCT PARA INICIALIZAR LOS ATRIBUTOS DEL OBJDTOPROVEEDOR
    public function __construct($objDtoProveedor){
        $this ->id_Proveedor =  $objDtoProveedor -> getId_Proveedor() ;
        $this ->nombre       =  $objDtoProveedor -> getNombre() ;
        $this ->direccion    =  $objDtoProveedor -> getDireccion() ;
        $this ->agente       =  $objDtoProveedor -> getAgente() ;
        $this ->telefono     =  $objDtoProveedor -> getTelefono() ;
    }//FIN CONSTRUCT

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "INSERTBODEGA" PARA LA INSERCION DE DATOS
    public function mldInsertProveedor(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "CALL SpInsertProveedor (?, ?, ?, ?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> nombre,       PDO::PARAM_STR);
            $stmt ->  bindParam(2,  $this -> direccion,    PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> agente,       PDO::PARAM_STR);
            $stmt ->  bindParam(4,  $this -> telefono,     PDO::PARAM_STR);
            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al insertar proveedor " . $e ->getMessage();
        }//end try-catch
        return $estado;
    }//FIN DEL LLAMADO DE INSERTPRODUCTO

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHPRODUCTO" PARA LLAMAR LOS DATOS
    public function mldSearchProveedor(){
        $respon=false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpSearchProveedor()";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt -> execute();
            $respon = $stmt;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }//FIN DEL LLAMADO DE LOS DATOS DE PRODUCTO

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHDDLPROVEEDOR" PARA LLAMAR EL ID Y EL NOMBRE
    public function mldSearchDDLProveedor(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpSearchDDLProveedor()";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt -> execute();
            $objretornadoproveedor = $stmt;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $objretornadoproveedor;
    }//FIN DEL LLAMADO DE ID Y NOMBRE

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "ERASEPROVEEDOR" PARA LA ELIMINACION DE LOS DATOS
    public function mldEraseProveedor(){
        $respon = false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpDeleteProveedor( ? )";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> id_Proveedor,      PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }//FIN DEL LLAMADO DE ERASEPROVEEDOR

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "UPDATEPROVEEDOR" PARA LA MODIFICACION DE LOS DATOS
    public function mldUpdateProveedor(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "CALL SpUpdateProveedor (?, ?, ?, ?, ?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> id_Proveedor, PDO::PARAM_INT);
            $stmt ->  bindParam(2,  $this -> nombre,       PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> direccion,    PDO::PARAM_STR);
            $stmt ->  bindParam(4,  $this -> agente,       PDO::PARAM_STR);
            $stmt ->  bindParam(5,  $this -> telefono,     PDO::PARAM_STR);

            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al modficar proveedor " . $e ->getMessage();
        }//end try-catch
        return $estado;
    }//FIN DEL LLAMADO DE UPDATEPROVEEDOR
}//FIN CLASE
?>