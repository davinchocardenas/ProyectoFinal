function validateproducto(e){
    e.preventDefault();
    formulario     = document.getElementById('frmProducto');
    descripcion    = document.getElementById('txtDescripcion');
    stock_Minimo   = document.getElementById('txtStock_Minimo');

    
    lVali = true;

    if (descripcion.value==""){
        descripcion.style.borderColor="red";
        ohSnap('Ingresar la descripcion...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (stock_Minimo.value==""){
        stock_Minimo.style.borderColor="red";
        ohSnap('Ingresar el stock minimo...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (lVali == true){
        formulario.submit();
    }
    

}
function validateModifyproducto(e){
    e.preventDefault();
    formulario     = document.getElementById('frmProductoModificar');
    descripcion    = document.getElementById('txtDescripcionM');
    stock_Minimo   = document.getElementById('txtStock_MinimoM');
    
    lVali = true;
    
    if (descripcion.value==""){
        descripcion.style.borderColor="red";
        ohSnap('Ingresar la descripcion...', {color: 'red'});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (stock_Minimo.value==""){
        stock_Minimo.style.borderColor="red";
        ohSnap('Ingresar la descripcion...', {color: 'red'},{duration:1000});  // alert will have class 'alert-color'
        lVali = false;
    }
    if (lVali == true){
        formulario.submit();
    }
    

}
