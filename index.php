<?php

    //////CONTROLLER//////

    require_once "controller/usuario.controller.php";
    require_once "controller/template.controller.php";
    ////MODELS///////

    require_once "model/dao/usuario.dao.php";
    require_once "model/dto/usuario.dto.php";


    ////// CONEXION /////

    require_once "model/dto/conexion.php";


    ////////LIBRERIAS//////////////
    
   

    /// start///

    $objrun = new template();
    $objrun -> getIntro();


?>