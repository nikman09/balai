<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>cootumer">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/kategori">Kategori</a>
	</li>
	<li class="active">
		<strong>Edit Kategori</strong>
	</li>
</ol>

<h3>Edit Kategori "<?php echo $seksi['seksi'] ?></h3>
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
			<?php pesan_get('msg',"Berhasil Mengedit Data Kategori","Gagal Mengedit Data Kategori") ?>
			<div class="row">
				<div class="col-md-12">
				<form class="bs-example form-horizontal validate" data-validate="parsley" action="<?php echo base_url() ?>arsip/kategoriedit?idkategori=<?php echo $data['id_kategori']; ?>&id=<?php echo $seksi['id_seksi']; ?> "
	method="post" enctype="multipart/form-data">
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<input type="hidden" name="id_seksi" value="<?=$seksi['id_seksi']?>">
		<input type="hidden" name="id_kategori" value="<?=$data['id_kategori']?>">
			<div class="form-group">
				<label class="col-lg-3 control-label">Nama Kategori</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="nama_kategori" id="nama_kategori" data-required="true" value="<?php echo $data['nama_kategori']; ?>" data-validate="required" data-message-required="Nama Kategori harus diisi"
					/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label">Keterangan</label>
				<div class="col-lg-9">
					<textarea class="form-control" name="keterangan" id="keterangan"/><?php echo  $data['keterangan']; ?></textarea>
				</div>
			</div>
			<div class="form-group">
					<label class="col-lg-3 control-label">Kunci</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="kunci" id="kunci" data-required="true" value="<?php echo  $data['kunci']; ?>" data-validate="required" data-message-required="Nama Kategori harus diisi" style="width:50px"
						/>
					</div>
				</div>
			</div>
				

			
			</div>

		</div>
		<footer class="panel-footer text-right bg-light lter">
			<button type="submit" class="btn btn-primary btn-s-xs">
				<i class="fa fa-save"></i> Edit</button>
			&nbsp
			<a href="<?php echo base_url('arsip/kategori?idkategori'.$data['id_kategori'].'&id='.$data['id_seksi'].'') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-list"></i> List Kategori</a>


		</footer>
	</form>
</div>
