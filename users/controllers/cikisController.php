<?php

namespace Controllers;

class cikisController {
    
    public function cikis(){     
        unset($_SESSION['id'],$_SESSION['ad']);
        header('location:/');

    }

}

?>