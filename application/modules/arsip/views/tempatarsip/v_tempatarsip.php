<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/tempatarsip">Tempat Arsip</a>
	</li>
	<li class="active">
		<strong>List Tempat Arsip</strong>
	</li>
</ol>

<h3>List Tempat Arsip</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Tempat Arsip","Gagal Menghapus Data Tempat Arsip") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/tempatarsiptambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah Tempat Arsip</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
			<?php if ($this->session->userdata("username")!="user") {
				?>
				<th width="40x">Aksi</th>
				<?php 
			}
				?>
				<th>Tempat Arsip</th>
				<th>Ruangan</th>
				<th>Lemari</th>
				<th>Rak</th>
				<th>keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data->result_array() as $row){
					echo "
						<tr>
						"; 
						if ($this->session->userdata("username")!="user") {
							echo "<td>
							<a href='".base_url('arsip/tempatarsipedit?id='.$row['id_tempatarsip'].'')."' class='btn btn-info btn-xs' title='Edit'><i class='fa fa-edit'></i></a>
							<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_tempatarsip']."'><i class='fa fa-trash-o'></i></a>
							</td>";
						}
						echo "
							<td>".$row['tempatarsip']."</td> 
							<td>".$row['nama_ruangan']."</td>
							<td>".$row['nama_lemari']."</td>
							<td>".$row['nama_rak']."</td>
							<td>".$row['keterangan']."</td>
						</tr>
					";
				}
				?>
		</tbody>
	</table>
</div>
