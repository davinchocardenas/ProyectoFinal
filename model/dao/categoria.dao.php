<?php
//SE CREA LA CLASE PARA ORGANIZAR EL CODIGO
class CategoriaModel{
    private $id_Categoria;
    private $nombre;

    //SE CREA LA FUNCION CONSTRUCT PARA INICIALIZAR LOS ATRIBUTOS DEL OBJDTOCATEGORIA
    public function __construct($objDtoCategoria){
        $this ->id_Categoria =  $objDtoCategoria -> getId_Categoria() ;
        $this ->nombre       =  $objDtoCategoria -> getNombre() ;
    }//FIN CONSTRUCT
    
    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "INSERTCATEGORIA" PARA LA INSERCION DE DATOS
    public function mldInsertCategoria(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "CALL SpInsertCategoria (?);";
        $estado = false;
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
            //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> nombre,       PDO::PARAM_STR);
            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al insertar la categoria " . $e ->getMessage();
        }//end try-catch
        return $estado;
    }//FIN LLAMADA DE INSERTCATEGORIA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHCATEGORIA" PARA LLAMAR LOS DATOS
    public function mldSearchCategoria(){
        $respon=false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpSearchCategoria()";
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
    }//FIN DEL LLAMADO DE LOS DATOS DE CATEGORIA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHALLCATEGORIA" PARA LLAMAR TODOS LOS DATOS
    public function mldSearchAllCategoria(){
        $respon=false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpSearchAllCategoria()";
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
    }//FIN DEL LLAMADO DE TODOS LOS DATOS CATEGORIA

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "SEARCHDDLCATEGORIA" PARA LLAMAR EL ID Y EL NOMBRE
    public function mldSearchDDLCategoria(){
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql = "call SpSearchDDLCategoria()";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon -> getConect() -> prepare($sql);
            $stmt -> execute();
            $objretornadocategoria = $stmt;

        } catch (PDOException $e) {
            echo "Ha ocurrido un error al mostrar los datos en el dao" . $e -> getMessage();
        }//end try-catch
        return $objretornadocategoria;
    }//FIN DEL LLAMADO DE ID Y NOMBRE

    //SE CREA LA FUNCION PARA LLAMAR EL PROCEDIMIENTO ALMACENADO "ERASECATEGORIA" PARA LA ELIMINACION DE LOS DATOS
    public function mldEraseCategoria(){
        $respon = false;
        //SE LLAMA EL PROCEDIMIENTO ALMACENADO A LA BASE DE DATOS
        $sql  = "call SpDeleteCategoria( ? )";
        //SE CREA UN TRY PARA CUANDO EL CODIGO PUEDA GENERAR UNA EXCEPCION
        try {
            //SE CREA UNA NUEVA CONEXION PARA CONECTARSE A LA BASE DE DATOS
            $objCon = new Conexion();
            //SE CONECTA CON LA BASE DE DATOS AL PROCEDIMIENTO
            $stmt = $objCon->getConect() -> prepare($sql);
             //YA CONECTADO SE LLAMARA LOS PARAMETROS DEL PROCEDIMIENTO
            $stmt ->  bindParam(1,  $this -> id_Categoria,      PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }//FIN DEL LLAMADO DE ERASECATEGORIA

    public function mldUpdateCategoria(){
        $sql  = "CALL SpUpdateCategoria (?, ?);";
        $estado = false;
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> id_Categoria, PDO::PARAM_INT);
            $stmt ->  bindParam(2,  $this -> nombre,       PDO::PARAM_STR);

            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al modificar caegoria " . $e ->getMessage();
        }
        return $estado;
    }//FIN DEL LLAMADO UPDATECATEGORIA
}//FIN CLASE
?>