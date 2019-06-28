<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>costumer">
			<i class="fa fa-list"></i>Costumer</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>costumer/datacostumer">Costumer</a>
	</li>
	<li class="active">
		<strong>List Costumer</strong>
	</li>
</ol>

<h3>List Costumer  "Gadgetmart <?php echo $cabang ?>"</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Costumer","Gagal Menghapus Data Costumer") ?>
	<div style="margin-bottom:10px" class="text-right">
	<a href="<?php echo $exportxls ?>" target="_blank" class="btn btn-default"><i class="fa fa-file-excel-o"></i> Export to Excel</a> <a  href="<?php echo $exporttxt ?>" target="_blank" class="btn btn-default"><i class="fa fa-file-text-o"></i> Export to txt</a>
	</div>
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
			<form action="<?php echo base_url() ?>costumer/datacostumermanager" method="post" class="form-horizontal  validate">
			<div class="row">
				<div class="col-md-6">
					<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
					<div class="form-group">
						<label class="col-sm-4 control-label">Tanggal Transaksi</label>
						<div class="col-sm-8">
							<input type="text" class="form-control daterange" name="tanggaltransaksi"  data-format="DD-MM-YYYY" value="<?php echo $tanggaltransaksi; ?>"  readonly style="background-color:#fff" placeholder="Tanggal Transaksi"/>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-sm-4 control-label">NIK</label>
						<div class="col-sm-8">
							<select type="text" class="form-control select2" name="nik"  value="<?php echo $tanggaltransaksi; ?>" required/>
								<option value="">.:Semua NIK:.</option>
								<?php 
									foreach($user->result_array() as $row) {
										echo "<option value='".$row['username']."' ".($row['username']==$username?"selected":"").">".$row['username']." (".$row['nama'].")</option>";
									}
								?>
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
		
	</div>
	<div class="">
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th>Aksi &nbsp</th>
				<th>Tanggal Transaksi</th>
				<th>NIK</th>
				<th>Nama Input</th>
				<th>Jabatan</th>
				<th>Area</th>
				<th>No. Invoice</th>
				<th>Kasir</th>
				<th>Nama Costumer</th>
				<th>No. HP</th>
				<th>Merek</th>
				<th>Type</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	</div>
</div>
