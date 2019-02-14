<?php

namespace AdminControllers;

use AdminModels\db;

use AdminControllers\adminBaseController;

class kiralananAraclarController extends adminBaseController{

    function __construct(){
        parent::__construct();
    }

    public function kiralananAraclar(){

        $data=db::ornekAl()->kiralanmisAraclar();
        
        $this->view('kiralananAraclar','araclar',$data);

    }

}

?>