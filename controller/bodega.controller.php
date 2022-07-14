<?php
class Bodegacontroller{

    public function setInsertBodega ($nombre, $seccion, $ubicacion){
        try {
            $objDtoBodega = new Bodega();
            $objDtoBodega->setNombre($nombre);
            $objDtoBodega->setSeccion($seccion);
            $objDtoBodega->setUbicacion($ubicacion);

            $objDaoBodega = new BodegaModel($objDtoBodega);

            if ($objDaoBodega->mldInsertBodega()) {
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
    public function getSearchBodega()
    {
        $respon = false;
        try {
            $objDtoBodega = new Bodega();
            $objDaoBodega = new BodegaModel($objDtoBodega);
            $respon = $objDaoBodega->mldSearchBodega()->fetchAll();
        } catch (PDOException $e) {
            echo "Error on the creation of the 
                controller of show all " . $e->getMessage();
        }
        return $respon;
    } //FIN DE MOSTRAR TODOS

    public function getSearchDDLBodega(){
        $respon = false;
        try {
            $objDtoBodega = new Bodega();
            $objDaoBodega = new BodegaModel($objDtoBodega);
            $respon = $objDaoBodega->mldSearchDDLBodega()->fetchAll();
        } catch (PDOException $e) {
            echo "Error on the creation of the 
                controller of show all" . $e->getMessage();
        }
        return $respon;
    }

    public function setUpdateBodega($id_Bodega, $nombre, $seccion, $ubicacion)
    {
        try {
            $objDtoBodega = new Bodega();
            $objDtoBodega->setId_Bodega($id_Bodega);
            $objDtoBodega->setNombre($nombre);
            $objDtoBodega->setSeccion($seccion);
            $objDtoBodega->setUbicacion($ubicacion);
            $objDaoBodega = new BodegaModel($objDtoBodega);
            if ($objDaoBodega->mldUpdateBodega()) {
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
?>