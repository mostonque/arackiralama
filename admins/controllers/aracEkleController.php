<?php

namespace AdminControllers;

use AdminControllers\adminBaseController;
use AdminModels\db;

class aracEkleController extends adminBaseController{

    function __construct(){
        parent::__construct();
    }

    public function aracEkleForm(){
        if (isset($_SESSION['yonetici_id']) && !empty($_SESSION['yonetici_id']) )
            {
                $this->view('aracEkle');
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
            header('Refresh:2; url=/yonetim/login');
            }
    }

    public function aracEkle(){
        if (isset($_SESSION['yonetici_id']) && !empty($_SESSION['yonetici_id']) )
        {   $arac=htmlspecialchars(stripslashes(trim($_POST['arac'])));
            if(isset($arac) && !empty($arac) && $arac==='duzenle'){
                
                if(isset($_POST['marka']) && !empty($_POST['marka']) )
                {
                    $marka=htmlspecialchars(addslashes(trim($_POST['marka'])));
                }else{
                    $hata="Marka alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['seri']) && !empty($_POST['seri']) )
                {
                    $seri=htmlspecialchars(addslashes(trim($_POST['seri'])));
                }else{
                    $hata="Seri alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['model']) && !empty($_POST['model']) )
                {
                    $model=htmlspecialchars(addslashes(trim($_POST['model'])));
                }else{
                    $hata="Model alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['yil']) && !empty($_POST['yil']) && is_numeric($_POST['yil']) && strlen($_POST['yil'])===4 )
                {
                    $yil=htmlspecialchars(addslashes(trim($_POST['yil'])));
                }else{
                    $hata="Yıl alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['yakit']) && !empty($_POST['yakit']) )
                {
                    $yakit=htmlspecialchars(addslashes(trim($_POST['yakit'])));
                }else{
                    $hata="Yakıt alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['vites']) && !empty($_POST['vites']) )
                {
                    $vites=htmlspecialchars(addslashes(trim($_POST['vites'])));
                }else{
                    $hata="Vites alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['km']) && !empty($_POST['km']) && is_numeric($_POST['km']) && strlen($_POST['km'])<=6)
                {
                    $km=htmlspecialchars(addslashes(trim($_POST['km'])));
                }else{
                    $hata="Km alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['kasaTipi']) && !empty($_POST['kasaTipi']) )
                {
                    $kasaTipi=htmlspecialchars(addslashes(trim($_POST['kasaTipi'])));
                }else{
                    $hata="Kasa Tipi alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['cekis']) && !empty($_POST['cekis']) )
                {
                    $cekis=htmlspecialchars(addslashes(trim($_POST['cekis'])));
                }else{
                    $hata="Çekiş alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['motorGucu']) && !empty($_POST['motorGucu'])  && is_numeric($_POST['motorGucu'])&& strlen($_POST['motorGucu'])<=3)
                {
                    $motorGucu=htmlspecialchars(addslashes(trim($_POST['motorGucu'])));
                }else{
                    $hata="Motor Gücü alanı hatalı.Kontrol ediniz";
                }
                if(isset($_POST['motorHacmi']) && !empty($_POST['motorHacmi']) && is_numeric($_POST['motorHacmi']) && strlen($_POST['motorHacmi'])<=4)
                {
                    $motorHacmi=htmlspecialchars(addslashes(trim($_POST['motorHacmi'])));
                }else{
                    $hata="Motor Hacmi alanı hatalı.Kontrol ediniz";
                } if(isset($_POST['durum']) && is_numeric($_POST['durum']) && strlen($_POST['durum'])<=1)
                {
                    $durum=htmlspecialchars(addslashes(trim($_POST['durum'])));
                }else{
                    $hata="Motor Hacmi alanı hatalı.Kontrol ediniz";
                }
            
            if(isset($hata) && !empty($hata)){
                echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\"  bg-dark text-warning \">$hata</h3>   
                                <button class=\"btn btn-warning\" onClick=\"geri()\">Geri Dön</button>                           
                            <div>
                        </div>
                    </div>
                ";
            }else{
                $aracId=htmlspecialchars(stripslashes(trim($_POST['aracId'])));
                $aracEkle=db::ornekAl()->adminAracGuncelle($marka,$seri,$model,$yil,$yakit,$vites,$km,$kasaTipi,$cekis,$motorGucu,$motorHacmi,$durum,$aracId);
                
                if($aracEkle!==FALSE){
                    echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\"   text-success \">ARAÇ DÜZENLEME BAŞARILI.</h3>
                                <br>
                                <h3 class=\"   text-info \">BÜTÜN ARAÇLAR SAYFASINA YÖNLENDİRİLİYORSUNUZ.</h3>                        
                            <div>
                        </div>
                    </div>
                ";
                header('Refresh:2; url=/admin/butun-araclar');
                }else{
                    echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\"  bg-dark text-warning \">Ekleme başarısız oldu.Lütfen tekrar deneyiniz.</h3>                              
                            <div>
                        </div>
                    </div>
                ";
                }
    
    
            }
    
            }else{
                
            if(isset($_POST['marka']) && !empty($_POST['marka']) )
            {
                $marka=htmlspecialchars(addslashes(trim($_POST['marka'])));
            }else{
                $hata="Marka alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['seri']) && !empty($_POST['seri']) )
            {
                $seri=htmlspecialchars(addslashes(trim($_POST['seri'])));
            }else{
                $hata="Seri alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['model']) && !empty($_POST['model']) )
            {
                $model=htmlspecialchars(addslashes(trim($_POST['model'])));
            }else{
                $hata="Model alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['yil']) && !empty($_POST['yil']) && is_numeric($_POST['yil']) && strlen($_POST['yil'])===4 )
            {
                $yil=htmlspecialchars(addslashes(trim($_POST['yil'])));
            }else{
                $hata="Yıl alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['yakit']) && !empty($_POST['yakit']) )
            {
                $yakit=htmlspecialchars(addslashes(trim($_POST['yakit'])));
            }else{
                $hata="Yakıt alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['vites']) && !empty($_POST['vites']) )
            {
                $vites=htmlspecialchars(addslashes(trim($_POST['vites'])));
            }else{
                $hata="Vites alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['km']) && !empty($_POST['km']) && is_numeric($_POST['km']) && strlen($_POST['km'])<=6)
            {
                $km=htmlspecialchars(addslashes(trim($_POST['km'])));
            }else{
                $hata="Km alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['kasaTipi']) && !empty($_POST['kasaTipi']) )
            {
                $kasaTipi=htmlspecialchars(addslashes(trim($_POST['kasaTipi'])));
            }else{
                $hata="Kasa Tipi alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['cekis']) && !empty($_POST['cekis']) )
            {
                $cekis=htmlspecialchars(addslashes(trim($_POST['cekis'])));
            }else{
                $hata="Çekiş alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['motorGucu']) && !empty($_POST['motorGucu'])  && is_numeric($_POST['motorGucu'])&& strlen($_POST['motorGucu'])<=3)
            {
                $motorGucu=htmlspecialchars(addslashes(trim($_POST['motorGucu'])));
            }else{
                $hata="Motor Gücü alanı hatalı.Kontrol ediniz";
            }
            if(isset($_POST['motorHacmi']) && !empty($_POST['motorHacmi']) && is_numeric($_POST['motorHacmi']) && strlen($_POST['motorHacmi'])<=4)
            {
                $motorHacmi=htmlspecialchars(addslashes(trim($_POST['motorHacmi'])));
            }else{
                $hata="Motor Hacmi alanı hatalı.Kontrol ediniz";
            }
            
            if(isset($hata) && !empty($hata)){
                echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\"  bg-dark text-warning \">$hata</h3>   
                                <button class=\"btn btn-warning\" onClick=\"geri()\">Geri Dön</button>                           
                            <div>
                        </div>
                    </div>
                ";
            }else{
    
                $aracEkle=db::ornekAl()->adminAracEkle($marka,$seri,$model,$yil,$yakit,$vites,$km,$kasaTipi,$cekis,$motorGucu,$motorHacmi);
    
                if($aracEkle!==FALSE){
                    echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\"   text-success \">ARAÇ BAŞARIYLA KAYDEDİLDİ.</h3>
                                <br>
                                <h3 class=\"   text-info \">ARAÇ EKLE SAYFASINA YÖNLENDİRİLİYORSUNUZ.</h3>                        
                            <div>
                        </div>
                    </div>
                ";
                header('Refresh:2; url=/admin/arac-ekle-form');
                }else{
                    echo"
                    <div class=\"container text-center \">
                        <div class=\"row \">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-6  kiralaError\">
                                <h3 class=\"  bg-dark text-warning \">Ekleme başarısız oldu.Lütfen tekrar deneyiniz.</h3>                              
                            <div>
                        </div>
                    </div>
                ";
                }
    
    
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
        header('Refresh:2; url=/yonetim/login');
        }

        
    }
    


}




?>