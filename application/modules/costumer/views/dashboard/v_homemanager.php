<?php $this->load->view("template/header") ?>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		// Sample Toastr Notification
		setTimeout(function () {
			var opts = {
				"closeButton": true,
				"debug": false,
				"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
				"toastClass": "black",
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};

			toastr.success("<?php echo $this->session->userdata('nama') ?>!", "Selamat Datang !", opts);
		}, 3000);


		// Sparkline Charts
		$('.inlinebar').sparkline('html', {
			type: 'bar',
			barColor: '#ff6264'
		});
		$('.inlinebar-2').sparkline('html', {
			type: 'bar',
			barColor: '#445982'
		});
		$('.inlinebar-3').sparkline('html', {
			type: 'bar',
			barColor: '#00b19d'
		});
		$('.bar').sparkline([
			[1, 4],
			[2, 3],
			[3, 2],
			[4, 1]
		], {
			type: 'bar'
		});
		$('.pie').sparkline('html', {
			type: 'pie',
			borderWidth: 0,
			sliceColors: ['#3d4554', '#ee4749', '#00b19d']
		});
		$('.linechart').sparkline();
		$('.pageviews').sparkline('html', {
			type: 'bar',
			height: '30px',
			barColor: '#ff6264'
		});
		$('.uniquevisitors').sparkline('html', {
			type: 'bar',
			height: '30px',
			barColor: '#00b19d'
		});
	
	    var line_chart_demo2 = $("#line-chart-demo2");
		line_chart_demo2.parent().show();
		var line_chart = Morris.Line({
			element: 'line-chart-demo2',
			data: [
				<?php
						foreach($jumlahcostumertahun as $row){
							echo "{
									y:'".$row['tahun']."',
									a:".$row['jumlah']."
								},";
								 
						};
					?>
			],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Number of Customers'],
			redraw: true,
			xLabels : "year"	
		});
		line_chart_demo2.parent().attr('style', '');
		var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		// Line chart pertahun
		var line_chart_demo = $("#line-chart-demo");
		var line_chart = Morris.Line({
			element: 'line-chart-demo',
			data: [{
				month: '<?php echo $tahun ?>-01',
					a: <?php echo $januari ?>
				},
				{
					month: '<?php echo $tahun ?>-02',
					a: <?php echo $februari ?>
				},
				{
					month: '<?php echo $tahun ?>-03',
					a: <?php echo $maret ?>
				},
				{
					month: '<?php echo $tahun ?>-04',
					a: <?php echo $april ?>
				},
				{
					month: '<?php echo $tahun ?>-05',
					a: <?php echo $mei ?>
				},
				{
					month: '<?php echo $tahun ?>-06',
					a: <?php echo $juni ?>
				},
				{
					month: '<?php echo $tahun ?>-07',
					a: <?php echo $juli ?>
				},
				{
					month: '<?php echo $tahun ?>-08',
					a: <?php echo $agustus ?>
				}
				,
				{
					month: '<?php echo $tahun ?>-09',
					a: <?php echo $september ?>
				}
				,
				{
					month: '<?php echo $tahun ?>-10',
					a: <?php echo $oktober ?>
				}
				,
				{
					month: '<?php echo $tahun ?>-11',
					a: <?php echo $november ?>
				}
				,
				{
					month: '<?php echo $tahun ?>-12',
					a: <?php echo $desember ?>
				}
			],
			xkey: 'month',
			ykeys: ['a'],
			labels: ['Number of Customers'],
			hideHover: 'auto',
			resize: true,
			redraw: true,
			xLabelFormat : function (x) {
				return months[x.getMonth()];
				}
		});
		
		
		
	
	

	});


	function getRandomInt(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}

</script>


<h3>Dashboard <small>(<?php echo $tahun ?> | <?php echo $cabang ?>)</small></h3>

