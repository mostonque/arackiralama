<?php
$detay=$aracDetay[0];	

?>
<div class="container mb-5">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
						   <h1 class="title">Car Rental</h1>
						   <p class="title">Bilgileriniz Güvencemiz Altındadır</p>
	               	</div>
				</div> 
				
				<div class="main-login  main-center">
					<div class="error">
						<h4><?php isset($hata) ? print '<p class="badge badge-danger ">'.$hata.'</b>' : $hata=""?></h4>
					</div>
				<div>
				<small class="badge badge-light">Bilgilerinizi girip aracınızı kiralayabilirsiniz</small>
				</div>
				<br>
				<form class="form-horizontal" method="POST" action="/kiralaController/kirala">
						<div class="form-group">
							<label for="name" class="cols-sm-2 badge badge-warning control-label">Ad</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="ad" id="name"   placeholder="Adınızı giriniz"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="badge badge-warning cols-sm-2 control-label">Soyad</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="soyad"  id="soyad"  placeholder="Soyadınızı giriniz"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 badge badge-warning control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control"required  name="email" id="email"  placeholder="Email adresiniz"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 badge badge-warning control-label">Tc Kimlik No</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input class="form-control" type="text" required autocomplete="off" maxlength="11" id="tc" name="tc" placeholder="Tc Kimlik Numaranızı giriniz" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="telefon" class="cols-sm-2 badge badge-warning control-label">Telefon</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input class="form-control" type="text" required autocomplete="off" maxlength="11" id="telefon" name="telefon" placeholder="Telefon Numaranızı giriniz" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="gun" class="cols-sm-2 badge badge-warning control-label">Kiralanacak Gün sayısı</label> <span class="badge badge-secondary font-weight-light">en fazla <span class="text-warning font-weight-bold">9</span> gün</span>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input class="form-control" type="number"  required autocomplete="off" max="9" id="gun" name="gun"   />
								</div>
							</div>
						</div>

						<!-- Button trigger modal -->
						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
							
						KiRALAMAK İÇİN TIKLAYINIZ...
						</button>
						

						<!-- Modal -->
						<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog " role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">Car Rental</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body text-center">
							[<?php print '<b>'.strtoupper($detay['marka'].' '. $detay['seri'].' '.$detay['model'].'</b>'); ?>] <br> <hr> Aracı Kiralamak istediğinize eminmisiniz ?
							</div>
							<div class="modal-footer">
									<input type="hidden" name="id" value="<?php print $detay['id'];?>">
									<button type="submit"   class="btn btn-warning" >&emsp;Rezerve Et&emsp;</button>
									
							</div>
							</div>
						</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
 
 
