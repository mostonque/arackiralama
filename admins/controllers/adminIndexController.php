<?php

namespace AdminControllers;

use AdminControllers\adminBaseController;
use AdminModels\db;

class adminIndexController extends adminBaseController{

    function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view('index');
    }


}




?>