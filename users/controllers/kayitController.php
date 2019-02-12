<?php
namespace Controllers;
use Models\db;
use Controllers\baseController;

class kayitController extends baseController{
    function __construct(){
        parent::__construct();
    }

    public function kayitOl(){

            $this->view('uyeOl');
    }
    public function kayitOlControl(){
        if(isset($_POST['kayitOl'])){
           
           echo "<br>";
           if(isset($_POST['ad']) && !empty($_POST['ad']) ){
                $ad=htmlspecialchars(stripslashes(trim($_POST['ad'])));
           }else{
               $hata="<b class=\"badge badge-danger\">Ad</b> alanında hata bulundu.";
           }
           if(isset($_POST['soyad']) && !empty($_POST['soyad']) ){
                $soyad=htmlspecialchars(stripslashes(trim($_POST['soyad'])));
           }else{
               $hata="<b class=\"badge badge-danger\">Soyad</b> alanında hata bulundu.";
           }
           if(isset($_POST['tc']) && !empty($_POST['tc']) && strlen($_POST['tc'])===11 ){
                $tc=htmlspecialchars(stripslashes(trim($_POST['tc'])));
           }else{
               $hata="<b class=\"badge badge-danger\">TC Kimlik </b> alanında hata bulundu.<hr>11 haneli TC kimlik numaranızı <hr> giridiğinizden emin olunuz.";
           }
           if(isset($_POST['email']) && !empty($_POST['email']) ){
                $email=htmlspecialchars(stripslashes(trim($_POST['email'])));
           }else{
               $hata="<b class=\"badge badge-danger\">Email</b> alanında hata bulundu.";
           }
           if(isset($_POST['sifre']) && !empty($_POST['sifre']) ){
                $sifre=htmlspecialchars(stripslashes(trim($_POST['sifre'])));
           }else{
               $hata="<b class=\"badge badge-danger\">Sifre</b> alanında hata bulundu.";
           }if(isset($_POST['telefon']) && !empty($_POST['telefon']) && strlen($_POST['telefon'])===11 ){
                $telefon=htmlspecialchars(stripslashes(trim($_POST['telefon'])));
           }else{
                $hata="<b class=\"badge badge-danger\">Telefon</b> alanında hata bulundu.";
           }

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
            $kayit=db::ornekAl()->uyeKayit($ad,$soyad,$tc,$email,$sifre,$telefon);
             
            if($kayit===1){
                $this->view('uyeOlBasarili');
            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <p class=\"  text-danger \">Kayıt işlemi başarısız. </p>   
                        <div class=\"col-md-12 \">
                            <p class=\"  text-info \">Girdiğiniz bilgilere ait bir kullanıcı zaten sistemde bulunmaktadır.<br><b class=\"border-bottom\"> Kayıt ol</b> sayfasına yönlendiriliyorsunuz.</p>                          
                        </div>
                    <div>
                </div>
            </div>
        ";
        header('Refresh:4; url=/kayitController/kayitOl'); 
            }
        }
    }

  



}


 
?>