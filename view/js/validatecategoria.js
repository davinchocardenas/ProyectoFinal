function validatecategoria(e){
    e.preventDefault();
    formulario   = document.getElementById('frmCategoria');
    nombre       = document.getElementById('txtNombre');
    
    lVali = true;

    if (nombre.value==""){
        nombre.style.borderColor="red";
        ohSnap('Ingresar el nombre...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }

    if (lVali == true){
        formulario.submit();
    }
    
}

function validateModifycategoria(e){
    e.preventDefault();
    formulario   = document.getElementById('frmCategoriaModificar');
    nombre       = document.getElementById('txtNombreM');
    
    lVali = true;
    
    if (nombre.value==""){
        nombre.style.borderColor="red";
        ohSnap('Ingresar el nombre...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }

    if (lVali == true){
        formulario.submit();
    }
    

}
