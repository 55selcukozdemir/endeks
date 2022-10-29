<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar">
	<!-- BEGIN scrollbar -->
	<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
		<!-- BEGIN menu -->
		<div class="menu">
			<div class="menu-profile">
				<a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
					<div class="menu-profile-cover with-shadow"></div>
					<div class="menu-profile-image menu-profile-image-icon bg-gray-900 text-gray-600">
						<i class="fa fa-user"></i>
					</div>
					<div class="menu-profile-info">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1">
								Selçuk Özdemir
							</div>
							<div class="menu-caret ms-auto"></div>
						</div>
						<small>Daha developer olamadı</small>
					</div>
				</a>
			</div>


			<div id="appSidebarProfileMenu" class="collapse">
				<div class="menu-item pt-5px">
					<a href="javascript:;" class="menu-link">
						<div class="menu-icon"><i class="fa fa-cog"></i></div>
						<div class="menu-text">Settings</div>
					</a>
				</div>
				<div class="menu-item">
					<a href="javascript:;" class="menu-link">
						<div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
						<div class="menu-text"> Send Feedback</div>
					</a>
				</div>
				<div class="menu-item pb-5px">
					<a href="javascript:;" class="menu-link">
						<div class="menu-icon"><i class="fa fa-question-circle"></i></div>
						<div class="menu-text"> Helps</div>
					</a>
				</div>
				<div class="menu-divider m-0"></div>
			</div>
			<div class="menu-header">Navigasyon</div>
			<div class="menu-item">
				<a href="<?=ROOT?>" class="menu-link">
					<div class="menu-icon">
						<i class="fa fa-sitemap"></i>
					</div>
					<div class="menu-text">Ana Sayfa</div>
				</a>
			</div>
			
			<div class="menu-item">
				<a href="manage" class="menu-link">
					<div class="menu-icon">
						<i class="fa fa-globe"></i>
					</div>
					<div class="menu-text">Harita Yönetimi</div>
				</a>
			</div>
			<div class="menu-item">
				<a href="viewmap" class="menu-link">
					<div class="menu-icon">
						<i class="fa fa-map"></i>
					</div>
					<div class="menu-text">Harita Görünümü</div>
				</a>
			</div>
			<!-- <div class="menu-item">
				<a href="endeks" class="menu-link">
					<div class="menu-icon">
						<i class="fa fa-indent"></i>
					</div>
					<div class="menu-text">Emlak Endex Verileri</div>
				</a>
			</div> -->
			
			<!-- BEGIN minify-button -->
			<div class="menu-item d-flex">
				<a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
			</div>
			<!-- END minify-button -->
			
		</div>
		<!-- END menu -->
	</div>
	<!-- END scrollbar -->
</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
<!-- END #sidebar -->