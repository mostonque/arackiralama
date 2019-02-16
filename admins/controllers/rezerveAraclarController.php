<?php

namespace AdminControllers;

use AdminModels\db;

use AdminControllers\adminBaseController;

class rezerveAraclarController extends adminBaseController{

    function __construct(){
        parent::__construct();
    }

    public function rezerveAraclar(){
          
        if (isset($_SESSION['yonetici_id']) && !empty($_SESSION['yonetici_id']) )
            {
                $data=db::ornekAl()->adminRezerveAracListele();
                $this->view('rezerveAraclar','araclar',$data);
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




    public function kirala(){
        if (isset($_SESSION['yonetici_id']) && !empty($_SESSION['yonetici_id']) )
            {
               
        if(isset($_GET['kirala']) && $_GET['kirala']==='kirala' ){
          
            $data=db::ornekAl()->kirala(htmlspecialchars(stripslashes(trim($_GET['idArac']))),htmlspecialchars(stripslashes(trim($_GET['usrId']))),htmlspecialchars(stripslashes(trim($_GET['rezerveGun']))));
            
            if($data!==FALSE)
            {
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"  text-success \">KİRALAMA BAŞARILI</h3>                           
                    <div>
                </div>
            </div>
        ";
        //MAİL GÖNDERME BAŞLANGIÇ

        $kime=$data[0]['mail'];
        $kAdi=$data[0]['ad']." ".$data[0]['soyad'];
        $arac=$data[0]['marka']." ".$data[0]['seri']." ".$data[0]['model'];
        
        $konu="Car Rental Araç Kiralama";
        $message="Sayın $kAdi KİRA TALEBİNDE BULUNDUĞUNUZ $arac ARACINIZ KİRALANMIŞTIR.FİRMAMIZA GELİP ALABİLİRSİNİZ";
        $message = wordwrap($message,70);

        mail($kime,$konu,$message);
        
        //MAİL GÖNDERME BİTİŞ
        header('Refresh:2; url=/kiralananAraclarController/kiralananAraclar');
            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"  text-danger \">KİRALAMA BAŞARISIZ OLDU.</h3>                           
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/rezerveAraclarController/rezerveAraclar');
            }
        }else{

            $data=db::ornekAl()->reddet(htmlspecialchars(stripslashes(trim($_GET['idArac']))));
            if($data!==FALSE)
            {
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"  text-success \">REDDETME BAŞARILI</h3>                           
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/kiralananAraclarController/kiralananAraclar');
            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"  text-danger \">REDDEDİLEMEDİ !!.</h3>                           
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/rezerveAraclarController/rezerveAraclar');
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