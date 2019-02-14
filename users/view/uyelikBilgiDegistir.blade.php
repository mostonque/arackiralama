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
        <div class="col-7 ml-1  ">
            <div class="row">
                    <div class="list-group text-center col-md-12 d-inline-block" id="list-tab" role="tablist">
                    <a class="list-group-item col-md-2 d-inline-block list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">İsim Değiştir</a>
                    <a class="list-group-item col-md-2 d-inline-block list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Soyisim Değiştir</a>
                    <a class="list-group-item col-md-2 d-inline-block list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">E-mail Değiştir</a>
                    <a class="list-group-item col-md-2 d-inline-block list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Şifre değiştir</a>
                    </div>
                <div class="col-12 mt-5">
                    <div class="tab-content" id="nav-tabContent">
                    
                            <!--  AD GÜNCELLEME ALANI   -->
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        
                        <div class="col-md-3 offset-5">
                            <form action="/profilController/isimDegistir" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sistemde Kayıtlı Tc Numaranız</label>
                                    <input type="text" required maxlength="11" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tc" placeholder="Sistemde kayıtlı olan TC'nizi giriniz.">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Yeni Adınız</label>
                                    <input type="text" required class="form-control" id="exampleInputPassword1" name="newName" placeholder="Yeni adınızı giriniz.">
                                </div>
                                
                                <button type="submit"  class="btn btn-primary float-right">Değiştir</button>
                            </form>
                        </div>

                    </div>


                            <!--  SOYAD GÜNCELLEME ALANI   -->

                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    
                    <div class="col-md-3 offset-5">
                            <form action="/profilController/soyisimDegistir" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sistemde Kayıtlı Tc Numaranız</label>
                                    <input type="text" required maxlength="11" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tc" placeholder="Sistemde kayıtlı olan TC'nizi giriniz.">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Yeni Soyadınız</label>
                                    <input type="text" required class="form-control" id="exampleInputPassword1" name="newSurName" placeholder="Yeni soyadınız giriniz.">
                                </div>
                                
                                <button type="submit"  class="btn btn-primary float-right">Değiştir</button>
                            </form>
                        </div>
                    
                    
                    
                    
                    </div>


                    
                            <!--  E-MAİL GÜNCELLEME ALANI   -->
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    
                    <div class="col-md-3 offset-5">
                            <form action="/profilController/emailDegistir" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sistemde Kayıtlı Tc Numaranız</label>
                                    <input type="text" required maxlength="11" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tc" placeholder="Sistemde kayıtlı olan TC'nizi giriniz.">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Yeni E-mail Adresiniz</label>
                                    <input type="email" required class="form-control" id="exampleInputPassword1" name="email" placeholder="Yeni E-mailinizi giriniz.">
                                </div>
                                
                                <button type="submit"  class="btn btn-primary float-right">Değiştir</button>
                            </form>
                        </div>
                    
                    
                    </div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    
                    <div class="col-md-3 offset-5">
                            <form action="/profilController/sifreDegistir" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sistemde Kayıtlı Tc Numaranız</label>
                                    <input type="text" required maxlength="11" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tc" placeholder="Sistemde kayıtlı olan TC'nizi giriniz.">
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
                </div>
            </div>
                 
        </div>
    </div>
</div>