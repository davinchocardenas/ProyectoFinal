<input type="text" name="txtCodigo" id="txtCodigo">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="fa fa-user">
        usuario
        <small>creacion de usuario</small>
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
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>

        <form method="post" id="formUsuario">
            <div class="box-body">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="input-group">
                        <span class="input-group-addon">CC</span>
                        <input type="text" class="form-control" id="txtcc" name="txtcc">
                        <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                    </div>

                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="input-group">
                        <span class="input-group-addon">Nombre</span>
                        <input type="text" class="form-control" id="txtnombre" name="txtnombre">
                        <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
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
                        <span class="input-group-addon">Apellido</i></span>
                        <input type="text" class="form-control" id="txtapellido" name="txtapellido">
                        <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                    </div>

                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="input-group">
                        <span class="input-group-addon">Direccion</i></span>
                        <input type="text" class="form-control" id="txtdireccion" name="txtdireccion">
                        <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
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
                        <span class="input-group-addon">Telefono</i></span>
                        <input type="text" class="form-control" id="txttelefono" name="txttelefono">
                        <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
                    </div>

                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="input-group">
                        <span class="input-group-addon">Edad</i></span>
                        <input type="text" class="form-control" id="txtedad" name="txtedad">
                        <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
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
                      <span class="input-group-addon">Rol</i></span>
                      <select class="form-control" id="txtrol" name="txtrol">
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
                        <span class="input-group-addon">Contraseña</i></span>
                        <input type="text" class="form-control" id="txtcontrasena" name="txtcontrasena">
                        <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>
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
                <button class="btn btn-app"  onclick="validate(event)">
                  <i class="fa fa-save"></i> guardar
                </button>
                <button class="btn btn-app"  onclick="getGenerarReporte(event)">
                  <i class="fa fa-print"></i> reporte
                </button>
            </div>
                <!-- /.box-footer-->
        </form>
        <?php

          if (isset($_POST["txtcc"])) {
            
            $objCtrlUser = new UserController();
            $objCtrlUser -> setInsertusuario(
              $_POST["txtcc"],
              $_POST["txtnombre"],
              $_POST["txtapellido"],
              $_POST["txtdireccion"],
              $_POST["txttelefono"],
              $_POST["txtedad"],
              $_POST["txtrol"],
              $_POST["txtcontrasena"]
            );
          }

        ?>
      </div>
    </section>
  </div>
</div>