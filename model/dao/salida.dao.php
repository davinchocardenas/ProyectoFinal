<?php
    class SalidaModel{

        private $id_Salida;
        private $id_Producto;
        private $id_Proveedor;
        private $id_Bodega;
        private $id_Categoria;
        private $cantidad;
        private $fecha;

        public function __construct($objDtoSalida){
           $this-> id_Salida    = $objDtoSalida -> getId_Salida();
           $this-> id_Producto    = $objDtoSalida -> getId_Producto();
           $this-> id_Proveedor   = $objDtoSalida -> getId_Proveedor();
           $this-> id_Bodega      = $objDtoSalida -> getId_Bodega();
           $this-> id_Categoria   = $objDtoSalida ->  getId_Categoria();
           $this-> fecha          = $objDtoSalida -> getFecha();
           $this-> cantidad       = $objDtoSalida -> getCantidad();

        }

        public function mldInsertSalida( ){
            $sql = "CALL `SpInsertSalida`(?, ?, ?, ?, ?, ?);";  
            $estado = false;

            try {
                $objcon = new Conexion();
                $stmt = $objcon -> getConect() -> prepare($sql); 
                $stmt -> bindParam(1, $this -> id_Producto,     PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> id_Proveedor,    PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> id_Bodega,       PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> id_Categoria,    PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> fecha,           PDO::PARAM_STR);
                $stmt -> bindParam(6, $this -> cantidad,        PDO::PARAM_STR);
                $estado = $stmt -> execute();
                
            } catch (PDOexepcion $e) {
                print "error al insertar salida";

        }
        return $estado;
    }

    public function mldSearchSalida(){
        $respon=false;
        $sql = "call SpSearchSalida()";

        try {
            $objcon = new Conexion();

            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> execute();
            $respon = $stmt;
            
        } catch (PDOExeption $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
        }
        return $respon;
    }

    public function mldSearchAllSalida(){
        $sql = "call spSearchAllSalida()";

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

    public function mldEraseSalida(){
        $respon = false;
        $sql ="call SpDeleteSalida(?)";
        try {
            $objcon = new Conexion();
            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> bindParam(1, $this -> id_Salida,        PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
            
        } catch (PDOExeption $e) {
            print "hubo un error al borrar la salida ". $e -> getMessage();
        }
        return $respon;

    }
    public function mldUpdateSalida(){
        $sql = "CALL SpUpdateSalida(?, ?, ?, ?, ?, ?);";
             $estado = false;

        try {
            $objcon = new Conexion();
            $stmt = $objcon -> getConect() -> prepare($sql); 
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
    }
}

?>