<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/ruangan">Ruangan</a>
	</li>
	<li class="active">
		<strong>List Ruangan</strong>
	</li>
</ol>

<h3>List Ruangan</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Ruangan","Gagal Menghapus Data Ruangan") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/ruangantambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah Ruangan</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
			<?php if ($this->session->userdata("username")!="user") {
				?>
				<th width="40px">Aksi</th>
				<?php 
			}
				?>
				<th>ID Ruangan</th>
				<th>Ruangan</th>
				<th>Kondisi</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data->result_array() as $row){
					echo "
						<tr>"; 
						if ($this->session->userdata("username")!="user") {
							echo "
							<td>
							<a href='".base_url('arsip/ruanganedit?id='.$row['id_ruangan'].'')."' class='btn btn-info btn-xs ' title='Edit'><i class='fa fa-edit'></i></a>
							<a href='#' class='btn btn-danger btn-xs hapus ' title='Hapus' id='".$row['id_ruangan']."'><i class='fa fa-trash-o'></i></a>
							</td>";
						}
						echo "
							<td>".$row['id_ruangan']."</td>
							<td>".$row['nama_ruangan']."</td>
							<td>".$row['kondisi']."</td>
							<td>".$row['keterangan']."</td>
						</tr>
					";
				}
				?>
		</tbody>
	</table>
</div>
