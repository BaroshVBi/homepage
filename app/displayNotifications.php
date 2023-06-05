<?php
	include("config.php");
	$sql = "SELECT * FROM notifications ORDER BY id DESC LIMIT 10";		
	$result = $db->query($sql);
	$count = mysqli_num_rows($result);
	
	if($count > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "<div class='col-12 notify_tab'>" . $row['id'] . $row['user_id'] . $row['title'] . $row['descr'] . $row['date'] . $row['time'] . "</div>";
		}
		echo "<div id='notify_tab_controls' class='col-12'><div class='col-1 center cursor_pointer' onclick='showMonth(1)'>&#10094;</div>";
		for($i = 1; $i <= $count; $i++ ){
			echo "<div class='col-1 center cursor_pointer notify_tab_dot'>dot</div>";
		}
		echo "<div class='col-1 center cursor_pointer' onclick='showMonth(1)'>&#10095;</div></div>";
	} 
	else {
		echo "<div style='text-align:center;'>Brak Wydarzeń</div>";
	}
?>