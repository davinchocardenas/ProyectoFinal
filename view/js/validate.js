function validate(e){
    e.preventDefault();

    form = document.getElementById("formUsuario");
    cc = document.getElementById("txtcc");
    nombre = document.getElementById("txtnombre");
    apellido = document.getElementById("txtapellido");
    direccion = document.getElementById("txtdireccion");
    telefono = document.getElementById("txttelefono");
    edad = document.getElementById("txtedad");
    rol = document.getElementById("txtrol");
    contrasena= document.getElementById("txtcontrasena");

    lvali = true;

    if(cc.value==""){
        cc.style.borderColor="red";
        lvali = false;
        ohSnap('campo de cedula vacio', {color: 'red'});  // alert will have class 'alert-color'
    }

    if(nombre.value==""){
        nombre.style.borderColor="red";
        ohSnap('campo de Nombre vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(apellido.value==""){
        apellido.style.borderColor="red";
        ohSnap('campo de Apellido vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(direccion.value==""){
        direccion.style.borderColor="red";
        ohSnap('campo de Direccion vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }
    
    if(telefono.value==""){
       telefono.style.borderColor="red";
        ohSnap('campo de Telefono vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(edad.value==""){
        edad.style.borderColor="red";
        ohSnap('campo de Edad vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(rol.value==""){
        rol.style.borderColor="red";
        ohSnap('campo de Rol vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(contrasena.value==""){
        contrasena.style.borderColor="red";
        ohSnap('campo de Contraseña vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }


    if(lvali == true ){
        form.submit();
    }
}
function validateModificate(e){
    e.preventDefault();

    form = document.getElementById("formUsuarioModificar");
    cc = document.getElementById("txtccE");
    nombre = document.getElementById("txtnombreE");
    apellido = document.getElementById("txtapellidoE");
    direccion = document.getElementById("txtdireccionE");
    telefono = document.getElementById("txttelefonoE");
    edad = document.getElementById("txtedadE");
    rol = document.getElementById("txtrolE");
    contrasena= document.getElementById("txtcontrasenaE");

    lvali = true;

    if(cc.value==""){
        cc.style.borderColor="red";
        lvali = false;
        ohSnap('campo de cedula vacio', {color: 'red'});  // alert will have class 'alert-color'
    }

    if(nombre.value==""){
        nombre.style.borderColor="red";
        ohSnap('campo de Nombre vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(apellido.value==""){
        apellido.style.borderColor="red";
        ohSnap('campo de Apellido vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(direccion.value==""){
        direccion.style.borderColor="red";
        ohSnap('campo de Direccion vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }
    
    if(telefono.value==""){
       telefono.style.borderColor="red";
        ohSnap('campo de Telefono vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(edad.value==""){
        edad.style.borderColor="red";
        ohSnap('campo de Edad vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(rol.value==""){
        rol.style.borderColor="red";
        ohSnap('campo de Rol vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }

    if(contrasena.value==""){
        contrasena.style.borderColor="red";
        ohSnap('campo de Contraseña vacio', {color: 'red'});  // alert will have class 'alert-color
        lvali = false;
    }


    if(lvali == true ){
        form.submit();
    }
}