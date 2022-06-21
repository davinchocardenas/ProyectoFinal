<?php
    class Proveedor{
        private $id_Proveedor;
        private $nombre;
        private $direccion;
        private $agente;
        private $telefono;

        /*GETTERS*/
        public function getId_Proveedor(){
            return $this->id_Proveedor;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getAgente(){
            return $this->agente;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        /*SETTING */
        public function setId_Proveedor( $id_Proveedor ){
            $this -> id_Proveedor = $id_Proveedor;
        }
        public function setNombre( $nombre ){
            $this -> nombre = $nombre;
        }
        public function setDireccion( $direccion ){
            $this -> direccion = $direccion;
        }
        public function setAgente( $agente ){
            $this -> agente = $agente;
        }
        public function setTelefono( $telefono ){
            $this -> telefono = $telefono;
        }
    }

?>