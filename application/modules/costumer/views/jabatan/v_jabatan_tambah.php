<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>costumer">
			<i class="fa fa-list"></i>Costumer</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>costumer/jabatan">Jabatan</a>
	</li>
	<li class="active">
		<strong>Tambah Jabatan</strong>
	</li>
</ol>

<h3>Tambah Jabatan</h3>
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
	<?php pesan_get('msg',"Berhasil Menambahkan Jabatan","Gagal Menambahkan Jabatan") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>costumer/jabatantambah"	method="post"  enctype="multipart/form-data">
	<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-lg-2 control-label">Jabatan</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="jabatan" id="jabatan" data-required="true" value="<?php echo set_value('jabatan'); ?>" data-validate="required" data-message-required="Jabatan harus diisi"
						/>
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
	<a href="<?php echo base_url('costumer/datajabatan') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-list"></i> List Jabatan</a>

		
</footer>
</form>
</div>
