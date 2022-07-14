<?php
    class Categoria{
        private $id_Categoria;
        private $nombre;

        /*GETTERS*/
        public function getId_Categoria(){
            return $this->id_Categoria;
        }
        public function getNombre(){
            return $this->nombre;
        }

        /*SETTING */
        public function setId_Categoria( $id_Categoria ){
            $this -> id_Categoria = $id_Categoria;
        }
        public function setNombre( $nombre ){
            $this -> nombre = $nombre;
        }
    }

?>