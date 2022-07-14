
<?php
class ProductoController
{

    public function setInsertProducto($descripcion, $stock_Minimo)
    {
        try {
            $objDtoProducto = new Producto();
            $objDtoProducto->setDescripcion($descripcion);
            $objDtoProducto->setStock_Minimo($stock_Minimo);
            $objDaoProducto = new ProductoModel($objDtoProducto);
            if ($objDaoProducto->mldInsertProducto()) {
                echo "<script>
                Swal.fire(
                    'Guardado',
                    'Producto insertado',
                    'success'
                    )
                </script>";
            }
        } catch (Exception $e) {
            echo "Error en el controlador de insercion " . $e->getMessage();
        }
    } // FIN DEL CONTROLADOR DE INSERCION
    public function getSearchAllProducto()
    {
        $respon = false;
        try {
            $objDtoProducto = new Producto();
            $objDaoProducto = new ProductoModel($objDtoProducto);
            $respon = $objDaoProducto->mldSearchAllProducto()->fetchAll();
        } catch (PDOException $e) {
            echo "Error on the creation of the 
                controller of show all " . $e->getMessage();
        }
        return $respon;
    } //FIN DE MOSTRAR TODOS
    public function getSearchDDLProducto(){
        $respon = false;
        try {
            $objDtoProducto = new Producto();
            $objDaoProducto = new ProductoModel($objDtoProducto);
            $respon = $objDaoProducto->mldSearchDDLProducto()->fetchAll();
        } catch (PDOException $e) {
            echo "Error on the creation of the 
                controller of show all " . $e->getMessage();
        }
        return $respon;
    }
   
    public function setUpdateProducto($id_Producto, $descripcion, $stock_Minimo)
    {
        try {

            $objDtoProducto = new Producto();
            $objDtoProducto->setId_Producto($id_Producto);
            $objDtoProducto->setDescripcion($descripcion);
            $objDtoProducto->setStock_Minimo($stock_Minimo);
            $objDaoProducto = new ProductoModel($objDtoProducto);
            
            if ($objDaoProducto->mldUpdateProducto()) {
            echo "<script>
                Swal.fire(
                    'Actualizado!',
                    'El registro ha sido actualizado',
                    'success'
                )
            </script>";
            }
        } catch (PDOException $e) {
            echo 'Error al modificar' . $e->getMessage();
        }
    } //END UPDATE
}
