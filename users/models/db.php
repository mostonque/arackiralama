<?php

namespace Models;

class db{
  
    private static $ornek=NULL;
    private $baglanti;

    function __construct() {
        include_once($_SERVER['DOCUMENT_ROOT'].'/'.'config.php');

        try {
            $this->baglanti = new \PDO("mysql:host=$config[0];dbname=$config[1];charset=utf8", $config[2], $config[3]);
           
        } catch ( PDOException $e ){
            print $e->getMessage();
        }
        
    }

    public static function ornekAl()
    {
        if(!self::$ornek){
            self::$ornek=new db();
        }    
        return self::$ornek;
        
    }
    public function aracListele()
    {
        $query=$this->baglanti->prepare("SELECT * FROM araclar WHERE durum=0 ORDER BY marka ASC");
        $query->execute();
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
        $this->baglanti=NULL;
    }

    public function aracDetayListele($id)
    {       
        $query=$this->baglanti->prepare("SELECT * FROM araclar WHERE id=:id");
        $query->execute(['id'=>$id]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
        $this->baglanti=NULL;
    }
    public function aracYorumListele($idArac)
    {

        $query = $this->baglanti->prepare("SELECT * FROM yorumlar WHERE idArac=:id AND durum=:durum");
        $query->execute(['id' => $idArac,'durum'=>'2']); 
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
        $this->baglanti=NULL;

    }
    public function aracKirala($aracId,$ad,$soyad,$email,$tc,$telefon,$gun)
    {   
        $kullaniciId=$_SESSION['id'];
        $query=$this->baglanti->prepare("SELECT * FROM users WHERE id=:idKullanici AND ad=:ad AND soyad=:soyad AND mail=:email AND tc=:tc AND telefon=:telefon");
        $query->execute(['idKullanici'=>$kullaniciId,'ad'=>$ad,'soyad'=>$soyad,'email'=>$email,'tc'=>$tc,'telefon'=>$telefon]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        
        if(sizeof($data)==1)
        {
           $query=$this->baglanti->prepare("SELECT * FROM rezervearac WHERE idUser=:idKullanici");
           $query->execute(['idKullanici'=>$kullaniciId]);
           $data=$query->fetchAll(\PDO::FETCH_ASSOC);
            if($data)
            {
                return FALSE;
            }else{
            $guncelle=$this->baglanti->prepare("UPDATE araclar SET durum=1 WHERE id=:idArac");
            $guncelle->execute(['idArac'=>$aracId]);
            $guncelle->fetchAll(\PDO::FETCH_ASSOC);

            $ekle=$this->baglanti->prepare("INSERT INTO rezervearac(idArac,idUser,rezerveGun,durum) VALUES(:idArac,:idUser,:rezerveGun,:durum)");
            $ekle->execute(['idArac'=>$aracId,'idUser'=>$kullaniciId,'rezerveGun'=>$gun,'durum'=>'1']);
            $data=$ekle->fetchAll(\PDO::FETCH_ASSOC);
            
            return $ekle;
            }
        }else{
            return FALSE;
        }        
        $this->baglanti=NULL;
    }
    
    public function uyeKayit($ad,$soyad,$tc,$email,$sifre,$telefon)
    { 
        $query=$this->baglanti->prepare("INSERT INTO users(ad,soyad,tc,mail,sifre,telefon) VALUES(:ad,:soyad,:tc,:mail,:sifre,:telefon)");
        $query->execute(['ad'=>$ad,'soyad'=>$soyad,'tc'=>$tc,'mail'=>$email,'sifre'=>$sifre,'telefon'=>$telefon]);
        $query->fetchAll(\PDO::FETCH_ASSOC);
        return $query;
        $this->baglanti=NULL;

    }

    public function girisControl($mail,$sifre ){
        $query=$this->baglanti->prepare("SELECT * FROM users WHERE mail=:mail AND sifre=:sifre");
        $query->execute(['mail'=>$mail,'sifre'=>$sifre]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        $usrId=$data[0]['id'];
        
        if($usrId){
            $query=$this->baglanti->prepare("UPDATE users SET sonGirisTarih=now(),sonGirisIp='$_SERVER[REMOTE_ADDR]' WHERE id=:usrId");
            $query->execute(['usrId'=>$usrId]);
            $query->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }
        
        $this->baglanti=NULL;
    }

    public function yorumEkle($idUser,$nameUser,$idArac,$yorum){
        $query=$this->baglanti->prepare("SELECT * FROM yorumlar WHERE idUser=:idUser AND idArac=:idArac");
        $query->execute(['idUser'=>$idUser,'idArac'=>$idArac]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        if(count($data)===1){
            return FALSE;
        }else{
        $add=$this->baglanti->prepare("INSERT INTO yorumlar(idUser,nameUser,idArac,yorum,durum) VALUES(:idUser,:nameUser,:idArac,:yorum,:durum)");
        $add->execute(['idUser'=>$idUser,'nameUser'=>$nameUser,'idArac'=>$idArac,'yorum'=>$yorum,'durum'=>'1']);
        $add->fetchAll(\PDO::FETCH_ASSOC);
        return $add;
        }
        $this->baglanti=NULL;
        
    }

    public function uyeBilgi(){
        $query=$this->baglanti->prepare("SELECT ad,soyad,tc,mail,telefon FROM users WHERE id=:sesId");
        $query->execute(['sesId'=>$_SESSION['id']]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
        $this->baglanti=NULL;

    }
    
    public function uyeRezerveArac(){   
        $query=$this->baglanti->prepare("SELECT * FROM rezervearac INNER JOIN araclar WHERE rezervearac.idArac = araclar.id AND rezervearac.idUser=:sesId AND rezervearac.durum=:durum ");
        $query->execute(['sesId'=>$_SESSION['id'],'durum'=>'1']);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
        $this->baglanti=NULL;

    }

    public function isimGuncelle($tc,$yeniAd){
        $query=$this->baglanti->prepare("SELECT * FROM users WHERE id=:sesId AND tc=:tc");
        $query->execute(['sesId'=>$_SESSION['id'],'tc'=>$tc]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);

        if(count($data)===1)
        {
            $query=$this->baglanti->prepare("UPDATE users SET ad=:yeniAd Where id=:sesId");
            $query->execute(['yeniAd'=>$yeniAd,'sesId'=>$_SESSION['id']]);
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }else{
            return FALSE;
        }
        $this->baglanti=NULL;
    }

    public function soyisimGuncelle($tc,$yeniSoyAd){
        $query=$this->baglanti->prepare("SELECT * FROM users WHERE id=:sesId AND tc=:tc");
        $query->execute(['sesId'=>$_SESSION['id'],'tc'=>$tc]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);

        if(count($data)===1)
        {
            $query=$this->baglanti->prepare("UPDATE users SET soyad=:yeniSoyad Where id=:sesId");
            $query->execute(['yeniSoyad'=>$yeniSoyAd,'sesId'=>$_SESSION['id']]);
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }else{
            return FALSE;
        }
        $this->baglanti=NULL;
    }

    public function mailGuncelle($tc,$email){
        $query=$this->baglanti->prepare("SELECT * FROM users WHERE id=:sesId AND tc=:tc");
        $query->execute(['sesId'=>$_SESSION['id'],'tc'=>$tc]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        if(count($data)===1 && $data[0]['mail']!==$email)
        {
            $mailControl=$this->baglanti->prepare("SELECT `mail` FROM `users` WHERE mail=:mail");
            $mailControl->execute(['mail'=>$email]);
            $data=$mailControl->fetchAll(\PDO::FETCH_ASSOC);
            if(isset($data) && !empty($data)){
                return FALSE;
            }else{
                $query=$this->baglanti->prepare("UPDATE users SET mail=:mail Where id=:sesId");
                $query->execute(['mail'=>$email,'sesId'=>$_SESSION['id']]);
                $data=$query->fetchAll(\PDO::FETCH_ASSOC);
                return $data;
            }
            
        }else{
            return FALSE;
        }
        $this->baglanti=NULL;
    }

    public function sifreGuncelle($tc,$sifre){
        $query=$this->baglanti->prepare("SELECT * FROM users WHERE id=:sesId AND tc=:tc");
        $query->execute(['sesId'=>$_SESSION['id'],'tc'=>$tc]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);

        if(count($data)===1)
        {
            $query=$this->baglanti->prepare("UPDATE users SET sifre=:sifre Where id=:sesId");
            $query->execute(['sifre'=>$sifre,'sesId'=>$_SESSION['id']]);
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }else{
            return FALSE;
        }
        $this->baglanti=NULL;
    }
       
    public function sifreUnuttumGuncelle($tc,$mail,$telefon,$sifre){
        $query=$this->baglanti->prepare("SELECT * FROM users WHERE  tc=:tc AND mail=:mail AND telefon=:telefon");
        $query->execute(['tc'=>$tc,'mail'=>$mail,'telefon'=>$telefon]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        $usrID=$data[0]['id'];
        if(count($data)===1)
        {
            $query=$this->baglanti->prepare("UPDATE users SET sifre=:sifre Where id=:usrId");
            $query->execute(['sifre'=>$sifre,'usrId'=>$usrID]);
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }else{
            return FALSE;
        }
        $this->baglanti=NULL;
    }

    public function userKiralamisArac(){
        
        $query=$this->baglanti->prepare("SELECT * FROM kiralanmisaraclar INNER JOIN araclar WHERE kiralanmisaraclar.idUser=:sesId AND kiralanmisaraclar.idArac=araclar.id ");
        $query->execute(['sesId'=>$_SESSION['id']]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
        $this->baglanti=NULL;

    }

}


?>