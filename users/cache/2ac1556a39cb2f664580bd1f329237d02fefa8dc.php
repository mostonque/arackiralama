<div class="container text-center">
    <br>
    <h1>ARAC DETAY</h1>
    <br>
   
    <div class="row aracTabloDetay">
        <table class="table table-sm table-dark table-striped">
            <tbody>
            
            <?php  $detay2=$detay;
                    for($i=0;$i<=sizeof($detay[0]);$i++){
                        $detay=$detay[0][$i];
                        
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

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-2">
        
            <table class="table table-striped">
                <?php
               echo "<h3 class=\" mt-3 mb-4 text-light text-center bg-info \">ARAÇ YORUMLARI</h3>";
                if(sizeof($detay2[1])>0)
                {
                    for($i=0;$i<=sizeof($detay2[1])-1;$i++){
                        $detay2s=$detay2[1][$i];
                        echo "
                        <thead>
                            <tr>
                            <th class=\"text-success\" scope=\"col\">".strtoupper($detay2s[nameUser])."</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td class=\"text-primary\" scope=\"row\">$detay2s[yorum]</td>
                            </tr>
                        </tbody>

                        
                        ";
                    }
                }else{
                    echo '<p class=" text-danger border border-warning">ÜRÜNE AİT YORUM BULUNMAMAKTADIR<p>';
                }
                ?>
            </table>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <form method="POST" action="/yorumController/yorumGonder">
                <div class="form-group mt-5">
                    <textarea class="form-control" name="yorum" required id="exampleFormControlTextarea1" placeholder="Araç hakkındaki görüşlerinizi belirtebilirsiniz." rows="3"></textarea>
                    <input type="hidden" name="idArac" value="<?php print $_GET['id']; ?>">
                    <button class="btn btn-warning mt-1 mb-5 float-right" type="submit">Gönder</button>
                </div>
            </form>
        </div>
    </div>
</div>
