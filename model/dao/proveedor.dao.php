<?php
class ProveedorModel{
    private $id_Proveedor;
    private $nombre;
    private $direccion;
    private $agente;
    private $telefono;

    public function __construct($objDtoProveedor){
        $this ->id_Proveedor =  $objDtoProveedor -> getId_Proveedor() ;
        $this ->nombre       =  $objDtoProveedor -> getNombre() ;
        $this ->direccion    =  $objDtoProveedor -> getDireccion() ;
        $this ->agente       =  $objDtoProveedor -> getAgente() ;
        $this ->telefono     =  $objDtoProveedor -> getTelefono() ;
    }
    public function mldInsertProveedor(){
        $sql  = "CALL SpInsertProveedor (?, ?, ?, ?);";
        $estado = false;
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> nombre,       PDO::PARAM_STR);
            $stmt ->  bindParam(2,  $this -> direccion,    PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> agente,       PDO::PARAM_STR);
            $stmt ->  bindParam(4,  $this -> telefono,     PDO::PARAM_STR);
            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al insertar proveedor " . $e ->getMessage();
        }
        return $estado;
    }
    public function mldSearchProveedor(){
        $respon=false;
        $sql  = "call SpSearchProveedor()";
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
    }//END SearchProveedor
    public function mldEraseProveedor(){
        $respon = false;
        $sql  = "call SpDeleteProveedor( ? )";
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> id_Proveedor,      PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al 
            mostrar los datos en el dao " . $e -> getMessage() ;
        }//end try-catch
        return $respon;
    }
    public function mldUpdateProveedor(){
        $sql  = "CALL SpUpdateProveedor (?, ?, ?, ?, ?);";
        $estado = false;
        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConect() -> prepare($sql);
            $stmt ->  bindParam(1,  $this -> id_Proveedor, PDO::PARAM_INT);
            $stmt ->  bindParam(2,  $this -> nombre,       PDO::PARAM_STR);
            $stmt ->  bindParam(3,  $this -> direccion,    PDO::PARAM_STR);
            $stmt ->  bindParam(4,  $this -> agente,       PDO::PARAM_STR);
            $stmt ->  bindParam(5,  $this -> telefono,     PDO::PARAM_STR);

            $estado = $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error al modficar proveedor " . $e ->getMessage();
        }
        return $estado;
    }
}
?>