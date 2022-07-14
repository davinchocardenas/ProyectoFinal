<input type="text" name="txtId_Bodega" id="txtId_Bodega">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Bodega
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
                <th class="text-center">Id_Bodega</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Seccion</th>
                <th class="text-center">Ubicacion</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <form method="post">
                <?php
                $objCtrBodega = new BodegaController();
                if (gettype($objCtrBodega->getSearchBodega()) == 'boolean') {
                echo '
                    <tr>
                        <td colspan="5">no hay datos que mostrar</td>
                    </tr>';
                } else {

                foreach ($objCtrBodega->getSearchBodega() as $key => $value) {
                    echo '
                        <tr>
                        <td>' . $value["Id_Bodega"] . '</td>
                        <td>' . $value["Nombre"] . '</td>
                        <td>' . $value["Seccion"] . '</td>
                        <td>' . $value["Ubicacion"] . '</td>
                        <td class="text-center">
                            <button class="btn btn-social-icon bg-yellow" onclick="getDataBodega(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-social-icon btn-google"  onClick="eraseBodega(this.parentElement.parentElement)">
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
        <h4 class="modal-title">Modificar Bodega</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form method="post" id="frmBodegaModificar">
            <input type="hidden" name="txtId_BodegaM" id="txtId_BodegaM">
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
                <!-- ./col -->
                <div class="col-lg-6 col-xs-6">
                <!-- texto box -->
                <div class="input-group">
                    <span class="input-group-addon">Ubicacion</span>
                    <input type="text" class="form-control" id="txtUbicacionM" name="txtUbicacionM">
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
                    <input type="text" class="form-control" id="txtSeccionM" name="txtSeccionM">
                    <span class="input-group-addon">S</span>
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
            <button class="btn btn-app float-left" onclick="validateModifybodega(event)">
            <i class="fa fa-save"></i>Guardar
            </button>
            <?php
            if (isset($_POST['txtNombreM'])) {
            $objCtrBodega = new BodegaController();
            $objCtrBodega->setUpdateBodega(
                $_POST['txtId_BodegaM'],
                $_POST['txtNombreM'],
                $_POST['txtSeccionM'],
                $_POST['txtUbicacionM']
            );
            // include_once 'view/module/bodega.php';
            echo "<script>location.href = 'http://localhost/ProyectoFinal/verbodega';</script>";
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
