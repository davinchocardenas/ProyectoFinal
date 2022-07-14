<?php
//echo "llego";
eraseCategoria();
function eraseCategoria(){
    try {
        $objDtoCategoria = new Categoria();
        $objDtoCategoria -> setId_Categoria($_GET['id_Categoria']);
        $objDaoCategoria = new CategoriaModel($objDtoCategoria);
        if ( $objDaoCategoria -> mldEraseCategoria() == true ) {

            echo "<script>
                    Swal.fire(
                        'Borrado!',
                        'El registro ha sido borrado',
                        'success'
                    )
                </script>";
                include_once 'view/module/categoria.php'; 
        }

    } catch ( PDOException $e ) {
        echo "Error on the delete of the 
        controller of show all " . $e->getMessage(); 
    }


}

?>

