<?php
    
    eraseEntrada();
     function eraseEntrada(){
        try {
            $objDtoEntrada = new Entrada();
            $objDtoEntrada -> setId_Registro($_GET["id_Registro"]);
            $objDaoEntrada = new EntradaModel($objDtoEntrada);

            if ($objDaoEntrada -> mldEraseRegistro() == true) {
                
                print "<script>
                
                swal.fire(
                    'hecho',
                    'tu registro ha sido eliminado.',
                    'genial'
                );

                
                </script>";

                include_once "view/module/verentrada.php";
            }
        } catch (Exeption $e) {
            print "hubo un error al borrar ".$e ->getMesagge;
        }
    }

?>