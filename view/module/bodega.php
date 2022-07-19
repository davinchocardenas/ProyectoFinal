<input type="text" name="txtId_Bodega" id="txtId_Bodega">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bodega
      <small>creacion de bodega</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Bodega</a></li>
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
      <form method="post" id="frmBodega">
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
                <span class="input-group-addon">Ubicacion</span>
                <input type="text" class="form-control" id="txtUbicacion" name="txtUbicacion">
                <span class="input-group-addon">U</span>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <br>
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- texto box -->
              <div class="input-group">
                <span class="input-group-addon">Seccion</span>
                <input type="text" class="form-control" id="txtSeccion" name="txtSeccion">
                <span class="input-group-addon">S</span>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

          <button class="btn btn-app" onclick="validateBodega(event)">
            <i class="fa fa-save"></i> Guardar
          </button>

        </div>
        <!-- /.box-footer-->
      </form>
      <?php
      if (isset($_POST['txtNombre'])) {
        $objCtrBodega = new BodegaController();
        $objCtrBodega->setInsertBodega(
          $_POST['txtNombre'],
          $_POST['txtSeccion'],
          $_POST['txtUbicacion']
        );
      }
      ?>
    </div>
</div>