<div class="row">
	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-blue">
			<div class="icon">
				<i class="entypo-user"></i>
			</div>
			<div class="num">
				<?php echo $jumlahcostumermanager ?>
			</div>
			<h3>Customers </h3>
			<p>total keseluruhan customers '<?php echo $cabang ?>'.</p>
		</div>

	</div>

	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-red">
			<div class="icon">
				<i class="entypo-user"></i>
			</div>
			<div class="num">
				<?php echo $jumlahcostumermanagertahun ?>
			</div>
			<h3>Customers this Year</h3>
			<p>total keseluruhan customers '<?php echo $cabang ?>' tahun ini .</p>
		</div>

	</div>

	<div class="clear visible-xs"></div>

	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-green">
			<div class="icon">
				<i class="entypo-user"></i>
			</div>
			<div class="num">
				<?php echo $jumlahcostumermanagerbulan ?>
			</div>
			<h3>Customers this Month</h3>
			<p>total keseluruhan customers '<?php echo $cabang ?>' bulan ini.</p>
		</div>

	</div>

	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-aqua">
			<div class="icon">
				<i class="entypo-user"></i>
			</div>
			<div class="num">
				<?php echo $jumlahcostumermanagerhari ?>
			</div>

			<h3>Customers this Day</h3>
			<p>total keseluruhan customers '<?php echo $cabang ?>' hari ini.</p>
		</div>

	</div>
</div>
<br />

<div class="row">
	<div class="col-sm-8">

		<div class="panel panel-primary" id="charts_env">

			<div class="panel-heading">
				<div class="panel-title">Number of Customers  '<?php echo $cabang ?>'</div>

				<div class="panel-options">
					<ul class="nav nav-tabs">
						<li class="">
							<a href="#line-chart2" data-toggle="tab">Years</a>
						</li>
						<li class="active">
							<a href="#line-chart" data-toggle="tab">This Year</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="panel-body">
			
				<div class="tab-content">
			    	<div class="tab-pane" id="line-chart2">	
						<div id="line-chart-demo2" class="morrischart" style="height: 320px"></div>
					</div>
					<div class="tab-pane active" id="line-chart">
						<div id="line-chart-demo" class="morrischart" style="height: 320px"></div>
					</div>
				</div>

			</div>

			<table class="table table-bordered table-responsive">

				<thead>
					<tr>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Number of Customers</div>
								<small><?php echo $jumlahcostumer ?></small>
							</div>
							<span class="pull-right pageviews">4,3,5,4,5,6,5</span>

						</th>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Number of Unique Customers</div>
								<small><?php echo $jumlahcostumerunique ?></small>
							</div>
							<span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
						</th>
					</tr>
				</thead>

			</table>

		</div>

	</div>
	<div class="col-sm-4">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Top 10 Customers</div>
			</div>
			<div class="panel-body">
						<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th>#</th>
									<th>Costumer</th>
									<th>Number Phone</th>
									<th>Jumlah</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$i=1;
									foreach($top10custumer->result_array() as $row){
										echo "<tr>
												<td>".$i."</td>
												<td>".$row['namacostumer']."</td>
												<td>".$row['nohp']."</td>
												<td>".$row['jumlah']."</td>
											 </tr>
										";
										$i++;
									}
								?>
							</tbody>
						</table>
					</div>
			</div>



	</div>
</div>


<br />

