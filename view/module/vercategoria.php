<input type="text" name="txtId_Categoria" id="txtId_Categoria">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Categoria
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
        <table id="categoria" class="table table-dark table-striped table-hover">
          <thead>
            <tr>
              <th class="text-center">Acciones</th>
              <th class="text-center">Id_Categoria</th>
              <th class="text-center">Nombre</th>
            </tr>
          </thead>
          <tbody>
            <form method="post">
              <?php
              $objCtrCategoria = new CategoriaController();
              if (gettype($objCtrCategoria->getSearchAllCategoria()) == 'boolean') {
                print '
                    <tr>
                      <td colspan="5">no hay datos que mostrar</td>
                    </tr>';
              } else {

                foreach ($objCtrCategoria->getSearchAllCategoria() as $key => $value) {
                  print '
                      <tr>
                      <td>' . $value["Id_Categoria"] . '</td>
                        <td>' . $value["Nombre"] . '</td>
                        <td class="text-center">
                          <button class="btn btn-social-icon bg-yellow" onclick="getDataCategoria(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-edit"></i>
                          </button>
                          <button class="btn btn-social-icon btn-google"  onClick="eraseCategoria(this.parentElement.parentElement)">
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
        <h4 class="modal-title">Modificar Categoria</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" id="frmCategoriaModificar">
          <input type="hidden" name="txtId_CategoriaM" id="txtId_CategoriaM">
          <div class="box-body">
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- texto box -->
                <div class="input-group">
                  <span class="input-group-addon">Nombre</span>
                  <input type="text" class="form-control" id="txtNombreM" name="txtNombreM">
                  <span class="input-group-addon">N</span>
                </div>
              </div>
          </div>
          <!-- /.box-body -->

          <!-- /.box-footer-->
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div>
          <button class="btn btn-app float-left" onclick="validateModifycategoria(event)">
            <i class="fa fa-save"></i>Guardar
          </button>
          <?php
          if (isset($_POST['txtNombreM'])) {
            $objCtrCategoria = new CategoriaController();
            $objCtrCategoria->setUpdateCategoria(
              $_POST['txtId_CategoriaM'],
              $_POST['txtNombreM']
            );
            // include_once 'view/module/categoria.php';
            echo "<script>location.href = 'http://localhost/ProyectoFinal/vercategoria';</script>";
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