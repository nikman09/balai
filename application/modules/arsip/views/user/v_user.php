<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/user">User</a>
	</li>
	<li class="active">
		<strong>List User</strong>
	</li>
</ol>

<h3>List User</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data User","Gagal Menghapus Data User") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/usertambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah User</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="80px">Aksi</th>
				<th>Username</th>
				<th>Nama</th>
				<th>Email</th>
				<th>No. HP</th>
				<th>Jenis Kelamin</th>
				<th  width="100px">Unit Kerja</th>
				<th>Jabatan</th>
				<th>Rule</th>
				<th>Status</th>
				<th width="40px">Foto</th>
			</tr>
		</thead>
		<tbody>
			<?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<a href='".base_url('arsip/userlihat?username='.$row['username'].'')."' class='btn btn-default btn-xs ' title='Lihat'><i class='fa fa-eye'></i></a>
								<a href='".base_url('arsip/useredit?username='.$row['username'].'')."' class='btn btn-info btn-xs' title='Edit'><i class='fa fa-edit'></i></a>
								<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['username']."'><i class='fa fa-trash-o'></i></a>
								</td>
								<td>".$row['username']."</td>
								<td>".$row['nama']."</td>
								<td>".$row['email']."</td>
								<td>".$row['nohp']."</td>
								<td>".$row['jk']."</td>
								<td>".$row['seksi']."</td>
								<td>".$row['jabatan']."</td>
								<td>".$row['rule']."</td>
								<td>".$row['status']."</td>
								<td><a href='".base_url()."assets/images/foto/".$row['foto']."' target='_blank'><i class='fa fa-image'></i> Lihat</a></td>
							</tr>
						";
					}
				?>
		</tbody>
	</table>
</div>
