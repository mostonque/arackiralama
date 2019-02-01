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

    public static function ornekAl(){
        if(!self::$ornek){
            self::$ornek=new db();
        }    
        return self::$ornek;
        
    }
    public function aracListele(){
        $query=$this->baglanti->query("SELECT * FROM araclar WHERE durum=0",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        return $data;
    }

    public function aracDetayListele($id){
        $query=$this->baglanti->query("SELECT * FROM araclar Where id=$id",\PDO::FETCH_ASSOC);
        $data=$query->fetchAll();
        return $data;
    }
   




}


?>