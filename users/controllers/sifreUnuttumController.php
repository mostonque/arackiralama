<?php

namespace Controllers;
use Controllers\baseController;
use Models\db;

class sifreUnuttumController extends baseController{

    function __construct(){
        parent::__construct();
    }

    public function sifreUnuttumForm(){
        $this->view('sifreUnuttum');
    }

    public function sifreDegistir(){
        if(
            isset($_POST['tc']) && isset($_POST['mail']) &&isset($_POST['telefon']) &&isset($_POST['sifre'])&&
            !empty(trim($_POST['tc'])) && !empty(trim($_POST['mail'])) && !empty(trim($_POST['telefon'])) && !empty(trim($_POST['sifre'])) &&
            strlen($_POST['tc'])===11 && strlen($_POST['telefon'])===11 
          )
        {
            $tc=htmlspecialchars(stripslashes(trim($_POST['tc'])));
            $mail=htmlspecialchars(stripslashes(trim($_POST['mail'])));
            $telefon=htmlspecialchars(stripslashes(trim($_POST['telefon'])));
            $sifre=htmlspecialchars(stripslashes(trim($_POST['sifre'])));

            $ekle=db::ornekAl()->sifreUnuttumGuncelle($tc,$mail,$telefon,$sifre);
            if($ekle!==FALSE){
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"   text-success \">DEĞİŞİKLİĞİNİZ BAŞARIYLA KAYDEDİLDİ.</h3>
                        <br>
                        <h3 class=\"   text-info \">YENİ ŞİFRENİZİ KULLANARAK GİRİŞ YAPABİLİRSİNİZ.</h3>                        
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/girisController/girisPage');
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

}



?>