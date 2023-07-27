<html>
	<head>
	</head>
	<body>
		<div class="search_div col-4 hor_center">
			<input id="search_contact" class="searchbar" onkeyup="search(this.id, 'search_contact')" type="text" name="search" placeholder="Wyszukaj...">
			<input type="image" class="searchbar_icon" src="public/icons/search.png"/>
		</div>
		<?php 
			use Shuchkin\SimpleXLSX;
			require_once("SimpleXLSX.php");
			
			//Wewnetrzne
			if ($xlsx = SimpleXLSX::parse('public/contact/contactList.xlsx')) {
				$names =  $xlsx->rows(0);
				$count_rows = count($names);
				for($i = 0; $i < $count_rows; $i++) {
					$names_array[$names[$i][0]] = $names[$i][1];
				}
				
				echo "<table class='contact_list'>";
				for($j = 1; $j <= $count_rows; $j++) {
					$sheet = $xlsx->rows($j);
					$sheetName = $xlsx->sheetName($j);
					
					echo "<tr><td id='" . $sheetName . "_" . $j . "' colspan=5><b>" . $names_array[$sheetName] . "</b></td></tr>";
					for($i = 0; $i < count($sheet); $i++)
					{
						echo "	<tr class='search_contact'>
									<th>" . $sheet[$i][1] . "</th>
									<th>" . $sheet[$i][0] . "</th>
									<th title='" . $sheet[$i][3] . "'><b>" . substr($sheet[$i][3], -3) . "</b></th>
									<th style='border-right: none; padding-right: 0;'><a href='mailto:" . $sheet[$i][2] . "'><input type='image' class='mail_icon' src='public/icons/mail.png'/></a></th>
									<th style='border-left: none; text-align: left;'>" . $sheet[$i][2] . "</th>
								</tr>";
					}
				}
				echo "</table>";
			} else {
				echo SimpleXLSX::parseError();
			}
			
			//Inne
			if ($xlsx = SimpleXLSX::parse('public/contact/contactListOther.xlsx')) {
				$names =  $xlsx->rows(0);
				$count_rows = count($names);
				for($i = 0; $i < $count_rows; $i++) {
					$names_array[$names[$i][0]] = $names[$i][1];
				}
				
				echo "<table class='contact_list'>";
				for($j = 1; $j <= $count_rows; $j++) {
					$sheet = $xlsx->rows($j);
					$sheetName = $xlsx->sheetName($j);
					
					echo "<tr><td id='" . $sheetName . "_" . $j . "' colspan=5><b>" . $names_array[$sheetName] . "</b></td></tr>";
					for($i = 0; $i < count($sheet); $i++)
					{
						echo "	<tr class='search_contact'>
									<th>" . $sheet[$i][0] . "</th>
									<th>" . $sheet[$i][1] . "</th>
									<th>" . $sheet[$i][2] . "</th>
									<th>" . $sheet[$i][3] . "</th>
								</tr>";
					}
				}
				echo "</table>";
			} else {
				echo SimpleXLSX::parseError();
			}
		?>
	</body>
</html>