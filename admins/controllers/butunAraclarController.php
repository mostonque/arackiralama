<?php

namespace AdminControllers;

use AdminControllers\adminBaseController;

use AdminModels\db;

class butunAraclarController extends adminBaseController{

    function __construct(){
        parent::__construct();
    }

    public function tumAraclar(){
        if (isset($_SESSION['yonetici_id']) && !empty($_SESSION['yonetici_id']) )
        {
            $data=db::ornekAl()->tumAraclarListele();
            $this->view('butunAraclar','araclar',$data);
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

    public function araciDuzenle(){
        if (isset($_SESSION['yonetici_id']) && !empty($_SESSION['yonetici_id']) )
        { 
            $idArac=htmlspecialchars(stripslashes(trim($_GET['idArac'])));
            $aracYapilacak=htmlspecialchars(stripslashes(trim($_GET['arac'])));

            if(isset($idArac) && !empty($idArac) && isset($aracYapilacak) && $aracYapilacak==='duzenle'){
            $id=htmlspecialchars(stripslashes(trim($_GET['idArac'])));
            $data=db::ornekAl()->tumAraclarListele($id);
            
            $this->view('aracDuzenle','arac',$data);


            }elseif(isset($idArac) && !empty($idArac) && isset($aracYapilacak) && $aracYapilacak==='sil'){
                echo 'silindi';
            }

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