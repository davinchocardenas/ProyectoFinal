<?php
    class EntradaModel{

        private $id_Registro;
        private $id_Producto;
        private $id_Proveedor;
        private $id_Bodega;
        private $id_Categoria;
        private $cantidad;
        private $fecha;

        public function __construct($objDtoEntrada){
           $this-> id_Registro    = $objDtoEntrada -> getId_Registro();
           $this-> id_Producto    = $objDtoEntrada -> getId_Producto();
           $this-> id_Proveedor   = $objDtoEntrada -> getId_Proveedor();
           $this-> id_Bodega      = $objDtoEntrada -> getId_Bodega();
           $this-> id_Categoria   = $objDtoEntrada ->  getId_Categoria();
           $this-> fecha          = $objDtoEntrada -> getFecha();
           $this-> cantidad       = $objDtoEntrada -> getCantidad();

        }//FIN CONSTRUCT

        public function mldInsertEntrada( ){
            $sql = "CALL `SpInsertEntrada`(?, ?, ?, ?, ?, ?);";  
            $estado = false;

            try {
                $objcon = new Conexion();
                $stmt = $objcon -> getConect() -> prepare($sql); 
                $stmt -> bindParam(1, $this -> id_Producto,     PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> id_Proveedor,    PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> id_Bodega,       PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> id_Categoria,    PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> fecha,           PDO::PARAM_STR);
                $stmt -> bindParam(6, $this -> cantidad,        PDO::PARAM_INT);
                $estado = $stmt -> execute();
                
            } catch (PDOexepcion $e) {
                print "error al insertar entrada";

        }
        return $estado;
    }//FIN LLAMADA DE INSERCION ENTRADA

    public function mldSearchEntrada(){
        $respon=false;
        $sql = "call SpSearchEntrada()";

        try {
            $objcon = new Conexion();

            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> execute();
            $respon = $stmt;
            
        } catch (PDOExeption $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
        }
        return $respon;
    }//FIN LLAMADO DE DATOS ENTRADA

    public function mldSearchAllEntrada(){
        $sql = "call spSearchAllEntrada()";

        try {
            $objcon = new Conexion();

            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> execute();
            $respon = $stmt;
            
        } catch (Exeption $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
        }
        return $respon;
    }//FIN LLAMADO DE TODOS LOS DATOS ENTRADA

    public function mldEraseEntrada(){
        $sql ="call SpDeleteEntrada(?)";

        $respon = false;
        try {
            $objcon = new Conexion();
            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> bindParam(1, $this -> id_Registro,        PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
            
        } catch (PDOExeption $e) {
            print "hubo un error al borrar el registro ". $e -> getMessage();
        }
        return $respon;

    }//FIN LLAMADO DE BORRAR ENTRADA

    public function mldUpdateEntrada(){
        $sql = "CALL spUpdateEntrada(?, ?, ?, ?, ?, ?, ?);";
        $estado = false;

        try {
            $objcon = new Conexion();
            $stmt = $objcon -> getConect() -> prepare($sql); 
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
        }
        return $estado;
    }//FIN LLAMADO MODIFICAR ENTRADA
}

?>