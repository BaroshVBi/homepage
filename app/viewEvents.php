<?php 
	include("config.php");
	require_once("functions.php");
	
	//$id = $_SESSION["user_id"];
	
	$sql = "SELECT * FROM calendar WHERE user_id = '" . $_SESSION["user_id"] . "'";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);
	if($count > 0) {
		while ($row = $result->fetch_assoc()) { 
			echo "	<div class='col-12'>
						<table class='col-12'>
							<tr>
								<th>#" . $row["id"] . "</th>
								<th>" . returnDate($row["date"]) . "</th>
								<th>" . date('H:i', strtotime($row['time'])) . "</th>
							</tr>
							<tr>
								<th>Tytuł:</th>
								<th colspan='2'>" . $row["title"] . "</th>
							</tr>
							<tr>
								<th>Opis:</th>
								<th colspan='2'>" . $row["descr"] . "</th>
							</tr>
						</table>
					</div>";
		}
	}
?>