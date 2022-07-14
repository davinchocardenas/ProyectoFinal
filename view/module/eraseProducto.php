<?php
//echo "llego";
eraseProducto();
function eraseProducto(){
    try {
        $objDtoProducto = new Producto();
        $objDtoProducto -> setId_Producto($_GET['id_Producto']);
        $objDaoProducto = new ProductoModel($objDtoProducto);
        if ( $objDaoProducto -> mldEraseProducto() == true ) {

            echo "<script>
                    Swal.fire(
                        'Borrado!',
                        'El registro ha sido borrado',
                        'success'
                    )
                </script>";
                include_once 'view/module/verproducto.php'; 
                echo "<script>location.href = 'http://localhost/ProyectoFinal/verproducto';</script>";
        }

    } catch ( PDOException $e ) {
        echo "Error on the delete of the 
        controller of show all " . $e->getMessage(); 
    }


}

?>

