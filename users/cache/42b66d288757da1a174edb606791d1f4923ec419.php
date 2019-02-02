<?php
$detay=$aracDetay[0];
function control($data){
	$data=trim($data);
	$data=htmlspecialchars($data);
	$data=stripslashes($data);
	return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(empty($_POST['tc'])){
		$hata='Tc no alanını kontrol ediniz !';
	}else{
		$tc=is_numeric(control($_POST['tc']));
	}
	if(empty($_POST['ad'])){
		$hata='Ad alanını kontrol ediniz!';
	}else{
		$ad=control($_POST['ad']);
	}
	if(empty($_POST['soyad'])){
		$hata='Soyad alanını kontrol ediniz !';
	}else{
		$soyad=control($_POST['soyad']);
	}
	if(empty($_POST['email'])){
		$hata='Email alanını kontrol ediniz';
	}else{
		$mail=control($_POST['email']);
	}
	if(empty($_POST['telefon'])){
		$hata='Telefon alanını kontrol ediniz';
	}else{
		$telefon=is_numeric(control($_POST['telefon']));
	}
	if(!isset($hata))
	{
		header('location:/kiralaController/kirala');
	}
	
}
?>
<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
						   <h1 class="title">Car Rental</h1>
						   <p class="title">Bilgileriniz Güvencemiz Altındadır</p>
	               	</div>
				</div> 
				
				<div class="main-login main-center">
					<div>
						<h4><?php isset($hata) ? print '<p class="badge badge-warning ">'.$hata.'</b>' : $hata=""?></h4>
					</div>
				<div>
				<small class="badge badge-light">Bilgilerinizi girip aracınızı kiralayabilirsiniz</small>
				</div>
				<br>
				<form class="form-horizontal" method="POST" action="">
						<div class="form-group">
							<label for="name" class="cols-sm-2 badge badge-warning control-label">Ad</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control"  name="ad" id="name"  placeholder="Adınızı giriniz"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="badge badge-warning cols-sm-2 control-label">Soyad</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control"  name="soyad" id="name"  placeholder="Soyadınızı giriniz"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 badge badge-warning control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control"  name="email" id="email"  placeholder="Email adresiniz"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 badge badge-warning control-label">Tc Kimlik No</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input class="form-control" type="text" maxlength="11" id="username" name="tc" placeholder="Tc Kimlik Numaranızı giriniz" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="telefon" class="cols-sm-2 badge badge-warning control-label">Telefon</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input class="form-control" type="text" maxlength="11" id="telefon" name="telefon" placeholder="Telefon Numaranızı giriniz" onkeypress="return isNumberKey(event)" />
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
									<button type="submit" class="btn btn-warning" >&emsp;KİRALA&emsp;</button>
								
							</div>
							</div>
						</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
 
 
 
 
 
 
 
 
 
 
 <div class="col-md-4">
        
    </div>