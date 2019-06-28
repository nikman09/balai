<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>costumer">
			<i class="fa fa-list"></i>Costumer</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>costumer/cabang">Cabang</a>
	</li>
	<li class="active">
		<strong>List Cabang</strong>
	</li>
</ol>

<h3>List Cabang</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Cabang","Gagal Menghapus Data Cabang") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>costumer/cabangtambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah data</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="220px">Aksi</th>
				<th>Cabang</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data->result_array() as $row){
					echo "
						<tr>
							<td>
							<a href='".base_url('costumer/cabangedit?id='.$row['id'].'')."' class='btn btn-info btn-sm btn-icon icon-left' title='Edit'><i class='fa fa-edit'></i>Edit</a>
							<a href='#' class='btn btn-danger btn-sm hapus btn-icon icon-left' title='Hapus' id='".$row['id']."'><i class='fa fa-trash-o'></i>Hapus</a>
							</td>
							<td>".$row['cabang']."</td>
						</tr>
					";
				}
				?>
		</tbody>
	</table>
</div>
