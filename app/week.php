<?php
	include("config.php");
	$tab_weekday = array("Ndz", "Pon", "Wt", "Śr", "Czw", "Pt", "Sob");
	
	$firstday = mktime(0, 0, 0, idate('m'), idate('d'), idate('Y'));
	
	echo "<div class='week_days_names col-12 padding_0 text_center'>";
	for($i = 0; $i <= 6; $i++) {
		$date = mktime(0, 0, 0, idate('m', $firstday), idate('d', $firstday) + $i, idate('Y', $firstday));
		echo "<div class='col-13 border_right'>" . $tab_weekday[idate('w', $date)] . ".</div>";
	}
	echo "</div>";
	
	echo "<div class='col-12 padding_0 text_center' style='height: 85%;'>";
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
	echo "</div>";
	
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