<?php
namespace AdminControllers;

use AdminControllers\adminBaseController;
use AdminModels\db;

class adminLoginController extends adminBaseController{

    function __construct(){
        parent::__construct();
    }

    public function login(){
        
       if(isset($_SESSION['yonetici_id']) && isset($_SESSION['yonetici_ad'])){
            header('location:/admin');
        }else{
            $this->view('adminLogin');
        }
        
    }

    public function adminGiris(){
        if( isset($_POST['yonetici_ad']) && !empty($_POST['yonetici_ad']) &&
            isset($_POST['yonetici_sifre']) && !empty($_POST['yonetici_sifre']))
        {
            $yonetici_adi=htmlspecialchars(stripslashes(trim($_POST['yonetici_ad'])));
            $yonetici_sifre=htmlspecialchars(stripslashes(trim($_POST['yonetici_sifre'])));

            $dogrula=db::ornekAl()->adminGirisControl($yonetici_adi,$yonetici_sifre);
            
            if(isset($dogrula) && !empty($dogrula) && sizeof($dogrula)===1)
            {
                $_SESSION['yonetici_id']=$dogrula[0]['id'];
                $_SESSION['yonetici_ad']=$dogrula[0]['yoneticiAd'];
                    echo"
                        <div class=\"container text-center \">
                            <div class=\"row \">
                                <div class=\"col-md-3\"></div>
                                <div class=\"col-md-6  kiralaError\">
                                    <h3 class=\" text-success \">Giriş başarılı</h3>                             
                                <div>
                            </div>
                        </div>
                    ";
                header('Refresh:2; url=/admin');
            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\" text-danger \">Girdiğiniz bilgilere ait kullanıcı bulunamadı. Lütfen tekrar deneyiniz.</h3>   
                        <button class=\"btn btn-warning\" onClick=\"geri()\">Geri Dön</button>                           
                    <div>
                </div>
            </div>
        ";
            }
        }else{
            echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\" text-danger \">Eksik veya hatalı giriş.<br> Tekrar deneyiniz.</h3>   
                        <button class=\"btn btn-warning\" onClick=\"geri()\">Geri Dön</button>                           
                    <div>
                </div>
            </div>
        ";
        }
    }

}
?>