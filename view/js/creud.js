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

function eraseProveedor(obj) {

  let id_Proveedor = obj.children[0].innerHTML;


  const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
      title: 'Estas seguro?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, borralo!',
      cancelButtonText: 'No, cancelar!',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {

          window.location = "index.php?ruta=eraseProveedor&id_Proveedor=" + id_Proveedor


      } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
      ) {
          swalWithBootstrapButtons.fire(
              'Cancelado',
              'No se ha borrado :)',
              'error'
          )
      }
  })




}

function eraseBodega(obj) {

  let id_Bodega = obj.children[0].innerHTML;


  const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
      title: 'Estas seguro?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, borralo!',
      cancelButtonText: 'No, cancelar!',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {

          window.location = "index.php?ruta=eraseBodega&id_Bodega=" + id_Bodega


      } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
      ) {
          swalWithBootstrapButtons.fire(
              'Cancelado',
              'No se ha borrado :)',
              'error'
          )
      }
  })




}

function eraseCategoria(obj) {

  let id_Categoria = obj.children[0].innerHTML;

  const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
      title: 'Estas seguro?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, borralo!',
      cancelButtonText: 'No, cancelar!',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {

          window.location = "index.php?ruta=eraseCategoria&id_Categoria=" + id_Categoria

      } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
      ) {
          swalWithBootstrapButtons.fire(
              'Cancelado',
              'No se ha borrado :)',
              'error'
          )
      }
  })




}

function eraseProducto(obj) {

  let id_Proveedor = obj.children[0].innerHTML;

  const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
      title: 'Estas seguro?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, borralo!',
      cancelButtonText: 'No, cancelar!',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {

          window.location = "index.php?ruta=eraseProducto&id_Producto=" + id_Producto

      } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
      ) {
          swalWithBootstrapButtons.fire(
              'Cancelado',
              'No se ha borrado :)',
              'error'
          )
      }
  })




}

function eraseEntrada(obj){
  
  id_Registro = obj.children[0].innerHTML;
  

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

        window.location="index.php?ruta=eraseEntrada&id_Registro="+ id_Registro;

       
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

function getDataProveedor(obj) {
  let nombre = obj.children[1].innerHTML;
  let direccion = obj.children[2].innerHTML;
  let agente = obj.children[3].innerHTML;
  let telefono = obj.children[4].innerHTML;
  let id_Proveedor = obj.children[0].innerHTML;

  document.getElementById("txtNombreM").value = nombre;
  document.getElementById("txtDireccionM").value = direccion;
  document.getElementById("txtAgenteM").value = agente;
  document.getElementById("txtTelefonoM").value = telefono;
  document.getElementById("txtId_ProveedorM").value = id_Proveedor;
}

function getDataBodega(obj) {
  let nombre = obj.children[1].innerHTML;
  let seccion = obj.children[2].innerHTML;
  let ubicacion = obj.children[3].innerHTML;
  let id_Bodega = obj.children[0].innerHTML;

  document.getElementById("txtNombreM").value = nombre;
  document.getElementById("txtSeccionM").value = seccion;
  document.getElementById("txtUbicacionM").value = ubicacion;
  document.getElementById("txtId_BodegaM").value = id_Bodega;
}

function getDataCategoria(obj) {
  let nombre = obj.children[1].innerHTML;
  let id_Categoria = obj.children[0].innerHTML;

  document.getElementById("txtNombreM").value = nombre;
  document.getElementById("txtId_CategoriaM").value = id_Categoria;
}

function getDataProducto(obj) {
  let descripcion = obj.children[1].innerHTML;
  let stock_Minimo = obj.children[2].innerHTML;
  let id_Producto = obj.children[0].innerHTML;

  document.getElementById("txtDescripcionM").value = descripcion;
  document.getElementById("txtStock_MinimoM").value = stock_Minimo;
  document.getElementById("txtId_ProductoM").value = id_Producto;

}

function getDataEntrada(obj){
  
  let id_Producto = obj.children[1].innerHTML;
  let id_Proveedor = obj.children[2].innerHTML;
  let id_Bodega = obj.children[3].innerHTML;
  let fecha = obj.children[4].innerHTML;
  let cantidad= obj.children[5].innerHTML;
  let id_Registro = obj.children[0].innerHTML;

  document.getElementById("txtId_ProductoM").value = id_Producto;
  document.getElementById("txtId_ProveedorM").value = id_Proveedor;
  document.getElementById("txtBodegaM").value= id_Bodega;
  document.getElementById("txtFechaM").value= fecha;
  document.getElementById("txtCantidadM").value = cantidad;
  document.getElementById("txtId_RegistroM").value= id_Registro;


}

function getGenerarReporte(e){
  window.open("view/module/alluser.php","_blank")
  e.preventDefault();


  
}