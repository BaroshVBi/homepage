<?php 
	include("config.php");
	$sql1 = "SELECT * FROM categories";
	$result1 = mysqli_query($db,$sql1);
	$count = mysqli_num_rows($result1);
	
	if($count > 0) {
		while($row1 = $result1->fetch_assoc()) {
			$html_id = "" . $row1["id"] . $row1["name"] . "";
			echo "<div class='category_button col-12' onClick=\"collapse('$html_id', this);\">" . $row1["name"] . "</div><div id='" . $html_id . "' class='container col-12' style='max-height:100%;'>";
			
			$sql = "SELECT * FROM apps WHERE app_category_id=" . $row1["id"];
			$result = mysqli_query($db,$sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo "<div class='apptile col-14'>
							<a target='_blank' href='" . $row["app_link"] . "' onClick='recentAppsUpdate(" . $row["id"] .")'>
								<div class='logo' style='background-image: url(public/logo" . $row["app_bg_link"] . ");background-color:#" . $row["app_bg_color"] . "'>
									<img src='public/logo/" . $row["app_logo_link"] . "'>
									<div class='tytul'><p>" . $row["app_name"] . "</p></div>
								</div>
							</a>
						</div>";
				}
			}
			echo "</div>";
		}
	}
?>