<?php
	include("config.php");
	require_once("functions.php");
	$tab_weekday = array("Ndz", "Pon", "Wt", "Śr", "Czw", "Pt", "Sob");
	
	$firstday = mktime(0, 0, 0, idate('m'), idate('d'), idate('Y'));
	
	echo "	<div id='week_controls' class='col-12'>
				<div><b>&nbsp; Tydzień &nbsp;</b></div>
				<div><b>&nbsp; Wydarzenia &nbsp;</b></div>
			</div>";
			
	echo "<div id='week_wrapper'>";
	echo "<div id='week_wrapper_table'>";
	echo "<div class='week_tabs'>";
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
		
		echo "<div class='daytile col-13 border_right " . (($i == 0) ? "focustile" : "") . "' onClick=\"focusTileWeek('$fdate')\"><span>" . $d . "</span>" . dot($count) . "</div>";
	}
	echo "</div>";
	echo "</div>";
	echo "<div class='week_tabs'>";
	echo "content";
	echo "</div>";
	echo "</div>";
	echo "</div>";
?>