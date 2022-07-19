  <?php

    include_once "view/module/head.php";
    include_once "view/module/header.php";
    include_once "view/module/menu.php";

    if (isset($_GET["ruta"])){ 
      switch ($_GET["ruta"]) {
        case 'usuario':
          include_once "view/module/user.php";
          break;

        case 'erase':
          include_once "view/module/erase.php";
          break;

        case 'eraseProveedor':
            include_once "view/module/eraseProveedor.php";
            break;

        case 'eraseBodega':
            include_once 'view/module/eraseBodega.php';
            break;

        case 'eraseCategoria':
            include_once 'view/module/eraseCategoria.php';
            break;
          
        case 'eraseProducto':
            include_once 'view/module/eraseProducto.php';
            break;

        case 'eraseEntrada':
            include_once 'view/module/eraseEntrada.php';
            break;

        case 'eraseSalida':
            include_once 'view/module/eraseSalida.php';
            break;

        case 'proveedor':
          include_once "view/module/proveedor.php";
          break;

        case 'verproveedor':
            include_once "view/module/verproveedor.php";
            break;

        case 'bodega':
            include_once 'view/module/bodega.php';
            break;
          
        case 'verbodega':
            include_once 'view/module/verbodega.php';
            break;

        case 'categoria':
            include_once 'view/module/categoria.php';
            break;
            
        case 'vercategoria':
            include_once 'view/module/vercategoria.php';
            break;

        case 'producto':
            include_once 'view/module/producto.php';
            break;
          
        case 'verproducto':
            include_once 'view/module/verproducto.php';
            break;

        case 'entrada':
            include_once 'view/module/entrada.php';
            break;

        case 'verentrada':
            include_once 'view/module/verentrada.php';
            break;

        case 'registro':
            include_once 'view/module/registro.php';
            break;

        case 'salida':
            include_once 'view/module/salida.php';
            break;
    
        case 'versalida':
            include_once 'view/module/versalida.php';
            break;

        case 'allproveedor':
            include_once 'view/module/allproveedor.php';
            break;
        
        case 'allproducto':
            include_once 'view/module/allproducto.php';
            break;

        case 'allentrada':
            include_once 'view/module/allentrada.php';
            break;
    
        case 'allsalida':
            include_once 'view/module/allsalida.php';
            break;

        default:
          include_once "view/module/presentation.php";
          break;
      }
    }else{
        include_once "view/module/presentation.php";
      }
    
    include_once "view/module/footer.php";
    
?>