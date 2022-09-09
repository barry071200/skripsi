<?php

$dataPoints = array();
foreach($tm as $dt)

  array_push($dataPoints, array("label"=>"Karyawan", "y"=>$dt['jumlah_karyawan']));
  array_push($dataPoints, array("label"=>"Unit", "y"=>$dt['jumlah_unit']));
  array_push($dataPoints, array("label"=>"Timesheet", "y"=>$dt['jumlah_timesheet']));

 ?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Daftar Jumlah Master"
	},
	subtitles: [{
		text: "November 2017"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
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