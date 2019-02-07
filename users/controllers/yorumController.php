<?php

namespace Controllers;
use Models\db;
use Controllers\baseController;

class yorumController extends baseController{

    function __construct(){
        parent::__construct();
    }

    public function yorumGonder(){
        if(isset($_SESSION['id']))
        {
            if(isset($_POST['idArac']) && trim($_POST['idArac']) &&!empty($_POST['idArac'])){
                $idArac=htmlspecialchars(stripslashes(trim($_POST{'idArac'})));
            }else{
                echo "Aracınız anlaşılamadı.Lütfen sayfayı yenileyip tekrar deneyiniz.";
            }
            
            if(isset($_POST['yorum']) && trim($_POST['yorum']) &&!empty($_POST['yorum']) && strlen($_POST['yorum'])>=5 ){
                $yorum=htmlspecialchars(stripslashes(trim($_POST{'yorum'})));
            }else{
                echo "Yorumunuz gönderilemedi.Yorumunuzun en az 5 karakter olduğundan emin olunuz.";
            }
            
            $yorumGonder=db::ornekAl()->yorumEkle($_SESSION['id'],$_SESSION['ad'],$idArac,$yorum);
            if($yorumGonder)
            {echo"
                <div class=\"container text-center \">
                    <div class=\"row \">
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-6  kiralaError\">
                            <h3 class=\"bg-success text-light \">Yorumunuz Gönderildi incelendikten sonra eklenecektir.</h3>                             
                        <div>
                    </div>
                </div>
            ";
            header('Refresh:2; url=/');
            }else{
                echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"bg-danger text-light \">Yorumunuz gönderilemedi. Bu araca zaten 1 yorum yapmışsınız</h3>                             
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/indexController/DetayListele?id='.$idArac);
            }

        }else{
            echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\"bg-danger text-light \">Önce giriş yapmalısınız.</h3>                             
                    <div>
                </div>
            </div>
        ";
        header('Refresh:2; url=/girisController/girisPage');
        }

    }


}


?>