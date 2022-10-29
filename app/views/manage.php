<?php include "general/head.php" ?>


</head>
<body>
	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->

    <!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed">


    <?php include "general/header.php" ?>
    <?php include "general/sidebar.php" ?>


			<!-- BEGIN #content -->
			<div id="content" class="app-content">
			<!-- BEGIN breadcrumb -->

			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
			<h1 class="page-header">Harita Yönetimi </h1>
			<!-- END page-header -->
			
			<!-- BEGIN panel -->

			<!-- harita verilerinin girileceği form paneli -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Harita veri girişi</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<form action="">
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">İl seç</label>
							<div class="col-md-9">
								<select class="form-select">
									<option>Samsun</option>
									<option>İstanbul</option>
									<option>Ankara</option>
									<option>İzmir</option>
									<option>Antalya</option>
								</select>
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">İlçe seç</label>
							<div class="col-md-9">
								<select class="form-select">
									<option>Çarşamba</option>
									<option>Bafra</option>
									<option>Ayvacık</option>
									<option>Vezirköprü</option>
									<option>Salpazarı</option>
								</select>
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Mahalle seç</label>
							<div class="col-md-9">
								<select class="form-select">
									<option>Ağcagüney</option>
									<option>Karakaya</option>
									<option>Şenyurt</option>
								</select>
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Konut Max</label>
							<div class="col-md-3">
								<input type="number" name="satilik_konut_max" class="form-control mb-5px" placeholder="Satılık Konut Max" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Konut Min</label>
							<div class="col-md-3">
								<input type="number" name="satilik_konut_min" class="form-control mb-5px" placeholder="Satılık Konut Min" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Kiralık Konut Max</label>
							<div class="col-md-3">
								<input type="number" name="kiralik_konut_max" class="form-control mb-5px" placeholder="Kiralık Konut Max" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Kiralık Konut Min</label>
							<div class="col-md-3">
								<input type="number" name="kiralik_konut_min" class="form-control mb-5px" placeholder="Kiralık Konut Min" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Ticari Max</label>
							<div class="col-md-3">
								<input type="number" name="satilik_ticari_max" class="form-control mb-5px" placeholder="Satılık Ticari Max" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Ticari Min</label>
							<div class="col-md-3">
								<input type="number" name="satilik_ticari_min" class="form-control mb-5px" placeholder="Satılık Ticari Min" />
							</div>
						</div>

						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Kiralık Ticari Max</label>
							<div class="col-md-3">
								<input type="number" name="kiralik_ticari_max" class="form-control mb-5px" placeholder="Kiralık Ticari Max" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Kiralık Ticari Min</label>
							<div class="col-md-3">
								<input type="number" name="kiralik_ticari_min" class="form-control mb-5px" placeholder="Kiralık Ticari Min" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Arsa Max</label>
							<div class="col-md-3">
								<input type="number" name="satilik_arsa_max" class="form-control mb-5px" placeholder="Satılık Arsa Max" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Arsa Min</label>
							<div class="col-md-3">
								<input type="number" name="satilik_arsa_min" class="form-control mb-5px" placeholder="Satılık Arsa Min" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Arazi Max</label>
							<div class="col-md-3">
								<input type="number" name="satilik_arazi_max" class="form-control mb-5px" placeholder="Satılık Arazi Max" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Arazi Min</label>
							<div class="col-md-3">
								<input type="number" name="satilik_arazi_min" class="form-control mb-5px" placeholder="Satılık Arazi Min" />
							</div>
						</div>
						<div class="row mb-15px">
							<div class="col-md-3">
								<button class="btn btn-primary" type="button">
									Kaydet	
								</button>
							</div>
						</div>
					</form>

				</div>
			</div>
			<!-- END panel -->
		</div>
		<!-- END #content -->

        <!-- BEGIN scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
        <!-- END scroll to top btn -->
	</div>
	<!-- END #app -->



    <?php include "general/footer.php" ?>


</body>
</html>