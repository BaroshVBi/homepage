<?php
	include("config.php");
	require_once("functions.php");
	
	$tab_weekday = array("Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota");
	
	$id = $_REQUEST["id"];
	$date = strtotime($id);
	echo "<div id='calendar_week_day' class='col-12'>" . $tab_weekday[idate('w', $date)] . "</br>" . returnDate($id) . "</div>";
	$sql = "SELECT id, time, title FROM calendar WHERE (date = '" . $id . "') ORDER BY calendar.time ASC";		
	$result = $db->query($sql);
	$count = mysqli_num_rows($result);
	
	echo "<div class='col-12' style='padding-bottom:0'><div id='add_event_button' class='hor_center' onClick=\"redirect('eventManager.php?new_event_date=" . $id . "')\"><b>+ Dodaj Wydarzenie</b></div></div>";
	echo "<table id='calendar_events' class='col-12' style='padding-top:0'>";
	if($count > 0){
		while ($row = $result->fetch_assoc()) {
			echo "<tr class='event_button' onClick='eventDetails(" . $row['id'] . ")'><th style='width:20%'>" . date('H:i', strtotime($row['time'])) . "</th><th style='width:80%'>" . $row['title'] . "</th></tr>";
		}
	} 
	else {
		//echo "<tr class='event_button'><th colspan='2' style='text-align:center;'>Brak Wydarzeń</th></tr>";
	}
	echo "</table>"
?>