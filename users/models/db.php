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
    }
    public function aracKirala($aracId,$ad,$soyad,$email,$tc,$telefon)
    {   
        $kullaniciId=$_SESSION['id'];
        $query=$this->baglanti->query("SELECT * FROM users WHERE id='$kullaniciId' AND ad='$ad' AND soyad='$soyad' AND mail='$email' AND tc='$tc' AND telefon='$telefon'",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        
        if(sizeof($data)==1)
        {
            $this->baglanti->query("UPDATE araclar SET durum=1 WHERE id=$aracId",\PDO::FETCH_ASSOC);
            return $this;
        }        
        $this->baglanti=NULL;
    }

    public function uyeKayit($ad,$soyad,$tc,$email,$sifre,$telefon)
    { 
        $query=$this->baglanti->exec("INSERT INTO users(ad,soyad,tc,mail,sifre,telefon) VALUES('$ad','$soyad','$tc','$email','$sifre','$telefon')");
        return $query;
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
        
    }

}


?>