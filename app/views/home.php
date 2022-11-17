<?php include "general/head.php" ?>

<?php 
// değişkenler
$iller = $data["iller"];

if(isset($data["form"]["result"])){
	$form = $data["form"]["result"];
	$state = $data["form"]["state"];
}
?>

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
			<!-- BEGIN page-header -->
			<h1 class="page-header">Harita Yönetimi </h1>
			<!-- END page-header -->
			
			<!-- BEGIN panel -->
			<!-- harita verilerinin girileceği form paneli -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Tablo Endeks Getir</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<form action="/endeks/public/" method="POST">
						<div class="row">
							<div class="col-md-3">
								<div class="row mb-15px">
									<label class="form-label col-form-label col-md-3">İl seç</label>
									<div class="col-md-9">
										<select class="form-select" id="il" name="il_id" onchange="getilce()">
											<option value="0">Tümü</option>
										<?php foreach($iller as $il): ?>
											<option value="<?=$il["id"]?>"><?=$il["il_adi"]?></option>
										<?php endforeach ?>
										</select>
									</div>
								</div>
								<div id="ilce_div" class="row mb-15px" style="display: none;">
									<label class="form-label col-form-label col-md-3">İlçe seç</label>
									<div class="col-md-9">
										<select id="ilce" class="form-select" name="ilce_id" onchange="getMahalle()" >
											<option value="-1">Tümü</option>
										</select>
									</div>
								</div>
								<div id="mahalle_div" class="row mb-15px" style="display: none;">
									<label class="form-label col-form-label col-md-3">Mahalle seç</label>
									<div class="col-md-9">
										<select id="mahalle" name="mahalle_id" class="form-select">
											<option value="-1">Tümü</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<div class="row mb-15px">
									<div class="col-md-3">
										<input type="submit" value="getir" class="form-control mb-5px btn btn-outline-primary"  />
									</div>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
			<!-- END panel -->

			<!-- BEGIN panel -->
			<div class="panel panel-inverse" data-sortable-id="table-basic-4">
				<!-- BEGIN panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">

					<?php 

					// Gelen veri il-ilçe-mahalleye mi ait kontrol ediliyor.
					if(isset($data["form"])){
						if($state == "mahalle"){
							echo $form[0]["il_adi"] . " / " . $form[0]["ilce_adi"] . " / "  .$form[0]["mahalle_adi"];
						} else if ($state == "tum_mahalle") {
							echo $form[0]["il_adi"] . " / " . $form[0]["ilce_adi"] . " / " . $form[0]["mahalle_adi"] ;
						} else if($state == "ilce") {
							echo $form[0]["il_adi"] . " / " .  $form[0]["ilce_adi"];
						} else if ($state == "il"){
							echo "Tüm İller";
						}  elseif ($state == "bos"){
							echo "Sonuç bulunamadı";
						}

					}?>
					</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- END panel-heading -->
				<!-- BEGIN panel-body -->
				<div class="panel-body">
					<!-- BEGIN table-responsive -->
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th class="text-nowrap">Konut Satışı</th>
									<th class="text-nowrap">Konut Kira</th>
									<th class="text-nowrap">Ticari Satışı</th>
									<th class="text-nowrap">Ticari Kira</th>
									<th class="text-nowrap">Arsa Satışı</th>
									<th class="text-nowrap">Arazi Satış</th>
								</tr>
							</thead>
							<tbody>

							<?php 
							if(isset($form)){
								foreach( $form as $form): ?>
									<tr>
										<td>1</td>
										<td><?= $form["satilik_konut"] ?></td>
										<td><?= $form["kiralik_konut"]?></td>
										<td><?= $form["satilik_ticari"]?></td>
										<td><?= $form["kiralik_ticari"]?></td>
										<td><?= $form["satilik_arsa"]?></td>
										<td><?= $form["satilik_arazi"]?></td>
									</tr>

							<?php endforeach ?>
							<?php } ?>

							</tbody>
						</table>
					</div>
					<!-- END table-responsive -->
				</div>
				<!-- END panel-body -->
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


    
	<!-- ================== BEGIN page-js ================== -->
	<script src="<?=ASSETS?>js/demo/manage.js"></script>
	<!-- ================== END page-js ================== -->

	<!-- ================== BEGIN page-js ================== -->
	<script src="<?=ASSETS?>plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?=ASSETS?>plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
	<script src="<?=ASSETS?>plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?=ASSETS?>plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
	<script src="<?=ASSETS?>js/demo/table-manage-default.demo.js"></script>
	<script src="<?=ASSETS?>plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="<?=ASSETS?>js/demo/render.highlight.js"></script>
	<!-- ================== END page-js ================== -->
</body>
</html>