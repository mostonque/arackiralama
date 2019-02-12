<?php

namespace AdminControllers;

use AdminControllers\adminBaseController;
use AdminModels\db;

class aracEkleController extends adminBaseController{

    function __construct(){
        parent::__construct();
    }

    public function aracEkleForm(){
        $this->view('aracEkle');
    }

    public function aracEkle(){
        var_dump($_POST);
    }
    


}




?>