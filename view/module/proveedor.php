<input type="text" name="txtId_Proveedor" id="txtId_Proveedor">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <h1 class="fa fa-truck">
      Proveedor
      <small>creacion de proveedor</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Proveedor</a></li>
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
      <form method="post" id="frmProveedor">
        <div class="box-body">
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- texto box -->
              <div class="input-group">
                <span class="input-group-addon">Nombre</span>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                <span class="input-group-addon">N</span>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- texto box -->
              <div class="input-group">
                <span class="input-group-addon">Direccion</span>
                <input type="text" class="form-control" id="txtDireccion" name="txtDireccion">
                <span class="input-group-addon">D</span>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <br>
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- texto box -->
              <div class="input-group">
                <span class="input-group-addon">Agente</span>
                <input type="text" class="form-control" id="txtAgente" name="txtAgente">
                <span class="input-group-addon">A</span>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- texto box -->
              <div class="input-group">
                <span class="input-group-addon">Telefono</span>
                <input type="text" class="form-control" id="txtTelefono" name="txtTelefono">
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

          <button class="btn btn-app" onclick="validateproveedor(event)">
            <i class="fa fa-save"></i> Guardar
          </button>
          <button class="btn btn-app"  onclick="getGenerarReporteproveedor(event)">
            <i class="fa fa-print"></i> reporte
          </button>
        </div>
        <!-- /.box-footer-->
      </form>
      <?php
      if (isset($_POST['txtNombre'])) {
        $objCtrProveedor = new ProveedorController();
        $objCtrProveedor->setInsertProveedor(
          $_POST['txtNombre'],
          $_POST['txtDireccion'],
          $_POST['txtAgente'],
          $_POST['txtTelefono']
        );
      }
      ?>
    </div>
</div>