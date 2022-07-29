<input type="text" name="txtCodigo" id="txtCodigo">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <h1 class="fa fa-user">
    Usuario
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-user"></i> Home</a></li>
    <li><a href="#">Usuario</a></li>
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
              <input type="hidden" name="txtcc" id="txtcc">
              <th class="text-center">Acciones</th>
              <th class="text-center">CC</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Apellido</th>
              <th class="text-center">Direccion</th>
              <th class="text-center">Telefono</th>
              <th class="text-center">Edad</th>
              <th class="text-center">Rol</th>
              <th class="text-center">Contraseña</th>
                  
            </tr>
            </thead>
            <tbody>
              <form method="post">
                <?php
                  $objCtrlUserAll = new UserController();
                  $objCtrlUserAll -> getSearchAllUsuario();
                  if (gettype($objCtrlUserAll -> getSearchAllUsuario()) == "boolean"){
                  print '    
                  <td colspan="5">no hay datos por mostrar</td>';
                  }else{

                    foreach($objCtrlUserAll -> getSearchAllUsuario() as $key => $value){
                      
                      print '    
                        <tr>
                          <td class="text-center">
                            <button class="btn btn-social-icon bg-yellow" onclick="getData(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-social-icon btn-google"  onClick="erase(this.parentElement.parentElement)">
                              <i class="fa fa-trash"></i>
                            </button>
                            <td>'.$value['CC'].'</td>
                            <td>'.$value['Nombre'].'</td>
                            <td>'.$value['Apellido'].'</td>
                            <td>'.$value['Direccion'].'</td>
                            <td>'.$value['Telefono'].'</td>
                            <td>'.$value['Edad'].'</td>
                            <td>'.$value['Rol'].'</td>
                            <td>'.password_hash($value['Contrasena'],PASSWORD_DEFAULT).'</td>
                          </td>
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
      <h4 class="modal-title">Modificar Usuario</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form method="post" id="formUsuarioModificar">
            <input type="hidden" name="txtCodigoE" id="txtCodigoE">
                <div class="box-body">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="input-group">
                        <span class="input-group-addon">CC</span>
                        <input type="text" class="form-control" id="txtccE" name="txtccE">
                        <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                      </div>

                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                      <div class="input-group">
                        <span class="input-group-addon">Nombre</span>
                          <input type="text" class="form-control" id="txtnombreE" name="txtnombreE">
                          <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                      </div>
                    </div>
                        
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="input-group">
                            <span class="input-group-addon">Apellido</i></span>
                            <input type="text" class="form-control" id="txtapellidoE" name="txtapellidoE">
                            <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                        </div>

                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="input-group">
                            <span class="input-group-addon">Direccion</i></span>
                            <input type="text" class="form-control" id="txtdireccionE" name="txtdireccionE">
                            <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                        </div>
                        </div>
                        
                        <div class="col-lg-6 col-xs-6">
                        
                        </div>
                        
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="input-group">
                            <span class="input-group-addon">Telefono</i></span>
                            <input type="text" class="form-control" id="txttelefonoE" name="txttelefonoE">
                            <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                        </div>

                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="input-group">
                            <span class="input-group-addon">Edad</i></span>
                            <input type="text" class="form-control" id="txtedadE" name="txtedadE">
                            <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                        </div>
                        </div>
                        
                        <div class="col-lg-6 col-xs-6">
                        
                        </div>
                        
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="input-group">
                            <span class="input-group-addon">Rol</i></span>
                            <select class="form-control" id="txtrolE" name="txtrolE">
                          <option value="0" selected disabled hidden>Seleccione su estado</option>
                          <option value="administrativo">administrativo</option>
                          <option value="empleado">Empleado</option>
                        </select>
                        </div>
                        
      
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="input-group">
                            <span class="input-group-addon">contraseña</i></span>
                            <input type="text" class="form-control" id="txtcontrasenaE" name="txtcontrasenaE">
                            <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                        </div>
                        </div>
                        
                        <!-- ./col -->
                        
                        
                        </div>
                        
                </div>
                <!-- /.row -->
          </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div>
          <button class="btn btn-app float-left" onclick="validateModificate(event)">
            <i class="fa fa-save"></i>Guardar
          </button>


                  <?php
                    if (isset($_POST["txtnombreE"])) {
            
                      $objCtrlUser = new UserController();
                      $objCtrlUser -> setUpdateUsuario(
                        $_POST["txtccE"],
                        $_POST["txtnombreE"],
                        $_POST["txtapellidoE"],
                        $_POST["txtdireccionE"],
                        $_POST["txttelefonoE"],
                        $_POST["txtedadE"],
                        $_POST["txtrolE"],
                        $_POST["txtcontrasenaE"]
                      );
                      echo "<script>location.href = 'http://localhost/ProyectoFinal/registro';</script>";

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