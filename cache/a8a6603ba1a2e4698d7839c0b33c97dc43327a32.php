
<div class="container ">
    <div class="row">
    
        <?php
            if(isset($araclar)&&!empty($araclar)){
            foreach($araclar as $arac){

                echo "<div class=\"col-md-3 mt-5\">
                <div class=\"card text-center\">
                    <div class=\"card-header\">
                    Kiralanan Araç  <br> <b class=\"text-primary\">$arac[marka] $arac[seri] $arac[model]</b>
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">KİRALANAN KİŞİ</h5>
                        <p class=\"card-text\"> <b class=\" text-info\">". ucwords(strtolower($arac['ad'])).' '. $arac['soyad']."</b></p>
                        <h5 class=\"card-title\">Telefon numarası</h5>
                        <p class=\"card-text\"><b class=\"text-info\">$arac[telefon]</b></p>
                        <h5 class=\"card-title\">Kira Gün Sayısı</h5>
                        <p class=\"card-text\"><b class=\"text-info\">$arac[kiraGun]</b></p>
                        
                    </div>
                    <div class=\"card-footer text-muted\">
                      Kiralandığı Gün ve Saat <br> <b class=\" text-primary\">  $arac[kiraTarih]</b>
                    </div>
                </div>
            </div>";
            }
        }else{
            echo"
            <div class=\"container text-center \">
                <div class=\"row \">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-6  kiralaError\">
                        <h3 class=\" bg-dark  text-warning \">ŞUANDA KİRALANMIŞ ARAÇ YOKTUR</h3>                           
                    <div>
                </div>
            </div>
        ";
        }
        ?>
    </div>
</div>