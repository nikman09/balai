<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>cootumer">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/jabatan">Jabatan</a>
	</li>
	<li class="active">
		<strong>Pengaturan</strong>
	</li>
</ol>

<h3>Pengaturan</h3>
<div class="panel panel-primary halus" data-collapsed="0">
	<div class="panel-heading">
		<div class="panel-title">
			Update
		</div>

		<div class="panel-options">
			<a href="#" data-rel="collapse">
				<i class="entypo-down-open"></i>
			</a>
		</div>
	</div>

		<div class="panel-body">
			<?php pesan_get('msg',"Berhasil Mengubah Data","Gagal Mengedit Data Jabatan") ?>
			<div class="row">
				<div class="col-md-12">
				<form class="bs-example form-horizontal validate" data-validate="parsley" action="<?php echo base_url() ?>arsip/pengaturan"
	method="post" enctype="multipart/form-data">
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
	
				<div class="form-group">
					<label class="col-lg-3 control-label">Instansi</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="instansi" id="instansi" data-required="true" value="<?php echo $data['instansi']; ?>" data-validate="required" data-message-required="Nama Instansi harus diisi"
						/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Alamat</label>
					<div class="col-lg-9">
						<textarea class="form-control" name="alamat" id="alamat"/><?php echo  $data['alamat']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Telepon</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="telepon" id="telepon" data-required="true" value="<?php echo $data['telepon']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Keterangan</label>
					<div class="col-lg-9">
						<textarea class="form-control" name="keterangan" id="keterangan"/><?php echo  $data['keterangan']; ?></textarea>
					</div>
				</div>
				



			
				</div>
			</div>

		</div>
		<footer class="panel-footer text-right bg-light lter">
			<button type="submit" class="btn btn-primary btn-s-xs">
				<i class="fa fa-save"></i> Edit</button>
			&nbsp
			<a href="<?php echo base_url('arsip/jabatan') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-list"></i> List Jabatan</a>


		</footer>
	</form>


	
</div>
