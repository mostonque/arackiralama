<?php

namespace AdminControllers;

use AdminControllers\adminBaseController;
use AdminModels\db;

class adminYorumController extends adminBaseController{

    function __construct(){
        parent:: __construct();
    }

    public function yorumListele(){
        if (isset($_SESSION['yonetici_id']) && !empty($_SESSION['yonetici_id']) )
        {
            $query=db::ornekAl()->yorumlar();
            $this->view('yorumlar','yorumlar',$query);
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

    public function yorumOnay(){
        if (isset($_SESSION['yonetici_id']) && !empty($_SESSION['yonetici_id']) )
        {
            $yorumid=htmlspecialchars(stripslashes(trim($_GET['yorumId'])));
            $yapilacak=htmlspecialchars(stripslashes(trim($_GET['yorum'])));
              
            if(isset($yapilacak) && $yapilacak==='onayla'){
                $query=db::ornekAl()->yorumOnayla($yorumid);
                if(isset($query) && $query!==FALSE  ){
                    
                    echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\" text-success \">Yorum Onaylandı.</h3>                             
                            <div>
                        </div>
                    </div>
                ";
            header('Refresh:2; url=/admin/yorumlar');
                }else{
                    echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\" text-danger \">Yorum Onaylanamadı. Lütfen Daha Sonra Tekrar Deneyiniz.</h3>   
                                <button class=\"btn btn-warning\" onClick=\"geri()\">Geri Dön</button>                           
                            <div>
                        </div>
                    </div>
                ";
                }
        }elseif(isset($yapilacak) && $yapilacak==='sil'){
            $query2=db::ornekAl()->yorumSil($yorumid);
            if(isset($query2) && $query2!==FALSE  ){
                    echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\" text-success \">Yorum Silindi.</h3>                             
                            <div>
                        </div>
                    </div>
                ";
            header('Refresh:2; url=/admin/yorumlar');
                }else{
                    echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\" text-danger \">Yorum Silinemedi. Lütfen Daha Sonra Tekrar Deneyiniz.</h3>   
                                <button class=\"btn btn-warning\" onClick=\"geri()\">Geri Dön</button>                           
                            <div>
                        </div>
                    </div>
                ";
                }
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