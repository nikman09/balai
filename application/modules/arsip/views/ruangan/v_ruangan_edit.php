<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>cootumer">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/ruangan">Ruangan</a>
	</li>
	<li class="active">
		<strong>Edit Ruangan</strong>
	</li>
</ol>

<h3>Edit Ruangan</h3>
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
			<?php pesan_get('msg',"Berhasil Mengedit Data Ruangan","Gagal Mengedit Data Ruangan") ?>
			<div class="row">
				<div class="col-md-12">
				<form class="bs-example form-horizontal validate" data-validate="parsley" action="<?php echo base_url() ?>arsip/ruanganedit?id=<?php echo $data['id_ruangan']; ?>"
	method="post" enctype="multipart/form-data">
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
					<div class="form-group">
					<label class="col-lg-3 control-label">ID Ruangan</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="id_ruangan" id="id_ruangan" data-required="true" value="<?php echo $data['id_ruangan']?>" data-validate="required" data-message-required="ID Ruangan harus diisi" readonly
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Ruangan</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" data-required="true" value="<?php echo $data['nama_ruangan']; ?>" data-validate="required" data-message-required="Nama Ruangan harus diisi"
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Kondisi</label>
					<div class="col-lg-9">
						<select class="form-control" name="kondisi" id="kondisi" data-required="true"  data-validate="required" data-message-required="Kondisi harus diisi" />
						<option value="">.:Pilih Kondisi:.</option>
							<option value="Baik" <?php if($data['kondisi']=="Baik") echo "selected" ?>>Baik</option>
							<option value="Cukup Baik" <?php if($data['kondisi']=="Cukup Baik") echo "selected" ?>>Cukup Baik</option>
							<option value="Kurang Baik" <?php if($data['kondisi']=="Kurang Baik") echo "selected" ?>>Kurang Baik</option>
							<option value="Tidak Baik" <?php if($data['kondisi']=="Tidak Baik") echo "selected" ?>>Tidak Baik</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Keterangan</label>
					<div class="col-lg-9">
						<textarea class="form-control" name="keterangan" id="keterangan"/><?php echo $data['keterangan']; ?></textarea>
					</div>
				</div>


			
				</div>
			</div>

		</div>
		<footer class="panel-footer text-right bg-light lter">
			<button type="submit" class="btn btn-primary btn-s-xs">
				<i class="fa fa-save"></i> Edit</button>
			&nbsp
			<a href="<?php echo base_url('arsip/ruangan') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-list"></i> List Ruangan</a>


		</footer>
	</form>
</div>
