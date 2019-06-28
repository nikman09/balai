<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/ruangan">Arsip</a>
	</li>
	<li class="active">
		<strong>List Arsip</strong>
	</li>
</ol>

<h3>List Arsip</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Arsip","Gagal Menghapus Data Arsip") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/ruangantambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah Arsip</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="220px">Aksi</th>
				<th>Kategori Arsip</th>
				<th>Index</th>
				<th>Tahun</th>
				<th>File</th>
				<th>Tempat Fisik</th>
			</tr>
		</thead>
		<tbody>
				<tr>
				<td><a href='' class='btn btn-info btn-sm btn-icon icon-left' title='Edit'><i class='fa fa-edit'></i>Edit</a>
							<a href='#' class='btn btn-danger btn-sm hapus btn-icon icon-left' title='Hapus' id=''><i class='fa fa-trash-o'></i>Hapus</a></td>
				<td>TU</td>
				<td>Laporan Keuangan Februari</td>
				<td>2017</td>
				<td><a class="btn btn-primary"> <i class="fa fa-file"> Lihat </a></td>
				<td>Arsip TU Lemari 1 Rak 2 No 3</td>
				</tr>
				<tr>
				<td><a href='' class='btn btn-info btn-sm btn-icon icon-left' title='Edit'><i class='fa fa-edit'></i>Edit</a>
							<a href='#' class='btn btn-danger btn-sm hapus btn-icon icon-left' title='Hapus' id=''><i class='fa fa-trash-o'></i>Hapus</a></td>
				<td>TU</td>
				<td>Laporan Keuangan Mei</td>
				<td>2017</td>
				<td><a class="btn btn-primary"> <i class="fa fa-file"> Lihat </a></td>
				<td>Arsip TU Lemari 1 Rak 2 No 3</td>
				</tr>
		</tbody>
	</table>
</div>
