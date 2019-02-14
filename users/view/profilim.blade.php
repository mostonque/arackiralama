<div class="container-fluid mt-4">
    <div class="row ">
        <div class="col-2 ml-4 mr-5">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item "  href="/profilController/profilim" role="tab" aria-controls="home">Üyelik Bilgilerim</a>
            <a class="list-group-item "  href="/profilController/kiraladigimAraclar" role="tab" aria-controls="profile">Kiraladığım Araçlar</a>
            <a class="list-group-item "  href="/profilController/rezerveAraclarim" role="tab" aria-controls="messages">Rezerve Ettiğim Araçlar</a>
            <a class="list-group-item "  href="/profilController/uyelikBilgileriDegistir" role="tab" aria-controls="messages">Üyelik Bilgilerimi Değiştir</a>                
            </div>
        </div>
        <div class="col-7 ml-1 text-center ">
           

                <table class="table text-center">
                    <thead class="thead-dark ">
                        <tr>
                        <th scope="col">AD</th>
                        <th scope="col">SOYAD</th>
                        <th scope="col">TC</th>
                        <th scope="col">MAİL</th>
                        <th scope="col">TELEFON</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td scope="row"><?php echo ucfirst(@$bilgi[0]['ad'])?></td>
                        <td><?php echo ucfirst(@$bilgi[0]['soyad'])?></td>
                        <td><?php echo @$bilgi[0]['tc']?></td>
                        <td><?php echo @$bilgi[0]['mail']?></td>
                        <td><?php echo @$bilgi[0]['telefon']?></td>
                        </tr>
                       
                    </tbody>
                </table>
                
            
            </div>       
        </div>
    </div>
</div>