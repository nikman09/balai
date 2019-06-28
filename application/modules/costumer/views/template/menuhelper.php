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
				<li  class="<?= ($submenu == "inputcostumer") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/inputcostumer">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">Input Costumer </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "datacostumerhelper"  || $submenu == "costumerlihat") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/datacostumerhelper">
						<i class="fa fa-list"></i>
						<span class="title">Data Costumer </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "profil") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>costumer/profil">
						<i class="fa fa-user"></i>
						<span class="title">Profil </span>
					</a>
				</li>
			</ul>
	