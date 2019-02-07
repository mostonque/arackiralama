<div class="container text-center">
    <br>
    <h1>KİRALIK ARAÇLAR</h1>
    <br>
    <div class="row aracTablo">
        <table class="table table-bordered  table-sm table-striped">
            <thead>
                <tr>
                <th scope="col">Marka</th>
                <th scope="col">Seri</th>
                <th scope="col">Model</th>
                <th scope="col">Yıl</th>
                <th scope="col">Yakıt</th>
                <th scope="col">Vites</th>
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
                                <td><form action=\"./DetayListele\" method=\"get\">  
                                <input type=\"hidden\" name=\"id\"value=\"$arrayNo[id]\" >
                                <button class=\"btn btn-sm btn-warning\" type=\"submit\" >Detay</button>
                                </form></td>
                                </tr>";      
                        }
                    ?>
            </tbody>
        </table>
    </div>
</div>
