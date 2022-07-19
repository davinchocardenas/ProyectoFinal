<?php

    class Salida{

        private $id_Salida;
        private $id_Producto;
        private $id_Proveedor;
        private $id_Bodega;
        private $id_Categoria;
        private $fecha;
        private $cantidad;

        /*GETTERS*/
        public function getId_Salida(){
            return $this -> id_Salida;
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

        public function getId_Categoria(){
            return $this -> id_Categoria;
        }

        public function getFecha(){
            return $this -> fecha;
        }
        public function getCantidad(){
            return $this -> cantidad;
        }

        /*SETTING */
        public function setId_Salida($id_Salida){
            $this-> id_Salida = $id_Salida;
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

        public function setId_Categoria($id_Categoria){
            $this-> id_Categoria = $id_Categoria;
        }

        public function setFecha($fecha){
            $this-> fecha = $fecha;
        }

        public function setCantidad($cantidad){
            $this-> cantidad = $cantidad;
        }

    }

?>