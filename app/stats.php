<html>
	<head>
		<link rel="stylesheet" href="public/style.css">
		<link rel="icon" type="image/x-icon" href="public/icons/logo.png">
		<meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv='Cache-control' content='no-store'>
	</head>
	<body>
		<?php
			include("config.php");
			require_once("functions.php");

			$sql = "select id, app_name, app_usage from apps order by app_usage desc";
			$result = mysqli_query($db,$sql);
			
			echo "<table id='stats'>";
			echo "<tr><th>ID</th><th>NAZWA APKI</th><th>KLIKNIĘĆ</th></tr>";
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo "	<tr>
								<th>" . $row["id"] . "</th>
								<th>" . $row["app_name"] . "</th>
								<th>" . $row["app_usage"] . "</th>
							</tr>";
				}
			}
			echo "</table>";
		?>
	</body>
</html>