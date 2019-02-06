<div class="container">
			<div class="ilkDiv">
				<div class="ilkDivOrta">
                <h5>Car Rental</h5>
                <hr class="border ">
					<form class="" method="post" action="/kayitController/kayitOlControl">
						
						<div class="form-group">
							<label for="ad">Adınız</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
				                    <input type="text" class="form-control" required name="ad" id="ad"  placeholder="Adınızı giriniz."/>
							</div>
						</div>  

                        <div class="form-group">
							<label for="soyad">Soyadınız</label>
								<div class="input-group">
									<input type="text" class="form-control" required name="soyad" id="soyad"  placeholder="Soyadınızı giriniz."/>
							</div>
						</div>

                        <div class="form-group">
							<label for="tc">Tc kimlik numaranız</label>
								<div class="input-group">
									<input type="text" autocomplete="off" required class="form-control" maxlength="11" name="tc" placeholder="Tc kimlik numaranızı giriniz"/>
								</div>
						</div>

						<div class="form-group">
							<label for="email">Email adresiniz</label>
								<div class="input-group">
									<input type="email" class="form-control" required name="email" placeholder="Email adresinizi giriniz."/>
							</div>
						</div>

						<div class="form-group">
							<label for="sifre">Şifreniz</label>
								<div class="input-group">
									<input type="password"  class="form-control" required name="sifre" placeholder="Şifrenizi giriniz."/>
								</div>
						</div>

						<div class="form-group">
							<label for="telefon">Telefon</label>
								<div class="input-group">
									<input type="text" class="form-control" required name="telefon" maxlength="11" placeholder="Telefon numaranızı giriniz."/>
								</div>
						</div>

				        <div class="col-md-5 offset-8">
                            <input type="hidden" name="kayitOl" value="1">
                        <button class="btn btn-warning " type="submit" >Kayıt Ol</button>
                        </div>
						
					</form>
				</div><!--main-center"-->
			</div><!--main-->
		</div><!--container-->