<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"></h4>
</div>
<div class="modal-body" style="min-height:750px">
		<div class="form-group">
			<label class="col-lg-3 control-label">Unit Kerja</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['seksi']; ?></p>
				</div>
		</div>
		
		<div class="form-group">
			<label class="col-lg-3 control-label">Kategori</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['nama_kategori']; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">Index Arsip</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['nama_arsip']; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">No Arsip</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['no_arsip']; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">Tanggal Arsip</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['tanggal_arsip']; ?></p>
			</div>
        </div>
        <div class="form-group">
			<label class="col-lg-3 control-label">Deskripsi</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['deskripsi']; ?></p>
			</div>
        </div>
        <div class="form-group">
			<label class="col-lg-3 control-label">Jumlah</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['jumlah']; ?></p>
			</div>
        </div>
        <div class="form-group">
			<label class="col-lg-3 control-label">Media</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['media']; ?></p>
			</div>
        </div>
        <div class="form-group">
			<label class="col-lg-3 control-label">Jenis Arsip</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['jenis_arsip']; ?></p>
			</div>
        </div>
		<div class="form-group">
			<label class="col-lg-3 control-label">Pembuat Arsp</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['nama']; ?></p>
			</div>
        </div>
        <div class="form-group">
			<label class="col-lg-3 control-label">Batas Aktif</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['tanggal_aktif']; ?></p>
			</div>
        </div>
       
        <div class="form-group">
			<label class="col-lg-3 control-label">Asli/Copy:</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['asli']; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">File</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo "<a target='_blank' href='".base_url()."assets/arsip/".$data['file']."'><i class='fa fa-download'></i> ".$data['file']."</a>" ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">di- Ruangan</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['nama_ruangan']; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">di- Lemari</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['nama_lemari']; ?></p>
			</div>
        </div>
        <div class="form-group">
			<label class="col-lg-3 control-label">di- Rak</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['nama_rak']; ?></p>
			</div>
        </div>
        <div class="form-group">
			<label class="col-lg-3 control-label">di- Tempat Arsip</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['tempatarsip']; ?></p>
			</div>
        </div>
        <div class="form-group">
			<label class="col-lg-3 control-label">Keterangan</label>
				<div class="col-lg-9">
				<p class="form-control-static" ><?php echo $data['keterangan']; ?></p>
			</div>
		</div>
	
		

		</div>
	<div class="modal-footer">
		<div class="row">
			<div class="col-md-12 text-right">
				<button type="button" class="btn btn-default modal-dismiss" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>