<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>Emlak Endeksi | Şifremi Unuttum</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?=ASSETS?>css/vendor.min.css" rel="stylesheet" />
	<link href="<?=ASSETS?>css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body class='pace-top'>
	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->


	<!-- BEGIN #app -->
	<div id="app" class="app">
		<!-- BEGIN login -->
		<div class="login login-v1">
			<!-- BEGIN login-container -->
			<div class="login-container">
				<!-- BEGIN login-header -->
				<div class="login-header">
					<div class="brand">
						<div class="d-flex align-items-center">
							<span class="logo"></span> <b>Emlak</b> Endeksi
						</div>
                        <small>Şifremi Unuttum</small>
					</div>
					<div class="icon">
						<i class="fa fa-lock"></i>
					</div>
				</div>
				<!-- END login-header -->
				
				<!-- BEGIN login-body -->
				<div class="login-body">
					<!-- BEGIN login-content -->
					<div class="login-content fs-13px">
						<form action="index.html" method="GET">
							<div class="form-floating mb-20px">
								<input type="email" class="form-control fs-13px h-45px" id="emailAddress" placeholder="Email Address" />
								<label for="emailAddress" class="d-flex align-items-center py-0">Email Adresi</label>
							</div>
							<div class="login-buttons">
								<button type="submit" class="btn h-45px btn-success d-block w-100 btn-lg">Şifremi Sıfırla</button>
							</div>
						</form>
					</div>
					<!-- END login-content -->
				</div>
				<!-- END login-body -->
			</div>
			<!-- END login-container -->
		</div>
		<!-- END login -->
		

		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="<?=ASSETS?>js/vendor.min.js"></script>
	<script src="<?=ASSETS?>js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
</body>
</html>