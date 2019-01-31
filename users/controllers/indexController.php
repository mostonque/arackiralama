<?php

namespace Controllers;
use Models\db;
use Controllers\baseController;

class indexController extends baseController{

    function __construct(){
        parent::__construct();
    }

    public function listele(){       
        $listele=db::ornekAl()->aracListele();
        $this->view('index', $listele);
    }
    
    public function listele2(){
        $listele=db::ornekAl()->aracListele2();
        return $listele;
    }

}
?>