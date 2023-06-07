<?php
	include("config.php");
	require_once("functions.php");
	
	$m = $_REQUEST["m"];
	$firstday = mktime(0, 0, 0, idate('m') + $m, 1, idate('Y'));
	$currentmonth = idate('m', $firstday);
	
	while(idate('w', $firstday) != 1) {
		$firstday = mktime(0, 0, 0, idate('m', $firstday), idate('d', $firstday) - 1, idate('Y', $firstday));
	}
	
	for($i = 0; $i <= 41; $i++) {
		$date = mktime(0, 0, 0, idate('m', $firstday), idate('d', $firstday) + $i, idate('Y', $firstday));
		$d = idate('d', $date);
		$m = idate('m', $date);
		$r = idate('Y', $date);
		$fdate = $r . "-" . $m . "-" . $d;
		
		$sql = "SELECT id FROM calendar WHERE (date = '" . $fdate . "')";
		$result = mysqli_query($db,$sql);
		$count = mysqli_num_rows($result);
		
		echo "<div id=" . $fdate . " class='" . greyout($m, $currentmonth) . " daytile col-13 border_right' onClick='focusTile(this.id)'><span>" . $d . "</span>" . dot($count) . "</div>";
	}
?>