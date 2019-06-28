<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/kategori?id=<?php echo $seksi['id_seksi'] ?>">Kategori</a>
	</li>
	<li class="active">
		<strong>Kategori Unit Jabatan Kerja</strong>
	</li>
</ol>

<h3>Kategori Unit Jabatan Kerja "<?php echo $seksi['seksi'] ?>"</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Seksi","Gagal Menghapus Data Seksi") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/kategoritambah?id=<?php echo $seksi['id_seksi'] ?>" class="btn  btn-primary"> 
		<i class="fa fa-plus"></i> Tambah Kategori</a>

		<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/seksi" class="btn  btn-default"> 
		<i class="fa fa-arrow-left"></i> Kembali</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="40px">Aksi</th>
				<th>Kategori</th>
				<th>Keterangan</th>
				<th>Kunci</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data->result_array() as $row){
					echo "
						<tr>
							<td>
							<a href='".base_url('arsip/kategoriedit?idkategori='.$row['id_kategori'].'&id='.$seksi['id_seksi'].'')."' class='btn btn-info btn-xs ' title='Edit'><i class='fa fa-edit'></i></a>
							<a href='#' class='btn btn-danger btn-xs hapus ' title='Hapus' id='".$row['id_kategori']."'><i class='fa fa-trash-o'></i></a>
							</td>
							
							<td>".$row['nama_kategori']."</td>
							<td>".$row['keterangan']."</td>
							<td>".$row['kunci']."</td>
						
						</tr>
					";
				}
				?>
		</tbody>
	</table>
</div>
