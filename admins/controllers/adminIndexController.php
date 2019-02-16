<?php

namespace AdminControllers;

use AdminControllers\rezerveAraclarController;
use AdminModels\db;

class adminIndexController extends rezerveAraclarController {

    function __construct(){
        parent::__construct();
    }

    public function index() {
        parent:: rezerveAraclar();
      
    }


}




?>