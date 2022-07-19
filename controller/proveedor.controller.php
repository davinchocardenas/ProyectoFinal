<?php
class ProveedorController
{

    public function setInsertProveedor($nombre, $direccion, $agente, $telefono)
    {
        try {
            $objDtoProveedor = new Proveedor();
            $objDtoProveedor->setNombre($nombre);
            $objDtoProveedor->setDireccion($direccion);
            $objDtoProveedor->setAgente($agente);
            $objDtoProveedor->setTelefono($telefono);

            $objDaoProveedor = new ProveedorModel($objDtoProveedor);

            if ($objDaoProveedor->mldInsertProveedor()) {
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

    public function getSearchProveedor()
    {
        $respon = false;
        try {
            $objDtoProveedor = new Proveedor();
            $objDaoProveedor = new ProveedorModel($objDtoProveedor);
            $respon = $objDaoProveedor->mldSearchProveedor()->fetchAll();
        } catch (PDOException $e) {
            echo "Error on the creation of the 
                controller of show all " . $e->getMessage();
        }
        return $respon;
    } //FIN DE MOSTRAR TODOS

    public function getSearchDDLProveedor(){
        $respon = false;
        try{
            $objDtoProveedor = new Proveedor();
            $objDaoProveedor = new ProveedorModel($objDtoProveedor);
            $respon = $objDaoProveedor->mldSearchDDLProveedor()->fetchAll();
        } catch (PDOException $e){
            echo "Error on the creation of the 
               controller of show all" . $e->getMessage();
        }
        return $respon;
    }//FIN MOSTRAR ID Y NOMBRE

    public function setUpdateProveedor($id_Proveedor, $nombre, $direccion, $agente, $telefono)
    {
        try {
            $objDtoProveedor = new Proveedor();
            $objDtoProveedor->setId_Proveedor($id_Proveedor);
            $objDtoProveedor->setNombre($nombre);
            $objDtoProveedor->setDireccion($direccion);
            $objDtoProveedor->setAgente($agente);
            $objDtoProveedor->setTelefono($telefono);
            $objDaoProveedor = new ProveedorModel($objDtoProveedor);
            if ($objDaoProveedor->mldUpdateProveedor()) {
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
    } //FIN UPDATE

}
