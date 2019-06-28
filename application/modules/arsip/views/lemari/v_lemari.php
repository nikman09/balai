<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/lemari">Lemari</a>
	</li>
	<li class="active">
		<strong>List Lemari</strong>
	</li>
</ol>

<h3>List Lemari</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Lemari","Gagal Menghapus Data Lemari") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/lemaritambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah Lemari</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
			<?php if ($this->session->userdata("username")!="user") {
				?>
				<th width="40x">Aksi</th>
				<?php 
			}
				?>
				<th>Lemari</th>
				<th>Kondisi</th>
				<th>di-ruangan</th>
				<th>Keterangan</th>
				<th>Rak</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data->result_array() as $row){
					echo "
						<tr>
							"; 
							if ($this->session->userdata("username")!="user") {
								echo "
								<td> <a href='".base_url('arsip/lemariedit?id='.$row['id_lemari'].'')."' class='btn btn-info btn-xs ' title='Edit'><i class='fa fa-edit'></i></a>
							<a href='#' class='btn btn-danger btn-xs hapus ' title='Hapus' id='".$row['id_lemari']."'><i class='fa fa-trash-o'></i></a>
							</td>";
							}
							echo "
							<td>".$row['nama_lemari']."</td>
							<td>".$row['kondisi']."</td>
							<td>".$row['nama_ruangan']."</td>
							<td>".$row['keterangan']."</td>
							<td><a href='".base_url('arsip/rak?id='.$row['id_lemari'].'')."' class='btn btn-primary btn-sm btn-icon icon-left' title='Rak'><i class='fa fa-plus'></i>Rak</a></td>
						</tr>
					";
				}
				?>
		</tbody>
	</table>
</div>
