<?php

namespace AdminControllers;

class adminCikisController{
    function __construct(){
        session_destroy();
        header('location:/adminLoginController/login');
    }
}



?>