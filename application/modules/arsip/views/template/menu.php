<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				
				<li  class="<?= ($submenu == "index") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>arsip">
						<i class="fa fa-home"></i>
						<span class="title">Beranda </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "berkas" || $submenu == "berkastambah"  || $submenu == "berkasedit" ) ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>arsip/berkas">
						<i class="fa fa-file"></i>
						<span class="title">Arsip </span>
					</a>
				</li>
			
				<li  class="<?= ($submenu == "seksi" || $submenu == "seksitambah"  || $submenu == "seksiedit" || $submenu == "kategori" || $submenu == "kategoritambah"  || $submenu == "kategoriedit") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>arsip/seksi">
						<i class="fa fa-folder"></i>
						<span class="title">Unit Jabatan Kerja </span>
					</a>
				</li>
				
				<li  class="<?= ($submenu == "user" || $submenu == "usertambah"  || $submenu == "useredit" ) ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>arsip/user">
						<i class="fa fa-users"></i>
						<span class="title">User </span>
					</a>
				</li>
				<li class="<?= ($submenu == "ruangan" || $submenu == "ruanganedit"  || $submenu == "ruangantambah" || $submenu == "lemari" || $submenu == "lemaritambah"  || $submenu == "lemariedit"  || $submenu == "rak" || $submenu == "raktambah"  || $submenu == "rakedit" || $submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-list"></i>
						<span class="title">Data Tempat Fisik</span>
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
				<li class="<?= ($submenu == "jabatan" || $submenu == "jabatantambah"  || $submenu == "jambatanedit" || $submenu == "pegawai" || $submenu == "pegawaitambah"  || $submenu == "pegawaiedit") ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-star"></i>
						<span class="title">Data Master</span>
					</a>
					<ul>
					<li  class="<?= ($submenu == "pegawai" || $submenu == "pegawaitambah"  || $submenu == "pegawaiedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/pegawai">
								<span class="title">Pegawai</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "jabatan" || $submenu == "jabatantambah"  || $submenu == "jabatanedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/jabatan">
								<span class="title">Jabatan</span>
							</a>
						</li>
					
					</ul>
				</li>
				
				<li  class="<?= ($submenu == "pengaturan") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>arsip/pengaturan">
						<i class="fa fa-gears"></i>
						<span class="title">Pengaturan </span>
					</a>
				</li>
			</ul>
	