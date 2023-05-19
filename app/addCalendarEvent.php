<?php
	include("session.php");
	include("config.php");

	$date = $_REQUEST["date"];
	$time = $_REQUEST["time"];
	$user_login = $_SESSION["user_login"];
	$user_dn = $_SESSION["user_dn"];
	$title = $_REQUEST["title"];
	$descr = $_REQUEST["descr"];
	
	if(isset($date) && isset($time) && isset($title) && isset($descr)) {
		$sql = "INSERT INTO calendar (date, time, user_login, user_dn, title, descr) VALUES ('" . $date . "', '" . $time . "', '" . $user_login . "', '" . $user_dn . "', '" . $title . "', '" . $descr . "')";
		$result = mysqli_query($db,$sql);
		echo "Dodano event";
	} else {
		echo "Brak danych";
	}
?>