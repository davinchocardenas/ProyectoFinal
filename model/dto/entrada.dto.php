<?php

    class Entrada{

        private $id_Registro;
        private $id_Producto;
        private $id_Proveedor;
        private $id_Bodega;
        private $fecha;
        private $cantidad;

        public function getId_Registro(){
            return $this -> id_Registro;
        }

        public function getId_Producto(){
            return $this -> id_Producto;
        }

        public function getId_Proveedor(){
            return $this -> id_Proveedor;
        }

        public function getId_Bodega(){
            return $this -> id_Bodega;
        }

        public function getFecha(){
            return $this -> fecha;
        }
        public function getCantida(){
            return $this -> cantidad;
        }

        public function setId_Registro($id_Registro){
            $this-> id_Registro = $id_Registro;
        }

        public function setId_Producto($id_Producto){
            $this-> id_Producto = $id_Producto;
        }

        public function setId_Proveedor($id_Proveedor){
            $this-> id_Proveedor = $id_Proveedor;
        }

        public function setId_Bodega($id_Bodega){
            $this-> id_Bodega = $id_Bodega;
        }

        public function setFecha($fecha){
            $this-> fecha = $fecha;
        }

        public function setCantida($cantidad){
            $this-> cantidad = $cantidad;
        }

    }

?>