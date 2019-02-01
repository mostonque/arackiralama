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
        $this->view('index','listele',$listele);
    }
    
    public function DetayListele(){
        $detayListele=db::ornekAl()->aracDetayListele($_POST['id']);
        $this->view('aracDetay','detay',$detayListele);
    }

}
?>