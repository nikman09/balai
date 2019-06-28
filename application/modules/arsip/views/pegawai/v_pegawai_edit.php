<ol class="breadcrumb bc-3">
<li>
	<a href="<?php echo base_url() ?>arsip">
		<i class="fa fa-list"></i>Flash sale</a>
</li>
<li>
	<a href="<?php echo base_url() ?>arsip/pegawai">Pegawai</a>
</li>
<li class="active">
	<strong>Edit Pegawai</strong>
</li>
</ol>

<h3>Edit Pegawai</h3>
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
	<div class="panel-title">
		Update
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>
<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>arsip/pegawaiedit?id_pegawai=<?php if (isset($id_pegawai2)) echo $id_pegawai2; else echo $data['id_pegawai']; ?>"	method="post"  enctype="multipart/form-data" id="form"> 	

<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="panel-body">
					<?php pesan_get('msg',"Berhasil Mengedit Data Pegawai","Gagal Mengedit Data Pegawai") ?>
						<div class="row">
							<div class="col-md-6">
							<input type="hidden" class="form-control" name="id_pegawai" data-required="true" value="<?php echo $data['id_pegawai']; ?>" />
			
				<div class="form-group">
					<label class="col-lg-4 control-label">Nama</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" 
						/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">NIP</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nip" value="<?php echo $data['nip']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Tempat Lahir</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal Lahir</label>
						<div class="col-lg-8">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo tanggal($data['tanggal_lahir']); ?>"
								readonly data-validate="required" data-message-required="Tanggal tanggal_lahir " name="tanggal_lahir" style="background-color:#fff"  placeholder="dd/mm/yyyy">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>

						</div>
					</div>
			
				<div class="form-group">
					<label class="col-lg-4 control-label">Email</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">No. HP</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nohp" value="<?php echo $data['nohp']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Alamat</label>
					<div class="col-lg-8">
						<textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Kelamin</label>
					<div class="col-lg-8">
					<select class="form-control" name="jk">
					<option value='' disabled>.:Pilih Jenis Kelamin:.</option>
					   <option value="Laki-laki" <?php echo ($data['jk']=='Laki-laki'?'selected':'') ?> >Laki-laki</option>
					   <option value="Perempuan" <?php echo ($data['jk']=='Perempuan'?'selected':'') ?> >Perempuan</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Unit Kerja</label>
					<div class="col-lg-8">
					<select class="form-control" name="id_seksi">
					<option value='' disabled>.:Pilih Unit Kerja:.</option>
					<?php
						foreach($seksi->result_array() as $row){
							echo "<option value='".$row['id_seksi']."' ".($data['id_seksi']==$row['id_seksi']?'selected':'').">".$row['seksi']."</option>";
						}
					?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jabatan</label>
					<div class="col-lg-8">
					<select class="form-control" name="id_jabatan">
					<option value='' disabled>.:Pilih Jabatan:.</option>
					<?php
						foreach($jabatan->result_array() as $row){
							echo "<option value='".$row['id_jabatan']."' ".($data['id_jabatan']==$row['id_jabatan']?'selected':'').">".$row['jabatan']."</option>";
						}
					?>
					</select>
					</div>
				</div>
											

				<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['foto']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="foto">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							<?php 
					if(isset($id_pegawai)) {
						echo '<label style="color:red;font-size:10px">Upload ulang foto !</label>';
						} 
					?>
					</div>
				</div>
			</div>
		</div>
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs">
		<i class="fa fa-save"></i> Edit</button>
	&nbsp
	<a href="<?php echo base_url('arsip/pegawai') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-list"></i> List Pegawai</a>

		
</footer>
</form>
				</div>
			