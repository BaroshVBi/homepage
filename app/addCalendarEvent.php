<?php
	include("session.php");
	include("config.php");

	$date = $_REQUEST["date"];
	$time = $_REQUEST["time"];
	$title = $_REQUEST["title"];
	$descr = $_REQUEST["descr"];
	$user_login = $_SESSION["user_login"];
	
	$sql = "SELECT id, config_recent_apps FROM users WHERE (user_login = '" . $user_login . "')";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);
	if($count > 0) {
		while ($row = $result->fetch_assoc()) { 
			$id = $row['id'];
		}
	}
	
	if(isset($date) && isset($time) && isset($title) && isset($id)) {
		if($date != "" && $time != "" && $title != "" && $id != "") {
			$sql = "INSERT INTO calendar (date, time, user_id, title, descr) VALUES ('" . $date . "', '" . $time . "', '" . $id . "', '" . $title . "', '" . $descr . "')";
			$result = mysqli_query($db,$sql);
			echo "Dodano Wydarzenie do Kalendarza";
		} else {
			echo "Wypełnij Formularz";
		}
	} else {
		echo "Wypełnij Formularz";
	}
?>