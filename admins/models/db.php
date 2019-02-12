<?php

namespace AdminModels;

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

    public function adminGirisControl($yonetici_adi,$yonetici_sifre){
        $query=$this->baglanti->query("SELECT * FROM admins WHERE yoneticiAd='$yonetici_adi' AND sifre='$yonetici_sifre'",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        $yonetici=$data[0]['id'];
        if($yonetici){
            $query=$this->baglanti->exec("UPDATE admins SET sonGirisTarihi=now(),sonGirisIpAdresi='$_SERVER[REMOTE_ADDR]' WHERE id=$yonetici");
            return $data;
        }
        
        $this->baglanti=NULL;
    }




}


?>