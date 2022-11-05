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
					<form action="manage/setendeks" method="POST">
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">İl seç</label>
							<div class="col-md-9">
								<select class="form-select" id="il" name="il_id" onchange="getilce()">
									<option value="0">Tümü</option>
								<?php foreach($data["iller"] as $il): ?>
									<option value="<?=$il["id"]?>"><?=$il["il_adi"]?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>
						<div id="ilce_div" class="row mb-15px" style="display: none;">
							<label class="form-label col-form-label col-md-3">İlçe seç</label>
							<div class="col-md-9">
								<select id="ilce" class="form-select" name="ilce_id" onchange="getMahalle()" >
									<option value="0">Tümü</option>
								</select>
							</div>
						</div>
						<div id="mahalle_div" class="row mb-15px" style="display: none;">
							<label class="form-label col-form-label col-md-3">Mahalle seç</label>
							<div class="col-md-9">
								<select id="mahalle" name="mahalle_id" class="form-select">
									<option value="0">Tümü</option>
								</select>
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Konut</label>
							<div class="col-md-3">
								<input type="number" name="satilik_konut" class="form-control mb-5px" placeholder="Satılık Konut" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Kiralık Konut</label>
							<div class="col-md-3">
								<input type="number" name="kiralik_konut" class="form-control mb-5px" placeholder="Kiralık Konut" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Ticari</label>
							<div class="col-md-3">
								<input type="number" name="satilik_ticari" class="form-control mb-5px" placeholder="Satılık Ticari" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Kiralık Ticari</label>
							<div class="col-md-3">
								<input type="number" name="kiralik_ticari" class="form-control mb-5px" placeholder="Kiralık Ticari" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Arsa</label>
							<div class="col-md-3">
								<input type="number" name="satilik_arsa" class="form-control mb-5px" placeholder="Satılık Arsa" />
							</div>
						</div>
						<div class="row mb-15px">
							<label class="form-label col-form-label col-md-3">Satılık Arazi</label>
							<div class="col-md-3">
								<input type="number" name="satilik_arazi" class="form-control mb-5px" placeholder="Satılık Arazi" />
							</div>
						</div>
						<div class="row mb-15px">
							<div class="col-md-3">
								<input type="submit" class="form-control mb-5px"  />
							</div>
						</div>
					</form>

				</div>
			</div>
			<!-- END panel -->
		</div>
		<!-- END #content -->

    <!-- BEGIN #content -->
	<div id="content" class="app-content">

<!-- BEGIN panel -->
<div class="panel panel-inverse">
	<!-- BEGIN panel-heading -->
	<div class="panel-heading">
		<h4 class="panel-title">Data Table - Default</h4>
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
		<table id="data-table-default" class="table table-striped table-bordered align-middle">
			<thead>
				<tr>
					<th class="text-nowrap">İl</th>
					<th class="text-nowrap">Konut Satışı Min</th>
					<th class="text-nowrap">Konut Satışı Max</th>
					<th class="text-nowrap">Konut Kira Min</th>
					<th class="text-nowrap">Konut Kira Max</th>
					<th class="text-nowrap">Ticari Satışı Min</th>
					<th class="text-nowrap">Ticari Satışı Max</th>
					<th class="text-nowrap">Ticari Kira Min</th>
					<th class="text-nowrap">Ticari Kira Max</th>
					<th class="text-nowrap">Arsa Satışı Min</th>
					<th class="text-nowrap">Arsa Satışı Max</th>
					<th class="text-nowrap">Arazi Satış Min</th>
					<th class="text-nowrap">Arazi Satış Max</th>
				</tr>
			</thead>
			<tbody>
				<tr class="odd gradeX">
					<td>Samsun</td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
					<td><input type="text" class="form-control my-n1" /></td>
				</tr>
			</tbody>
		</table>
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


</body>
</html>