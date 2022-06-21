function validateproveedor(e){
    e.preventDefault();
    formulario   = document.getElementById('frmProveedor');
    nombre       = document.getElementById('txtNombre');
    direccion    = document.getElementById('txtDireccion');
    agente       = document.getElementById('txtAgente');
    telefono     = document.getElementById('txtTelefono');
    
    lVali = true;

    if (nombre.value==""){
        nombre.style.borderColor="red";
        ohSnap('Ingresar el nombre...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (direccion.value==""){
        direccion.style.borderColor="red";
        ohSnap('Ingresar la direccion...', {color: 'red'},{duration:1000});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (agente.value==""){
        agente.style.borderColor="red";
        ohSnap('Ingresar el agente...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (telefono.value==""){
        telefono.style.borderColor="red";
        ohSnap('Ingresar el telefono...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (lVali == true){
        formulario.submit();
    }
    

}
function validateModifyproveedor(e){
    e.preventDefault();
    formulario   = document.getElementById('frmProveedorModificar');
    nombre       = document.getElementById('txtNombreM');
    direccion    = document.getElementById('txtDireccionM');
    agente       = document.getElementById('txtAgenteM');
    telefono     = document.getElementById('txtTelefonoM');
    
    lVali = true;
    
    if (nombre.value==""){
        nombre.style.borderColor="red";
        ohSnap('Ingresar el nombre...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (direccion.value==""){
        direccion.style.borderColor="red";
        ohSnap('Ingresar el direccion...', {color: 'red'},{duration:1000});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (agente.value==""){
        agente.style.borderColor="red";
        ohSnap('Ingresar la agente...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (telefono.value==""){
        telefono.style.borderColor="red";
        ohSnap('Ingresar la telefono...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (lVali == true){
        formulario.submit();
    }
    

}
