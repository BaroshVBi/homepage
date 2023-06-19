<?php 
	include("session.php");
	include("config.php");
	require_once("functions.php");

	$id = $_REQUEST["id"];

	$sql = "DELETE FROM notifications WHERE (notifications.id = " . $id . " AND notifications.user_id = " . $_SESSION["user_id"] . ")";
	$result = mysqli_query($db,$sql);
?>