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
        $query=$this->baglanti->prepare("SELECT * FROM admins WHERE yoneticiAd=:yAdi AND sifre=:ySifre");
        $query->execute(['yAdi'=>$yonetici_adi,'ySifre'=>$yonetici_sifre]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        $yonetici=$data[0]['id'];
        if($yonetici){
            $query=$this->baglanti->prepare("UPDATE admins SET sonGirisTarihi=now(),sonGirisIpAdresi='$_SERVER[REMOTE_ADDR]' WHERE id=:idYonetici");
            $query->execute(['idYonetici'=>$yonetici]);
            return $data;
        }
        
        $this->baglanti=NULL;
    }

    public function adminAracEkle($marka,$seri,$model,$yil,$yakit,$vites,$km,$kasaTipi,$cekis,$motorGucu,$motorHacmi){

        $query=$this->baglanti->prepare("INSERT INTO araclar(marka, seri, model, yil, yakit, vites,km, kasaTipi, cekis, motorGucu, motorHacmi, durum)
                                        VALUES (:marka,:seri,:model,:yil,:yakit,:vites,:km,:kasaTipi,:cekis,:motorGucu,:motorHacmi,:durum)");
        
        $query->execute(['marka'=>$marka,'seri'=>$seri,'model'=>$model,'yil'=>$yil,'yakit'=>$yakit,'vites'=>$vites,'km'=>$km,
                         'kasaTipi'=>$kasaTipi,'cekis'=>$cekis,'motorGucu'=>$motorGucu,'motorHacmi'=>$motorHacmi,'durum'=>'0']);                  
        
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;

        $this->baglanti=NULL;
    }

    
    public function adminAracGuncelle($marka,$seri,$model,$yil,$yakit,$vites,$km,$kasaTipi,$cekis,$motorGucu,$motorHacmi,$durum,$aracId){
        $query=$this->baglanti->prepare("UPDATE araclar SET marka=:marka, seri=:seri, model=:model, yil=:yil, yakit=:yakit, vites=:vites,km=:km,
                                                kasaTipi=:kasaTipi, cekis=:cekis, motorGucu=:motorGucu, motorHacmi=:motorHacmi, durum=:durum WHERE id=:aracId");
        
        $query->execute(['marka'=>$marka,'seri'=>$seri,'model'=>$model,'yil'=>$yil,'yakit'=>$yakit,'vites'=>$vites,'km'=>$km,
                         'kasaTipi'=>$kasaTipi,'cekis'=>$cekis,'motorGucu'=>$motorGucu,'motorHacmi'=>$motorHacmi,'durum'=>$durum,'aracId'=>$aracId]);                  
        
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;

        $this->baglanti=NULL;
    }

    public function adminRezerveAracListele(){
      
        $query=$this->baglanti->prepare("SELECT * FROM rezervearac INNER JOIN araclar ON rezervearac.idArac = araclar.id INNER JOIN users ON rezervearac.idUser = users.id WHERE rezervearac.durum=1 ORDER BY araclar.marka ASC");
        $query->execute();
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;

        $this->baglanti=NULL;
    }


    public function kirala($idArac,$usrId,$rezerveGun){
       
        if(is_numeric($idArac))
        {
            $query=$this->baglanti->prepare("UPDATE araclar a, rezervearac r SET a.durum=:aDurum, r.durum =:rDurum WHERE a.id =:aracId AND r.idArac = :rezAracId");
            $query->execute(['aDurum'=>2,'rDurum'=>2,'aracId'=>$idArac,'rezAracId'=>$idArac]);
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);

            $query=$this->baglanti->prepare("INSERT INTO kiralanmisaraclar(idArac,idUser,kiraGun) VALUES(:idArac,:idUser,:kiraGun)");
            $query->execute(['idArac'=>$idArac,'idUser'=>$usrId,'kiraGun'=>$rezerveGun]);
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);

            $query=$this->baglanti->prepare("SELECT * FROM araclar INNER JOIN users WHERE araclar.id=:id AND users.id=:usrId");
            $query->execute(['id'=>$idArac,'usrId'=>$usrId]);
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);

            return $data;
            $this->baglanti=NULL;
        }

    }

    public function reddet($idArac){
       
        if(is_numeric($idArac))
        {
            $query=$this->baglanti->prepare("UPDATE araclar a, rezervearac r SET a.durum=:aDurum, r.durum =:rDurum WHERE a.id =:aracId AND r.idArac = :rezAracId");
            $query->execute(['aDurum'=>3,'rDurum'=>3,'aracId'=>$idArac,'rezAracId'=>$idArac]);
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);

            return $data;
            $this->baglanti=NULL;
        }

    }

    public function kiralanmisAraclar(){
        $query=$this->baglanti->prepare("SELECT * FROM araclar INNER JOIN kiralanmisaraclar INNER JOIN users WHERE araclar.durum=2 AND araclar.id = kiralanmisaraclar.idArac AND kiralanmisaraclar.idUser = users.id ORDER BY araclar.marka ASC");
        $query->execute();
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
        $this->baglanti=NULL;
    }

    public function kiralanabilirAraclar(){
        $query=$this->baglanti->prepare("SELECT * FROM araclar WHERE durum=0 ORDER BY marka ASC");
        $query->execute();
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
        $this->baglanti=NULL;
    }

    public function tumAraclarListele($idArac=NULL){

        if(!isset($idArac) && $idArac===NULL){

            $query=$this->baglanti->prepare("SELECT * FROM araclar ORDER BY marka ASC");
            $query->execute();
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $data;

        }else{

            $query=$this->baglanti->prepare("SELECT * FROM araclar WHERE id=:idArac ");
            $query->execute(['idArac'=>$idArac]);
            $data=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }

    }

    public function yorumlar(){
        $query=$this->baglanti->prepare("SELECT * FROM araclar INNER JOIN yorumlar WHERE yorumlar.idArac=araclar.id AND yorumlar.durum=:durum");
        $query->execute(['durum'=>'1']);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
    
    public function yorumOnayla($yorumid){
        $query=$this->baglanti->prepare("UPDATE `yorumlar` SET `durum`=:durum WHERE id=:id");
        $query->execute(['durum'=>'2','id'=>$yorumid]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function yorumsil($yorumid){
        $query=$this->baglanti->prepare("UPDATE `yorumlar` SET `durum`=:durum WHERE id=:id");
        $query->execute(['durum'=>'3','id'=>$yorumid]);
        $data=$query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }


}


?>