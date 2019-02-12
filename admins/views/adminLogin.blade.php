<div class = "container">
	<div class="wrapper">
		<form action="/adminLoginController/adminGiris" method="post"  class="form-signin">       
		    <h1 class="form-signin-heading">Car Rental</h1>
            <hr class="colorgraph">
            <h4 class="form-signin-heading">Admin Panel</h4>
                <input type="text" class="form-control mail" name="yonetici_ad" placeholder="Yönetici adınızı giriniz." required autofocus />
                
                <input type="password" class="form-control  pw" name="yonetici_sifre" placeholder="Parolanızı giriniz" required/>      
                <button class="btn btn-lg btn-primary mt-2 btn-block" type="Submit">Giriş</button>  			
		</form>			
	</div>
</div>