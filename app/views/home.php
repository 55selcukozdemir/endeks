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
                                    <th class="text-nowrap">İlçe</th>
                                    <th class="text-nowrap">Mahalle</th>
                                    <th class="text-nowrap">Konut Satışı Min</th>
                                    <th class="text-nowrap">Konut Satışı Max</th>
                                    <th class="text-nowrap">Konut Kira Min</th>
                                    <th class="text-nowrap">Konut Kira Max</th>
                                    <th class="text-nowrap">Ticari Satışı Min</th>
                                    <th class="text-nowrap">Ticari Satışı Max</th>
                                    <th class="text-nowrap">Ticari Kira Min</th>
                                    <th class="text-nowrap">Ticari Kira Max</th>
                                    <th class="text-nowrap">Arazi Satışı Min</th>
                                    <th class="text-nowrap">Arazi Satışı Max</th>
                                    <th class="text-nowrap">Arazi Kira Min</th>
                                    <th class="text-nowrap">Arazi Kira Max</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td>Samsun</td>
                                    <td>Çarşamba</td>
                                    <td>Köroğlu</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
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