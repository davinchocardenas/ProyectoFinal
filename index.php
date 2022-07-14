<?php

    //////CONTROLLER//////
    require_once "controller/categoria.controller.php";
    require_once "controller/bodega.controller.php";
    require_once "controller/proveedor.controller.php";
    require_once "controller/usuario.controller.php";
    require_once "controller/template.controller.php";
    require_once "controller/producto.controller.php";
    require_once "controller/entrada.controller.php";
    ////MODELS///////

    require_once "model/dao/usuario.dao.php";
    require_once "model/dto/usuario.dto.php";

    require_once "model/dao/proveedor.dao.php";
    require_once "model/dto/proveedor.dto.php";

    require_once "model/dao/bodega.dao.php";
    require_once "model/dto/bodega.dto.php";

    require_once "model/dao/categoria.dao.php";
    require_once "model/dto/categoria.dto.php";

    require_once "model/dao/producto.dao.php";
    require_once "model/dto/producto.dto.php";

    require_once "model/dao/entrada.dao.php";
    require_once "model/dto/entrada.dto.php";


    ////// CONEXION /////

    require_once "model/conexion.php";


    ////////LIBRERIAS//////////////
    
   

    /// start///

    $objrun = new template();
    $objrun -> getIntro();


?>