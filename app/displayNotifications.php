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
						<div class='notify_title'>" . $row['title'] . "<div>" . returnDate($row['date']) . "</div></div>
						<div class='notify_title' style='height: 5%;'></div>
						<div class='notify_descr'>" . $row['descr'] . "</div>
					</div>";
		}
		echo "</div></div><div id='notify_tab_controls' class='col-12'><div class='col-1 cursor_pointer' onclick=''>&#10094;</div>";
		for($i = 1; $i <= $count; $i++ ){
			echo "<div class='col-1 cursor_pointer notify_tab_dot' onClick='notifyTab(this);'>O</div>";
		}
		echo "<div class='col-1 cursor_pointer' onclick=''>&#10095;</div></div>";
	} 
	else {
		echo "<div style='text-align:center;'>Brak Wydarzeń</div>";
	}
?>