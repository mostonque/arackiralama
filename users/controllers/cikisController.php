<?php

namespace Controllers;
use Controllers\baseController;

class cikisController extends baseController{
    function __construct(){
        parent::__construct();
        session_destroy();
        header('location:/');
    }
}

?>