<?php

$dataPoints = array();
foreach ($tm as $dt)

	array_push($dataPoints, array("label" => "IPK", "y" => $dt['max']));

?>
<!DOCTYPE HTML>
<html>

<head>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3> <?php echo $karyawan ?></h3>

							<p>Jumlah Karyawan</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="<?php echo site_url('karyawan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo $unit ?><sup style="font-size: 20px"></sup></h3>

							<p>Jumlah Unit</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?php echo site_url('unit') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?php echo $timesheet ?></h3>

							<p>Jumlah Timesheet</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="<?php echo site_url('timesheet') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<?php foreach ($jam as $dt) : ?>
								<h3><?php echo $dt['jam']; ?></h3>
							<?php endforeach ?>
							<p>Total Jam</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<script>
				window.onload = function() {

					var chart = new CanvasJS.Chart("chartContainer", {
						animationEnabled: true,
						theme: "light2", // "light1", "light2", "dark1", "dark2"
						title: {
							text: "Masih dalam Tahap Pengembangan"
						},
						axisY: {
							title: "Number of Apps"
						},
						data: [{
							type: "column",
							dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
						}]
					});
					chart.render();

				}
			</script>
</head>

<body>
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>