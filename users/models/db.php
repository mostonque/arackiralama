<?php

namespace Models;

class db{
  
    private static $ornek=NULL;
    private $baglanti;

    function __construct() {
        include_once($_SERVER['DOCUMENT_ROOT'].'/'.'config.php');

        try {
            $this->baglanti = new \PDO("mysql:host=$config[2];dbname=$config[3];charset=utf8", $config[0], $config[1]);
        } catch ( PDOException $e ){
            print $e->getMessage();
        }
        
    }

    public static function ornekAl(){
        if(!self::$ornek){
            self::$ornek=new db();
        }    
        return self::$ornek;
        
    }
    public function aracListele(){
        $query=$this->baglanti->query("SELECT * FROM araclar WHERE durumu=0",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        return $data;
    }

    public function aracListele2(){
        $query=$this->baglanti->query("SELECT marka FROM araclar",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        return $data;
    }
   




}


?>