<?php
   // require_once "../model/dao/user.dao.php";
    // require_once "../model/dto/user.dto.php";

    class UserController{

        public function getVerifycc($cc,$contrasena){

            try{

                $objDtoUser = New User();
                $objDtoUser -> setcc($cc);
                $objDtoUser -> setcontrasena($contrasena);

                $objDaoUser = new UserModel($objDtoUser);

                if (gettype($objDaoUser -> getQueryLogin() -> fetch()) == "boolean"){
                    
                    print "
                    // <script>
                    // Swal.fire({
                        // icon: 'error',
                        // title: 'Oops...',
                        // text: 'Something went wrong!',
                    //   })
                    // </script>";
                   
                }else{
                    $_SESSION["login"] = true;
                    header("location: index.php");
                }
            }catch(exception $e){

                print "There was a mistake on the creation of the controller";
        }
    }
        public function setInsertusuario($cc,$nombre,$apellido,$direccion,$telefono,$edad,$rol,$contrasena){
            try {
                $objDtoUser = new User();
                $objDtoUser -> setcc($cc);
                $objDtoUser -> setnombre($nombre);
                $objDtoUser -> setapellido($apellido);
                $objDtoUser -> setdireccion($direccion);  
                $objDtoUser -> settelefono($telefono);
                $objDtoUser -> setedad($edad);
                $objDtoUser -> setrol($rol);
                $objDtoUser -> setcontrasena($contrasena);

                $objDaoUser = new UserModel($objDtoUser);

                if($objDaoUser -> mldInsertusuario()){
                    print "<script>alert('done')<script>";
                }

            } catch (Exeption $e) {
                print "error en el controlador de insercion".$e ->getMessage();
            }
            

        }//fin controlador insercion

        public function getSearchAllUsuario(){
            $respon = false;
            try {
                $objDtoUser = new User();
                $objDaoUser = new UserModel($objDtoUser);
                $respon = $objDaoUser -> mldSearchAllUsuario() -> fetchAll();
            } catch (exeption $e) {
                print "there was a mistake on the creation of the display controller ". $e ->getMesagge();
            }
            return $respon;
        }

        public function setUpdateUsuario($cc,$nombre,$apellido,$direccion,$telefono,$edad,$rol,$contrasena){

                try {
                    $objDtoUser = new User();
                    $objDtoUser -> setcc($cc);
                    $objDtoUser -> setnombre($nombre);
                    $objDtoUser -> setapellido($apellido);
                    $objDtoUser -> setdireccion($direccion);  
                    $objDtoUser -> settelefono($telefono);
                    $objDtoUser -> setedad($edad);
                    $objDtoUser -> setrol($rol);
                    $objDtoUser -> setcontrasena($contrasena);
                    $objDaoUser = new UserModel($objDtoUser);
                     
                    if($objDaoUser->mldUpdateUsuario()){
                        echo"<script>Swal.fire(
                            'The Internet?',
                            'That thing is still around?',
                            'question'
                          )
                          </script>";
                          include_once 'view/module/user.php';
                    }
                }catch (PDOExeption $e)     {
                    print "error en el controlador de modificacion".$e ->getMessage();
                   }
                
            } 
        }

    


?>