<?php
//echo "llego";
eraseProveedor();
function eraseProveedor(){
    try {
        $objDtoProveedor = new Proveedor();
        $objDtoProveedor -> setId_Proveedor($_GET['id_Proveedor']);
        $objDaoProveedor = new ProveedorModel($objDtoProveedor);
        if ( $objDaoProveedor -> mldEraseProveedor() == true ) {

            echo "<script>
                    Swal.fire(
                        'Borrado!',
                        'El registro ha sido borrado',
                        'success'
                    )
                </script>";
                include_once 'view/module/proveedor.php'; 
        }

    } catch ( PDOException $e ) {
        echo "Error on the delete of the 
        controller of show all " . $e->getMessage(); 
    }


}
?>

