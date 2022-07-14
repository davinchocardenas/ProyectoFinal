<?php
class BodegaModel{
    private $id_Bodega;
    private $nombre;
    private $seccion;
    private $ubicacion;

    public function __construct($objDtoBodega){
        $this ->id_Bodega =  $objDtoBodega -> getId_Bodega() ;
        $this ->nombre    =  $objDtoBodega -> getNombre() ;
        $this ->seccion   =  $objDtoBodega -> getSeccion() ;
        $this ->ubicacion =  $objDtoBodega -> getUbicacion() ;
    }
    public function mldInsertBodega(){
        $sql  = "CALL SpInsertBodega (?, ?, ?);";
        $estado = false;
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> nombre,       PDO::PARAM_STR);
            $stmt ->  bindParam(2,  $this -> seccion,      PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> ubicacion,    PDO::PARAM_STR);
            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al insertar bodega" . $e ->getMessage();
        }
        return $estado;
    }
    public function mldSearchBodega(){
        $respon=false;
        $sql  = "call SpSearchBodega()";
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
    }//END SearchBodega

    public function mldSearchDDLBodega(){
        $sql = "call SpSearchDDLBodega()";
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt -> execute();
            $objretornadobodega = $stmt;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al mostrar los datos en el dao " . $e -> getMessage();
        }
        return $objretornadobodega;
    }

    public function mldEraseBodega(){
        $respon = false;
        $sql  = "call SpDeleteBodega( ? )";
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> id_Bodega,      PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }
    public function mldUpdateBodega(){
        $sql  = "CALL SpUpdateBodega (?, ?, ?, ?);";
        $estado = false;
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> id_Bodega,    PDO::PARAM_INT);
            $stmt ->  bindParam(2,  $this -> nombre,       PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> seccion,      PDO::PARAM_STR);
            $stmt ->  bindParam(4,  $this -> ubicacion,    PDO::PARAM_STR);

            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al modficar Bodega " . $e ->getMessage();
        }
        return $estado;
    }

}
?>