<?php
	include("config.php");
	
	$id = $_REQUEST["id"];
	$sql = "SELECT * FROM calendar WHERE (id = '" . $id . "')";		
	$result = $db->query($sql);
	$count = mysqli_num_rows($result);
	
	if($count > 0){
		while ($row = $result->fetch_row()) {
			echo "<div id='event_details_title' class='col-12'><div class='col-11 height100'>" . date('H:i', strtotime($row[2])) .  " | " . $row[4] .  " </div><div class='col-1 height100' onClick=closeSlideIn();>X</div></div>";
			echo "<div id='event_details_content' class='col-12'>" . $row[3] .  " | " . $row[4] .  " | " . $row[5] . "</div>";
		}
	} 
?>