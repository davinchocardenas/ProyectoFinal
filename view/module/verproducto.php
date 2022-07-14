<input type="text" name="txtId_Producto" id="txtId_Producto">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Producto
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-user"></i>Home</a></li>
        <li><a href="#"></a></li>
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
              <th class="text-center">Id_Producto</th>
              <th class="text-center">Descripcion</th>
              <th class="text-center">Stock minimo</th>
              <th class="text-center">cantidad</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <form method="post">
              <?php
              $objCtrProducto = new ProductoController();
              if (gettype($objCtrProducto->getSearchAllProducto()) == 'boolean') {
                echo '
                    <tr>
                      <td colspan="5">no hay datos que mostrar</td>
                    </tr>';
              } else {

                foreach ($objCtrProducto->getSearchAllProducto() as $key => $value) {
                  echo '
                      <tr>
                      <td>' . $value["Id_Producto"] . '</td>
                        <td>' . $value["Descripcion"] . '</td>
                        <td>' . $value["Stock_Minimo"] . '</td>
                        <td>' . $value["cantidad"] . '</td>
                        <td class="text-center">
                          <button class="btn btn-social-icon bg-yellow" onclick="getDataProducto(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-edit"></i>
                          </button>
                          <button class="btn btn-social-icon btn-google"  onClick="eraseProducto(this.parentElement.parentElement)">
                            <i class="fa fa-trash"></i>
                          </button>
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
        <h4 class="modal-title">Modificar Producto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" id="frmProductoModificar">
        <input type="hidden" name="txtId_ProductoM" id="txtId_ProductoM">
          <div class="box-body">
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- texto box -->
                <div class="input-group">
                  <span class="input-group-addon">Descripcion</span>
                  <input type="text" class="form-control" id="txtDescripcionM" name="txtDescripcionM">
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
                  <span class="input-group-addon">Stock minimo</span>
                  <input type="text" class="form-control" id="txtStock_MinimoM" name="txtStock_MinimoM">
                  <span class="input-group-addon"><i class="fa fa-layer-minus"></i></span>
                </div>
              </div>
              <!-- ./col -->
            </div>
          </div>
          <!-- /.box-body -->

          <!-- /.box-footer-->
        </form>
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
              $_POST['txtId_ProductoM'],
              $_POST['txtDescripcionM'],
              $_POST['txtStock_MinimoM'],
              
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