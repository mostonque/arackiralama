
<div class="container ">
    <div class="row mt-5 mb-5 ">
        <?php  
            foreach($araclar as $arac){
                echo " 
                <div class=\"col-md-3 p-4 border border-danger  d-inline-block mt-4\">
                <table class=\"table  table-sm  table-striped\">
                <tbody>
                <tr>
                <th scope=\"row\">Marka</th>
                <td>$arac[marka]</td>
                </tr><tr>
                <th scope=\"row\">Seri</th>
                <td>$arac[seri]</td>
                </tr><tr>
                <th scope=\"row\">Model</th>
                <td>$arac[model]</td>
                </tr><tr>
                <th scope=\"row\">Yıl</th>
                <td>$arac[yil]</td>
                </tr><tr>
                <th scope=\"row\">Yakıt</th>
                <td>$arac[yakit]</td>
                </tr><tr>
                <th scope=\"row\">Vites</th>
                <td>$arac[vites]</td>
                </tr><tr>
                <th scope=\"row\">Km</th>
                <td>".number_format($arac['km'])."</td>
                </tr><tr>
                <th scope=\"row\">Kasa Tipi</th>
                <td>$arac[kasaTipi]</td>
                </tr><tr>
                <th scope=\"row\">Çekiş</th>
                <td>$arac[cekis]</td>
                </tr><tr>
                <th scope=\"row \">Motor Gücü</th>
                <td>".number_format($arac['motorGucu'])." <b>hp</b></td>
                </tr><tr>
                <th scope=\"row\">Motor Hacmi</th>
                <td>$arac[motorHacmi] <b>cc</b></td>                       
                </tr>
                </tbody>
                </table>
                <form class=\"d-inline-block\" action=\"/admin/rezerve-araclar/duzenle\" method=\"GET\">                                        
                    <input type=\"hidden\" name=\"idArac\" value=\"$arac[id]\">
                    <button type=\"submit\" name=\"arac\" value=\"duzenle\" class=\"btn ml-2 btn-outline-success\">Düzenle</button>
                </form>
                <form class=\"d-inline-block \" action=\"/admin/rezerve-araclar/sil\" method=\"GET\">                                        
                    <input type=\"hidden\" name=\"idArac\" value=\"$arac[id]\">
                     <button type=\"submit\" name=\"arac\" value=\"sil\" class=\"btn ml-5 btn-outline-danger\">Aracı Sil</button>
                </form>
                  
                </div>
                ";
                    
            }
            
                        
        ?>   
    </div>
</div>
