<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/rak?id=<?php echo $lemari['id_lemari'] ?>">Rak</a>
	</li>
	<li class="active">
		<strong>Rak Lemari</strong>
	</li>
</ol>

<h3>Rak Lemari "<?php echo $lemari['nama_lemari'] ?>"</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Rak","Gagal Menghapus Data Rak") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/raktambah?id=<?php echo $lemari['id_lemari'] ?>" class="btn  btn-primary"> 
		<i class="fa fa-plus"></i> Tambah Rak</a>

		<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/lemari" class="btn  btn-default"> 
		<i class="fa fa-arrow-left"></i> Kembali</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
			<?php if ($this->session->userdata("username")!="user") {
				?>
				<th width="40x">Aksi</th>
				<?php 
			}
				?>
				<th>Rak</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data->result_array() as $row){
					echo "
						<tr>	"; 
						if ($this->session->userdata("username")!="user") {
							echo "
							<td>
							<a href='".base_url('arsip/rakedit?idrak='.$row['id_rak'].'&id='.$lemari['id_lemari'].'')."' class='btn btn-info btn-xs ' title='Edit'><i class='fa fa-edit'></i></a>
							<a href='#' class='btn btn-danger btn-xs hapus ' title='Hapus' id='".$row['id_rak']."'><i class='fa fa-trash-o'></i></a>
							</td>";
						}
						echo "
							<td>".$row['nama_rak']."</td>
							<td>".$row['keterangan']."</td>
						
						</tr>
					";
				}
				?>
		</tbody>
	</table>
</div>
