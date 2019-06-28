<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/berkas">Tambah</a>
	</li>
	<li class="active">
		<strong>Tambah Arsip</strong>
	</li>
</ol>

<h3>Tambah Arsip</h3>
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
	<?php pesan_get('msg',"Berhasil Menambahkan Data Arsip","Gagal Menambahkan Data Arsip") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>arsip/berkastambah"	method="post"  enctype="multipart/form-data">
	<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="row">
			<div class="col-md-12">
			<div class="form-group">
					<label class="col-lg-3 control-label">Unit Kerja</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_seksi" id="id_seksi"  data-required="true"  data-validate="required" data-message-required="Unit Kerja Harus Diisi" />
						<option value="">.:Pilih Unit Kerja:.</option>
						<?php
							foreach($seksi->result_array() as $row) {
								
								 echo "<option value='".$row['id_seksi']."' ";
								 if (set_value('id_seksi')==$row['id_seksi']) echo  "selected";
								 
								 echo ">".$row['seksi']."</option>";
							}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Kategori</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_kategori" id="id_kategori"  data-required="true"  data-validate="required" data-message-required="kategori Harus Diisi" />
							<option value="" disabled <?php if (set_value('id_kategori')=="") echo "selected" ?>>.:Pilih Kategori:.</option>
							<?php
									foreach($datakategori->result_array() as $row) {
									echo "<option value='".$row['id_kategori']."' ".(set_value('id_kategori')==$row['id_kategori']?"selected":"").">".$row['nama_kategori']."</option>";
									}
								?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Index</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nama_arsip" id="nama_arsip" data-required="true" value="<?php echo set_value('nama_arsip'); ?>" data-validate="required" data-message-required="Index Arsip harus diisi"
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('nama_arsip'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">No Arsip</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="no_arsip" id="no_arsip" data-required="true" value="<?php echo set_value('no_arsip'); ?>" />
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('no_arsip'); ?></span>
					</div>
				</div>
				<div class="form-group">
						<label class="col-lg-3 control-label">Tanggal Arsip</label>
						<div class="col-lg-4">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo set_value('tanggal_arsip'); ?>"
								readonly data-validate="required" data-message-required="Tanggal Arsip " name="tanggal_arsip" style="background-color:#fff"  placeholder="dd/mm/yyyy">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>

						</div>
					</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Deskripsi</label>
					<div class="col-lg-9">
						<textarea class="form-control" name="deskripsi" id="deskripsi"/><?php echo set_value('deskripsi'); ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Jumlah</label>
					<div class="col-lg-3">
						<input type="text" class="form-control" name="jumlah" id="jumlah" data-required="true" value="<?php echo set_value('jumlah'); ?>" data-validate="required" data-message-required="Jumlah harus diisi"
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Media</label>
					<div class="col-lg-4">
						<select class="form-control" name="media" id="media"  data-required="true"  data-validate="required" data-message-required="Media Harus Diisi" />
							<option value="">.:Pilih Media Arsip:.</option>
							<option value="Kertas">Kertas</option>
							<option value="CD/DVD">CD/DVD</option>
							<option value="Flashdisk">Flashdisk</option>
							<option value="Harddisk">Harddisk</option>
							</select>
						</div>
						
					</div>
									
				
					<div class="form-group">
						<label class="col-lg-3 control-label">Batas Aktif</label>
						<div class="col-lg-4">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo set_value('tanggal_aktif'); ?>"
								readonly data-validate="required" data-message-required="Tanggal Aktif " name="tanggal_aktif" style="background-color:#fff" placeholder="dd/mm/yyyy">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>

						</div>
					</div>
					<div class="form-group">
					<label class="col-lg-3 control-label">Jenis Arsip</label>
					<div class="col-lg-4">
					<select class="form-control" name="jenis_arsip" id="jenis_arsip"  data-required="true"  data-validate="required" data-message-required="Jenis Arsip Harus Diisi" />
						<option value="">.:Pilih Jenis Arsip:.</option>
						<option value="Vital">Vital</option>
						<option value="Penting">Penting</option>
						<option value="Berguna">Berguna</option>
						<option value="Biasa">Biasa</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Asli/Copy</label>
					<div class="col-lg-4">
					<select class="form-control" name="asli" id="asli"  data-required="true"  data-validate="required" data-message-required="Media Harus Diisi" />
						<option value="">.:Pilih:.</option>
						<option value="Asli">Asli</option>
						<option value="Copy">Copy</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Pembuat Arsip</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_pegawai" id="id_pegawai"  data-required="true"  data-validate="required" data-message-required="Pembuat Arsip Harus Diisi" />
						<option value="">.:Pilih Pegawai:.</option>
						<?php
							foreach($pegawai->result_array() as $row) {
								
								 echo "<option value='".$row['id_pegawai']."' ";
								 if (set_value('id_pegawai')==$row['id_pegawai']) echo  "selected";
								 
								 echo ">".$row['nama']."</option>";
							}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">File</label>
					<div class="col-sm-9">
					
						<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
							<div class="input-group">
								<div class="form-control uneditable-input" data-trigger="fileinput">
									<i class="glyphicon glyphicon-file fileinput-exists"></i>
									<span class="fileinput-filename"></span>
								</div>
								<span class="input-group-addon btn btn-default btn-file">
									<span class="fileinput-new">Select file</span>
									<span class="fileinput-exists">Change</span>
									<input type="file" name="fileberkas">
								</span>
								<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							</div>
						</div>
						<?php 
				// if(isset($username)) {
					// echo '<label style="color:red;font-size:10px">Upload ulang foto !</label>';
					// } 
				?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">di- Ruangan</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_ruangan" id="id_ruangan"  data-required="true"  />
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
						<select class="form-control" name="id_lemari" id="id_lemari" data-required="true"  data-validate="required" data-message-required="Lemari Harus Diisi" disabled />
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
						<select class="form-control" name="id_rak" id="id_rak"  data-required="true"  data-validate="required" data-message-required="Rak Harus Diisi"  disabled/>
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
					<label class="col-lg-3 control-label">di- Tempat Arsip</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_tempatarsip" id="id_tempatarsip"  data-required="true"  data-validate="required" data-message-required="Tempat Arsip Harus Diisi"  disabled/>
							<option value="" disabled <?php if (set_value('id_rak')=="") echo "selected" ?>>.:Pilih Tempat Arsip:.</option>
							<?php
									foreach($datarak->result_array() as $row) {
									echo "<option value='".$row['id_tempatarsip']."' ".(set_value('id_tempatarsip')==$row['id_tempatarsip']?"selected":"").">".$row['tempatarsip']."</option>";
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
	<a href="<?php echo base_url('arsip/berkas') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-list"></i> List  Arsip</a>

		
</footer>
</form>
</div>
