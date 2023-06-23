<?php
	include("session.php");
	include("config.php");

	$date = date("Y-m-d");
	$time = date("H:i");
	$title = $_REQUEST["title"];
	$descr = $_REQUEST["descr"];
	$id = $_SESSION["user_id"];
	
	if(isset($date) && isset($time) && isset($title) && isset($id) && isset($descr)) {
		if($date != "" && $time != "" && $title != "" && $id != "" && $descr != "") {
			$sql = "INSERT INTO notifications (date, time, user_id, title, descr) VALUES ('" . $date . "', '" . $time . "', '" . $id . "', '" . $title . "', '" . $descr . "')";
			$result = mysqli_query($db,$sql);
			echo "Dodano Powiadomienie";
		} else {
			echo "Wypełnij Formularz";
		}
	} else {
		echo "Wypełnij Formularz";
	}
?>