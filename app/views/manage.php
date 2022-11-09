<?php include "general/head.php" ?>
<?php 
   // değişkenler 
   
   $iller = $data["iller"];
   
   if(isset($data["form"])){
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
               <form action="manage" method="POST">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="row mb-15px">
                           <label class="form-label col-form-label col-md-3">İl seç</label>
                           <div class="col-md-9">
							<!-- illeri çekiyoruz -->
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
      </div>
      <!-- END #content -->
      <!-- BEGIN #content -->
      <div id="content" class="app-content">
         <!-- BEGIN panel -->
         <div class="panel panel-inverse">
            <!-- BEGIN panel-heading -->
            <div class="panel-heading">
               <h4 class="panel-title">
                  <?php 
                     if(isset($data["form"])){
                     	if($state == "mahalle"){
                     		echo $form[0]["il_adi"] . " / " . $form[0]["ilce_adi"] . " / "  .$form[0]["mahalle_adi"];
                     	} 
                     	else if ($state == "tum_mahalle") {
                     		echo $form[0]["il_adi"] . " / " . $form[0]["ilce_adi"] . " / " . "Tüm Mahalleler";
                     	} 
                     	else if($state == "ilce") {
                     		echo $form[0]["il_adi"] . " / " . "Tüm İlçeler";
                     	} else if ($state == "il"){
                     		echo "Tüm İller";
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
            <form action="manage/setendeks" method="POST" id="endeks_form">
               <div class="panel-body">
                  <table id="data-table-default" class="table table-striped table-bordered align-middle">
                     <thead>
                        <tr>
                           <th class="text-nowrap">Konum</th>
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
						foreach( $form as $form):?>

                        <tr class="odd gradeX">
                           <!-- kapalı input'larla id değerlerini döndürmeye çalışacağız -->
                           <input name="il_id[]" value="<?= isset($form["il_id"]) ? $form["il_id"] : 0?>" form="endeks_form" type="text" style="display: none;">
                           <input name="ilce_id[]" value="<?= isset($form["ilce_id"]) ? $form["ilce_id"] : 0?>" form="endeks_form" type="text" style="display: none;">
                           <input name="mahalle_id[]" value="<?= isset($form["mahalle_id"]) ? $form["mahalle_id"] : 0?>" form="endeks_form" type="text" style="display: none;">
                           <td><?= $form['adi'] ?></td>
                           <td><input name="konut_satis[]" value="<?= $form["satilik_konut"]?>" form="endeks_form" type="number" class="form-control my-n1" /></td>
                           <td><input name="konut_kira[]" value="<?= $form["kiralik_konut"]?>" form="endeks_form" type="number" class="form-control my-n1" /></td>
                           <td><input name="ticari_satis[]" value="<?= $form["satilik_ticari"]?>" form="endeks_form" type="number" class="form-control my-n1" /></td>
                           <td><input name="ticari_kira[]" value="<?= $form["kiralik_ticari"]?>" form="endeks_form" type="number" class="form-control my-n1" /></td>
                           <td><input name="arsa_satis[]" value="<?= $form["satilik_arsa"]?>" form="endeks_form" type="number" class="form-control my-n1" /></td>
                           <td><input name="arazi_satis[]" value="<?= $form["satilik_arazi"]?>" form="endeks_form" type="number" class="form-control my-n1" /></td>
                        </tr>

                        <?php endforeach ?>
                        <?php } ?>

                     </tbody>
                  </table>

                  <?php if(isset($data['form'])){ ?>
                  <div class="row mb-15px">
                     <div class="col-md-3">
                        <input type="submit" value="kaydet veya güncelle" class="form-control mb-5px"  />
                     </div>
                  </div>
                  <?php } ?>

               </div>
            </form>
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