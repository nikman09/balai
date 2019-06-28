<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li  class="<?= ($submenu == "index") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/index">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "datacostumer" || $submenu == "costumerlihat" || $submenu == "costumeredit" ) ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/datacostumer">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">Costumer </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "datauser"  || $submenu == "useredit" || $submenu == "usertambah"  || $submenu == "userlihat") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/datauser">
						<i class="fa fa-users"></i>
						<span class="title">User </span>
					</a>
				</li>
				<li class="<?= ($submenu == "datacabang" || $submenu == "datajabatan"  || $submenu == "cabangtambah"  || $submenu == "cabangedit" || $submenu == "jabatanedit" || $submenu == "jabatantambah") ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-list"></i>
						<span class="title">Master Data </span>
					</a>
					<ul>
						<li  class="<?= ($submenu == "datacabang" || $submenu == "cabangtambah"  || $submenu == "cabangedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>costumer/datacabang">
								<span class="title">Cabang</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "datajabatan" || $submenu == "jabatantambah" || $submenu == "jabatanedit") ? " active" : ""; ?>">
						<a href="<?php echo base_url() ?>costumer/datajabatan">
								<span class="title">Jabatan</span>
							</a>
						</li>
					</ul>
				</li>
				<li  class="<?= ($submenu == "profil") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/profil">
						<i class="fa fa-user"></i>
						<span class="title">Profil </span>
					</a>
				</li>
			</ul>
	