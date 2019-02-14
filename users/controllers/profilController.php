<?php

namespace Controllers;
use Controllers\baseController;
use Models\db;


class profilController extends baseController{

    function __construct(){
        parent::__construct();
    }

    public function profilim(){
        $bilgi=db::ornekAl()->uyeBilgi();
        $this->view('profilim','bilgi',$bilgi);
    }
    
    public function rezervearaclarim(){
        $rezerveArac=db::ornekAl()->uyeRezerveArac();
        $this->view('rezerveAraclarim','rezerveArac',$rezerveArac);
    }

    public function uyelikBilgileriDegistir(){
        $this->view('uyelikBilgiDegistir');
    }

    public function isimDegistir(){
        if(isset($_POST['tc']) && strlen($_POST['tc'])===11  && isset($_POST['newName']) && !empty($_POST['tc']) && !empty($_POST['newName'])){
            $tc=htmlspecialchars(stripslashes(trim($_POST['tc'])));
            $yeniAd=htmlspecialchars(stripslashes(trim($_POST['newName'])));
            
            $isimGuncelle=db::ornekAl()->isimGuncelle($tc,$yeniAd);
            if($isimGuncelle!==FALSE){
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\" text-success \">DEĞİŞİKLİĞİNİZ BAŞARIYLA KAYDEDİLDİ.</h3>                          
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/cikisController');
            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"  text-danger \">GİRDİĞİNİZ BİLGİLERE AİT KULLANICI BULUNAMADI. LÜTFEN FORMU DİKKATLİ DOLDURUNUZ.</h3>   
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

    public function soyisimDegistir(){
        if(isset($_POST['tc']) && strlen($_POST['tc'])===11  && isset($_POST['newSurName']) && !empty($_POST['tc']) && !empty($_POST['newSurName'])){
            $tc=htmlspecialchars(stripslashes(trim($_POST['tc'])));
            $yeniSoyAd=htmlspecialchars(stripslashes(trim($_POST['newSurName'])));
            
            $soyadGuncelle=db::ornekAl()->soyisimGuncelle($tc,$yeniSoyAd);
            if($soyadGuncelle!==FALSE){
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"  text-success \">DEĞİŞİKLİĞİNİZ BAŞARIYLA KAYDEDİLDİ.</h3>                          
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/profilController/profilim');
            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"text-danger \">GİRDİĞİNİZ BİLGİLERE AİT KULLANICI BULUNAMADI. LÜTFEN FORMU DİKKATLİ DOLDURUNUZ.</h3>   
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
                        <h3 class=\"  text-danger \">Eksik veya hatalı giriş.<br> Tekrar deneyiniz.</h3>   
                        <button class=\"btn btn-warning\" onClick=\"geri()\">Geri Dön</button>                           
                    <div>
                </div>
            </div>
        ";
        }
    }

    public function emailDegistir(){
        if(isset($_POST['tc']) && strlen($_POST['tc'])===11  && isset($_POST['email']) && !empty($_POST['tc']) && !empty($_POST['email'])){
            $tc=htmlspecialchars(stripslashes(trim($_POST['tc'])));
            $email=htmlspecialchars(stripslashes(trim($_POST['email'])));
            
            $mailGuncelle=db::ornekAl()->mailGuncelle($tc,$email);
            if($mailGuncelle!==FALSE){
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"  text-success \">DEĞİŞİKLİĞİNİZ BAŞARIYLA KAYDEDİLDİ.</h3>                          
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/profilController/profilim');
            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"   text-danger \">GİRDİĞİNİZ BİLGİLERE AİT BİR KULLANICI MEVCUT. LÜTFEN FARKLI BİR E-MAİL DENEYİNİZ.</h3>   
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
                        <h3 class=\"  text-danger \">Eksik veya hatalı giriş.<br> Tekrar deneyiniz.</h3>   
                        <button class=\"btn btn-warning\" onClick=\"geri()\">Geri Dön</button>                           
                    <div>
                </div>
            </div>
        ";
        }
    }

    public function sifreDegistir(){
        if(isset($_POST['tc']) && strlen($_POST['tc'])===11   && !empty($_POST['tc']) && isset($_POST['sifre']) &&  !empty($_POST['sifre'])){
            $tc=htmlspecialchars(stripslashes(trim($_POST['tc'])));
            $sifre=htmlspecialchars(stripslashes(trim($_POST['sifre'])));
            
            $sifreGuncelle=db::ornekAl()->sifreGuncelle($tc,$sifre);
            if($sifreGuncelle!==FALSE){
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\" text-success \">DEĞİŞİKLİĞİNİZ BAŞARIYLA KAYDEDİLDİ.</h3>                          
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/cikisController');
            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\" text-danger \">GİRDİĞİNİZ BİLGİLERE AİT KULLANICI BULUNAMADI. LÜTFEN FORMU DİKKATLİ DOLDURUNUZ.</h3>   
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

    public function kiraladigimAraclar(){

        $data=db::ornekAl()->userKiralamisArac();
        $this->view('kiraladigimAraclar','araclar',$data);

    }
}


?>