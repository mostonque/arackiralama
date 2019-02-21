<div class="container-fluid mt-4">
    <div class="row ">
        <div class="col-2 ml-4 mr-5">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item "  href="/profil/uyelik-bilgilerim" role="tab" aria-controls="home">Üyelik Bilgilerim</a>
            <a class="list-group-item "  href="/profil/kiraladigim-araclar" role="tab" aria-controls="profile">Kiraladığım Araçlar</a>
            <a class="list-group-item "  href="/profil/rezerve-araclarim" role="tab" aria-controls="messages">Rezerve Ettiğim Araçlar</a>
            <a class="list-group-item "  href="/profil/uyelik-bilgileri-degistir" role="tab" aria-controls="messages">Üyelik Bilgilerimi Değiştir</a>                
            </div>
        </div>
        <div class="col-7 ml-1 text-center ">
        <div class="container ">
    <div class="row mt-5 mb-3">
        <?php  
        if(isset($araclar) && !empty($araclar))
        {
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
        }else{
            echo '<div class="col-md-3"></div><h3 class="text-success ">KİRALIK ARACINIZ BULUNMAMAKTADIR.</h3>';
        }
                        
        ?>   
    </div>
</div>


                
            
            </div>       
        </div>
    </div>
</div>