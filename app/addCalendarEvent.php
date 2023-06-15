<?php
	include("session.php");
	include("config.php");

	$date = $_REQUEST["date"];
	$time = $_REQUEST["time"];
	$title = $_REQUEST["title"];
	$descr = $_REQUEST["descr"];
	$id = $_SESSION["user_id"];
	
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