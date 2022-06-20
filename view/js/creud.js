function erase(obj){
  
    codigo = obj.children[0].innerHTML;
    

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: '¿estas seguro?',
        text: "no podras deshacer este cambio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'si, borralo',
        cancelButtonText: 'no,cancelar',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {

          window.location="index.php?ruta=erase&codigo="+codigo;

         
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'cancelado',
            'tu registro esta intacto',
            'error'
          )
        }
      })
}
function getData(obj){
  
  let codigo = obj.children[0].innerHTML;
  let cc = obj.children[1].innerHTML;
  let nombre = obj.children[2].innerHTML;
  let apellido = obj.children[3].innerHTML;
  let direccion = obj.children[4].innerHTML;
  let  telefono= obj.children[5].innerHTML;
  let edad = obj.children[6].innerHTML;
  let rol = obj.children[7].innerHTML;
  let contrasena = obj.children[8].innerHTML;
  

  document.getElementById("txtCodigoE").value= codigo;
  document.getElementById("txtccE").value = cc;
  document.getElementById("txtnombreE").value = nombre;
  document.getElementById("txtapellidoE").value= apellido;
  document.getElementById("txtdireccionE").value= direccion;
  document.getElementById("txttelefonoE").value = telefono;
  document.getElementById("txtedadE").value= edad;
  document.getElementById("txtrolE").value= rol;
  document.getElementById("txtcontrasenaE").value= contrasena;

}

function getGenerarReporte(e){
  window.open("view/module/alluser.php","_blank")
  e.preventDefault();


  
}