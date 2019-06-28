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
			<a href="#" data-rel="collapse">
				<i class="entypo-down-open"></i>
			</a>
		</div>
	</div>
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="panel-body">
			<?php pesan_get('msg',"Berhasil Mengedit Data User","Gagal Mengedit Data User") ?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-lg-4 control-label">Username</label>
						<div class="col-lg-8">
							<p  class="form-control-static" ><?php echo $data['username']; ?> </p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Nama</label>
						<div class="col-lg-8">
							<p  class="form-control-static" ><?php echo $data['nama']; ?> </p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">Email</label>
						<div class="col-lg-8">
							<p  class="form-control-static" ><?php echo $data['email']; ?> </p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">No. HP</label>
						<div class="col-lg-8">
							<p  class="form-control-static" ><?php echo $data['nohp']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Alamat</label>
						<div class="col-lg-8">
							<p  class="form-control-static" ><?php echo $data['alamat']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Jenis Kelamin</label>
						<div class="col-lg-8">
							<p class="form-control-static" ><?php echo $data[ 'jk'] ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Cabang</label>
						<div class="col-lg-8">
							<p class="form-control-static" ><?php echo $data['cabang']?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Jabatan</label>
						<div class="col-lg-8">
							<p class="form-control-static" ><?php echo $data['jabatan']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Rule</label>
						<div class="col-lg-8">
							<p class="form-control-static" ><?php echo $data[ 'rule'];?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Status</label>
						<div class="col-lg-8">
							<p class="form-control-static" ><?php echo $data[ 'status'] ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							<?php if ($data['foto']=='') { ?>
								<img src="<?php echo base_url()."assets/images/foto/"; ?>default.png" class="thumbnail" width="200px"/>
							<?php } else { ?>
								<img src="<?php echo base_url()."assets/images/foto/".$data['foto']; ?>" class="thumbnail" width="200px"/>
							<?php } ?>>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="panel-footer text-right bg-light lter">
				<a href="<?php echo base_url('costumer/usereditmanager?username='.$data['username'].'') ?>" class="btn btn-primary btn-s-xs">
				<i class="fa fa-edit"></i> Edit</a>
			&nbsp
			<a href="<?php echo base_url('costumer/datausermanager') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-list"></i> List User</a>
		</footer>
	</form>
</div>
