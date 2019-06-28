<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>cootumer">
			<i class="fa fa-list"></i>Costumer</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>costumer/cabang">Cabang</a>
	</li>
	<li class="active">
		<strong>Edit Cabang</strong>
	</li>
</ol>

<h3>Edit Cabang</h3>
<div class="panel panel-primary halus" data-collapsed="0">
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
	<form class="bs-example form-horizontal validate" data-validate="parsley" action="<?php echo base_url() ?>costumer/cabangedit?id=<?php echo $data['id']; ?>"
	method="post" enctype="multipart/form-data">
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="panel-body">
			<?php pesan_get('msg',"Berhasil Mengedit Data Cabang","Gagal Mengedit Data Cabang") ?>
			<div class="row">
				<div class="col-md-12">
					<input type="hidden" class="form-control" name="idcabang" id="cabang"  data-required="true" value="<?php echo $data['id']?>" />
					<div class="form-group">
						<label class="col-lg-3 control-label">Cabang</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="cabang" data-required="true" value="<?php echo $data['cabang']; ?>"
							data-validate="required" data-message-required=" Cabang harus diisi" />
						</div>
					</div>
				</div>
			</div>

		</div>
		<footer class="panel-footer text-right bg-light lter">
			<button type="submit" class="btn btn-primary btn-s-xs">
				<i class="fa fa-save"></i> Edit</button>
			&nbsp
			<a href="<?php echo base_url('costumer/datacabang') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-list"></i> List Cabang</a>


		</footer>
	</form>
</div>
