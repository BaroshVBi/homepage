<html>
	<head>
		<link rel="stylesheet" href="public/style.css">
		<meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv='Cache-control' content='no-store'>
	</head>
	<body>
		<!--<div id='loading'></div>-->
		<div class="sidenav">
			<div id="puw_logo" class="">
				<img class="hor_center" src="./public/icons/logo.png"/>
				</br>
				<div style="width:100%;" class="text_center">Portal Usług Wewnętrznych</div>
			</div>
			</br>
			<div>
				<table>
					<tr class="tab_links tab_link_active" onClick="openTabs(this, 'dashboard_tab')">
						<th><img src="./public/icons/home.png"></th>
						<th><span>Dashboard</span></th>
					</tr>
					<tr class="tab_links " onClick="openTabs(this, 'apps_tab')">
						<th><img src="./public/icons/add.png"></th>
						<th><span>Aplikacje</span></th>
					</tr>
					<tr class="tab_links " onClick="openTabs(this, 'calendar_tab1')">
						<th><img src="./public/icons/calendar.png"></th>
						<th><span>Kalendarz</span></th>
					</tr>
					<tr class="tab_links " onClick="openTabs(this, 'login_tab')">
						<th><img src="./public/icons/avatar.png"></th>
						<th><span>Login</span></th>
					</tr>
				</table>
			</div>
		</div>
		<div class="main">
			<div id="dashboard_tab" class="tabs" style="display:block">
				<div class="col-6">
					<div class="dmenu col-12 box_shadow">
						<?php include("displayNotifications.php"); ?>
					</div>
				</div>
				<div class="col-6">
					<div class="dmenu col-12 box_shadow">
						<div id="week" class="col-12 padding_0"><?php include("week.php"); ?></div>
					</div>
				</div>
				<div class="col-6">
					<div class="dmenu col-12 box_shadow">
						Ostatnio Używane Aplikacje - Oparte o sesje
					</div>
				</div>
				<div class="col-6">
					<div class="dmenu col-12 box_shadow">
						Ulubione - zalogowany uzytkownik
					</div>
				</div>
				<div class="col-6">
					<div class="dmenu col-12 box_shadow">
						Często Używane - statystyka z bazy danych
					</div>
				</div>
				<div class="col-6">
					<div class="dmenu col-12 box_shadow">
						
					</div>
				</div>
			</div>
			
			<div id="apps_tab" class="tabs"> 
				<?php 
					include("config.php");
					$sql1 = "SELECT * FROM categories";
					$result1 = mysqli_query($db,$sql1);
					//$count = mysqli_num_rows($result1);
					//echo $count;
					if($result1->num_rows > 0) {
						while($row1 = $result1->fetch_assoc()) {
							$html_id = "" . $row1["id"] . $row1["name"] . "";
							echo "<div class='category_button col-12' onClick=\"collapse('$html_id', this);\">" . $row1["name"] . "</div><div id='" . $html_id . "' class='container col-12 padding_0' style='max-height:100%;'>";
							
							$sql = "SELECT * FROM apps WHERE app_category_id=" . $row1["id"];
							$result = mysqli_query($db,$sql);
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
									echo "<div class='apptile col-14'>
											<a target='_blank' href='" . $row["app_link"] . "'>
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
			</div>
			
			<div id="calendar_tab1" class="tabs">
				<div id="calendar" class="col-8">
					<div id="calendar_controls" class="col-12">
						<div class="col-1 ver_center cursor_pointer" onClick="showMonth(-1)">&#10094;</div>
						<div id="cal" class="col-3 ver_center"></div>
						<div class="col-1 ver_center cursor_pointer" onClick="showMonth(1)">&#10095;</div>
					</div>
					<div class="week_days_names col-12 padding_0 text_center">
						<div class="col-13 border_right">Poniedziałek</div>
						<div class="col-13 border_right">Wtorek</div>
						<div class="col-13 border_right">Środa</div>
						<div class="col-13 border_right">Czwartek</div>
						<div class="col-13 border_right">Piątek</div>
						<div class="col-13 border_right">Sobota</div>
						<div class="col-13 border_right">Niedziela</div>
					</div>
					<div id="calendar_month" class="col-12 padding_0"></div>
				</div>
				<div id="calendar_day" class="col-4 padding_0">
				</div>
			</div>
			
			<div id="login_tab" class="tabs">
				login
			</div>
		</div>
		
		<div id="event_details" class="slide_in">
			
		</div>
		<script src="public/jquery-3.6.3.min.js"></script>
		<script src="public/script.js"></script>
	</body>
</html>