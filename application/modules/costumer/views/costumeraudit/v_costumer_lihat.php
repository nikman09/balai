<?php
		$rule = $this->session->userdata("rule");
		$cabang = $this->session->userdata("cabang");
	?>
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>costumer">
			<i class="fa fa-list"></i>Costumer</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>costumer/datacostumer">Costumer</a>
	</li>
	<li class="active">
		<strong>Lihat Costumer</strong>
	</li>
</ol>

<h3>Lihat Costumer</h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Input
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Mengedit Data Costumer","Gagal Mengedit Data Costumer") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>costumer/costumeredit?id=<?php echo $data['id']; ?>" method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-6">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
			<div class="form-group">
						<label class="col-lg-4 control-label">NIK</label>
						<div class="col-lg-8">
							<p class="form-control-static">
								<?php echo $data['username'] ?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Nama Helper/Promotor</label>
						<div class="col-lg-8">
							<p class="form-control-static">
								<?php echo $data['namahelper']; ?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Jabatan</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['jabatan']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Area</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['cabang']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal Input</label>
						<div class="col-lg-8">
							<p class="form-control-static">
								<?php echo tanggal($data['tanggalinput']); ?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal Transaksi *</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo tanggal($data['tanggaltransaksi']); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">No. Invoice</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['noinvoice']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Nama Kasir *</label>
						<div class="col-lg-8">
						<p class="form-control-static"><?php echo $data['namakasir']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Nama Costumer *</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['namacostumer']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">No. HP *</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['nohp']; ?></p>
						</div>
					</div>


				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label class="col-lg-4 control-label">Alamat</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['alamat']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">No. KTP</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['noktp']; ?></p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">Email</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['email']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Merek HP *</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['merek']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Type HP *</label>
						<div class="col-lg-8">
							<p class="form-control-static"><?php echo $data['type']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Warna</label>
						<div class="col-lg-8">
						<p class="form-control-static"><?php echo $data['warna']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Imei</label>
						<div class="col-lg-8">
						<p class="form-control-static"><?php echo $data['imei']; ?></p>
						</div>
					</div>
			</div>
		</div>
	
</div>
	<footer class="panel-footer text-right bg-light lter">
	<?php
				if ($rule=="Helper") { 
			?>
			<?php
				} else {
			?>	
				<a href="<?php echo base_url('costumer/costumeredit?id='.$data['id'].'') ?>"class="btn btn-primary btn-s-xs">
				<i class="fa fa-edit"></i> Edit</a>
			<?php
				}
			?>
			&nbsp
			<?php
				if ($rule=="Manager") { 
			?>
				<a href="<?php echo base_url('costumer/datacostumermanager') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-list"></i> Data Costumer</a>
			<?php
				} else if ($rule=="Audit") {
			?>
				<a href="<?php echo base_url('costumer/datacostumer') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-list"></i> Data Costumer</a>
			<?php
				} else if ($rule=="Helper") {
					?>
						<a href="<?php echo base_url('costumer/datacostumerhelper') ?>" class="btn btn-default btn-s-xs">
						<i class="fa fa-list"></i> Data Costumer</a>
					<?php
						} 
				?>
			</form>	
	</footer>
</div>
