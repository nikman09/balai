<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>cootumer">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/lemari">Lemari</a>
	</li>
	<li class="active">
		<strong>Edit Lemari</strong>
	</li>
</ol>

<h3>Edit Lemari</h3>
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
			<?php pesan_get('msg',"Berhasil Mengedit Data Lemari","Gagal Mengedit Data Lemari") ?>
			<div class="row">
				<div class="col-md-12">
				<form class="bs-example form-horizontal validate" data-validate="parsley" action="<?php echo base_url() ?>arsip/lemariedit?id=<?php echo $data['id_lemari']; ?>"
	method="post" enctype="multipart/form-data">
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				
						<input type="hidden" class="form-control" name="id_lemari" id="id_lemari" data-required="true" value="<?php echo $data['id_lemari']?>"
						/>
						<input type="hidden" class="form-control" name="nama_lemari2" id="nama_lemari2" data-required="true" value="<?php echo $data['nama_lemari']?>"
						/>
					
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Lemari</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nama_lemari" id="nama_lemari" data-required="true" value="<?php echo (set_value('nama_lemari')) ? set_value('nama_lemari') : $data['nama_lemari'] ; ?>" data-validate="required" data-message-required="Nama Lemari harus diisi"
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('nama_lemari'); ?></span>
					</div>
				
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Kondisi</label>
					<div class="col-lg-9">
						<select class="form-control" name="kondisi" id="kondisi" data-required="true"  data-validate="required" data-message-required="Kondisi harus diisi" />
						<option value="">.:Pilih Kondisi:.</option>
						<?php  (set_value('kondisi')) ? $kondisi = set_value('kondisi') : $kondisi = $data['kondisi'] ; ?>
							<option value="Baik" <?php if($kondisi=="Baik") echo "selected" ?>>Baik</option>
							<option value="Cukup Baik" <?php if($kondisi=="Cukup Baik") echo "selected" ?>>Cukup Baik</option>
							<option value="Kurang Baik" <?php if($kondisi=="Kurang Baik") echo "selected" ?>>Kurang Baik</option>
							<option value="Tidak Baik" <?php if($kondisi=="Tidak Baik") echo "selected" ?>>Tidak Baik</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">di- Ruangan</label>
					<div class="col-lg-9">
						<select class="form-control" name="id_ruangan" id="id_ruangan" />
						<option value="">.:Pilih Ruangan:.</option>
						<?php  (set_value('id_ruangan')) ? $id_ruangan = set_value('id_ruangan') : $id_ruangan = $data['id_ruangan'] ; ?>
						<?php
							foreach($ruangan->result_array() as $row) {
								
								 echo "<option value='".$row['id_ruangan']."' ";
								 if ($id_ruangan==$row['id_ruangan']) echo  "selected";
								 
								 echo ">".$row['nama_ruangan']."</option>";
							}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Keterangan</label>
					<div class="col-lg-9">
						<textarea class="form-control" name="keterangan" id="keterangan"/><?php echo (set_value('keterangan')) ? set_value('keterangan') : $data['keterangan'] ; ?></textarea>
					</div>
				</div>


			
				</div>
			</div>

		</div>
		<footer class="panel-footer text-right bg-light lter">
			<button type="submit" class="btn btn-primary btn-s-xs">
				<i class="fa fa-save"></i> Edit</button>
			&nbsp
			<a href="<?php echo base_url('arsip/lemari') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-list"></i> List Lemari</a>


		</footer>
	</form>
</div>
