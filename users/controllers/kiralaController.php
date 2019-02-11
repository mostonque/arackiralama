<?php

namespace Controllers;
use Models\db;
use Controllers\baseController;

class kiralaController extends baseController{
    
    function __construct(){
        parent::__construct();
    }
    public function kiralaForm(){
       
        if(isset($_SESSION['ad']) && !empty($_SESSION['ad']))
        {
            
            $detayListele=db::ornekAl()->aracDetayListele(htmlspecialchars($_GET['id']));
            $this->view('aracKiralaForm','aracDetay',$detayListele);
        }else{
            echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\" bg-danger text-warning \">Önce Giriş yapmalısınız.</h3>
                        <h3 class=\" text-primary\">Sizi Giriş sayfasına yönlendiriyoruz.</h3>                            
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2;url=/girisController/girisPage');
        exit;
        }
    }
    

    public function kirala(){
        if(isset($_SESSION['ad']) && !empty($_SESSION['ad']))
        {
            if(isset($_POST['id']) && !empty($_POST['id'])){

                if(isset($_POST['ad']) && !empty($_POST['ad'])){
                    $ad=htmlspecialchars(trim($_POST['ad']));
                }else{
                    $hata='<b class="border border border-warning badge badge-danger">Ad</b> alanı boş veya hatalı !';
                }if(isset($_POST['soyad'])  && !empty($_POST['soyad'])){
                    $soyad=htmlspecialchars(trim($_POST['soyad']));
                }else{
                    $hata='<b class="border border border-warning badge badge-danger">Soyad</b> alanı boş veya hatalı !';
                }if(isset($_POST['email'])  && !empty($_POST['email'])){
                    $email=htmlspecialchars(trim($_POST['email']));
                }else{
                    $hata='<b class="border border border-warning badge badge-danger">Email</b> alanı boş veya hatalı !';
                }if(isset($_POST['tc'])  && !empty($_POST['tc']) && strlen($_POST['tc'])=="11"){
                    $tc=htmlspecialchars(trim($_POST['tc']));
                }else{
                    $hata='<b class="border border border-warning badge badge-danger ">Tc</b> alanı boş veya hatalı !';
                }if(isset($_POST['telefon']) && !empty($_POST['telefon']) && strlen($_POST['telefon'])=="11"){
                    $telefon=htmlspecialchars(trim($_POST['telefon']));
                }else{
                    $hata='<b class="border border border-warning badge badge-danger font-weight-bold">Telefon</b> alanı boş veya hatalı !';
                }if(isset($_POST['gun']) && !empty($_POST['gun']) ){
                    $gun=htmlspecialchars(trim($_POST['gun']));
                }else{
                    $hata='<b class="border border border-warning badge badge-danger font-weight-bold">Gün</b> alanı boş veya hatalı !';
                }
                if(isset($hata) && !empty($hata)){
                    echo"
                        <div class=\"container text-center \">
                            <div class=\"row \">
                                <div class=\"col-md-3\"></div>
                                <div class=\"col-md-6  kiralaError\">
                                    <h3 class=\" badge badge-dark text-warning \">$hata</h3>   
                                    <button class=\"btn btn-warning\" onClick=\"geri()\">Geri Dön</button>                           
                                <div>
                            </div>
                        </div>
                    ";
                    
                }else{
                    $arac=db::ornekAl()->aracKirala(htmlspecialchars(trim($_POST['id'])),$ad,$soyad,$email,$tc,$telefon,$gun);
                    
                    if($arac)
                    {
                        $this->view('kiralaBasarili');
                    }else{
                        echo"
                            <div class=\"container text-center \">
                                <div class=\"row \">
                                    <div class=\"col-md-3\"></div>
                                    <div class=\"col-md-6  kiralaError\">
                                        <h3 class=\" bg-danger text-warning \">Girdiğiniz bilgiler sistemde ki Bilgilerinizle eşleşemiyor yada Rezerve ettiğiniz arac var</h3>
                                        <h3 class=\"bg-dark text-warning\">Sizi anasayfaya yönlendiriyoruz.</h3>                            
                                    <div>
                                </div>
                            </div>
                        ";
                        header('Refresh:2;url=/');
                    }
                    
                }
            }
        }else{
            echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\" bg-danger text-warning \">Önce Giriş yapmalısınız.</h3>
                        <h3 class=\"bg-dark text-warning\">Sizi Giriş sayfasına yönlendiriyoruz.</h3>                            
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2;url=/girisController/girisPage');
        }
        
    }
}





?>