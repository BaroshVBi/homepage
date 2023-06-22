<?php 
	@include("session.php");
	include("config.php");
	require_once("functions.php");
	
	//$id = $_SESSION["user_id"];
	
	$sql = "SELECT * FROM calendar WHERE user_id = '" . $_SESSION["user_id"] . "'";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);
	if($count > 0) {
		while ($row = $result->fetch_assoc()) { 
			echo "	<div class='view_events col-12'>
						<table class='col-12'>
							<tr>
								<th style='width:20%'>#" . $row["id"] . "</th>
								<th style='width:30%'>" . returnDate($row["date"]) . "</th>
								<th style='width:30%'>" . date('H:i', strtotime($row['time'])) . "</th>
								<th class='cursor_pointer' style='width:20%' onClick='deleteEvent(" . $row["id"] . ")'>Usuń</th>
							</tr>
							<tr>
								<th style='width:20%'>Tytuł:</th>
								<th colspan='3' style='width:80%; font-weight: 100; text-align: left;'>" . $row["title"] . "</th>
							</tr>
							<tr>
								<th style='width:20%'>Opis:</th>
								<th colspan='3' style='width:80%; font-weight: 100; text-align: left;'>" . $row["descr"] . "</th>
							</tr>
						</table>
					</div>";
		}
	}
?>