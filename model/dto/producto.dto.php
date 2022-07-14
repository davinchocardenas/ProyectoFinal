<?php
    class Producto{
        private $id_Producto;
        private $descripcion;
        private $stock_Minimo;

        /*GETTERS*/
        public function getId_Producto(){
            return $this->id_Producto;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getStock_Minimo(){
            return $this->stock_Minimo;
        }

        /*SETTING */
        public function setId_Producto( $id_Producto ){
            $this -> id_Producto = $id_Producto;
        }
        public function setDescripcion( $descripcion ){
            $this -> descripcion = $descripcion;
        }
        public function setStock_Minimo( $stock_Minimo ){
            $this -> stock_Minimo = $stock_Minimo;
        }

    }

?>