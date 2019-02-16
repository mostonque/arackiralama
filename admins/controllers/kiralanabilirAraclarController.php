<?php

namespace AdminControllers;

use AdminModels\db;

use AdminControllers\adminBaseController;

class kiralanabilirAraclarController extends adminBaseController{

    function __construct(){
        parent::__construct();
    }

    public function listele(){
        if (isset($_SESSION['yonetici_id']) && !empty($_SESSION['yonetici_id']) )
        {
            
        $data=db::ornekAl()->kiralanabilirAraclar();
        $this->view('kiralanabilirAraclar','araclar',$data);
    
        }else{
            echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"  text-danger \">Giriş yapmadan bu sayfayı görüntüleyemezsiniz. Sizi giriş sayfasına yönlendiriyoruz.</h3>                           
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/adminLoginController/login');
        }
    }

}
?>