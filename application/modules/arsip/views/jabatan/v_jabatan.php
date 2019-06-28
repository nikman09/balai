<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/jabatan">Jabatan</a>
	</li>
	<li class="active">
		<strong>List Jabatan</strong>
	</li>
</ol>

<h3>List Jabatan</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Jabatan","Gagal Menghapus Data Jabatan") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/jabatantambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah Jabatan</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="40px">Aksi</th>
				<th width="10px">No</th>
				<th>Jabatan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 0;
				foreach($data->result_array() as $row){
					echo "
						<tr>
							<td>
							<a href='".base_url('arsip/jabatanedit?id='.$row['id_jabatan'].'')."' class='btn btn-info btn-xs ' title='Edit'><i class='fa fa-edit'></i></a>
							<a href='#' class='btn btn-danger btn-xs hapus ' title='Hapus' id='".$row['id_jabatan']."'><i class='fa fa-trash-o'></i></a>
							</td>
							<td>".++$no."</td>
							<td>".$row['jabatan']."</td>
						</tr>
					";
				}
				?>
		</tbody>
	</table>
</div>
