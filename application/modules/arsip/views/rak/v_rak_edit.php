<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>cootumer">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/rak">Rak</a>
	</li>
	<li class="active">
		<strong>Edit Rak</strong>
	</li>
</ol>

<h3>Edit Rak "<?php echo $lemari['nama_lemari'] ?></h3>
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

		<div class="panel-body">
			<?php pesan_get('msg',"Berhasil Mengedit Data Rak","Gagal Mengedit Data Rak") ?>
			<div class="row">
				<div class="col-md-12">
				<form class="bs-example form-horizontal validate" data-validate="parsley" action="<?php echo base_url() ?>arsip/rakedit?idrak=<?php echo $data['id_rak']; ?>&id=<?php echo $lemari['id_lemari']; ?> "
	method="post" enctype="multipart/form-data">
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<input type="hidden" name="id_lemari" value="<?=$lemari['id_lemari']?>">
		<input type="hidden" name="id_rak" value="<?=$data['id_rak']?>">
			<div class="form-group">
				<label class="col-lg-3 control-label">Nama Rak</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="nama_rak" id="nama_rak" data-required="true" value="<?php echo $data['nama_rak']; ?>" data-validate="required" data-message-required="Nama Rak harus diisi"
					/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label">Keterangan</label>
				<div class="col-lg-9">
					<textarea class="form-control" name="keterangan" id="keterangan"/><?php echo  $data['keterangan']; ?></textarea>
				</div>
			</div>
			</div>
				

			
				</div>
			</div>

		</div>
		<footer class="panel-footer text-right bg-light lter">
			<button type="submit" class="btn btn-primary btn-s-xs">
				<i class="fa fa-save"></i> Edit</button>
			&nbsp
			<a href="<?php echo base_url('arsip/rak?idrak'.$data['id_rak'].'&id='.$data['id_lemari'].'') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-list"></i> List Rak</a>


		</footer>
	</form>
</div>
