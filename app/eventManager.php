<html>
	<head>
		<?php include("session.php"); ?>
		<link rel="stylesheet" href="public/style.css">
		<meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv='Cache-control' content='no-store'>
	</head>
	<body>
		<div class="sidenav">
			<div id="puw_logo" class="">
				<img class="hor_center" src="./public/icons/logo.png"/>
				</br>
				<div style="width:100%;" class="text_center">Portal Usług Wewnętrznych</div>
			</div>
			</br>
			<div>
				<table>
					<tr class="tab_links tab_link_active" onClick="openTabs(this, 'add_notification_tab')">
						<th><img src="./public/icons/notification.png"></th>
						<th><span>Powiadomienia</span></th>
					</tr>
					<tr class="tab_links " onClick="openTabs(this, 'add_event_tab')">
						<th><img src="./public/icons/calendar.png"></th>
						<th><span>Kalendarz</span></th>
					</tr>
					<tr class="tab_links " onClick="redirect('logout.php')">
						<th><img src="./public/icons/avatar.png"></th>
						<th><span>Wyloguj</span></th>
					</tr>
				</table>
			</div>
		</div>
		<div class="main">
			<div id="add_notification_tab">
			
			</div>
		
			<div id="add_event_tab" class="tabs" style="z-index:1; display:block;">
				<div id="info"></div>
				<table id="form_calendar" class="col-5">
					<tr>
						<th class="active" colspan="2"><label class="col-12">Nowe Wydarzenie</label></th>
					</tr>
					<tr class="">
						<th class="col-4 padding_0 active"><label class="col-12" for="event_date">Data</label></th>
						<th class="col-8 padding_0">
							<?php
								require_once("functions.php");
								if(isset($_REQUEST["new_event_date"])) {
									$date = $_REQUEST["new_event_date"];
								} else {
									$date = date("Y-m-d");
								}
								$date = strtotime($date);
								echo"<input class='col-12 ' type='date' id='event_date' value='" . idate("Y", $date) . "-" . return00(idate('m', $date)) . "-" . return00(idate('d', $date)) . "'>";
							?>
						</th>
					</tr>
					<tr class="">
						<th class="col-4 padding_0 active"><label class="col-12" for="event_date">Godzina</label></th>
						<th class="col-8 padding_0"><input class="col-12" type="time" id="event_time"></th>
					</tr>
					<tr class="">
						<th class="col-4 padding_0 active"><label class="col-12" for="event_date">Tytuł</label></th>
						<th class="col-8 padding_0"><input class="col-12" type="input" id="event_title"></th>
					</tr>
					<tr class="">
						<th class="col-4 padding_0 active"><label class="col-12" for="event_date">Opis</label></th>
						<th class="col-8 padding_0"><textarea class="col-12" id="event_descr"></textarea></th>
					</tr>
					<tr class="">
						<th class="" colspan="2"><input class="col-12" type="button" value="Dodaj Event" onClick="addCalendarEvent();"></th>
					</tr>
				</table>
			</div>
		<script src="public/jquery-3.6.3.min.js"></script>
		<script src="public/script.js"></script>
	</body>
</html>