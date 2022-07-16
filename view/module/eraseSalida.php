<?php
    
    eraseSalida();
     function eraseSalida(){
        try {
            $objDtoSalida = new Salida();
            $objDtoSalida -> setId_Salida($_GET["id_Salida"]);
            $objDaoSalida = new SalidaModel($objDtoSalida);

            if ($objDaoSalida -> mldEraseSalida() == true) {
                
                print "<script>
                
                swal.fire(
                    'hecho',
                    'tu registro ha sido eliminado.',
                    'genial'
                );

                
                </script>";

                include_once "view/module/versalida.php";
            }
        } catch (Exeption $e) {
            print "hubo un error al borrar ".$e ->getMesagge;
        }
    }

?>