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
                
                <?php
                    if(isset($rezerveArac) && !empty($rezerveArac))
                    {
                        echo "<table class=\"table\">
                        <thead class=\"thead-dark\">
                            <tr>
                            <th scope=\"col\">Araç İD</th>
                            <th scope=\"col\">Kaç Gün</th>
                            <th scope=\"col\">MARKA</th>
                            <th scope=\"col\">SERİ</th>
                            <th scope=\"col\">MODEL</th>
                            <th scope=\"col\">YIL</th>
                            <th scope=\"col\">YAKIT</th>
                            <th scope=\"col\">VİTES</th>
                            <th scope=\"col\">KM</th>
                            <th scope=\"col\">KASA TİPİ</th>
                            <th scope=\"col\">ÇEKİŞ</th>
                            <th scope=\"col\">MOTOR GÜCÜ</th>
                            <th scope=\"col\">MOTOR HACMİ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope=\"row\">". @$rezerveArac[0]['idArac'] ."</th>
                            <td>". @$rezerveArac[0]['rezerveGun'] ."</td>
                            <td>". @$rezerveArac[0]['marka'] ."</td>
                            <td>". @$rezerveArac[0]['seri'] ."</td>
                            <td>". @$rezerveArac[0]['model'] ."</td>
                            <td>". @$rezerveArac[0]['yil'] ."</td>
                            <td>". @$rezerveArac[0]['yakit'] ."</td>
                            <td>". @$rezerveArac[0]['vites'] ."</td>
                            <td>". @$rezerveArac[0]['km'] ."</td>
                            <td>". @$rezerveArac[0]['kasaTipi'] ."</td>
                            <td>". @$rezerveArac[0]['cekis'] ."</td>
                            <td>". @$rezerveArac[0]['motorGucu'] ."</td>
                            <td>". @$rezerveArac[0]['motorHacmi'] ."</td>
                            </tr>
                        </tbody>
                    </table>";
                    }else{
                        echo '<h3 class="mt-5 text-success">REZERVE ARACINIZ BULUNMAMAKTADIR.</h3>';
                    }
                ?>

                
            </div>       
        </div>
    </div>
</div>