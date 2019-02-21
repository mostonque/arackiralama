
<div class="container ">
    <div class="row">
    
        <?php
            if(isset($araclar)&&!empty($araclar)){
            foreach($araclar as $arac){
                echo "<div class=\"col-md-3 mt-5\">
                <div class=\"card text-center\">
                    <div class=\"card-header\">
                    Rezerve Ettiği Araç  <br> <b class=\"text-primary\">$arac[marka] $arac[seri] $arac[model]</b>
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">REZERVE EDEN</h5>
                        <p class=\"card-text\"> <b class=\" text-info\">". ucwords(strtolower($arac['ad'])).' '. $arac['soyad']."</b></p>
                        <h5 class=\"card-title\">Telefon numarası</h5>
                        <p class=\"card-text\"><b class=\"text-info\">$arac[telefon]</b></p>
                        <h5 class=\"card-title\">Kaç Gün</h5>
                        <p class=\"card-text\"><b class=\"text-info\">$arac[rezerveGun]</b></p>
                               
                        <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModal\">
                            Kirala
                            </button>

                            <!-- Modal -->
                            <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                            <div class=\"modal-dialog\" role=\"document\">
                                <div class=\"modal-content\">
                                <div class=\"modal-header\">
                                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Car Rental</h5>
                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                </div>
                                <div class=\"modal-body\">
                               <b class=\"text-primary\"> $arac[marka] $arac[seri] $arac[model] </b>
                                   Aracını <br>
                                   <b class=\"text-primary\">". ucwords(strtolower($arac['ad'])).' '. $arac['soyad']."</b>
                                   
                                  Kişisine <br> Kiralamak istediğinize emin misiniz?
                                </div>
                                <div class=\"modal-footer\">
                                    <form action=\"/admin/rezerve-araclar/kirala\" method=\"GET\">                                 
                                        <input type=\"hidden\" name=\"idArac\" value=\"$arac[idArac]\">
                                        <input type=\"hidden\" name=\"usrId\" value=\"$arac[idUser]\">
                                        <input type=\"hidden\" name=\"rezerveGun\" value=\"$arac[rezerveGun]\">
                                        <button type=\"submit\" name=\"kirala\" value=\"kirala\" class=\"btn btn-primary\">Kirala</button>
                                    </form>
                                    
                                </div>
                                </div>
                            </div>


                            </div><button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#exampleModal2\">
                            Reddet
                            </button>

                            <!-- Modal -->
                            <div class=\"modal fade\" id=\"exampleModal2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                            <div class=\"modal-dialog\" role=\"document\">
                                <div class=\"modal-content\">
                                <div class=\"modal-header\">
                                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Car Rental</h5>
                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                </div>
                                <div class=\"modal-body\">
                               <b class=\"text-primary\"> $arac[marka] $arac[seri] $arac[model] </b>
                                   Aracını <br>
                                   Rezerve eden <b class=\"text-primary\">". ucwords(strtolower($arac['ad'])).' '. $arac['soyad']."</b>
                                   
                                  Kişisinin <br> Rezervasyonunu İptal Etmek istediğinize emin misiniz?
                                </div>
                                <div class=\"modal-footer\">
                                <form action=\"/admin/rezerve-araclar/reddet\" method=\"GET\">                                        
                                    <input type=\"hidden\" name=\"idArac\" value=\"$arac[idArac]\">
                                    <button type=\"submit\" name=\"reddet\" value=\"reddet\" class=\"btn btn-danger\">Reddet</button>
                                </form>
                                    
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class=\"card-footer text-muted\">
                      Rezervasyon Günü ve Saati <br> <b class=\" text-primary\">  $arac[rezTarihi]</b>
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
                        <h3 class=\" bg-dark  text-warning \">ŞUANDA REZERVE EDİLMİŞ ARAÇ YOKTUR</h3>                           
                    <div>
                </div>
            </div>
        ";
        }
        ?>
    </div>
</div>