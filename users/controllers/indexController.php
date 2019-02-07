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
        $detayListele=db::ornekAl()->aracDetayListele(htmlspecialchars($_GET['id']));
        $yorum=db::ornekAl()->aracYorumListele(htmlspecialchars($_GET['id']));
        $tumData=array($detayListele,$yorum);
        $this->view('aracDetay','detay',$tumData);
    }

    
}
?>