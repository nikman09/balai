<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/arsip">Arsip</a>
	</li>
	<li class="active">
		<strong>List Arsip</strong>
	</li>
</ol>

<h3>List Arsip</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Arsip","Gagal Menghapus Data Arsip") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>arsip/berkastambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah Arsip</a>

	<div class="panel panel-primary col-md-12" data-collapsed="0">
			
			<div class="panel-heading">
				<div class="panel-title">
					Filter
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
				</div>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url() ?>arsip/berkas" method="post" class="form-horizontal  validate">
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
							<label class="col-sm-4 control-label">Unit Kerja</label>
							<div class="col-sm-8">
								<select class="form-control" name="id_seksi" id="id_seksi"  />
								<option value="">.:Semua Unit Kerja:.</option>
								<?php
									foreach($seksi->result_array() as $row) {
										
										echo "<option value='".$row['id_seksi']."' ";
										if (set_value('id_seksi')==$row['id_seksi']) echo  "selected";
										
										echo ">".$row['seksi']."</option>";
									}
								?>
								</select>
							</div>
						</div>
						
					<div class="form-group">
						<label class="col-sm-4 control-label">Kategori</label>
						<div class="col-sm-8">
							<select class="form-control" name="id_kategori" id="id_kategori"  />
								<option value="" disabled <?php if (set_value('id_kategori')=="") echo "selected" ?>>.:Semua Kategori:.</option>
								<?php
										foreach($datakategori->result_array() as $row) {
										echo "<option value='".$row['id_kategori']."' ".(set_value('id_kategori')==$row['id_kategori']?"selected":"").">".$row['nama_kategori']."</option>";
										}
									?>
							</select>
						</div>
					</div>
						

					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label class="col-sm-4 control-label">Jenis Arsip</label>
						<div class="col-sm-8">
							<select class="form-control" name="jenis_arsip" id="jenis_arsip"  />
								<option value="">.:Semua:.</option>
								<option value="Vital" <?php if (set_value('jenis_arsip')=="Vital") echo  "selected"; ?>>Vital</option>
								<option value="Penting" <?php if (set_value('jenis_arsip')=="Penting") echo  "selected"; ?>>Penting</option>
								<option value="Berguna" <?php if (set_value('jenis_arsip')=="Berguna") echo  "selected"; ?>>Berguna</option>
								<option value="Biasa" <?php if (set_value('jenis_arsip')=="Biasa") echo  "selected"; ?>>Biasa</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label"></label>
							<div class="col-sm-8">
								<button class="btn btn-primary" type="submit"><i class="fa fa-filter"></i> Filter</button>
								<button class="btn btn-primary" type="button" onClick="location.href=location.href"><i class="fa fa-times"></i> Reset</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>	
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px" width="100%" >
		<thead>
			<tr>
				<th width="60px" rowspan="2">Aksi</th>
				<th rowspan="2">Index</th>
				<th rowspan="2">Kategori</th>
				<th rowspan="2">Unit Kerja</th>
				<th rowspan="2">No Arsip</th>
				
				<th rowspan="2">Tanggal</th>
				<th rowspan="2">Jenis</th>
				<th rowspan="2">Inaktif</th>
				<th rowspan="2">File</th>
				<th colspan="4" style="text-align: center;">Letak Arsip</th>
			</tr>
			<tr>
				<td>Ruangan</td>
				<td>Lemari</td>
				<td>Rak</td>
				<td>Case</td>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data->result_array() as $row){
					echo "
						<tr>
							<td >
							<div style='width:75px'>
							<a href='".base_url('arsip/berkasedit?id='.$row['id_arsip'].'')."' class='btn btn-info btn-xs' title='Edit'><i class='fa fa-edit'></i></a>
							<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_arsip']."'><i class='fa fa-trash-o'></i></a>
							<a href='#' class='btn btn-default btn-xs lihat' title='Lihat' id='".$row['id_arsip']."'   data-toggle='modal' data-target='#myModal'><i class='fa fa-eye'></i></a>
							</div>
							</td>
							<td>".$row['nama_arsip']."</td> 
							<td>".$row['nama_kategori']."</td> 
							<td>".$row['seksi']."</td> 
							<td>".$row['no_arsip']."</td> 
							<td>".tanggal($row['tanggal_arsip'])."</td> 
							<td>".$row['jenis_arsip']."</td> 
							<td>".tanggal($row['tanggal_aktif'])."</td>
							<td>";
							if ($row['file']!=''){
								echo "<a target='_blank' href='".base_url()."assets/arsip/".$row['file']."'><i class='fa fa-download'></i> File</a>
								";
							} else {

							}
							echo "</td> 
							 
							<td>".$row['nama_ruangan']."</td> 
							<td>".$row['nama_lemari']."</td> 
							<td>".$row['nama_rak']."</td> 
							<td>".$row['tempatarsip']."</td> 
						</tr>
					";
				}
				?>
		</tbody>
	</table>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" id="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="modal-lihat">
	
    </div>

  </div>
</div>