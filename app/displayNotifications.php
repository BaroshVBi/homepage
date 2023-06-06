<?php
	include("config.php");
	$sql = "SELECT * FROM notifications ORDER BY id DESC LIMIT 10";		
	$result = $db->query($sql);
	$count = mysqli_num_rows($result);
	
	if($count > 0) {
		echo "<div id='notify_tab_area' class='col-12'><div id='notify_tab_table' style='width:" . $count * 100 . "%'>";
		while ($row = $result->fetch_assoc()) {
			echo "<div class='notify_tab'>" . $row['id'] . $row['user_id'] . $row['title'] . $row['descr'] . $row['date'] . $row['time'] . "</div>";
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