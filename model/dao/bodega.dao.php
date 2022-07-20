<?php
//SE CREA LA CLASE PARA ORGANIZAR EL CODIGO
class BodegaModel{
    private $id_Bodega;
    private $nombre;
    private $seccion;
    private $ubicacion;

    //SE CREA LA FUNCION CONSTRUCT PARA INICIALIZAR LOS ATRIBUTOS DEL OBJDTOBODEGA
    public function __construct($objDtoBodega){
        $this ->id_Bodega =  $objDtoBodega -> getId_Bodega() ;
        $this ->nombre    =  $objDtoBodega -> getNombre() ;
        $this ->seccion   =  $objDtoBodega -> getSeccion() ;
        $this ->ubicacion =  $objDtoBodega -> getUbicacion() ;
    } //FIN CONSTRUCT
    
    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "INSERTBODEGA" PARA LA INSERCION DE DATOS
    public function mldInsertBodega(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "CALL SpInsertBodega (?, ?, ?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> nombre,       PDO::PARAM_STR);
            $stmt ->  bindParam(2,  $this -> seccion,      PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> ubicacion,    PDO::PARAM_STR);
            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al insertar bodega" . $e ->getMessage();
        }//end try-catch
        return $estado;
    } //FIN DEL LLAMADO DE INSERTBODEGA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHBODEGA" PARA LLAMAR LOS DATOS
    public function mldSearchBodega(){
        $respon=false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpSearchBodega()";
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
    }//FIN DEL LLAMADO DE LOS DATOS DE BODEGA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHDDLBODEGA" PARA LLAMAR EL ID Y EL NOMBRE
    public function mldSearchDDLBodega(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "call SpSearchDDLBodega()";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt -> execute();
            $objretornadobodega = $stmt;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al mostrar los datos en el dao " . $e -> getMessage();
        }//end try-catch
        return $objretornadobodega;
    }//FIN DEL LLAMADO DE ID Y NOMBRE

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "ERASEBODEGA" PARA LA ELIMINACION DE LOS DATOS
    public function mldEraseBodega(){
        $respon = false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpDeleteBodega( ? )";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> id_Bodega,      PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }//FIN DEL LLAMADO DE ERASEBODEGA 

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "UPDATEBODEGA" PARA LA MODIFICACION DE LOS DATOS
    public function mldUpdateBodega(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "CALL SpUpdateBodega (?, ?, ?, ?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> id_Bodega,    PDO::PARAM_INT);
            $stmt ->  bindParam(2,  $this -> nombre,       PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> seccion,      PDO::PARAM_STR);
            $stmt ->  bindParam(4,  $this -> ubicacion,    PDO::PARAM_STR);

            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al modficar Bodega " . $e ->getMessage();
        }//end try-catch
        return $estado;
    }//FIN DEL LLAMADO DE UPDATEBODEGA

}//FIN CLASE
?>