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
		<strong>Edit Costumer</strong>
	</li>
</ol>

<h3>Edit Costumer</h3>
<div class="panel panel-primary" data-collapsed="0">

	<div class="panel-heading">
		<div class="panel-title">
			Input
		</div>

		<div class="panel-options">
			<a href="#" data-rel="collapse">
				<i class="entypo-down-open"></i>
			</a>
		</div>
	</div>

	<div class="panel-body">
		<?php pesan_get('msg',"Berhasil Mengedit Data Costumer","Gagal Mengedit Data Costumer") ?>
		<form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>costumer/costumeredit?id=<?php echo $data['id']; ?>"
		method="post" enctype="multipart/form-data" id="form">
			<div class="row">
				<div class="col-md-6">
					<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
					<input type="hidden" class="form-control" name="id" id="id" data-required="true" value="<?php echo $data['id']?>" />
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
							<p class="form-control-static">
								<?php echo $data['jabatan']; ?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Area</label>
						<div class="col-lg-8">
							<p class="form-control-static">
								<?php echo $data['cabang']; ?>
							</p>
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
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo tanggal($data['tanggaltransaksi']); ?>"
								readonly data-validate="required" data-message-required="Tanggal Transaksi harus diisi" name="tanggaltransaksi">

								<div class="input-group-addon">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">No. Invoice</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="noinvoice" value="<?php echo $data['noinvoice']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Nama Kasir *</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="namakasir" value="<?php echo $data['namakasir']; ?>" data-validate="required"
							data-message-required="Nama Kasir harus diisi" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Nama Costumer *</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="namacostumer" value="<?php echo $data['namacostumer']; ?>" data-validate="required"
							data-message-required="Nama Costumer harus diisi" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">No. HP *</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="nohp" value="<?php echo $data['nohp']; ?>" data-validate="required" data-message-required="No. HP  harus diisi"
							/>
						</div>
					</div>


				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label class="col-lg-4 control-label">Alamat</label>
						<div class="col-lg-8">
							<textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">No. KTP</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="noktp" value="<?php echo $data['noktp']; ?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">Email</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="email" data-validate="email" value="<?php echo $data['email']; ?>" data-message-email="Format email yang diiunputkan salah"
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Merek HP *</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="merek" value="<?php echo $data['merek']; ?>" data-validate="required" data-message-required="Merek HP harus diisi"
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Type HP *</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="type" value="<?php echo $data['type']; ?>" data-validate="required" data-message-required="Type HP harus diisi"
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Warna</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="warna" value="<?php echo $data['warna']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Imei</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="imei" value="<?php echo $data['imei']; ?>" />
						</div>
					</div>
				</div>
			</div>

	</div>
	<footer class="panel-footer text-right bg-light lter">
		<button type="submit" class="btn btn-primary btn-s-xs">
			<i class="fa fa-save"></i> Edit</button>
		&nbsp
		<?php
			if ($rule=="manager") { 
		?>
			<a href="<?php echo base_url('costumer/datacostumermanager') ?>" class="btn btn-default btn-s-xs">
			<i class="fa fa-list"></i> Data Costumer</a>
		<?php
			} else {
		?>
			<a href="<?php echo base_url('costumer/datacostumer') ?>" class="btn btn-default btn-s-xs">
			<i class="fa fa-list"></i> Data Costumer</a>
		<?php
			}
		?>
		</form>
	</footer>

</div>
