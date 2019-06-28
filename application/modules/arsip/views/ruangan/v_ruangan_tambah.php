<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/ruangan">Ruangan</a>
	</li>
	<li class="active">
		<strong>Tambah Ruangan</strong>
	</li>
</ol>

<h3>Tambah Ruangan</h3>
<div class="panel panel-primary halus" data-collapsed="0" >
				
<div class="panel-heading">
	<div class="panel-title">
		Input
	</div>
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>
<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Menambahkan Ruangan","Gagal Menambahkan Ruangan") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>arsip/ruangantambah"	method="post"  enctype="multipart/form-data">
	<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-lg-3 control-label">ID Ruangan</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="id_ruangan" id="id_ruangan" data-required="true" value="<?php echo set_value('id_ruangan'); ?>" data-validate="required" data-message-required="ID Ruangan harus diisi"
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('id_ruangan'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Ruangan</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" data-required="true" value="<?php echo set_value('nama_ruangan'); ?>" data-validate="required" data-message-required="Nama Ruangan harus diisi"
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Kondisi</label>
					<div class="col-lg-9">
						<select class="form-control" name="kondisi" id="kondisi" data-required="true"  data-validate="required" data-message-required="Kondisi harus diisi" />
						<option value="">.:Pilih Kondisi:.</option>
							<option value="Baik" <?php if(set_value('ruangan')=="Baik") echo "selected" ?>>Baik</option>
							<option value="Cukup Baik" <?php if(set_value('ruangan')=="Cukup Baik") echo "selected" ?>>Cukup Baik</option>
							<option value="Kurang Baik" <?php if(set_value('ruangan')=="Kurang Baik") echo "selected" ?>>Kurang Baik</option>
							<option value="Tidak Baik" <?php if(set_value('ruangan')=="Tidak Baik") echo "selected" ?>>Tidak Baik</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Keterangan</label>
					<div class="col-lg-9">
						<textarea class="form-control" name="keterangan" id="keterangan"/><?php echo set_value('keterangan'); ?></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-6">

			</div>
		</div>
							
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('arsip/ruangan') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-list"></i> List Ruangan</a>

		
</footer>
</form>
</div>
