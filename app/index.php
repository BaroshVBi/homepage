<html>
	<head>
		<?php session_start(); ?>
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
					<tr id="calendar_tab_1" class="tab_links " onClick="openTabs(this, 'calendar_tab1')">
						<th><img src="./public/icons/calendar.png"></th>
						<th><span>Kalendarz</span></th>
					</tr>
					<tr class="tab_links " onClick="redirect('login.php')">
						<th><img src="./public/icons/avatar.png"></th>
						<th><span>Login</span></th>
					</tr>
				</table>
			</div>
		</div>
		<div class="main">
			<div id="dashboard_tab" class="tabs" style="z-index:1; display:block;">
				<div class="col-6">
					<div class="dmenu col-12 box_shadow">
						<?php include("displayNotifications.php"); ?>
					</div>
				</div>
				<div class="col-6">
					<div class="dmenu col-12 box_shadow">
						<div id="week" class="col-12 padding_0">
							<?php include("week.php"); ?>
						</div>
					</div>
				</div>
				<div id="recent_apps">
					<?php include("recentApps.php"); ?>
				</div>
				<div class="col-6">
					<div class="db_apps dmenu col-12 box_shadow">
						<?php include("appUsage.php"); ?>
					</div>
				</div>
<!--			
				<div class="col-6">
					<div class="db_apps dmenu col-12 box_shadow">
						Ulubione - zalogowany uzytkownik
					</div>
				</div>
-->
			</div>
			
			<div id="apps_tab" class="tabs"> 
				<?php include("apps.php"); ?>
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
					<div id="calendar_month" class="col-12 padding_0">
						<?php include("calendar.php"); ?>
					</div>
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
		<script type="text/javascript">
			showMonth(0);
		</script>
	</body>
</html>