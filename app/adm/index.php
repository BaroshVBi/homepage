<html>
	<head>
		<?php 
			//include("session.php");
			include("../config.php");
		?>
		<link rel="stylesheet" href="style.css">
		<!-- <link rel="icon" type="image/x-icon" href="public/icons/logo.png"> -->
		<meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv='Cache-control' content='no-store'>
		<!-- <script src="public/jquery-3.6.3.min.js"></script> -->
		<!-- <script src="public/script.js"></script> -->
	</head>
	<body>
		<?php 
			$sql = "SELECT * FROM apps";
			$result = mysqli_query($db,$sql);
			if ($result -> num_rows > 0) {
				$string_table = "<table class='tableStyle'>";

				while ($row = $result -> fetch_assoc()) {
					//echo $row['app_name'] . "<br>";
					$string_table = $string_table 
					. "<tr>"
						. "<td rowspan='7'>"
							. "<div class='app_tile' style='background-image: url(../public/logo/" . $row["app_bg_link"] . "); background-color:#" . $row['app_bg_color'] . "'>"
								. "<img class='app_logo' src='../public/logo/" . $row['app_logo_link'] . "'>"
								. "<div class ='app_name'>" . $row['app_name'] . "</div>"
							. "</div>"
						. "</td>"
						. "<td>id</td>"
						. "<td>" . $row['id'] . "</td>"
					. "</tr>"
					. "<tr>"
						. "<td>app_name</td>"	
						. "<td>" . $row['app_name'] . "</td>"
					. "</tr>"
					. "<tr>"
						. "<td>app_category_id</td>"	
						. "<td>" . $row['app_category_id'] . "</td>"
					. "</tr>"
					. "<tr>"
						. "<td>app_link</td>"	
						. "<td>" . $row['app_link'] . "</td>"
					. "</tr>"
					. "<tr>"
						. "<td>app_logo_link</td>"	
						. "<td>"
							. "<img class='borderblack app_logo2 padding5' src='../public/logo/" . $row['app_logo_link'] . "' style='background-color:#" . $row['app_bg_color'] . "'>" 
							. "<img class='borderblack app_logo2 padding5' src='../public/logo/" . $row['app_logo_link'] . "'>" 
							. " - " . $row['app_logo_link'] 
						. "</td>"
					. "</tr>"
					. "<tr>"
						. "<td>app_bg_link</td>"	
						. "<td>" . returnBGIMG($row['app_bg_link']) . " - " . $row['app_bg_link'] . "</td>"
					. "</tr>"
					. "<tr>"
						. "<td>app_bg_color</td>"	
						. "<td><input type='color' value='#" . $row['app_bg_color'] . "' > - #" . $row['app_bg_color'] . "</td>"
					. "</tr>"
					. "<tr>"
						. "<td colspan='3' style='height: 20px; background-color:lightgrey'></td>"
					. "</tr>";
				}
				echo $string_table . "</table>";
			}

			function returnBGIMG($string) {
				if ($string == "") {
					return "";
				} else {
					return "<img class='borderblack app_logo2' src='../public/logo/" . $string . "'>";
				}
			}
		?>
	</body>
</html>