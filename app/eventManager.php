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
				<div class="col-6">
					<div id="info"></div>
					<form>
						<table id="form_calendar" class="col-12">
							<tr>
								<th colspan="2"><label class="col-12">Nowe Wydarzenie</label></th>
							</tr>
							<tr>
								<th style="width:30%;"><label for="event_date">Data</label></th>
								<th>
									<?php
										require_once("functions.php");
										if(isset($_REQUEST["new_event_date"])) {
											$date = $_REQUEST["new_event_date"];
										} else {
											$date = date("Y-m-d");
										}
										$date = strtotime($date);
										echo"<input class='col-12 ' type='date' id='event_date' value='" . idate("Y", $date) . "-" . return00(idate('m', $date)) . "-" . return00(idate('d', $date)) . "' required>";
									?>
								</th>
							</tr>
							<tr>
								<th><label class="col-12" for="event_date">Godzina</label></th>
								<th><input class="col-12" type="time" id="event_time" required></th>
							</tr>
							<tr>
								<th><label class="col-12" for="event_date">Tytuł</label></th>
								<th><input class="col-12" type="input" id="event_title" required></th>
							</tr>
							<tr>
								<th><label class="col-12" for="event_date">Opis (opcjonalne)</label></th>
								<th><textarea class="col-12" id="event_descr"></textarea></th>
							</tr>
							<tr>
								<th colspan="2"><input class="col-12" type="submit" value="Dodaj Event" onClick="addCalendarEvent();"></th>
							</tr>
						</table>
					</form>
				</div>
				<div id="view_events" class="col-6">
					<?php include("viewEvents.php") ?>
				</div>
			</div>
		</div>
		<script src="public/jquery-3.6.3.min.js"></script>
		<script src="public/script.js"></script>
	</body>
</html>