<div class="row">

	<div class="col-sm-6">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">TOP 10 Helper/Promotor '<?php echo $cabang ?>'</div>

				<div class="panel-options">
					<ul class="nav nav-tabs">
						<li class="">
							<a href="#tabel1" data-toggle="tab">All </a>
						</li>
						<li class="active">
							<a href="#tabel2" data-toggle="tab">This Year</a>
						</li>
						<li class="">
							<a href="#tabel3" data-toggle="tab">This Month</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="panel-body">

				<div class="tab-content">

					<div class="tab-pane  table-responsive" id="tabel1">
					<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th>#</th>
									<th>Username</th>
									<th>Nama</th>
									<th>Jabatan</th>
									<th>Cabang</th>
									<th>Jumlah</th>
								</tr>
							</thead>

							<tbody>
								<?php
								   $i=1;
									foreach($top10helper->result_array() as $row) {
										echo "<tr>
												<td>".$i."</td>
												<td>".$row['username']."</td>
												<td>".$row['namahelper']."</td>
												<td>".$row['jabatan']."</td>
												<td>".$row['cabang']."</td>
												<td>".$row['jumlah']."</td>
											 </tr>
											";
										$i++;
									}
								?>
							</tbody>
						</table>
					</div>

					<div class="tab-pane active  table-responsive" id="tabel2">
						<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th>#</th>
									<th>Username</th>
									<th>Nama</th>
									<th>Jabatan</th>
									<th>Cabang</th>
									<th>Jumlah</th>
								</tr>
							</thead>

							<tbody>
								<?php
								   $i=1;
									foreach($top10helpertahun->result_array() as $row) {
										echo "<tr>
												<td>".$i."</td>
												<td>".$row['username']."</td>
												<td>".$row['namahelper']."</td>
												<td>".$row['jabatan']."</td>
												<td>".$row['cabang']."</td>
												<td>".$row['jumlah']."</td>
											 </tr>
											";
										$i++;
									}
								?>
							</tbody>
						</table>
					</div>

					<div class="tab-pane  table-responsive" id="tabel3">
						<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>Username</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th>Cabang</th>
										<th>Jumlah</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$i=1;
										foreach($top10helperbulan->result_array() as $row) {
											echo "<tr>
													<td>".$i."</td>
													<td>".$row['username']."</td>
													<td>".$row['namahelper']."</td>
													<td>".$row['jabatan']."</td>
													<td>".$row['cabang']."</td>
													<td>".$row['jumlah']."</td>
												</tr>
												";
											$i++;
										}
									?>
								</tbody>
							</table>
					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="col-sm-6">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Number of Branching Customers</div>

				<div class="panel-options">
					<ul class="nav nav-tabs">
						<li class="">
							<a href="#tabel1a" data-toggle="tab">All</a>
						</li>
						<li class="active">
							<a href="#tabel2a" data-toggle="tab">This Year</a>
						</li>
						<li class="">
							<a href="#tabel3a" data-toggle="tab">This Month</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="panel-body">

				<div class="tab-content">

					<div class="tab-pane  table-responsive" id="tabel1a">
					<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>Cabang</th>
										<th>Jumlah Costumer</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$i=1;
										foreach($cabangtop->result_array() as $row) {
											echo "<tr>
													<td>".$i."</td>
													<td>".$row['cabang']."</td>
													<td>".$row['jumlah']."</td>
												</tr>
												";
											$i++;
										}
									?>
								</tbody>
							</table>
					</div>

					<div class="tab-pane active  table-responsive" id="tabel2a">
						<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>Cabang</th>
										<th>Jumlah Costumer</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$i=1;
										foreach($cabangtoptahun->result_array() as $row) {
											echo "<tr>
													<td>".$i."</td>
													<td>".$row['cabang']."</td>
													<td>".$row['jumlah']."</td>
												</tr>
												";
											$i++;
										}
									?>
								</tbody>
							</table>
					</div>

					<div class="tab-pane  table-responsive" id="tabel3a">
					<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>Cabang</th>
										<th>Jumlah Costumer</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$i=1;
										foreach($cabangtopbulan->result_array() as $row) {
											echo "<tr>
													<td>".$i."</td>
													<td>".$row['cabang']."</td>
													<td>".$row['jumlah']."</td>
												</tr>
												";
											$i++;
										}
									?>
								</tbody>
							</table>
					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<br />



<!-- Footer -->
<footer class="main">

	&copy;
	<?php echo date('Y') ?>
	<strong>Gadgetmart</strong> IT

</footer>

</div>




<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/rickshaw/rickshaw.min.css">

<!-- Bottom scripts (common) -->
<script src="<?php echo base_url() ?>assets/back-end/js/gsap/TweenMax.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/joinable.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/resizeable.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/neon-api.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


<!-- Imported scripts on this page -->
<script src="<?php echo base_url() ?>assets/back-end/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/rickshaw/vendor/d3.v3.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/raphael-min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/morris.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/toastr.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="<?php echo base_url() ?>assets/back-end/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="<?php echo base_url() ?>assets/back-end/js/neon-demo.js"></script>

</body>

</html>
