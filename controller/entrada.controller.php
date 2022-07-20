<?php

    class EntradaController{
        public function setInsertEntrada($id_Producto,$id_Proveedor,$id_Bodega,$id_Categoria,$fecha,$cantidad){
            try {
                $objDtoEntrada = new Entrada();
                $objDtoEntrada -> setId_Producto($id_Producto);
                $objDtoEntrada -> setId_Proveedor($id_Proveedor);
                $objDtoEntrada -> setId_Bodega($id_Bodega);
                $objDtoEntrada -> setId_Categoria($id_Categoria);
                $objDtoEntrada -> setFecha($fecha);
                $objDtoEntrada -> setCantidad($cantidad);  


                $objDaoEntrada = new EntradaModel($objDtoEntrada);

                if($objDaoEntrada -> mldInsertEntrada()){
                    echo "<script>
                    Swal.fire(
                        'Guardado',
                        'Registro insertado y Cantidad ingresada',
                        'success'
                        )
                    </script>";
                }

            } catch (Exeption $e) {
                print "error en el controlador de insercion".$e ->getMessage();
            }
            


        }// FIN DEL CONTROLADOR DE INSERCION

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
        }//FIN DE MOSTRAR

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
        }//FIN DE MOSTRAR TODOS

        public function setUpdateEntrada($id_Registro, $id_Producto,$id_Proveedor,$id_Bodega,$fecha,$cantidad){

            try {
                $objDtoEntrada = new Entrada();
                $objDtoEntrada -> setId_Registro($id_Registro);
                $objDtoEntrada -> setId_Producto($id_Producto);
                $objDtoEntrada -> setId_Proveedor($id_Proveedor);
                $objDtoEntrada -> setId_Bodega($id_Bodega);
                $objDtoEntrada -> setId_Categoria($id_Categoria);
                $objDtoEntrada -> setFecha($fecha);
                $objDtoEntrada -> setCantidad($cantidad);  
                $objDaoEntrada = new EntradaModel($objDtoEntrada);
                 
                if($objDaoEntrada->mldUpdateEntrada()){
                    echo"<script>
                    Swal.fire(
                        'Actualizado!',
                        'El registro ha sido actualizado',
                        'success'
                    )
                </script>";
                }
            }catch (PDOExeption $e)     {
                print "error en el controlador de modificacion". $e->getMessage();
            }
            
        } //FIN UPDATE

     }
?>