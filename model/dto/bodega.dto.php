<?php
    class Bodega{
        private $id_Bodega;
        private $nombre;
        private $seccion;
        private $ubicacion;

        /*GETTERS*/
        public function getId_Bodega(){
            return $this->id_Bodega;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getSeccion(){
            return $this->seccion;
        }
        public function getUbicacion(){
            return $this->ubicacion;
        }
        /*SETTING */
        public function setId_Bodega( $id_Bodega ){
            $this -> id_Bodega = $id_Bodega;
        }
        public function setNombre( $nombre ){
            $this -> nombre = $nombre;
        }
        public function setSeccion( $seccion ){
            $this -> seccion = $seccion;
        }
        public function setUbicacion( $ubicacion ){
            $this -> ubicacion = $ubicacion;
        }
    }

?>