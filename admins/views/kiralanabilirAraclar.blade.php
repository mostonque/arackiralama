
<div class="container ">
    <div class="row mt-5 mb-3">
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
                </div>
                ";
                    
            }
            
                        
        ?>   
    </div>
</div>
