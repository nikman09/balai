<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/seksi">Unit Jabatan Kerja</a>
	</li>
	<li class="active">
		<strong>List Unit Jabatan Kerja</strong>
	</li>
</ol>

<h3>List Unit Jabatan Kerja</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Unit Jabatan Kerja","Gagal Menghapus Data Unit Jabatan Kerja") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/seksitambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah Unit Jabatan Kerja</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="40px">Aksi</th>
				<th width="10px">No</th>
				<th>Unit Jabatan Kerja</th>
				<th>Kategori</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 0;
				foreach($data->result_array() as $row){
					echo "
						<tr>
							<td>
							<a href='".base_url('arsip/seksiedit?id='.$row['id_seksi'].'')."' class='btn btn-info btn-xs' title='Edit'><i class='fa fa-edit'></i></a>
							<a href='#' class='btn btn-danger btn-xs hapus ' title='Hapus' id='".$row['id_seksi']."'><i class='fa fa-trash-o'></i></a>
							</td>
							<td>".++$no."</td>
							<td>".$row['seksi']."</td>
							<td><a href='".base_url('arsip/kategori?id='.$row['id_seksi'].'')."' class='btn btn-primary btn-sm btn-icon icon-left' title='Rak'><i class='fa fa-plus'></i>Kategori</a></td>
						</tr>
					";
				}
				?>
		</tbody>
	</table>
</div>
