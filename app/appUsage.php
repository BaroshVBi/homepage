<?php
	include("config.php");
	require_once("functions.php");

	$sql = "SELECT * FROM apps ORDER BY apps.app_usage DESC LIMIT 5";
	$result = mysqli_query($db,$sql);
	
	echo "<div class='db_apps_title col-12'>Najczęściej Używane Aplikacje</div>";
	echo "<div class='db_apps_container col-12'>";
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<div class='apptile col-15'>
					<a target='_blank' href='" . $row["app_link"] . "' onClick='recentAppsUpdate(" . $row["id"] .")'>
						<div class='logo' style='background-image: url(public/logo/" . $row["app_bg_link"] . ");background-color:#" . $row["app_bg_color"] . "'>
							<img src='public/logo/" . $row["app_logo_link"] . "'>
							<div class='tytul'><p>" . $row["app_name"] . "</p></div>
						</div>
					</a>
				</div>";
		}
	}
	echo "</div>";
?>