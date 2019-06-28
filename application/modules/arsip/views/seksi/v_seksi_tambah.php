<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/seksi">Unit Jabatan Kerja</a>
	</li>
	<li class="active">
		<strong>Tambah Unit Jabatan Kerja</strong>
	</li>
</ol>

<h3>Tambah Unit Jabatan Kerja</h3>
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
	<?php pesan_get('msg',"Berhasil Menambahkan Unit Jabatan Kerja","Gagal Menambahkan Unit Jabatan Kerja") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>arsip/seksitambah"	method="post"  enctype="multipart/form-data">
	<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Unit Jabatan Kerja</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="seksi" id="seksi" data-required="true" value="<?php echo set_value('seksi'); ?>" data-validate="required" data-message-required="Nama Unit Jabatan Kerja harus diisi"
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
	<a href="<?php echo base_url('arsip/seksi') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-list"></i> List Unit Jabatan Kerja</a>

		
</footer>
</form>
</div>
