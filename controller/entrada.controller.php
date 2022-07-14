<?php

    class EntradaController{
        public function setInsertEntrada($id_Producto,$id_Proveedor,$id_Bodega,$cantidad,$fecha){
            try {
                $objDtoEntrada = new Entrada();
                $objDtoEntrada -> setId_Producto($id_Producto);
                $objDtoEntrada -> setId_Proveedor($id_Proveedor);
                $objDtoEntrada -> setId_Bodega($id_Bodega);
                $objDtoEntrada -> setFecha($fecha);
                $objDtoEntrada -> setCantidad($cantidad);  


                $objDaoEntrada = new EntradaModel($objDtoEntrada);

                if($objDaoEntrada -> mldInsertusuario()){
                    print "<script>alert('done')<script>";
                }

            } catch (Exeption $e) {
                print "error en el controlador de insercion".$e ->getMessage();
            }
            


        }

        public function getSearchEntrada(){
            $respon = false;
            try {
                $objDtoEntrada = new Entrada();
                $objDaoEntrada = new EntradaModel($objDtoEntrada);
                $respon = $objDaoEntrada -> mldSearchEntrada() -> fetchAll();
            } catch (exeption $e) {
                print "there was a mistake on the creation of the display controller ". $e ->getMesagge();
            }
            return $respon;
        }

        public function getSearchAllEntrada(){
            $respon = false;
            try {
                $objDtoEntrada = new Entrada();
                $objDaoEntrada = new EntradaModel($objDtoEntrada);
                $respon = $objDaoEntrada -> mldSearchAllEntrada() -> fetchAll();
            } catch (exeption $e) {
                print "there was a mistake on the creation of the display controller ". $e ->getMesagge();
            }
            return $respon;
        }

        public function setUpdateEntrada($id_Registro,$id_Producto,$id_Proveedor,$id_Bodega,$cantidad,$fecha){

            try {
                $objDtoEntrada = new Entrada();
                $objDtoEntrada -> setId_Producto($id_Producto);
                $objDtoEntrada -> setId_Proveedor($id_Proveedor);
                $objDtoEntrada -> setId_Bodega($id_Bodega);
                $objDtoEntrada -> setFecha($fecha);
                $objDtoEntrada -> setCantidad($cantidad);  
                $objDaoEntrada = new EntradaModel($objDtoEntrada);
                 
                if($objDaoEntrada->mldUpdateEntrada()){
                    echo"<script>Swal.fire(
                        'The Internet?',
                        'That thing is still around?',
                        'question'
                      )
                      </script>";
                      include_once 'view/module/entrada.php';
                }
            }catch (PDOExeption $e)     {
                print "error en el controlador de modificacion".$e ->getMessage();
               }
            
        } 

     }
?>