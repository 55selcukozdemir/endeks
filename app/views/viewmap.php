

<?php include "general/head.php" ?>
<!-- ================== BEGIN page-css ================== -->
<link href="<?=ASSETS?>plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
<!-- ================== END page-css ================== -->


</head>
<body>
	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->

    <!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed app-content-full-height">

	<?php include "general/header.php" ?>
    <?php include "general/sidebar.php" ?>



		<!-- BEGIN #content -->
		<div id="content" class="app-content p-0 position-relative">
			<!-- BEGIN map -->
			<div id="world-map" class="position-absolute top-0 start-0 end-0 bottom-0 h-100 map-page" ></div>
			<!-- END map -->
		</div>
		<!-- END #content -->

	</div>
	<!-- END #app -->



    <?php include "general/footer.php" ?>

	<!-- ================== BEGIN page-js ================== -->
	<script src="<?=ASSETS?>plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="<?=ASSETS?>plugins/jvectormap-next/jquery-jvectormap-data-turkey-tr-en.js"></script>
    <script src="<?=ASSETS?>js/demo/map-vector.d.js"></script>
    <!-- ================== END page-js ================== -->
</body>
</html>