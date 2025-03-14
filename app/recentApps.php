<?php 
	include("config.php");
	require_once("functions.php");
	@session_start();
	
	if(isset($_SESSION['recent_apps'])){
		echo "<div class='col-6'><div class='db_apps dmenu col-12 box_shadow'>";
		echo "<div class='db_apps_title col-12'>Ostatnio Używane Aplikacje</div>";
		echo "<div class='db_apps_container col-12'>";
		for($i = 0; $i <= 3; $i++) {
			$sql = "SELECT * FROM apps WHERE id=" . $_SESSION['recent_apps'][$i];
			$result = mysqli_query($db,$sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo "<div class='apptile col-3'>
							<a target='_blank' href='" . $row["app_link"] . "' onClick='recentAppsUpdate(" . $row["id"] .")'>
								<div class='logo' style='background-image: url(public/logo/" . $row["app_bg_link"] . ");background-color:#" . $row["app_bg_color"] . "'>
									<img src='public/logo/" . $row["app_logo_link"] . "'>
									<div class='tytul'><p>" . $row["app_name"] . "</p></div>
								</div>
							</a>
						</div>";
				}
			}
		}
		echo "</div></div></div>";
	}
?>