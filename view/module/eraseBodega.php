<?php
//echo "llego";
eraseBodega();
function eraseBodega(){
    try {
        $objDtoBodega = new Bodega();
        $objDtoBodega -> setId_Bodega($_GET['id_Bodega']);
        $objDaoBodega = new BodegaModel($objDtoBodega);
        if ( $objDaoBodega -> mldEraseBodega() == true ) {

            echo "<script>
                    Swal.fire(
                        'Borrado!',
                        'El registro ha sido borrado',
                        'success'
                    )
                </script>";
                include_once 'view/module/verbodega.php'; 
        }

    } catch ( PDOException $e ) {
        echo "Error on the delete of the 
        controller of show all " . $e->getMessage(); 
    }


}
?>
