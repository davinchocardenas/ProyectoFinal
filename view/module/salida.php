    <input type="text" name="txtId_Salida" id="txtId_Salida">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1 class="fa fa-sign-out">
            Salida
            <small>creacion de Salida</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Salida</a></li>

        </ol>
        </section>
        <!-- Main content -->
        <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title"></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            </div>
    
            <form method="post" id="frmSalida">
                <div class="box-body">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="input-group">
                            <span class="input-group-addon">Id_Producto</i></span>
                            <select class="form-control" id="txtId_Producto" name="txtId_Producto">
                            <option value="" selected disabled hidden>Seleccione producto</option>
                        <?php

                        $objCtrProductoDDL = new ProductoController();
                        if (gettype($objCtrProductoDDL->getSearchDDLProducto()) == 'boolean') {
                            echo '
                            <tr>
                                <td colspan="5">no hay datos que mostrar</td>
                            </tr>';
                            } else {
                            
                                foreach ($objCtrProductoDDL->getSearchDDLProducto() as $key => $value) {

                                echo"<option value=". $value["Id_Producto"].">". $value["Descripcion"]."</option> ";
                                }
                            }

                        ?>
                            </select>
                        
                        </div>

                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="input-group">
                            <span class="input-group-addon">Id_Proveedor</span>
                            <select class="form-control" id="txtId_Proveedor" name="txtId_Proveedor">
                            <option value="" selected disabled hidden>Seleccione proveedor</option>
                            <?php

                            $objCtrProveedorDDL = new ProveedorController();
                            if (gettype($objCtrProveedorDDL->getSearchDDLProveedor()) == 'boolean') {
                            echo '
                            <tr>
                            <td colspan="5">no hay datos que mostrar</td>
                            </tr>';
                            } else {
    
                                foreach ($objCtrProveedorDDL->getSearchDDLProveedor() as $key => $value) {

                                echo"<option value=". $value["Id_Proveedor"].">". $value["Nombre"]."</option> ";
                                }
                            }

                        ?>
                            </select>
                        </div>

                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                        
                        </div>
                        
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-6 col-xs-6">
                         <!-- small box -->
                            <div class="input-group">
                                <span class="input-group-addon">Cantidad</i></span>
                                <input type="text" class="form-control" id="txtCantidad" name="txtCantidad">
                                <span class="input-group-addon"></span>
                            </div>

                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="input-group">
                            <span class="input-group-addon">Id_Bodega</i></span>
                            <select class="form-control" id="txtId_Bodega" name="txtId_Bodega">
                            <option value="" selected disabled hidden>Seleccione bodega</option>
                            <?php

                            $objCtrBodegaDDL = new BodegaController();
                            if (gettype($objCtrBodegaDDL->getSearchDDLBodega()) == 'boolean') {
                            echo '
                            <tr>
                            <td colspan="5">no hay datos que mostrar</td>
                            </tr>';
                            } else {

                            foreach ($objCtrBodegaDDL->getSearchDDLBodega() as $key => $value) {

                            echo"<option value=". $value["Id_Bodega"].">". $value["Seccion"]."</option> ";
                            }
                            }

                            ?>
                            </select>
                        </div>
                    </div>
                       

                    <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                        
                        </div>
                        
                    </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                                <div class="input-group">
                                    <span class="input-group-addon">Id_Categoria</i></span>
                                    <select class="form-control" id="txtId_Categoria" name="txtId_Categoria">
                                    <option value="" selected disabled hidden>Seleccione la categoria</option>
                                    <?php

                                            $objCtrCategoriaDDL = new CategoriaController();
                                            if (gettype($objCtrCategoriaDDL->getSearchDDLCategoria()) == 'boolean') {
                                            echo '
                                            <tr>
                                            <td colspan="5">no hay datos que mostrar</td>
                                            </tr>';
                                            } else {

                                            foreach ($objCtrCategoriaDDL->getSearchDDLCategoria() as $key => $value) {

                                            echo"<option value=". $value["Id_Categoria"].">". $value["Nombre"]."</option> ";
                                            }
                                         }

                                      ?>

                                    </select>
                                </div>

                            </div>
                             <!-- ./col -->
                            <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="input-group">
                                <span class="input-group-addon">Fecha</i></span>
                                <input type="date" class="form-control" id="txtFecha" name="txtFecha">
                                <span class="input-group-addon"></span>
                        </div>
                        </div>
            
                    <div class="col-lg-3 col-xs-6">
                    </div>
                
                    <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    <button class="btn btn-app"  onclick="validatesalida(event)">
                    <i class="fa fa-save"></i>guardar
                    </button>
                    <button class="btn btn-app"  onclick="getGenerarReportesalida(event)">
                    <i class="fa fa-print"></i>reporte
                    </button>
                    </div>
                    <!-- /.box-footer-->
                    
                </div>    
            </form>
         <?php

         if (isset($_POST["txtId_Producto"])) {
            $objCtrlSalida = new SalidaController();
            $objCtrlSalida -> setInsertSalida(
              $_POST["txtId_Producto"],
              $_POST["txtId_Proveedor"],
              $_POST["txtId_Bodega"],
              $_POST["txtId_Categoria"],
              $_POST["txtFecha"],
              $_POST["txtCantidad"]
            );
         }

        ?>
        </div>
        <!-- /.box -->

            <!-- Default box -->
            

        </div>

        </div>
    </div>
    </div>
                        