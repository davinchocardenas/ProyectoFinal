<input type="text" name="txtId_Salida" id="txtId_Salida">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Salida
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-user"></i>Home</a></li>
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
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table id="users" class="table table-dark table-striped table-hover">
          <thead>
            <tr>
              <th class="text-center">Acciones</th>
              <th class="text-center">Id_Salida</th>
              <th class="text-center">Producto</th>
              <th class="text-center">Proveedor</th>
              <th class="text-center">Bodega</th>
              <th class="text-center">Categoria</th>
              <th class="text-center">Fecha</th>
              <th class="text-center">Cantidad</th>
            </tr>
          </thead>
          <tbody>
            <form method="post">
              <?php
              $objCtrSalida = new SalidaController();
              if (gettype($objCtrSalida->getSearchAllSalida()) == 'boolean') {
                echo '
                <tr>
                <td colspan="5">no hay datos que mostrar</td>
                </tr>';
              } else {
                
                foreach ($objCtrSalida->getSearchAllSalida() as $key => $value) {
                  echo '
                  <tr>
                    <td class="text-center">
                      <button class="btn btn-social-icon bg-yellow" onclick="getDataSalida(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-edit"></i>
                      </button>
                      <button class="btn btn-social-icon btn-google"  onClick="eraseSalida(this.parentElement.parentElement)">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                        <td>'.$value["Id_Salida"].'</td>
                        <td>'.$value["PRODUCTO"].'</td>
                        <td>'.$value["PROVEEDOR"].'</td>
                        <td>'.$value["BODEGA"].'</td>
                        <td>'.$value["CATEGORIA"].'</td>
                        <td>'.$value["Fecha"].'</td>
                        <td>'.$value["Cantidad"].'</td>
                      </tr>';
                } //FIN FOREACH
              } //FIN IF
              ?>
            </form>
          </tbody>
        </table>
      </div>

      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg bg-info">
        <h4 class="modal-title">Modificar Salida</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="post" id="frmSalidaM">
          <input type="hidden" name="txtId_Salida" id="txtId_Salida">
              <div class="box-body">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">
                            <span class="input-group-addon">Producto</i></span>
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
                            <span class="input-group-addon">Proveedor</span>
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
                            <span class="input-group-addon">Bodega</i></span>
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
                  </div>
                       

                    <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                        
                        </div>
                        
                    </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                                <div class="input-group">
                                    <span class="input-group-addon">Categoria</i></span>
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
            
                        <div class="col-lg-6 col-xs-6">
                    </div>
                    </select>
                      <div class="col-lg-6 col-xs-6">
                      
              </div>
              <!-- /.row -->         
          </form>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div>
          <button class="btn btn-app float-left" onclick="validateModifyproducto(event)">
            <i class="fa fa-save"></i>Guardar
          </button>

          <?php
          if (isset($_POST['txtId_ProductoM'])) {
            
            $objCtrProducto = new ProductoController();
            $objCtrProducto->setUpdateProducto(
              $_POST["txtId_RegistroM"],
              $_POST["txtId_ProductoM"],
              $_POST["txtId_ProveedorM"],
              $_POST["txtId_BodegaM"],
              $_POST["txtId_CategoriaM"],
              $_POST["txtFechaM"],
              $_POST["txtCantidadM"]
            );

            // include_once 'view/module/producto.php';
            echo "<script>location.href = 'http://localhost/ProyectoFinal/verproducto';</script>";
          }
          ?>
          <button class="btn btn-app" data-dismiss="modal">
            <i class="fa fa-close"></i>Salir
          </button>
        </div>
      </div>

    </div>
  </div>
</div>