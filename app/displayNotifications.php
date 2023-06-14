<?php
	include("config.php");
	require_once("functions.php");
	
	$sql = "SELECT * FROM notifications ORDER BY id DESC LIMIT 10";		
	$result = $db->query($sql);
	$count = mysqli_num_rows($result);
	
	if($count > 0) {
		echo "<div id='notify_tab_area' class='col-12'><div id='notify_tab_table' style='width:" . $count * 100 . "%'>";
		while ($row = $result->fetch_assoc()) {
			echo "	<div class='notify_tab'>
						<div class='notify_title'>
							<div>Dodano przez: " . returnUserDN($row['user_id']) . ", " . returnDate($row['date']) . "</div>
							<div title='" . $row['title'] . "'>" . $row['title'] . "</div>
						</div>
						<div style='height: 5%;'></div>
						<textarea class='notify_descr' readonly rows='6' wrap='soft'>" . $row['descr'] . "</textarea>
					</div>";
		}
		echo "</div></div><div id='notify_tab_controls' class='col-12'>";
		for($i = 1; $i <= $count; $i++ ){
			echo "<div class='cursor_pointer notify_tab_dot' onClick='notifyTab(this);'><div class='hor_center' " . (($i == 1) ? "style='background-color: #6e79f3'" : "") . "></div></div>";
		}
		echo "</div>";
	} 
	else {
		echo "<div style='text-align:center;'>Brak Wydarzeń</div>";
	}
?>