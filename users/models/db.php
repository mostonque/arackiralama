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
        $query=$this->baglanti->query("SELECT * FROM araclar WHERE durum=0",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        return $data;
        $this->baglanti=NULL;
    }

    public function aracDetayListele($id)
    {       
        $query=$this->baglanti->query("SELECT * FROM araclar WHERE id=$id",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        return $data;
        $this->baglanti=NULL;
    }
    public function aracYorumListele($idArac)
    {
        $query=$this->baglanti->query("SELECT * FROM yorumlar WHERE idArac=$idArac",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        return $data;
        $this->baglanti=NULL;
    }
    public function aracKirala($aracId,$ad,$soyad,$email,$tc,$telefon,$gun)
    {   
        $kullaniciId=$_SESSION['id'];
        $query=$this->baglanti->query("SELECT * FROM users WHERE id='$kullaniciId' AND ad='$ad' AND soyad='$soyad' AND mail='$email' AND tc='$tc' AND telefon='$telefon'",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        
        if(sizeof($data)==1)
        {
           $query=$this->baglanti->query("SELECT * FROM rezervearac WHERE idUser='$kullaniciId'");
           $data=$query->fetchAll();
            if($data)
            {
                return FALSE;
            }else{
            $this->baglanti->query("UPDATE araclar SET durum=1 WHERE id=$aracId",\PDO::FETCH_ASSOC);
            $this->baglanti->query("INSERT INTO rezervearac(idArac,idUser,rezerveGun) VALUES('$aracId','$kullaniciId','$gun')");
            return $this;
            }
        }else{
            return FALSE;
        }        
        $this->baglanti=NULL;
    }

    public function uyeKayit($ad,$soyad,$tc,$email,$sifre,$telefon)
    { 
        $query=$this->baglanti->exec("INSERT INTO users(ad,soyad,tc,mail,sifre,telefon) VALUES('$ad','$soyad','$tc','$email','$sifre','$telefon')");
        return $query;
        $this->baglanti=NULL;

    }

    public function girisControl($mail,$sifre ){
        $query=$this->baglanti->query("SELECT * FROM users WHERE mail='$mail' AND sifre='$sifre'",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        $usrId=$data[0]['id'];
        if($usrId){
            $query=$this->baglanti->exec("UPDATE users SET sonGirisTarih=now(),sonGirisIp='$_SERVER[REMOTE_ADDR]' WHERE id=$usrId");
            return $data;
        }
        
        $this->baglanti=NULL;
    }

    public function yorumEkle($idUser,$nameUser,$idArac,$yorum){
        $query=$this->baglanti->query("SELECT * FROM yorumlar WHERE idUser='$idUser' AND idArac='$idArac'",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        if(count($data)===1){
            return FALSE;
        }else{
        $add=$this->baglanti->exec("INSERT INTO yorumlar(idUser,nameUser,idArac,yorum,durum) VALUES('$idUser','$nameUser','$idArac','$yorum','1')");
        return $add;
        }
        $this->baglanti=NULL;
        
    }

    public function uyeBilgi(){
        $query=$this->baglanti->query("SELECT ad,soyad,tc,mail,telefon FROM users WHERE id=$_SESSION[id]",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        return $data;
        $this->baglanti=NULL;

    }
    
    public function uyeRezerveArac(){
        $query=$this->baglanti->query("SELECT * FROM rezervearac JOIN araclar ON rezervearac.idArac = araclar.id ORDER BY idUser=$_SESSION[id]",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        return $data;
        $this->baglanti=NULL;

    }

    public function isimGuncelle($tc,$yeniAd){
        $query=$this->baglanti->query("SELECT * FROM users WHERE id='$_SESSION[id]' AND tc='$tc'",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();

        if(count($data)===1)
        {
            $query=$this->baglanti->query("UPDATE users SET ad='$yeniAd' Where id='$_SESSION[id]'");
            $data=$query->fetchAll();
            return $data;
        }else{
            return FALSE;
        }
        $this->baglanti=NULL;
    }

    public function soyisimGuncelle($tc,$yeniSoyAd){
        $query=$this->baglanti->query("SELECT * FROM users WHERE id='$_SESSION[id]' AND tc='$tc'",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();

        if(count($data)===1)
        {
            $query=$this->baglanti->query("UPDATE users SET soyad='$yeniSoyAd' Where id='$_SESSION[id]'");
            $data=$query->fetchAll();
            return $data;
        }else{
            return FALSE;
        }
        $this->baglanti=NULL;
    }

    public function mailGuncelle($tc,$email){
        $query=$this->baglanti->query("SELECT * FROM users WHERE id='$_SESSION[id]' AND tc='$tc'",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();

        if(count($data)===1)
        {
            $query=$this->baglanti->query("UPDATE users SET mail='$email' Where id='$_SESSION[id]'");
            $data=$query->fetchAll();
            return $data;
        }else{
            return FALSE;
        }
        $this->baglanti=NULL;
    }



}


?>