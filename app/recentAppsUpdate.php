<?php 
	include("config.php");
	require_once("functions.php");
	session_start();
	
	$id = $_REQUEST["id"];
	if(isset($_SESSION['recent_apps'])){
		//echo json_encode($_SESSION['recent_apps']);
		$recent_apps = $_SESSION['recent_apps'];
		
		for($i = 0; $i < 4; $i++) {
			if($recent_apps[$i] == $id) {
				break;
			}
		}
		
		for($j = $i; $j > 0; $j--) {
			$recent_apps[$j] = $recent_apps[$j - 1];
		}
		
		$recent_apps[0] = $id;
		$_SESSION['recent_apps'] = $recent_apps;
		$sql = "UPDATE users SET config_recent_apps = '" . json_encode($recent_apps) . "' WHERE users.user_login = '" . $_SESSION['user_login'] . "'";
		$result = mysqli_query($db,$sql);
	}
?>