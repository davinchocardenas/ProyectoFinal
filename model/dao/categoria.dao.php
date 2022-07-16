<?php
class CategoriaModel{
    private $id_Categoria;
    private $nombre;

    public function __construct($objDtoCategoria){
        $this ->id_Categoria =  $objDtoCategoria -> getId_Categoria() ;
        $this ->nombre       =  $objDtoCategoria -> getNombre() ;
    }
    
    public function mldInsertCategoria(){
        $sql  = "CALL SpInsertCategoria (?);";
        $estado = false;
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> nombre,       PDO::PARAM_STR);
            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al insertar la categoria " . $e ->getMessage();
        }
        return $estado;
    }

    public function mldSearchCategoria(){
        $respon=false;
        $sql  = "call SpSearchCategoria()";
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt -> execute();
            $respon = $stmt;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }//END SearchCategoria

    public function mldSearchAllCategoria(){
        $respon=false;
        $sql  = "call SpSearchAllCategoria()";
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt -> execute();
            $respon = $stmt;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }//END SearchCategoria

    public function mldSearchDDLCategoria(){

        $sql = "call SpSearchDDLCategoria()";
        try {
            $objCon = new Conexion();
            $stmt = $objCon -> getConect() -> prepare($sql);
            $stmt -> execute();
            $objretornadocategoria = $stmt;

        } catch (PDOException $e) {
            echo "Ha ocurrido un error al mostrar los datos en el dao" . $e -> getMessage();
        }
        return $objretornadocategoria;
    }

    public function mldEraseCategoria(){
        $respon = false;
        $sql  = "call SpDeleteCategoria( ? )";
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> id_Categoria,      PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }

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
    }
}
?>