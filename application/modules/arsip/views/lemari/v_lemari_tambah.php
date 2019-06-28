<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/lemari">Lemari</a>
	</li>
	<li class="active">
		<strong>Tambah Lemari</strong>
	</li>
</ol>

<h3>Tambah Lemari</h3>
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
	<?php pesan_get('msg',"Berhasil Menambahkan Lemari","Gagal Menambahkan Lemari") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>arsip/lemaritambah"	method="post"  enctype="multipart/form-data">
	<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Lemari</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nama_lemari" id="nama_lemari" data-required="true" value="<?php echo set_value('nama_lemari'); ?>" data-validate="required" data-message-required="Nama Lemari harus diisi"
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('nama_lemari'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Kondisi</label>
					<div class="col-lg-9">
						<select class="form-control" name="kondisi" id="kondisi" data-required="true"  data-validate="required" data-message-required="Kondisi harus diisi" />
						<option value="">.:Pilih Kondisi:.</option>
							<option value="Baik" <?php if(set_value('lemari')=="Baik") echo "selected" ?>>Baik</option>
							<option value="Cukup Baik" <?php if(set_value('lemari')=="Cukup Baik") echo "selected" ?>>Cukup Baik</option>
							<option value="Kurang Baik" <?php if(set_value('lemari')=="Kurang Baik") echo "selected" ?>>Kurang Baik</option>
							<option value="Tidak Baik" <?php if(set_value('lemari')=="Tidak Baik") echo "selected" ?>>Tidak Baik</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">di- Ruangan</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_ruangan" id="id_ruangan" />
						<option value="">.:Pilih Ruangan:.</option>
						<?php
							foreach($ruangan->result_array() as $row) {
								
								 echo "<option value='".$row['id_ruangan']."' ";
								 if (set_value('id_ruangan')==$row['id_ruangan']) echo  "selected";
								 
								 echo ">".$row['nama_ruangan']."</option>";
							}
						?>
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
	<a href="<?php echo base_url('arsip/lemari') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-list"></i> List Lemari</a>

		
</footer>
</form>
</div>
