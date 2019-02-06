<div class="container text-center">
    <br>
    <h1>ARAC DETAY</h1>
    <br>
   
    <div class="row aracTabloDetay">
        <table class="table table-sm table-dark table-striped">
            <tbody>
            
            <?php  
                    $detaySize=count($detay);
                    for($i=0;$i<=$detaySize-1;$i++){
                        $detay=$detay[$i];
                                
                        echo " <tr>
                        <th scope=\"row\">Marka</th>
                        <td>$detay[marka]</td>
                        </tr><tr>
                        <th scope=\"row\">Seri</th>
                        <td>$detay[seri]</td>
                        </tr><tr>
                        <th scope=\"row\">Model</th>
                        <td>$detay[model]</td>
                        </tr><tr>
                        <th scope=\"row\">Yıl</th>
                        <td>$detay[yil]</td>
                        </tr><tr>
                        <th scope=\"row\">Yakıt</th>
                        <td>$detay[yakit]</td>
                        </tr><tr>
                        <th scope=\"row\">Vites</th>
                        <td>$detay[vites]</td>
                        </tr><tr>
                        <th scope=\"row\">Km</th>
                        <td>".number_format($detay['km'])."</td>
                        </tr><tr>
                        <th scope=\"row\">Kasa Tipi</th>
                        <td>$detay[kasaTipi]</td>
                        </tr><tr>
                        <th scope=\"row\">Çekiş</th>
                        <td>$detay[cekis]</td>
                        </tr><tr>
                        <th scope=\"row\">Motor Gücü</th>
                        <td>".number_format($detay['motorGucu'])." <b>hp</b></td>
                        </tr><tr>
                        <th scope=\"row\">Motor Hacmi</th>
                        <td>$detay[motorHacmi] <b>cc</b></td>                       
                        </tr>";
                              
                    }
                        
                    ?>   
                
            </tbody>
        </table> 
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6"></a><button class="btn btn-warning" onClick="geri()">Geri Dön</button></div>
        <div class="col-md-6"><form action="/kiralaController/kiralaForm" method="GET">
                    <input type="hidden" name="id" value="<?php print $detay['id'];?>">
                    <button type="submit" class="btn btn-primary" >&emsp;Rezerve Et&emsp;</button>
                </form></div>
    </div>
   
</div> 