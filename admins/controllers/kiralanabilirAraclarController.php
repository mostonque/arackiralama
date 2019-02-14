<?php

namespace AdminControllers;

use AdminModels\db;

use AdminControllers\adminBaseController;

class kiralanabilirAraclarController extends adminBaseController{

    function __construct(){
        parent::__construct();
    }

    public function listele(){
        $data=db::ornekAl()->kiralanabilirAraclar();
        $this->view('kiralanabilirAraclar','araclar',$data);
    }

}
?>