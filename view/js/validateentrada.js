function validateentrada(e){
    e.preventDefault();
    formulario   = document.getElementById("frmEntrada");
    id_Producto  = document.getElementById("txtId_Producto");
    id_Proveedor = document.getElementById("txtId_Proveedor");
    id_Bodega    = document.getElementById("txtId_Bodega");
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
        form.submit();
    }
}
function validateModifyentrada(e){
    e.preventDefault();
    formulario   = document.getElementById("frmEntrada");
    id_Producto  = document.getElementById("txtId_Producto");
    id_Proveedor = document.getElementById("txtId_Proveedor");
    id_Bodega    = document.getElementById("txtId_Bodega");
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
        form.submit();
    }
}