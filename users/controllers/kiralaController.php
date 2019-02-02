<?php

namespace Controllers;
use Models\db;
use Controllers\baseController;

class kiralaController extends baseController{
    
    function __construct(){
        parent::__construct();
    }
    public function kiralaForm(){
        $detayListele=db::ornekAl()->aracDetayListele(htmlspecialchars($_GET['id']));
        $this->view('aracKiralaForm','aracDetay',$detayListele);
    }

    public function kirala(){  
        $arac=db::ornekAl()->aracKirala(htmlspecialchars($_POST['id']));
        $this->view('kirala','kiralananArac',$arac);
    }
}





?>