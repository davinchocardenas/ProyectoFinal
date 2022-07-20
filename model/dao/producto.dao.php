<?php
//SE CREA LA CLASE PARA ORGANIZAR EL CODIGO
class ProductoModel{
    private $id_Producto;
    private $descripcion;
    private $stock_Minimo;

    //SE CREA LA FUNCION CONSTRUCT PARA INICIALIZAR LOS ATRIBUTOS DEL OBJDTOBODEGA
    public function __construct($objDtoProducto){


        $this ->id_Producto     =  $objDtoProducto -> getId_Producto() ;
        $this ->descripcion     =  $objDtoProducto -> getDescripcion() ;
        $this ->stock_Minimo    =  $objDtoProducto -> getStock_Minimo() ;
        

    }//FIN CONSTRUCT 

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "INSERTPRODUCTO" PARA LA INSERCION DE DATOS
    public function mldInsertProducto(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "CALL SpInsertProducto (?, ?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> descripcion,     PDO::PARAM_STR);
            $stmt ->  bindParam(2,  $this -> stock_Minimo,    PDO::PARAM_STR);
            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al insertar producto " . $e ->getMessage();
        }//end try-catch
        return $estado;
    }//FIN LLAMADA DE INSERCION PRODUCTO

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHPRODUCTO" PARA LLAMAR LOS DATOS
    public function mldSearchProducto(){
        $respon=false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpSearchProducto()";
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

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHALLPRODUCTO" PARA LLAMAR TODOS LOS DATOS
    public function mldSearchAllProducto(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "call spSearchAllProducto()";
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
    }//FIN LLAMADO DE TODOS LOS DATOS PRODUCTO

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHDDLPRODUCTO" PARA LLAMAR EL ID Y EL NOMBRE
    public function mldSearchDDLProducto(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "call SpSearchDDLProducto()";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon -> getConect() -> prepare($sql);
            $stmt -> execute();
            $objretornadoproducto = $stmt;

        } catch (PDOException $e) {
            echo "Ha ocurrido un error al mostrar los datos en el dao" . $e -> getMessage();
        }
        return $objretornadoproducto;
    }//FIN DEL LLAMADO DE ID Y DESCRIPCION

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "ERASEPRODUCTO" PARA LA ELIMINACION DE LOS DATOS
    public function mldEraseProducto(){
        $respon = false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpDeleteProducto( ? )";
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> id_Producto,      PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }//FIN LLAMADO DE BORRAR PRODUCTO

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "UPDATEPRODUCTO" PARA LA MODIFICACION DE LOS DATOS
    public function mldUpdateProducto(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "CALL SpUpdateProducto (?, ?, ?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> id_Producto,  PDO::PARAM_INT);
            $stmt ->  bindParam(2,  $this -> descripcion,  PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> stock_Minimo, PDO::PARAM_INT);
            $stmt -> execute();
            $estado = $stmt;
        } catch (PDOException $e) {
            echo "Error al modficar producto " . $e ->getMessage();
        }
        return $estado;
    }//FIN DEL LLAMADO DE UPDATEBODEGA
}//FIN CLASE
?>