<div class = "container">
	<div class="wrapper">
        <form action="/aracEkleController/aracEkle" method="POST"> 
            <div class="row">
                        <?php $arac=$arac[0];?>
                    <div class="col-3 offset-3 mt-2">
                        <label for="marka">Marka</label>
                        <input type="text" id="marka" name="marka" value="<?php echo $arac['marka'] ?>" required class="form-control" placeholder="marka">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="seri">seri</label>
                       <input type="text"  id="seri" name="seri" value="<?php echo $arac['seri'] ?>"  required class="form-control" placeholder="seri">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="model">model</label>
                        <input type="text" id="model" name="model" value="<?php echo $arac['model'] ?>" required class="form-control" placeholder="model">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="Yil">Yıl</label>
                       <input type="text" id="Yil" name="yil" value="<?php echo $arac['yil'] ?>" required class="form-control" placeholder="Yıl">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="Yakit">Yakıt</label>
                        <input type="text" id="Yakit" name="yakit" value="<?php echo $arac['yakit'] ?>" required class="form-control" placeholder="Yakıt">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="Vites">Vites</label>
                       <input type="text" id="Vites" name="vites" value="<?php echo $arac['vites'] ?>" required class="form-control" placeholder="Vites">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="Km">Km</label>
                        <input type="text" id="Km" name="km" value="<?php echo $arac['km'] ?>" required class="form-control" placeholder="Km eklerken nokta kullanmanız gerekmez.">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="KasaTipi">Kasa Tipi</label>
                       <input type="text" id="KasaTipi" name="kasaTipi" value="<?php echo $arac['kasaTipi'] ?>" required class="form-control" placeholder="Kasa Tipi">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="cekis">Çekiş</label>
                        <input type="text" id="cekis" name="cekis" value="<?php echo $arac['cekis'] ?>" required class="form-control" placeholder="Çekiş">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="MotorGucu">Motor Gücü</label>
                       <input type="text" id="MotorGucu" name="motorGucu" value="<?php echo $arac['motorGucu'] ?>" required class="form-control" placeholder="Motor Gücü">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="MotorHacmi">Motor Hacmi</label>
                        <input type="text" id="MotorHacmi" name="motorHacmi" value="<?php echo $arac['motorHacmi'] ?>" required class="form-control" placeholder="Motor Hacmi">
                    </div>
                    <div class="col-3 mt-2">
                    <input type="hidden" name="aracId" value="<?php echo $arac['id']?>">
                    <input type="hidden" name="durum" value="<?php echo $arac['durum']?>">
                    <label for="model">&nbsp;</label>
                        <button type="submit" name="arac" value="duzenle"  class="form-control  btn btn-info">Araç Düzenle</button>
                    </div>
            </div>
        </form>
	</div>
</div>