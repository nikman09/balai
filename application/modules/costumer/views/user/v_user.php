<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>costumer">
			<i class="fa fa-list"></i>Costumer</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>costumer/datauser">User</a>
	</li>
	<li class="active">
		<strong>List User</strong>
	</li>
</ol>

<h3>List User</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data User","Gagal Menghapus Data User") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>costumer/usertambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah data</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="220px">Aksi</th>
				<th>ID User</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Jabatan</th>
				<th>Cabang</th>
				<th>Rule</th>
				<th>Status</th>
				<th>Foto</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data->result_array() as $row){
					echo "
						<tr>
							<td>
							<a href='".base_url('costumer/userlihat?username='.$row['username'].'')."' class='btn btn-default btn-sm btn-icon icon-left' title='Lihat'><i class='fa fa-eye'></i>Lihat</a>
							<a href='".base_url('costumer/useredit?username='.$row['username'].'')."' class='btn btn-info btn-sm btn-icon icon-left' title='Edit'><i class='fa fa-edit'></i>Edit</a>
							<a href='#' class='btn btn-danger btn-sm hapus btn-icon icon-left' title='Hapus' id='".$row['username']."'><i class='fa fa-trash-o'></i>Hapus</a>
							</td>
							<td>".$row['username']."</td>
							<td>".$row['nama']."</td>
							<td>".$row['jk']."</td>
							<td>".$row['jabatan']."</td>
							<td>".$row['cabang']."</td>
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
