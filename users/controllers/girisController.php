<?php
namespace Controllers;
use Models\db;
use Controllers\baseController;

class girisController extends baseController{
    
    function __construct(){
        parent::__construct();
    }

    public function girisPage(){
        if(isset($_SESSION['id'])&& isset($_SESSION['ad']))
        {
            echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"bg-danger text-light \">Zaten giriş yaptınız. Bu sayfaya gidebilmek için çıkış yapmalısınız.</h3>                             
                    <div>
                </div>
            </div>
        ";
        header('location:/');
        }else{
            $this->view('giris');
        }
    }   

    public function girisControl(){
        if(isset($_POST['mail']) && !empty(htmlspecialchars(trim($_POST['mail']))) && strlen($_POST['mail'])>=16 && isset($_POST['sifre']) && !empty(htmlspecialchars(trim($_POST['sifre']))))
        {
            $mail=htmlspecialchars(stripslashes(trim($_POST['mail'])));
            $sifre=htmlspecialchars(stripslashes(trim($_POST['sifre'])));
            
            $data=db::ornekAl()->girisControl($mail,$sifre);
            if(isset($data) && !empty($data) && sizeof($data)===1)
            {
                $_SESSION['id']=$data[0]['id'];
                $_SESSION['ad']=$data[0]['ad'];
                $this->view('girisBasarili');

            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"bg-danger text-light \">Giriş hatalıdır. Lütfen bilgilerinizi doğru giriniz !</h3>                             
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/girisController/girisPage');
            }

        }else{
            echo 'Girdiğiniz bilgiler eksik veya yanlıştır.';
        }
    }


}



?>