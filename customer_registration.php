
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ePakke | Netthandel</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style></style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" style="background:white;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="/" class="navbar-brand"><h1><span class ="lime">e</span>Pakke.no</h1></a>
				<a href="/" class="navbar-brand"><img src="img/pakke.png" style="width:35px; position:relative; top:-10px; left:-22px;"></a>
				<ul class="nav navbar-nav">
					<li><a href="/"><img src="img/produkt.jpg" style="width:30px;">Produkter</a></li>
				</ul>
			</div>

			<ul class="nav navbar-nav">
				<li><a href="kontaktinfo.php"><img src="img/info.jpg" style="width:30px;">Kontaktinfo</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="javascript:;" class="dropdown-toggle" id="handlekurv" data-toggle="dropdown"><img src="img/handlekurv.jpg" style="width:30px;">Handlekurv<span class="badge" style="position:relative;left:1px;"></span></a>
					<ul class="dropdown-menu" style="width:600px;">
						<div class="panel panel-success">
							<div class="kryss" style="position:absolute;left:589px;top:-1px;color:gray;font-size:18px;">x</div>
							<div class="panel-heading" style="margin-bottom:10px;">
								<div class="row">
									<div class="col-md-3">Produktbilde</div>
									<div class="col-md-3">Produkt</div>
									<div class="col-md-3">Antall</div>
									<div class="col-md-3">Pris i NOK</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								</div>
							</div>
						</div>
					</ul>
				</li>
				<li><a href="javascript:;" class="dropdown-toggle" id="profil" data-toggle="dropdown"><img src="img/profil.jpg" style="width:30px;"><?php echo $_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="kryss" style="position:absolute;left:289px;top:-1px;color:gray;font-size:18px;">x</div>
							<div class="panel panel-primary" style="border-radius:3px 3px 0px 0px;border-bottom:0px;">
							<div class="panel-heading" style="color:white;background-color:#a1a1a1;font-weight:bold;border:3px 3px 0px 0px;">Husk handlekurven og se dine ordre</div>
							</div>
							<div class="panel panel-primary" style="position:relative;top:-20px;border-top:0px;border-radius:0px 0px 3px 3px;">
								<div class="panel-heading" style="color:black;background-color:white;border-radius:0px 0px 3px 3px;border-bottom:0px;">
									<form onsubmit="return false" id="login">
										<label for="email" style="font-weight:normal;">E-post</label>
										<input type="email" class="form-control" name="email" id="email" required/>
										<label for="email" style="font-weight:normal;">Passord</label>
										<input type="password" class="form-control" name="password" id="password" required/>
										<p><br/></p>
										<div>
										<a href="customer_registration.php">Lag ny bruker</a>
									</div>
										<input type="submit" value="Logg inn" class="btn btn-success" style="float:right;position:relative;top:-27px;">
									</form>
								</div>
								<div id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading" style="background-color:#a1a1a1;"><b>Registreringsskjema</b></div>
					<div class="panel-body">

					<form id="signup_form">
						<div class="row">
							<div class="col-md-6">
								<label style="padding-left:3px;" for="f_name">Fornavn</label>
								<input type="text" id="f_name" name="f_name" class="form-control">
							</div>
							<div class="col-md-6">
								<label style="padding-left:3px;" for="f_name">Etternavn</label>
								<input type="text" id="l_name" name="l_name"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label style="padding-left:3px;" for="email">E-post</label>
								<input type="text" id="email" name="email"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label style="padding-left:3px;" for="mobile">Telefon</label>
								<input type="text" id="mobile" name="mobile"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label style="padding-left:3px;" for="address1">Addresse</label>
								<input type="text" id="address1" name="address1"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label style="padding-left:3px;" for="postcode">Postnummer</label>
								<input type="text" id="postcode" name="postcode" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label style="padding-left:3px;" for="password">Passord</label>
								<input type="password" id="password" name="password"class="form-control">
							</div>
						</div>
						<p><br/></p>
						<div class="row">
							<div class="col-md-12">
								<input style="width:100%;" value="Gå videre" type="submit" name="signup_button"class="btn btn-success btn-lg">
							</div>
						</div>

					</div>
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<div class="panel-footer" style="text-align:center;position:absolute;bottom:0px;width:100%;"><p style="font-weight:bold;">kundeservice@epakke.no</p>&copy; 2019 ePakke · <a href="kontaktinfo.php">Kontaktinfo</a></div>
</body>
</html>
}
