<input type="text" name="txtId_Registro" id="txtId_Registro">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class="fa fa-sign-in">
          Entrada
          <small></small>
        </h1>
      
        <!-- /.box -->

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
          <div class="box-body">
            <table id="users" class="table table-dark table-striped table-hover">
              <thead>
                <tr>
                  <th class="text-center">Acciones</th>
                  <th class="text-center">Id_Registro</th>
                  <th class="text-center">Id_Producto</th>
                  <th class="text-center">Id_Proveedor</th>
                  <th class="text-center">Id_Bodega</th>
                  <th class="text-center">Fecha</th>
                  <th class="text-center">Cantidad</th>
                 
                </tr>
              </thead>
              <tbody>
                <form method="post">
                  <?php
                    $objCtrlEntrada = new EntradaController();
                    if (gettype($objCtrlEntrada -> getSearchAllEntrada()) == "boolean"){
                    print '    
                    <td colspan="5">no hay datos por mostrar</td>';
                    }else{

                      foreach($objCtrlEntrada -> getSearchEntrada() as $key => $value){
                        print '    
                          <tr>
                           <td class="text-center">
                           <button class="btn btn-social-icon bg-yellow" onclick="getDataEntrada(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-social-icon btn-google"  onClick="eraseEntrada(this.parentElement.parentElement)">
                              <i class="fa fa-trash"></i>
                            </button>
                            <td>'.$value['Id_Registro'].'</td>
                            <td>'.$value['Id_Producto'].'</td>
                            <td>'.$value['Id_Proveedor'].'</td>
                            <td>'.$value['Id_Bodega'].'</td>
                            <td>'.$value['Fecha'].'</td>
                            <td>'.$value['Cantidad'].'</td>
                          </td>
                          </tr>
                          ';
                      }
                    
                    }
                    
                  ?>
              </form>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          
        </div>
        <!-- /.box -->

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
    
          <!-- /.box-body -->
          
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <!--modal
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  The Modal -->


  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">modificar entrada</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        
        <form method="post" id="formEntradaModificar">
          <input type="hidden" name="txtId_Registro" id="txtId_Registro">
              <div class="box-body">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">
                          <span class="input-group-addon">Id_Producto</span>
                          <input type="text" class="form-control" id="txtId_ProductoM" name="txtId_ProductoM">
                          <span class="input-group-addon"></span>
                      </div>

                      </div>
                      <!-- ./col -->
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">
                          <span class="input-group-addon">Id_Proveedor</span>
                          <input type="text" class="form-control" id="txtId_ProveedorM" name="txtId_ProveedorM">
                          <span class="input-group-addon"></span>
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
                          <input type="text" class="form-control" id="txtCantidadM" name="txtCantidadM">
                          <span class="input-group-addon"></span>
                      </div>

                      </div>
                      <!-- ./col -->
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">
                          <span class="input-group-addon">Id_Bodega</i></span>
                          <input type="text" class="form-control" id="txtId_BodegaM" name="txtId_BodegaM">
                          <span class="input-group-addon"></span>
                      </div>
                      </div>
                      
                      <div class="col-lg-6 col-xs-6">
                      
                      </div>
                      
                  </div>
                  <div class="row" style="margin-top: 20px;">
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">
                          <span class="input-group-addon">Fecha</i></span>
                          <input type="text" class="form-control" id="txtFechaM" name="txtFechaM">
                          <span class="input-group-addon"></span>
                      </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-6 col-xs-6">
                      </div>
                      </div>
                  </div>
                  <!-- /.row -->      
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
        <div>
                  <button class="btn btn-app"  onclick="validateModifyentrada(event)">
                    <i class="fa fa-save"></i> guardar
                  </button>
                  
                  <?php
                    if (isset($_POST["txtId_ProductoM"])) {
            
                      $objCtrlEntrada = new EntradaController();
                      $objCtrlEntrada -> setUpdateEntrada(
                        $_POST["txtId_ProductoM"],
                        $_POST["txtId_ProveedorM"],
                        $_POST["txtId_BodegaM"],
                        $_POST["txtFechaM"],
                        $_POST["txtCantidadM"]
                      );
                      echo "<script>location.href = 'http://localhost/ProyectoFinal/verentrada';</script>";

                    }
                  ?>
                  
                  </div>

        </div>

      </div>
    </div>
  </div>