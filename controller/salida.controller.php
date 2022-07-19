<?php

    class SalidaController{
        public function setInsertSalida($id_Producto,$id_Proveedor,$id_Bodega,$id_Categoria,$fecha,$cantidad){
            try {
                $objDtoSalida = new Salida();
                $objDtoSalida -> setId_Producto($id_Producto);
                $objDtoSalida -> setId_Proveedor($id_Proveedor);
                $objDtoSalida -> setId_Bodega($id_Bodega);
                $objDtoSalida -> setId_Categoria($id_Categoria);
                $objDtoSalida -> setFecha($fecha);
                $objDtoSalida -> setCantidad($cantidad);  


                $objDaoSalida = new SalidaModel($objDtoSalida);

                if($objDaoSalida -> mldInsertSalida()){
                    print "<script>alert('done')<script>";
                }

            } catch (Exeption $e) {
                print "error en el controlador de insercion".$e ->getMessage();
            }
            


        }// FIN DEL CONTROLADOR DE INSERCION

        public function getSearchSalida(){
            $respon = false;
            try {
                $objDtoSalida = new Salida();
                $objDaoSalida = new SalidaModel($objDtoSalida);
                $respon = $objDaoSalida -> mldSearchSalida() -> fetchAll();
            } catch (exeption $e) {
                print "there was a mistake on the creation of the display controller ". $e ->getMesagge();
            }
            return $respon;
        }//FIN DE MOSTRAR

        public function getSearchAllSalida(){
            $respon = false;
            try {
                $objDtoSalida = new Salida();
                $objDaoSalida = new SalidaModel($objDtoSalida);
                $respon = $objDaoSalida -> mldSearchAllSalida() -> fetchAll();
            } catch (exeption $e) {
                print "there was a mistake on the creation of the display controller ". $e ->getMesagge();
            }
            return $respon;
        }//FIN DE MOSTRAR TODOS

        public function setUpdateSalida($id_Registro,$id_Producto,$id_Proveedor,$id_Bodega,$cantidad,$fecha){

            try {
                $objDtoSalida = new Salida();
                $objDtoSalida -> setId_Producto($id_Producto);
                $objDtoSalida -> setId_Proveedor($id_Proveedor);
                $objDtoSalida -> setId_Bodega($id_Bodega);
                $objDtoSalida -> setId_Categoria($id_Categoria);
                $objDtoSalida -> setFecha($fecha);
                $objDtoSalida -> setCantidad($cantidad);  
                $objDaoSalida = new SalidaModel($objDtoSalida);
                 
                if($objDaoSalida->mldUpdateSalida()){
                    echo"<script>Swal.fire(
                        'The Internet?',
                        'That thing is still around?',
                        'question'
                      )
                      </script>";
                      include_once 'view/module/salida.php';
                }
            }catch (PDOExeption $e)     {
                print "error en el controlador de modificacion".$e ->getMessage();
               }
            
        } //FIN UPDATE

     }
?>