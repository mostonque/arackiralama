<div class="container aracTablo text-center">
    <br>
    <h1>KİRALIK ARAÇLAR</h1>
    <br>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Marka</th>
                <th scope="col">Seri</th>
                <th scope="col">Model</th>
                <th scope="col">Yıl</th>
                <th scope="col">Yakıt</th>
                <th scope="col">Vites</th>
                <th scope="col">Km</th>
                <th scope="col">Kasa Tipi</th>
                <th scope="col">Çekiş</th>
                <th scope="col">Motor Gücü</th>
                <th scope="col">Motor Hacmi</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php
                    $listele=$listele;
                    $listeleSize=count($listele);
                    for($i=0;$i<=$listeleSize-1;$i++){
                        $arrayNo=$listele[$i];
                        echo " <tr>
                         <td scope=\"col\"> $arrayNo[marka]</td>
                                <td> $arrayNo[seri]</td>
                                <td> $arrayNo[model]</td>
                                <td> $arrayNo[yil]</td>
                                <td> $arrayNo[yakit]</td>
                                <td> $arrayNo[vites]</td>
                                <td> $arrayNo[km]</td>
                                <td> $arrayNo[kasaTipi]</td>
                                <td> $arrayNo[cekis]</td>
                                <td> $arrayNo[motorGucu]</td>
                                <td> $arrayNo[motorHacmi]</td>
                                </tr>";      
                        }
                    ?>
                
            </tbody>
        </table>
    </div>
</div>
