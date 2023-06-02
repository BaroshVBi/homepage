<?php
	include("config.php");

	$firstday = mktime(0, 0, 0, idate('m'), idate('d'), idate('Y'));
	
	for($i = 0; $i <= 6; $i++) {
		$date = mktime(0, 0, 0, idate('m', $firstday), idate('d', $firstday) + $i, idate('Y', $firstday));
		$d = idate('d', $date);
		$m = idate('m', $date);
		$r = idate('Y', $date);
		$fdate = $r . "-" . $m . "-" . $d;
		
		$sql = "SELECT id FROM calendar WHERE (date = '" . $fdate . "')";
		$result = mysqli_query($db,$sql);
		$count = mysqli_num_rows($result);
		
		echo "<div id=" . $fdate . " class='daytile col-13 border_right' onClick='focusTile(this.id)'><span>" . $d . "</span>" . dot($count) . "</div>";
	}
	
	function dot($count) {
		if($count > 0) {
			if ($count > 9) {
				return "<div class='dot text_center'><p class='ver_center' style='font-size:1vw;'>+9</p></div>";
			} else {
				return "<div class='dot'><p>" . $count . "</p></div>";
			}
		}
	}
?>