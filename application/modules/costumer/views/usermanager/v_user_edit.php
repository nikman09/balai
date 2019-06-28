<ol class="breadcrumb bc-3">
<li>
	<a href="<?php echo base_url() ?>costumer">
		<i class="fa fa-list"></i>Flash sale</a>
</li>
<li>
	<a href="<?php echo base_url() ?>costumer/user">User</a>
</li>
<li class="active">
	<strong>Edit User</strong>
</li>
</ol>

<h3>Edit User</h3>
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
	<div class="panel-title">
		Update
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>
<form class="bs-example form-horizontal validate" data-validate="parsley" action="<?php echo base_url() ?>costumer/usereditmanager?username=<?php if (isset($username2)) echo $username2; else echo $data['username']; ?>"	method="post" enctype="multipart/form-data">
<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="panel-body">
					<?php pesan_get('msg',"Berhasil Mengedit Data User","Gagal Mengedit Data User") ?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-lg-4 control-label">Username</label>
									<div class="col-lg-8">
										<input type="text" class="form-control" name="username" data-required="true" value="<?php echo $data['username']; ?>" />
										<input type="hidden" class="form-control" name="username2" data-required="true" value="<?php
               							 if (isset($username2)) echo $username2; else echo $data['username']; ?>" />
										<?php 
											if(isset($username)) {
												echo '<label style="color:red;font-size:10px">Username ada yang sama ! Username asal "'.$username2.'"</label>';
											} 
										?>
								</div>
							</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Password</label>
					<div class="col-lg-8">
						<input type="password" class="form-control" name="password" id="password"  value="<?php echo set_value('password'); ?>" />
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
						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" 
						/>
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
					<label class="col-lg-4 control-label">Cabang</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="cabang" value="<?php echo $data['cabang'] ?>" readonly />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jabatan</label>
					<div class="col-lg-8">
					<select class="form-control" name="jabatan">
					<option value='' disabled>.:Pilih Jabatan:.</option>
					<?php
						foreach($jabatan->result_array() as $row){
							echo "<option value='".$row['jabatan']."' ".($data['jabatan']==$row['jabatan']?'selected':'').">".$row['jabatan']."</option>";
						}
					?>
					</select>
					</div>
				</div>
		<!-- 	<div class="form-group">
					<label class="col-lg-4 control-label">Rule</label>
					<div class="col-lg-8"> -->
						<input type="hidden" class="form-control" name="rule" value="Helper" readonly />
					<!-- </div>
				</div> -->
				<div class="form-group">
					<label class="col-lg-4 control-label">Status</label>
					<div class="col-lg-8">
					<select class="form-control" name="status">
						<option value='' disabled selected>.:Pilih Status:.</option>
						<option value="Aktif" <?php echo ($data['status']=='Aktif'?'selected':'') ?> >Aktif</option>
						<option value="Tidak Aktif" <?php echo ($data['status']=='Tidak Aktif'?'selected':'') ?> >Tidak Aktif</option>
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
		<i class="fa fa-save"></i> Edit</button>
	&nbsp
	<a href="<?php echo base_url('costumer/datausermanager') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-list"></i> List User</a>

		
</footer>
</form>
				</div>
			