<?php
	include("config.php");
	
	$tab_weekday = array("Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota");
	
	$id = $_REQUEST["id"];
	$date = strtotime($id);
	echo "<div id='calendar_week_day' class='col-12'>" . $tab_weekday[idate('w', $date)] . "</br>" . idate('d', $date) . "." . idate('m', $date) . "." . idate('Y', $date) . "</div>";
	$sql = "SELECT id, time, title FROM calendar WHERE (date = '" . $id . "') ORDER BY calendar.time ASC";		
	$result = $db->query($sql);
	$count = mysqli_num_rows($result);
	
	echo "<div id='calendar_events' class='col-12'>";
	if($count > 0){
		while ($row = $result->fetch_row()) {
			echo "<div class='col-12 event_button' onClick='eventDetails(" . $row[0] . ", this)'>" . date('H:i', strtotime($row[1])) . " | " . $row[2] . "</div>";
		}
	} 
	else {
		echo "<div style='text-align:center;'>Brak Wydarzeń</div>";
	}
	echo "</div>"
?>