<input type="text" name="txtId_Entrada" id="txtId_Entrada">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="fa fa-sign-in">
        Entrada
        <small>creacion de Entrada</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-user"></i> Home</a></li>
        <li><a href="#">User</a></li>

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
 
        <form method="post" id="frmEntrada">
            <div class="box-body">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="input-group">
                        <span class="input-group-addon">Id_Producto</i></span>
                        <select class="form-control" id="txtId_Producto" name="txtId_Producto">
                          <option value="0" selected disabled hidden>Seleccione producto</option>
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
                        <option value="0" selected disabled hidden>Seleccione proveedor</option>
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
                        <option value="0" selected disabled hidden>Seleccione bodega</option>
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
                        <span class="input-group-addon">Fecha</i></span>
                        <input type="text" class="form-control" id="txtFecha" name="txtFecha">
                        <span class="input-group-addon"></span>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    
                </div>
                    
                </div>
                <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                <button class="btn btn-app"  onclick="validateentrada(event)">
                  <i class="fa fa-save"></i> guardar
                </button>
                </div>
                <!-- /.box-footer-->
        </form>
        <?php

        if (isset($_POST["txtId_Producto"])) {
          $objCtrlEntrada = new EntradaController();
          $objCtrlEntrada -> setInsertEntrada(
            $_POST["txtId_Producto"],
            $_POST["txtId_Proveedor"],
            $_POST["txtId_Bodega"],
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
                    