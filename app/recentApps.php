<?php 
	include("config.php");
	require_once("functions.php");
	@session_start();
	
	if(isset($_SESSION['recent_apps'])){
		//echo json_encode($_SESSION['recent_apps']);
	
		for($i = 0; $i <= 4; $i++) {
			$sql = "SELECT * FROM apps WHERE id=" . $_SESSION['recent_apps'][$i];
			$result = mysqli_query($db,$sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo "<div class='apptile col-15'>
							<a target='_blank' href='" . $row["app_link"] . "' onClick='recentAppsUpdate(" . $row["id"] .")'>
								<div class='logo' style='background-image: url(public/logo" . $row["app_bg_link"] . ");background-color:#" . $row["app_bg_color"] . "'>
									<img src='public/logo/" . $row["app_logo_link"] . "'>
									<div class='tytul'><p>" . $row["app_name"] . "</p></div>
								</div>
							</a>
						</div>";
				}
			}
		}
	}
?>