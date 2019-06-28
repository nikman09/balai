<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li  class="<?= ($submenu == "index") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>arsip/index">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "berkasuser" || $submenu == "berkastambah"  || $submenu == "berkasedit" ) ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>arsip/berkasuser">
						<i class="fa fa-file"></i>
						<span class="title">Arsip </span>
					</a>
				</li>
				<li class="<?= ($submenu == "ruangan" || $submenu == "ruanganedit"  || $submenu == "ruangantambah" || $submenu == "lemari" || $submenu == "lemaritambah"  || $submenu == "lemariedit"  || $submenu == "rak" || $submenu == "raktambah"  || $submenu == "rakedit" || $submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-list"></i>
						<span class="title">Data Tempat</span>
					</a>
					<ul>
						<li  class="<?= ($submenu == "ruangan" || $submenu == "ruangantambah"  || $submenu == "ruanganedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/ruangan">
								<span class="title">Ruangan</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "lemari" || $submenu == "lemaritambah"  || $submenu == "lemariedit" || $submenu == "rak" || $submenu == "raktambah"  || $submenu == "rakedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/lemari">
								<span class="title">Lemari</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Tempat Arsip</span>
							</a>
						</li>
					</ul>
				</li>
				
			
			</ul>
	