<?php

namespace AdminControllers;

class adminCikisController{
    
    public function cikis(){
        unset($_SESSION['yonetici_id'],$_SESSION['yonetici_ad']);
        header('location:/yonetim/login');
    }
}



?>