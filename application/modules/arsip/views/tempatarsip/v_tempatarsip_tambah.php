<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/tempatarsip">Tempat Arsip</a>
	</li>
	<li class="active">
		<strong>Tambah Tempat Arsip</strong>
	</li>
</ol>

<h3>Tambah Tempat Arsip</h3>
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
	<?php pesan_get('msg',"Berhasil Menambahkan Tempat Arsip","Gagal Menambahkan Tempat Arsip") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>arsip/tempatarsiptambah"	method="post"  enctype="multipart/form-data">
	<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="row">
			<div class="col-md-12">
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Tempat Arsip</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="tempatarsip" id="tempatarsip" data-required="true" value="<?php echo set_value('tempatarsip'); ?>" data-validate="required" data-message-required="Nama Tempat Arsip harus diisi"
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('tempatarsip'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">di- Ruangan</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_ruangan" id="id_ruangan"  data-required="true"  data-validate="required" data-message-required="Ruangan Harus Diisi" />
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
					<label class="col-lg-3 control-label">di- Lemari</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_lemari" id="id_lemari" data-required="true"  data-validate="required" data-message-required="Lemari Harus Diisi" />
						<option value="" disabled <?php if (set_value('id_lemari')=="") echo "selected" ?>>.:Pilih Lemari:.</option>
						<?php
								foreach($datalemari->result_array() as $row) {
								echo "<option value='".$row['id_lemari']."' ".(set_value('id_lemari')==$row['id_lemari']?"selected":"").">".$row['nama_lemari']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">di- Rak</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_rak" id="id_rak"  data-required="true"  data-validate="required" data-message-required="Rak Harus Diisi" />
							<option value="" disabled <?php if (set_value('id_rak')=="") echo "selected" ?>>.:Pilih Rak:.</option>
							<?php
									foreach($datarak->result_array() as $row) {
									echo "<option value='".$row['id_rak']."' ".(set_value('id_rak')==$row['id_rak']?"selected":"").">".$row['nama_rak']."</option>";
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
	<a href="<?php echo base_url('arsip/tempatarsip') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-list"></i> List Tempat Arsip</a>

		
</footer>
</form>
</div>
