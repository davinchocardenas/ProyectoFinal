<?php
class CategoriaController
{

    public function setInsertCategoria($nombre)
    {
        try {
            $objDtoCategoria = new Categoria();
            $objDtoCategoria->setNombre($nombre);

            $objDaoCategoria = new CategoriaModel($objDtoCategoria);

            if ($objDaoCategoria->mldInsertCategoria()) {
                echo "<script>
                Swal.fire(
                    'Guardado',
                    'Registro insertado',
                    'success'
                    )
                </script>";
            }
        } catch (Exception $e) {
            echo "Error en el controlador de insercion " . $e->getMessage();
        }
    } // FIN DEL CONTROLADOR DE INSERCION

    public function getSearchAllCategoria()
    {
        $respon = false;
        try {
            $objDtoCategoria = new Categoria();
            $objDaoCategoria = new CategoriaModel($objDtoCategoria);
            $respon = $objDaoCategoria -> mldSearchAllCategoria() -> fetchAll();
        } catch (PDOException $e) {
            echo "Error on the creation of the 
                controller of show all " . $e->getMessage();
        }
        return $respon;
    } //FIN DE MOSTRAR TODOS
    public function getSearchDDLCategoria(){
        $respon = false;
        try {
            $objDtoCategoria = new Categoria();
            $objDaoCategoria = new CategoriaModel($objDtoCategoria);
            $respon = $objDaoCategoria->mldSearchDDLCategoria()->fetchAll();
        } catch (PDOException $e) {
            echo "Error on the creation of the 
                controller of show all " . $e->getMessage();
        }
        return $respon;
    }

    public function setUpdateCategoria($id_Categoria, $nombre)
    {
        try {
            $objDtoCategoria = new Categoria();
            $objDtoCategoria->setId_Categoria($id_Categoria);
            $objDtoCategoria->setNombre($nombre);
            
            $objDaoCategoria = new CategoriaModel($objDtoCategoria);
            if ($objDaoCategoria->mldUpdateCategoria()) {
                echo "<script>
                Swal.fire(
                    'Actualizado!',
                    'El registro ha sido actualizado',
                    'success'
                )
            </script>";
            }
        } catch (PDOException $e) {
            echo 'Error al modificara' . $e->getMessage();
        }
    } //END UPDATE
}
