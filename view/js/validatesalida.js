function validatesalida(e){
    e.preventDefault();
    formulario   = document.getElementById("frmSalida");
    id_Producto  = document.getElementById("txtId_Producto");
    id_Proveedor = document.getElementById("txtId_Proveedor");
    id_Bodega    = document.getElementById("txtId_Bodega");
    id_Categoria = document.getElementById("txtId_Categoria");
    fecha        = document.getElementById("txtFecha");
    cantidad     = document.getElementById("txtCantidad");

    lvali = true;

    if(id_Producto.value==""){
        id_Producto.style.borderColor="red";
        ohSnap('campo de Id_Producto vacio', {color: 'red'});  // alert will have class 'alert-color'
        lvali = false;
    }

    if(id_Proveedor.value==""){
        id_Proveedor.style.borderColor="red";
        ohSnap('campo de Id_Proveedor vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(id_Bodega.value==""){
        id_Bodega.style.borderColor="red";
        ohSnap('campo de Id_Bodega vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(id_Categoria.value==""){
        id_Categoria.style.borderColor="red";
        ohSnap('campo de Id_Categoria vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(fecha.value==""){
        fecha.style.borderColor="red";
        ohSnap('campo de Fecha vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }
    
    if(cantidad.value==""){
       cantidad.style.borderColor="red";
        ohSnap('campo de Cantidad vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(lvali == true ){
        formulario.submit();
    }
}
function validateModifysalida(e){
    e.preventDefault();
    formulario   = document.getElementById("frmSalidaM");
    cantidad     = document.getElementById("txtCantidadM");
    fecha        = document.getElementById("txtFechaM");
    id_Producto  = document.getElementById("txtId_ProductoM");
    id_Proveedor = document.getElementById("txtId_ProveedorM");
    id_Categoria = document.getElementById("txtId_CategoriaM");
    id_Bodega    = document.getElementById("txtId_BodegaM");

    lvali = true;
    if(cantidad.value==""){
       cantidad.style.borderColor="red";
        ohSnap('campo de Cantidad vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }
    if(fecha.value==""){
        fecha.style.borderColor="red";
        ohSnap('campo de Fecha vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }
    
    if(id_Producto.value==""){
        id_Producto.style.borderColor="red";
        ohSnap('campo de Id_Producto vacio', {color: 'red'});  // alert will have class 'alert-color'
        lvali = false;
    }

    if(id_Proveedor.value==""){
        id_Proveedor.style.borderColor="red";
        ohSnap('campo de Id_Proveedor vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }
    
    if(id_Categoria.value==""){
        id_Categoria.style.borderColor="red";
        ohSnap('campo de Id_Categoria vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }
    
    if(id_Bodega.value==""){
        id_Bodega.style.borderColor="red";
        ohSnap('campo de Id_Bodega vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }


    


    if(lvali == true ){
        formulario.submit();
    }
}