<div class="right-sidebar">
	<div class="sidebar-title">
		<h3 class="weight-600 font-16 text-blue">
			Layout Settings
			<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
		</h3>
		<div class="close-sidebar" data-toggle="right-sidebar-close">
			<i class="icon-copy ion-close-round"></i>
		</div>
	</div>
	<div class="right-sidebar-body customscroll">
		<div class="right-sidebar-body-content">
			<h4 class="weight-600 font-18 pb-10">Header Background</h4>
			<div class="sidebar-btn-group pb-30 mb-10">
				<a
					href="javascript:void(0);"
					class="btn btn-outline-primary header-white active">White</a>
				<a
					href="javascript:void(0);"
					class="btn btn-outline-primary header-dark">Dark</a>
			</div>

			<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
			<div class="sidebar-btn-group pb-30 mb-10">
				<a
					href="javascript:void(0);"
					class="btn btn-outline-primary sidebar-light">White</a>
				<a
					href="javascript:void(0);"
					class="btn btn-outline-primary sidebar-dark active">Dark</a>
			</div>

			<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
			<div class="sidebar-radio-group pb-10 mb-10">
				<div class="custom-control custom-radio custom-control-inline">
					<input
						type="radio"
						id="sidebaricon-1"
						name="menu-dropdown-icon"
						class="custom-control-input"
						value="icon-style-1"
						checked="" />
					<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input
						type="radio"
						id="sidebaricon-2"
						name="menu-dropdown-icon"
						class="custom-control-input"
						value="icon-style-2" />
					<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input
						type="radio"
						id="sidebaricon-3"
						name="menu-dropdown-icon"
						class="custom-control-input"
						value="icon-style-3" />
					<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
				</div>
			</div>

			<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
			<div class="sidebar-radio-group pb-30 mb-10">
				<div class="custom-control custom-radio custom-control-inline">
					<input
						type="radio"
						id="sidebariconlist-1"
						name="menu-list-icon"
						class="custom-control-input"
						value="icon-list-style-1"
						checked="" />
					<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input
						type="radio"
						id="sidebariconlist-2"
						name="menu-list-icon"
						class="custom-control-input"
						value="icon-list-style-2" />
					<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input
						type="radio"
						id="sidebariconlist-3"
						name="menu-list-icon"
						class="custom-control-input"
						value="icon-list-style-3" />
					<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input
						type="radio"
						id="sidebariconlist-4"
						name="menu-list-icon"
						class="custom-control-input"
						value="icon-list-style-4"
						checked="" />
					<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input
						type="radio"
						id="sidebariconlist-5"
						name="menu-list-icon"
						class="custom-control-input"
						value="icon-list-style-5" />
					<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input
						type="radio"
						id="sidebariconlist-6"
						name="menu-list-icon"
						class="custom-control-input"
						value="icon-list-style-6" />
					<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
				</div>
			</div>

			<div class="reset-options pt-30 text-center">
				<button class="btn btn-danger" id="reset-settings">
					Reset Settings
				</button>
			</div>
		</div>
	</div>
</div>

<div class="left-side-bar">
	<div class="brand-logo">
		<a href="<?= base_url("/homepage") ?>">
			<img src="<?= base_url("assets/") ?>vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
			<img
				src="<?= base_url("assets/") ?>vendors/images/deskapp-logo-white.svg"
				alt=""
				class="light-logo" />
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<?php
	// Session'dan role değerini alalım
	$role = session()->get('role');
	?>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">

				<li>

					<a href="<?= site_url('homepage') ?>" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-house"></span><span class="mtext">Anasayfa</span>
					</a>
				</li>
				<li>
					<a href="<?= site_url('addcustomer') ?>" class="dropdown-toggle no-arrow" accesskey="a">
						<span class="micon bi bi-plus"></span><span class="mtext">Ekle</span>
					</a>
				</li>

				<li>
					<a href="<?= site_url('grafik') ?>" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-bar-chart"></span><span class="mtext">Grafik</span>
					</a>
				</li>
				<li>
					<a href="<?= site_url('silinenler') ?>" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-trash"></span><span class="mtext">Silinenler</span>
					</a>
				</li>
				<li>
					<a href="<?= site_url('tckarsilastirview') ?>" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-diagram-3"></span><span class="mtext">TC Karşılaştır</span>
					</a>
				</li>
				<?php if ($role == 1): ?>
					<li>
						<a href="<?= site_url('addpersonel') ?>" class="dropdown-toggle no-arrow">
							<span class="micon bi bi-person"></span><span class="mtext">Kullanı Aç</span>
						</a>
					</li>
				<?php endif; ?>
			</ul>

		</div>

	</div>
</div>
<div class="mobile-menu-overlay"></div>