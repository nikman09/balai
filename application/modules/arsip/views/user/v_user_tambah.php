<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/user">User</a>
	</li>
	<li class="active">
		<strong>Tambah User</strong>
	</li>
</ol>

<h3>Tambah User</h3>
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
	<?php pesan_get('msg',"Berhasil Menambahkan User","Gagal Menambahkan User") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>arsip/usertambah"	method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-6">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="form-group">
					<label class="col-lg-4 control-label">Username</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" />
						<?php 
							if(isset($username)) {
								echo '<label style="color:red;font-size:10px">Username sudah pernah diinput !</label>';
							} 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Password</label>
					<div class="col-lg-8">
						<input type="password" class="form-control" name="password" id="password"  value="<?php echo set_value('password'); ?>"
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Re-Password</label>
					<div class="col-lg-8">
						<input type="password" class="form-control" name="repassword" value="<?php echo set_value('repassword'); ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Nama</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Email</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">No. HP</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nohp" value="<?php echo set_value('nohp'); ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Alamat</label>
					<div class="col-lg-8">
						<textarea class="form-control" name="alamat"><?php echo set_value('alamat'); ?></textarea>
					</div>
				</div>
				
			</div>
			
			<div class="col-md-6">
		
				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Kelamin</label>
					<div class="col-lg-8">
					<select class="form-control" name="jk">
					<option value='' disabled selected>.:Pilih Jenis Kelamin:.</option>
					   <option value="Laki-laki" <?php echo (set_value('jk')=='Laki-laki'?'selected':'') ?> >Laki-laki</option>
					   <option value="Perempuan" <?php echo (set_value('jk')=='Perempuan'?'selected':'') ?> >Perempuan</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Unit Kerja</label>
					<div class="col-lg-8">
					<select class="form-control" name="id_seksi">
					<option value='' disabled selected>.:Pilih Unit Kerja:.</option>
					<?php
						foreach($seksi->result_array() as $row){
							echo "<option value='".$row['id_seksi']."' ".(set_value('id_seksi')==$row['id_seksi']?'selected':'').">".$row['seksi']."</option>";
						}
					?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jabatan</label>
					<div class="col-lg-8">
					<select class="form-control" name="id_jabatan">
					<option value='' disabled selected>.:Pilih Jabatan:.</option>
					<?php
						foreach($jabatan->result_array() as $row){
							echo "<option value='".$row['id_jabatan']."' ".(set_value('id_jabatan')==$row['id_jabatan']?'selected':'').">".$row['jabatan']."</option>";
						}
					?>
					</select>
					</div>
				</div>
				
						<input type="hidden" value="user"  name="rule" />
					
				<div class="form-group">
					<label class="col-lg-4 control-label">Status</label>
					<div class="col-lg-8">
						<select class="form-control" name="status">
							<option value='' disabled selected>.:Pilih Status:.</option>
							<option value="Aktif" <?php echo (set_value('status')=='Aktif'?'selected':'') ?> >Aktif</option>
							<option value="Tidak Aktif" <?php echo (set_value('status')=='Tidak Aktif'?'selected':'') ?> >Tidak Aktif</option>
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
									<span class="fileinput-filename"></span>
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
				if(isset($username)) {
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
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('arsip/user') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-list"></i> List User</a>

		</form>	
</footer>

</div>
