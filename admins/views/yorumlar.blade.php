<?php if(isset($yorumlar) && !empty($yorumlar)){
echo "
<div class=\"container text-center\">
    <br>
    <h1>YORUMLAR</h1>
    <br>
    <div class=\"row aracTablo\">
     
       
       <table class=\"table table-bordered  table-sm table-striped\">
            <thead>
                <tr>
                <th scope=\"col\">Yorum Yapan</th>
                <th scope=\"col\">Yorum Yapılan Araç</th>
                <th scope=\"col\">Yapılan Yorum</th>
                </tr>
            </thead>
            <tbody>";
                    
                    foreach($yorumlar as $yorum){
                        echo " <tr>
                         <td scope=\"col\">$yorum[nameUser]</td>
                                <td> $yorum[marka] $yorum[seri] $yorum[model]</td>
                                <td> $yorum[yorum]</td>
                                <td> 
                                <form  class=\"d-inline-block\" action=\"admin/yorumlar/yorum-onayla\" method=\"GET\">
                                    <input type=\"hidden\" name=\"yorumId\" value=\"$yorum[id]\">
                                    <button class=\"btn btn-sm btn-warning\" name=\"yorum\"  value=\"onayla\" type=\"submit\" >Onayla</button>
                                </form>
                                    <form class=\"d-inline-block\" action=\"admin/yorumlar/yorum-onayla\" method=\"GET\">
                                        <input type=\"hidden\" name=\"yorumId\" value=\"$yorum[id]\">
                                        <button class=\"btn btn-sm btn-warning\" name=\"yorum\" value=\"sil\" type=\"submit\" >sil</button>
                                    </form>
                                
                                </td>
                                </tr>";      
                        }
                 echo"
            </tbody>
        </table>
   
    </div>
</div>";
}else{
    echo"
    <div class=\"container text-center \">
        <div class=\"row \">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8  kiralaError\">
                <h3 class=\" bg-dark  text-warning \">ONAY BEKLEYEN YORUM YOKTUR</h3>                           
            <div>
        </div>
    </div>
";
}
?>