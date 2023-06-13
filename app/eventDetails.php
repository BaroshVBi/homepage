<?php
	include("config.php");
	include("functions.php");
	
	$id = $_REQUEST["id"];
	$sql = "SELECT * FROM calendar WHERE (id = '" . $id . "')";		
	$result = $db->query($sql);
	$count = mysqli_num_rows($result);
	
	if($count > 0){
		while ($row = $result->fetch_assoc()) {
			echo "	<div id='event_details_title' class='col-12'>
						<div class='col-11 ver_center text_center'>Informacje o Wydarzeniu</div>
						<div class='col-1 cursor_pointer' onClick=closeSlideIn();>✖</div>
					</div>";
					
			echo "	<div id='event_details_content' class='col-12'>
						<table>
							<tr>
								<th>Tytuł:</th>
								<th>" . $row['title'] . "</th>
							</tr>
							<tr>
								<th>Opis:</th>
								<th>" . $row['descr'] . "</th>
							</tr>
							<tr>
								<th>Data:</th>
								<th>" . returnDate($row['date']) . "</th>
							</tr>
							<tr>
								<th>Godzina:</th>
								<th>" . date('H:i', strtotime($row['time'])) . "</th>
							</tr>
							<tr>
								<th>Użytkownik:</th>
								<th>" . $row['user_id'] . "</th>
							</tr>
						</table>
					</div>";
		}
	} 
?>