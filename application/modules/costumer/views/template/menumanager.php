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
				<li  class="<?= ($submenu == "datacostumermanager") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/datacostumermanager">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">Costumer </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "datausermanager" || $submenu == "usereditmanager" || $submenu == "usertambahmanager"  || $submenu == "userlihatmanager") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/datausermanager">
						<i class="fa fa-users"></i>
						<span class="title">User </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "profil") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/profil">
						<i class="fa fa-user"></i>
						<span class="title">Profil </span>
					</a>
				</li>
			</ul>
	