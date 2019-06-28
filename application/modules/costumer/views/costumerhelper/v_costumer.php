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

<h3>List Costumer</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Costumer","Gagal Menghapus Data Costumer") ?>
	<div class="filter" style="width:80%;margin:10px">
		<div class="row">
			<div class="col-md-8">
				<form action="<?php echo base_url() ?>costumer/datacostumerhelper" method="post" class="validate">
				<div class="form-group">
					<label class="col-sm-3 control-label" style="margin-top:5px">Tanggal Transaksi</label>
					<div class="col-sm-5" style="margin-top:5px">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<input type="text" class="form-control daterange" name="tanggaltransaksi"  data-format="DD-MM-YYYY" value="<?php echo $tanggaltransaksi; ?>" required readonly/>
					</div>
					<div class="col-sm-2 col-xs-4" style="padding-right:0px;margin-top:5px">
						<button class="btn btn-primary" type="submit" style="width:80px"><i class="fa fa-filter"></i> Filter</button>
					</div>
					<div class="col-sm-2 col-xs-4" style="margin-top:5px">
						<button class="btn btn-primary" type="button" onClick="location.href=location.href"><i class="fa fa-times"></i> Reset</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="">
	<table class="table table-bordered  datatable display nowrap" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th>Aksi &nbsp</th>
				<th>Tanggal Transaksi</th>
				<th >NIK</th>
				<th>Nama Input</th>
				<th>Jabatan</th>
				<th>Area</th>
				<th>No. Invoice</th>
				<th>Kasir
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
