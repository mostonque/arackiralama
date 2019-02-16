<div class = "container">
	<div class="wrapper">
        <form action="/aracEkleController/aracEkle" method="POST"> 
            <div class="row">
                    <div class="col-3 offset-3 mt-2">
                        <label for="marka">Marka</label>
                        <input type="text" id="marka" name="marka" class="form-control"  required placeholder="marka">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="seri">seri</label>
                       <input type="text"  id="seri" name="seri" class="form-control" required placeholder="seri">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="model">model</label>
                        <input type="text" id="model" name="model" class="form-control" required placeholder="model">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="Yil">Yıl</label>
                       <input type="text" id="Yil" name="yil" class="form-control" required placeholder="Yıl">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="Yakit">Yakıt</label>
                        <input type="text" id="Yakit" name="yakit" class="form-control" required placeholder="Yakıt">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="Vites">Vites</label>
                       <input type="text" id="Vites" name="vites" class="form-control" required placeholder="Vites">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="Km">Km</label>
                        <input type="text" id="Km" name="km" class="form-control" required placeholder="Km eklerken nokta kullanmanız gerekmez.">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="KasaTipi">Kasa Tipi</label>
                       <input type="text" id="KasaTipi" name="kasaTipi" class="form-control"  required placeholder="Kasa Tipi">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="cekis">Çekiş</label>
                        <input type="text" id="cekis" name="cekis" class="form-control" required placeholder="Çekiş">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="MotorGucu">Motor Gücü</label>
                       <input type="text" id="MotorGucu" name="motorGucu" class="form-control" required placeholder="Motor Gücü">
                    </div>
                    <div class="col-3 offset-3 mt-2">
                        <label for="MotorHacmi">Motor Hacmi</label>
                        <input type="text" id="MotorHacmi" name="motorHacmi" class="form-control" required placeholder="Motor Hacmi">
                    </div>
                    <div class="col-3 mt-2">
                    <label for="model">&nbsp;</label>
                        <button type="submit" class="form-control  btn btn-info">Araç Ekle</button>
                    </div>
            </div>
        </form>
	</div>
</div>