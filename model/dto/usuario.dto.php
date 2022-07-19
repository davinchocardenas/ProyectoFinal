<?php

    class User{

        private $cc;
        private $nombre;
        private $apellido;
        private $direccion;
        private $telefono;
        private $edad;
        private $rol;
        private $contrasena;
        
        /*GETTERS*/
        public function getcc(){
            return $this -> cc;
        }

        public function getnombre(){
            return $this -> nombre;
        }

        public function getapellido(){
            return $this -> apellido;
        }

        public function getdireccion(){
            return $this -> direccion;
        }

        public function gettelefono(){
            return $this -> telefono;
        }
        public function getedad(){
            return $this -> edad;
        }

        public function getrol(){
            return $this -> rol;
        }

        public function getcontrasena(){
            return $this -> contrasena;
        }

        public function setcc($cc){
            $this-> cc = $cc;
        }

        /*SETTING */
        public function setnombre($nombre){
            $this-> nombre = $nombre;
        }

        public function setapellido($apellido){
            $this-> apellido = $apellido;
        }

        public function setdireccion($direccion){
            $this-> direccion = $direccion;
        }

        public function settelefono($telefono){
            $this-> telefono = $telefono;
        }

        public function setedad($edad){
            $this-> edad = $edad;
        }

        public function setrol($rol){
            $this-> rol = $rol;
        }

        public function setcontrasena($contrasena){
            $this-> contrasena = $contrasena;
        }


    }

?>