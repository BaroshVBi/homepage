<html>
	<head>
		<style>
			.contact_list {
				width: 100%;
				border: solid 1px black;
				border-spacing: 0;
				margin: auto;
			}
			.contact_list td, .contact_list th{
				border: solid 1px black;
				padding: 10px;
				text-align: center;
				font-weight: 100;
			}
			.contact_list td {
				font-size: 150%;
				background-color: #6e79f3;
				color: white;
			}
			.contact_list th:last-child {
				text-align: center;
			}
			#searchbar {
				border: none;
				width: calc(100% - 3vw);
				height: 2vw;
				margin-left: 1vw;
				float: left;
				outline: none;
			}
			#searchbar_icon {
				padding: 0.5vw;
				height: 2vw;
				float: left;
			}
			#search_div {
				background-color: white;
				border: solid 1px black;
				border-radius: 25px;
				padding: 0;
				margin-bottom: 1.0vw;
			}
		</style>
		<script>
			//https://www.geeksforgeeks.org/search-bar-using-html-css-and-javascript/
			function search() {
				let input = document.getElementById('searchbar').value
				input = input.toLowerCase();
				let x = document.getElementsByClassName('search');
				  
				for (i = 0; i < x.length; i++) { 
					if (!x[i].innerHTML.toLowerCase().includes(input)) {
						x[i].style.display="none";
					}
					else {
						x[i].style.display="table-row";                 
					}
				}
			}
		</script>
	</head>
	<body>
		<div id="search_div" class="col-4 hor_center">
			<input id="searchbar" onkeyup="search()" type="text" name="search" placeholder="Wyszukaj...">
			<input id="searchbar_icon"  type="image" class="" src="public/icons/search.png"/>
		</div>
		<?php 
			use Shuchkin\SimpleXLSX;
			require_once("SimpleXLSX.php");
			
			if ($xlsx = SimpleXLSX::parse('public/contactList.xlsx')) {
				$names =  $xlsx->rows(0);
				$count_rows = count($names);
				for($i = 0; $i < $count_rows; $i++) {
					$names_array[$names[$i][0]] = $names[$i][1];
				}
				echo "<table class='contact_list'>";
				for($j = 1; $j <= $count_rows; $j++) {
					$sheet = $xlsx->rows($j);
					$sheetName = $xlsx->sheetName($j);
					
					echo "<tr><td colspan=4><b>" . $names_array[$sheetName] . "</b></td></tr>";
					for($i = 0; $i < count($sheet); $i++)
					{
						echo "	<tr class='search'>
									<th>" . $sheet[$i][1] . "</th>
									<th>" . $sheet[$i][0] . "</th>
									<th title='" . $sheet[$i][3] . "'><b>" . substr($sheet[$i][3], -3) . "</b></th>
									<th><a href='mailto:" . $sheet[$i][2] . "'><b>" . $sheet[$i][2] . "</b></a></th>
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