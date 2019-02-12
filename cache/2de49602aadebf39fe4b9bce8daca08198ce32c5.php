<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 offset-5">
            <form action="/sifreUnuttumController/sifreDegistir" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sistemde Kayıtlı Tc Numaranız</label>
                    <input type="text" required maxlength="11" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tc" placeholder="Sistemde kayıtlı olan TC'nizi giriniz.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sistemde Kayıtlı E-mail 'iniz</label>
                    <input type="email" required  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail" placeholder="Sistemde kayıtlı olan TC'nizi giriniz.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sistemde Kayıtlı Telefon Numaranız</label>
                    <input type="text" required maxlength="11" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="telefon" placeholder="Sistemde kayıtlı olan TC'nizi giriniz.">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Yeni Sifrenizi giriniz</label>
                    <input type="password" required class="form-control" id="exampleInputPassword1" name="sifre" placeholder="Yeni Sifrenizi giriniz.">
                </div>
                
                <button type="submit"  class="btn btn-primary float-right">Değiştir</button>
            </form>
        </div>
    </div>
</div>