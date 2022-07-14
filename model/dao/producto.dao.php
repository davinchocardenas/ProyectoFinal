<?php
class ProductoModel{
    private $id_Producto;
    private $descripcion;
    private $stock_Minimo;

    public function __construct($objDtoProducto){


        $this ->id_Producto     =  $objDtoProducto -> getId_Producto() ;
        $this ->descripcion     =  $objDtoProducto -> getDescripcion() ;
        $this ->stock_Minimo    =  $objDtoProducto -> getStock_Minimo() ;
        

    }

    public function mldInsertProducto(){
        $sql  = "CALL SpInsertProducto (?, ?);";
        $estado = false;
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> descripcion,     PDO::PARAM_STR);
            $stmt ->  bindParam(2,  $this -> stock_Minimo,    PDO::PARAM_STR);
            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al insertar producto " . $e ->getMessage();
        }
        return $estado;
    }

    public function mldSearchProducto(){
        $respon=false;
        $sql  = "call SpSearchProducto()";
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
    }//END SearchProducto

    public function mldSearchAllProducto(){
        $sql = "call spSearchAllProducto()";

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

    public function mldSearchDDLProducto(){

        $sql = "call SpSearchDDLProducto()";
        try {
            $objCon = new Conexion();
            $stmt = $objCon -> getConect() -> prepare($sql);
            $stmt -> execute();
            $objretornadoproducto = $stmt;

        } catch (PDOException $e) {
            echo "Ha ocurrido un error al mostrar los datos en el dao" . $e -> getMessage();
        }
        return $objretornadoproducto;
    }

    public function mldEraseProducto(){
        $respon = false;
        $sql  = "call SpDeleteProducto( ? )";
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> id_Producto,      PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }

    public function mldUpdateProducto(){

        $sql  = "CALL SpUpdateProducto (?, ?, ?);";
        $estado = false;
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> id_Producto,  PDO::PARAM_INT);
            $stmt ->  bindParam(2,  $this -> descripcion,  PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> stock_Minimo, PDO::PARAM_INT);
            $stmt -> execute();
            $estado = $stmt;
        } catch (PDOException $e) {
            echo "Error al modficar producto " . $e ->getMessage();
        }
        return $estado;
    }
}
?>