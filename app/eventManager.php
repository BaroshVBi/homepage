<html>
	<head>
		<?php 
			include("session.php"); 
			//echo $_REQUEST["new_event_date"];
		?>
		<link rel="stylesheet" href="public/style.css">
		<meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv='Cache-control' content='no-store'>
	</head>
	<body>
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
						$date = date("Y-m-d");
						if(isset($_REQUEST["new_event_date"])){
							$date = $_REQUEST["new_event_date"];
						}
						$date = strtotime($date);
						echo"<input class='col-12 ' type='date' id='event_date' value='" . idate("Y", $date) . "-" . return00(idate('m', $date)) . "-" . return00(idate('d', $date)) . "'>"
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
		<script src="public/eventManager.js"></script>
		<script src="public/jquery-3.6.3.min.js"></script>
	</body>
</html>