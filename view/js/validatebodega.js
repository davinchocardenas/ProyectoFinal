function validateBodega(e){
    e.preventDefault();
    formulario   = document.getElementById('frmBodega');
    nombre       = document.getElementById('txtNombre');
    seccion      = document.getElementById('txtSeccion');
    ubicacion    = document.getElementById('txtUbicacion');
    
    lVali = true;

    if (nombre.value==""){
        nombre.style.borderColor="red";
        ohSnap('Ingresar el nombre...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (seccion.value==""){
        seccion.style.borderColor="red";
        ohSnap('Ingresar la seccion...', {color: 'red'},{duration:1000});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (ubicacion.value==""){
        ubicacion.style.borderColor="red";
        ohSnap('Ingresar el ubicacion...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (lVali == true){
        formulario.submit();
    }
    

}
function validateModifybodega(e){
    e.preventDefault();
    formulario   = document.getElementById('frmBodegaModificar');
    nombre       = document.getElementById('txtNombreM');
    seccion      = document.getElementById('txtSeccionM');
    ubicacion    = document.getElementById('txtUbicacionM');
    
    lVali = true;
    
    if (nombre.value==""){
        nombre.style.borderColor="red";
        ohSnap('Ingresar el nombre...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (seccion.value==""){
        seccion.style.borderColor="red";
        ohSnap('Ingresar la seccion...', {color: 'red'},{duration:10000});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (ubicacion.value==""){
        ubicacion.style.borderColor="red";
        ohSnap('Ingresar el ubicacion...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (lVali == true){
        formulario.submit();
    }
    

}