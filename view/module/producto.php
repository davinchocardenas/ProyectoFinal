<input type="text" name="txtId_Producto" id="txtId_Producto">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Producto
      <small>creacion de producto</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-user"></i>Home</a></li>
      <li><a href="#">Producto</a></li>
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
      <form method="post" id="frmProducto">
        <div class="box-body">
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- texto box -->
              <div class="input-group">
                <span class="input-group-addon">Descripcion</span>
                <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion">
                <span class="input-group-addon">D</span>
              </div>
            </div>
            <!-- ./col -->
            <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- texto box -->
              <div class="input-group">
                <span class="input-group-addon">Stock minimo</span>
                <input type="text" class="form-control" id="txtStock_Minimo" name="txtStock_Minimo">
                <span class="input-group-addon"><i class="fa-solid fa-layer-minus"></i></span>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <br>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

          <button class="btn btn-app" onclick="validateproducto(event)">
            <i class="fa fa-save"></i> Guardar
          </button>
          <button class="btn btn-app"  onclick="getGenerarReporteproducto(event)">
            <i class="fa fa-print"></i> reporte
          </button>

        </div>
        <!-- /.box-footer-->
      </form>
      <?php
      if (isset($_POST['txtDescripcion'])) {
        $objCtrProducto = new ProductoController();
        $objCtrProducto->setInsertProducto(
          $_POST['txtDescripcion'],
          $_POST['txtStock_Minimo']
        );
      }
      ?>
    </div>
  </section>
</div>
