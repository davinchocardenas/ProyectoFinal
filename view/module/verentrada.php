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
                  <th class="text-center">Id_Categoria</th>
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
                      <tr>
                        <td colspan="5">no hay datos por mostrar</td>
                      </tr>';
                    }else{

                      foreach($objCtrlEntrada -> getSearchAllEntrada() as $key => $value){
                        print '    
                          <tr>   
                            <td class="text-center">
                              <button class="btn btn-social-icon bg-yellow" onclick="getDataEntrada(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-edit"></i>
                              </button>
                              <button class="btn btn-social-icon btn-google"  onClick="eraseEntrada(this.parentElement.parentElement)">
                                <i class="fa fa-trash"></i>
                              </button>
                            </td>
                              <td>'.$value["Id_Registro"].'</td>
                              <td>'.$value["Id_Producto"].'</td>
                              <td>'.$value["Id_Proveedor"].'</td>
                              <td>'.$value["Id_Bodega"].'</td>
                              <td>'.$value["Id_Categoria"].'</td>
                              <td>'.$value["Fecha"].'</td>
                              <td>'.$value["Cantidad"].'</td>
                            </td>
                          </tr>
                          ';
                      }//FIN FOREACH
                    
                    }//FIN IF
                   
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
        
        <form method="post" id="frmEntrada">
          <input type="hidden" name="txtId_RegistroM" id="txtId_RegistroM">
              <div class="box-body">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">

                          <span class="input-group-addon">Id_Producto</i></span>
                            <select class="form-control" id="txtIdProducto_M" name="txtIdProducto_M">
                            <option value="" selected disabled hidden></option>
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
                            <select class="form-control" id="txtId_ProveedorM" name="txtId_ProveedorM">
                            <option value="" selected disabled hidden></option>
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
                      <span class="input-group-addon">Cantidad</span>
                          <input type="text" class="form-control" id="txtCantidadM" name="txtCantidadM">
                          <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                      </div>

                      </div>
                      <!-- ./col -->
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">
                      <span class="input-group-addon">Id_Bodega</i></span>
                            <select class="form-control" id="txt_IdBodegaM" name="txt_IdBodegaM">
                            <option value="" selected disabled hidden></option>
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
                      
                      <div class="col-lg-6 col-xs-6">
                      
                      </div>
                      
                  </div>
                  <div class="row" style="margin-top: 20px;">
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">
                   <span class="input-group-addon">Id_Categoria</i></span>
                          <select class="form-control" id="Id_CategoriaM" name="Id_CategoriaM">
                        <option value="" selected disabled hidden></option>
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

                         ?></select>
                      </div>

                      </div>
                      <!-- ./col -->
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">

                      <span class="input-group-addon">fecha</i></span>
                          <input type="text" class="form-control" id="txtFechaM" name="txtFechaM">
                          <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                      </div>
                      </div>
                      
                      <div class="col-lg-6 col-xs-6">
                      
                      </div>
                      
                  </div>
                  
                      </select>
                      <div class="col-lg-6 col-xs-6">
                      
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
                        $_POST["txtCantidadM"],
                        $_POST["txtFechaM"],
                        $_POST["txtId_ProductoM"],
                        $_POST["txtId_ProveedorM"],
                        $_POST["txtId_CategoriaM"],
                        $_POST["txtId_BodegaM"]
                      );
                      echo "<script>location.href = 'http://localhost/ProyectoFinal/verentrada';</script>";

                    }
                  ?>
                  
                  </div>

        </div>

      </div>
    </div>
  </div>